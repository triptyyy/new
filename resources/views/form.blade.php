<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
   
</head>
<body>
   <h1>Verification Information</h1>

   <form action="{{ route('form.store') }}" method="POST">
    @csrf
    
    <label for="">Salutation</label>
    <select name="salutation" id="salutation">
        <option value="" selected disabled>Select</option>
        <option value="Mr.">Mr.</option>
        <option value="Ms.">Ms.</option>
        <option value="Mrs">Mrs</option>
        <option value="Dr.">Dr.</option>
        <option value="Others">Others</option>
    </select><br>

    <label for="">First name</label>
    <input type="text" id="first_name" name="first_name" required>
    </br>

    <label for="">Middle name</label>
    <input type="text" id="middle_name" name="middle_name" required>
    </br>

    <label for="">Last name</label>
    <input type="text" id="last_name " name="last_name" required>
    </br>

    <label for="">Email</label>
    <input type="text" id="email" name="email" required>
    </br>

    <label for="">Phone Number</label>
    <input type="text" id="phone_number" name="phone_number" required>
    </br>

    <label for="">Send veriication code to</label>
    <input type="text" id="code" name="code" placeholder="Email or number" required>
    </br>

    <button type="submit">Submit</button>
    

   </form>
</body>
</html>