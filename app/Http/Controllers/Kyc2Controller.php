<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;

class Kyc2Controller extends Controller
{
    public $selectedProvince;
    public $selectedDistrict;
    public $selectedMunicipality;

    

    public function kyc2()
    {
        $provinces = Province::all();
        $districts = District::all();
        $municipalities = Municipality::all();

        return view('livewire.kyc2', compact('provinces', 'districts', 'municipalities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'permanent_province' => 'nullable|string',
            'permanent_district' => 'nullable|string',
            'permanent_municipality' => 'nullable|string',
            'permanent_ward_no' => 'nullable|string',
            'permanent_village' => 'nullable|string',
            'permanent_house_no' => 'nullable|string',
            'permanent_phone_no' => 'nullable|string',
            'permanent_mobile_no' => 'nullable|string',
            'permanent_email' => 'nullable|email|max:255',
            'temporary_province' => 'nullable|string',
            'temporary_district' => 'nullable|string',
            'temporary_municipality' => 'nullable|string',
            'temporary_ward_no' => 'nullable|string',
            'temporary_village' => 'nullable|string',
            'temporary_house_no' => 'nullable|string',
            'temporary_phone_no' => 'nullable|string',
            'temporary_mobile_no' => 'nullable|string',
            'temporary_email' => 'nullable|email|max:255',
            'landlords_full_name' => 'nullable|string|max:255',
            'rental_province' => 'nullable|string',
            'rental_district' => 'nullable|string',
            'rental_municipality' => 'nullable|string',
            'rental_ward_no' => 'nullable|string',
            'rental_village' => 'nullable|string',
            'rental_house_no' => 'nullable|string',
            'rental_phone_no' => 'nullable|string',
            'rental_mobile_no' => 'nullable|string',
            'rental_email' => 'nullable|email|max:255',
        ]);


        

        return redirect()->route('form.success');

}


}
