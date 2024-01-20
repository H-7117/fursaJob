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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      @if(!Auth::check())
      <div class="Login_register">
        <button><a href="{{route('account.front.signup')}}">حساب جديد</a></button>
        <a href="{{route('account.front.signin') }}">دخـــول</a>
      </div>
      @else
      <div class="Login_register">
        <form method="post" action="{{route('account.back.signout')}}">
          @csrf
          <button><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </form>
        @php
              $tenantId = Account::getTenantId();
              $company = null;
              if(Account::getTenantName() != "app"){
              $company = App\Models\Fursa\FursaCompany::find($tenantId);
              }
              $user = Auth::user();
            @endphp
            @if ($company != null)
              
            
            <a href="{{route('dashboard.tenant') }}">لوحه التحكم</a>
            @else
            <a href="{{route('user.jobApplied') }}">لوحه التحكم</a>
            @endif
        
      </div>
      @endif
      
    </header>


    @yield("content")



<!-- ============================================================================================== -->
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/aos-master/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
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

  
  toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    @if (Session::has('error'))

        toastr.error("{{ Session::get('error') }}");
        {{ session()->forget('error') }}
    @elseif (Session::has('success'))

        toastr.success("{{ Session::get('success') }}");
        {{ session()->forget('success') }}
    @elseif (Session::has('info'))

        toastr.info("{{ Session::get('info') }}");
        {{ session()->forget('info') }}
    @elseif (Session::has('wrning'))

        toastr.warning("{{ Session::get('warning') }}");
        {{ session()->forget('warning') }}
    @endif

</script>
</body>
</html>