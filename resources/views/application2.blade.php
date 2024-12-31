<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMI Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 18px;
        }
        .form-label, .form-control, .form-check-label {
            font-size: 1rem;
        }
        .btn-lg {
            font-size: 1.2rem;
            padding: 10px 20px;
        }
        .header {
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h2 class="header">Buy Now Pay Later</h2>
            <h5>Convert your transaction to EMI.</h5>
        </div>

        <!-- Form Section -->
        <form method="">
            @csrf
            <!-- Row 1 -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="credit_card_number" class="form-label">Credit Card Number *</label>
                    <input type="text" name="credit_card_number" id="credit_card_number" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="credit_holder_name" class="form-label">Card Holder Name *</label>
                    <input type="text" name="credit_holder_name" id="credit_holder_name" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="mobile_number" class="form-label">Mobile Number *</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control form-control-lg" required>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="transaction_date" class="form-label">Transaction Date *</label>
                    <input type="date" name="transaction_date" id="transaction_date" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="transaction_amount" class="form-label">Transaction Amount (NPR) *</label>
                    <input type="text" name="transaction_amount" id="transaction_amount" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-4">
                    <label for="amount_to_convert_emi" class="form-label">Amount to Convert EMI *</label>
                    <input type="text" name="amount_to_convert_emi" id="amount_to_convert_emi" class="form-control form-control-lg" required>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="mb-4">
                <label class="form-label">Tenure Months *</label>
                <div class="form-check form-check-inline">
                    <input type="radio" name="tenure" value="6" id="tenure6" class="form-check-input" required>
                    <label for="tenure6" class="form-check-label">6</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="tenure" value="12" id="tenure12" class="form-check-input" required>
                    <label for="tenure12" class="form-check-label">12</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="tenure" value="18" id="tenure18" class="form-check-input" required>
                    <label for="tenure18" class="form-check-label">18</label>
                </div>
            </div>

            <!-- Row 4 -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="emi_amount" class="form-label">EMI Amount (NPR)</label>
                    <input type="text" name="emi_amount" id="emi_amount" class="form-control form-control-lg" placeholder="Optional">
                </div>
                <div class="col-md-6">
                    <label for="conversion_fee" class="form-label">Conversion Fee (NPR)</label>
                    <input type="text" name="conversion_fee" id="conversion_fee" class="form-control form-control-lg" placeholder="Optional">
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="form-check mb-4">
                <input type="checkbox" id="terms_conditions" class="form-check-input" required>
                <label for="terms_conditions" class="form-check-label">I Accept the <a href="#" class="text-decoration-underline">Terms and Conditions</a></label>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" color="orange"class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




