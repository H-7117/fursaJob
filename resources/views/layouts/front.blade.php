<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo3.ico') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <link rel="stylesheet" href="{{ asset('assets/css/landingPage.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/aos-master/dist/aos.css') }}" />
    <link rel="stylesheet" href=".{{ asset('assets/fonts/tajawal/Tajawal-Light.ttf') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <style>
        
    </style>
    <title>فرصه</title>
  </head>
  <body>
    <header class="header">
      <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo22.png') }}" alt="" />
        </a>
      </div>
      <div class="links">
        <ol reversed>
          <li><a href="{{ url('/') }}">الرئيسيه</a></li>
          <li><a href="#about-us">من نحن</a></li>
          <li><a href="{{ route('jobPoting.index') }}">بحث عن وظيفه</a></li>
        </ol>
      </div>
      {{-- @if(Auth::check()) --}}
      <div class="Login_register">
        <button><a href="{{route('account.front.signup')}}">حساب جديد</a></button>
        <a href="{{route('account.front.signin') }}">دخـــول</a>
      </div>
      {{-- @endif --}}
    </header>


    @yield("content")



<!-- ============================================================================================== -->
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<script>
  AOS.init();
  $(function () {
    $(document).scroll(function () {
      let $header = $(".header");
      $header.toggleClass(
        "scrolled",
        $(this).scrollTop() > $header.height()
      );
    });
  });

  


</script>
</body>
</html>