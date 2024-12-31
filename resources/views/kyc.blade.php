<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Minimal CSS for table layout */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
            border: 1px solid black;
        }

        input[type="text"] {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
        }
    </style>
</head>
<body>
    <h1><u>Your Customer (KYC) Form for Individual Account</u></h1>
    <h1>Account No:</h1>
    <h2>Detail of Account Holder</h2>

    <form action="">
        <table>
            <tr>
                <td>1</td>
                <td>Full Name</td>
                <td>Mr./Miss/Mrs: <input type="text" name="name"></td>
            </tr>
            <tr>
                <td rowspan="3">2</td>
                <td rowspan="3">Permanent Address</td>
                <td>Province: <input type="text" name="province"> District: <input type="text" name="district"> Municipality: <input type="text" name="municipality"></td>
            </tr>
            <tr>
                <td>Ward No: <input type="text" name="ward"> Village/Tole: <input type="text" name="village"> House No: <input type="text" name="house"></td>
            </tr>
            <tr>
                <td>Phone No: <input type="text" name="phone"> Mobile No: <input type="text" name="mobile"> Email: <input type="text" name="email"></td>
            </tr>
            <tr>
                <td rowspan="3">3</td>
                <td rowspan="3">Temporary/current Residential Address</td>
                <td>Province: <input type="text" name="province"> District: <input type="text" name="district"> Municipality: <input type="text" name="municipality"></td>
            </tr>
            <tr>
                <td>Ward No: <input type="text" name="ward"> Village/Tole: <input type="text" name="village"> House No: <input type="text" name="house"></td>
            </tr>
            <tr>
                <td>Phone No: <input type="text" name="phone"> Mobile No: <input type="text" name="mobile"></td>
            </tr>
        </table>
    </form>
</body>
</html>
