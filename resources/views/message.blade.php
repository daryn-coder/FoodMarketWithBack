<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/project.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="letter">
        <h1>{{__('lang.thanks')}}</h1>
        <h1> {{__('lang.call')}}</h1>
        <p>{{__('lang.m1')}}</p>
        <p> {{__('lang.m2')}}</p>
        <p>{{__('lang.m3')}}</p>
        <p>{{__('lang.m4')}}</p>
        <p>{{__('lang.m5')}}</p>
        <p id="price"></p>
        <a href="{{ url('/' . app()->getlocale()) }}" class="btn btn-secondary">{{__('lang.back')}}</a>
    </div>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>