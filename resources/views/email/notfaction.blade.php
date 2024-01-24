<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/email.css') }}">
    <title>Message</title>
</head>
<body>
    <div class="contianer">
        <img src="{{ asset('assets/img/logo4.png') }}" alt="">
        <h1>تنبيه</h1>
        <p>{{ $mailDate['title'] }}</p>
        <p>{{ $mailDate['body'] }}</p>
        <div class="page_notFound">
            <a class="btn" class="text-center"  href="{{ route('home.front') }}">الصفحه الريئيسه</a>
        </div>
    </div>
   
</body>
</html>