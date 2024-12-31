<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
    <link href="{{ asset('bootstrap-4/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>
        body {
            font-size: 18px;         
        }
        .form-label, .form-control, .form-check-label {
            font-size: 1rem;
        }
        .btn-lg {
            font-size: 1.5rem;
            padding: 10px 20px;
        }
      
        body .container {
            max-width: 800px;
            padding: 10px;
            
        }
    </style>

    </head>
    <body>
        
        {{ $slot }}

        <script src="//code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="//unpkg.com/nepali-date-picker@2.0.2/dist/nepaliDatePicker.min.js"></script>
<link rel="stylesheet" href="//unpkg.com/nepali-date-picker@2.0.2/dist/nepaliDatePicker.min.css">

<script>
    $('.date-picker-bs').nepaliDatePicker({
  dateFormat: '%D, %M %d, %y',
  closeOnDateSelect: true
});
</script>
    </body>
</html>
