<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" 
    integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  </head>
<body>
    <div>
        <h3>Appointment Number:</h3>
        <h2>{{$appt_number}}</h2>
            <p>
              Hello {{$data['fname']}}!
                <br>
                <br>
                  Will advise you once your appointment has been approved.
                <br>
                <br>
                  Please note that there might be change of schedule depends on the availability
            </p>
    </div>
</body>
</html>