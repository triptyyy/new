<?php

namespace App\Services\Api\Apims;

use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class BaseApimsService
{
    protected $username;
    protected $password;
    protected $baseApi;
    protected $formattedDate;

    protected $client;
    protected $headers;

    public function __construct()
    {
        // get API details
        $this->username = config('api.APIMS_USERNAME');
        $this->password = config('api.APIMS_PASSWORD');
        $this->baseApi  = config('api.APIMS_ENDPOINT');

        // Get the current date and time
        $date = Carbon::now();

        // Format date to : yyyy-MMddTHH:mm:ss.fff

        $this->formattedDate = $date->setTimezone('Asia/Kathmandu')->format('Y-m-d\TH:i:s.v') ;


        // Initialize Guzzle Http Client with headers
        $this->client = new Client([
            'base_uri' => $this->baseApi,
            'headers' => [
                "Authorization" => "Basic " . base64_encode("{$this->username}:{$this->password}"),
                "Content-Type" => "application/json",
            ],
            'debug' => true, // Enable debugging
        ]);
    }

    private function convertToBase64($data)
    {
        // encode to json
        $jsonString = json_encode($data);

        // encode to base64
        $base64String = base64_encode($jsonString);

        return $base64String;
    }

    private function generateSignature($data)
    {
        // get private key
        $privateKey = $this->getPrivateKey();

        // Load the private key
        $pkeyid = openssl_pkey_get_private($privateKey);

        // if failed to load private key
        if (!$pkeyid) {

            $errorMsg = openssl_error_string();
            Log::error('Failed to load private key ' . $errorMsg);
            throw new Exception('Failed to load private key ' . $errorMsg);
        }

        // Prepare the signature model
        $signatureModel = [
            'Model' => $data,
            'TimeStamp' => $this->formattedDate,
        ];

        // Convert the signature model to JSON
        $signatureData = json_encode($signatureModel);

        // Generate the new signature
        $result = openssl_sign($signatureData, $signatureBytes, $pkeyid, OPENSSL_ALGO_SHA256);

        // if failed to generate signature
        if (!$result) {

            Log::error('Failed to generate signature');
            throw new Exception('Failed to generate signature');
        }

        // Encode the signature in Base64
        $base64Signature = base64_encode($signatureBytes);

        return $base64Signature;
    }

    private function getPrivateKey()
    {
        // Path to the private key file
        // Do not commit secret keys to git, or use them in client-side code
        $privateKeyPath = storage_path(config('api.APIMS_PRIVATE_KEY_PATH'));

        // Read the private key file
        $privateKey = file_get_contents($privateKeyPath);

        // if falied to read the private key
        if ($privateKey === false) {

            Log::error('Failed to read private key file');
            throw new Exception('Failed to read private key file');
        }

        return $privateKey;
    }



    // Pass function name and respective data as an arguments
    public function process(string $functionName, array $data)
    {
        // prepare data from provided arguments
        $requestData = [
            'FunctionName' => $functionName,
            'Data'         => $this->convertToBase64($data),
            'Signature'    => $this->generateSignature($data),
            'TimeStamp'    => $this->formattedDate,
        ];

        try {

            // call post api with request data

            // $response = $this->client->post('', [
            //     'json'    => $requestData,
            // ]);

            $response =  Http::withBasicAuth($this->username, $this->password)
                            ->post( $this->baseApi, $requestData );


            // get contents of response
            // JSON response is expected
            $rawResponse = $response->getBody()->getContents();

            // if JSON response is not received
            if (json_last_error() !== JSON_ERROR_NONE) {

                Log::info("JSON Decode Error: " . json_last_error_msg() . $rawResponse);

                return [
                    'code' => 400,
                    'message' => 'Invalid API response format, expected format : JSON',
                ];
            }

            // Decode response as json
            $responseData = json_decode($rawResponse, true);

            // return success
            return $responseData;
        }
        // Handle request error
        catch (RequestException $e) {

            // if response is received but with other status code, != 200
            if ($e->hasResponse()) {

                $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);

                // Log error response
                Log::info("Error Response: " . json_encode($errorResponse));

                return $errorResponse;
            }

            // if any other issues
            return [
                'code' => 400,
                'message' => 'An error occurred',
            ];
        }
    }
}
