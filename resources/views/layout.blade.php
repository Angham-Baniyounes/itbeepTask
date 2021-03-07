<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Itbeep</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index_style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        @yield('content')
        
        <script>
            $('#send').click(function(e) {
                e.preventDefault();
                sessionStorage.setItem('name', $("#name").val());
                sessionStorage.setItem('mobile', $("#mobile").val());
                sessionStorage.setItem('email', $("#email").val());
            });
            
            $('#next').click(function(e) {
                e.preventDefault();
                // debugger;
                let service_id = $("input[name='service_id']:checked").val();
                sessionStorage.setItem('service_id', service_id);
            });
            $('#insert').click(function(e) {
                e.preventDefault();
                // debugger;
                let intrest_id = $("input[name='intrest_id']:checked").val();
                sessionStorage.setItem('intrest_id', intrest_id);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn-submit").click(function(e){
            e.preventDefault();
            
            let uname = session('name');
            let umobile = session('mobile');
            let uemail = session('email');
            let uservice_id = session('service_id');
            let uintrest_id = session('intrest_id');
            let url = '{{ url('postinsert') }}';

            $.ajax({
            url:url,
            method:'POST',
            data:{
                    name:uname,
                    mobile:umobile,
                    email:uemail,
                    service_id:uservice_id,
                    intrest_id:uintrest_id,
            }
                    },
            success:function(response){
                if(response.success){
                    alert(response.message) //Message come from controller
                }else{
                    alert("Error")
                }
            },
            error:function(error){
                console.log(error)
            }
            });
            });
        </script>
        {{$name = session('name')}}
        {{$mobile = session('mobile')}}
        {{$email = session('email')}}
        {{$service_id = session('service_id')}}
        {{$intrest_id = session('intrest_id')}}
    </body>
</html>
