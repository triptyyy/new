<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            flex: 1 1 30%; 
            box-sizing: border-box;
            padding:7px;
        }

        form {
        display: flex;
        flex-wrap: wrap; 
        gap: 5px; 
        }

        .tenure-container {
            display: flex;
            align-items: center;
            gap: 7px;
        }
        @media (max-width: 768px) {
            div {
                flex: 1 1 100%;
            
            }
        }

    </style>
</head>
<body>
    <h2>Buy Now Pay Later</h2>
    <h2>Convert your transaction to EMI.</h2>
    <form action="">
        
        <div>
            <label for="credit_card_number">Credit Card Number</label>
            <input type="text" id="credit_card_number">
        </div>
        <div>
            <label for="credit_holder_name">Card Holder Name</label>
            <input type="text" id="credit_holder_name">
        </div>
        <div>
            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number">
        </div>

        <div>
            <label for="transaction_date">Transaction Date</label>
            <input type="text" id="transaction_date">
        </div>

        <div>
            <label for="transaction_amount">Transaction Amount</label>
            <input type="text" id="transaction_amount">
        </div>

        <div>
            <label for="amount_to_convert_emi">Amount to convert EMI</label>
            <input type="text" id="amount_to_convert_emi">
        </div>
        
        <div>
            <label>Tenure Months</label>
            <div class="tenure-container">
                <input type="radio" name="tenure" value="6" id="tenure6">
                <label for="tenure6">6 </label>
                <input type="radio" name="tenure" value="12" id="tenure12">
                <label for="tenure12">12 </label>
                <input type="radio" name="tenure" value="18" id="tenure18">
                <label for="tenure18">18 </label>
            </div>
        </div>

        <div>
            <label for="emi_amount">EMI Amount (NPR)</label>
            <input type="text" id="emi_amount">
        </div>

        <div>
            <label for="conversion_fee">Conversion Fee (NPR)</label>
            <input type="text" id="conversion_fee">
        </div>

        <div>
            <input type="checkbox">
            <label for="">I Accept the</label>
            <button type="button" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer; padding: 0;">Terms and Conditions</button>
        </div>

        

    </form>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>