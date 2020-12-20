<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
</head>
<body class="full">
    <div id="app">
            <div class="container-fluid ">
                <router-view></router-view>
            </div>
        <footer>Thank you for your love 💕</footer>
    </div> 
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
