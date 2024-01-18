<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>فرصه</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo3.ico') }}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  {{-- <link rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
  <!-- Vendor CSS Files -->
  {{-- <script src="https://kit.fontawesome.com/16f6ba35a2.js" crossorigin="anonymous"></script> --}}
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-straight/css/uicons-thin-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="pt-3 px-4">
          <img src="{{ asset('/assets/img/logo22.png') }}" alt="">
        </h1>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="ابحث" title="ادخل كلمة مفتاحية">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav me-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @php
              $tenantId = Account::getTenantId();
              $company = null;
              if(Account::getTenantName() != "app"){
              $company = App\Models\Fursa\FursaCompany::find($tenantId);
              }
              $user = Auth::user();
            @endphp
            @if ($company != null)
              
            
            <img src="{{ asset('uploads/companies/'.$company->logo) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle pe-2">{{ $company->name }}</span>
            @else
            <img src="{{ asset('uploads/app/logo22.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle pe-2">{{ $user->username }}</span>
            @endif
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            @if ($company != null)
            <li class="dropdown-header">
              {{-- @php
              $tenant = Account::getTenantId();
              $company = App\Models\Fursa\FursaCompany::find($tenant);
            @endphp --}}
            
              <h6>{{ $company->name }}</h6>
              <span>{{ $company->label }}</span>
            </li>            
            @endif
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('tenant.index') }}">
                <i class="bi bi-person ms-2"></i>
                <span>حسابي</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear ms-2"></i>
                <span>إعدادت الحساب</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle ms-2"></i>
                <span>للمساعده</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form method="post" action="{{route('account.back.signout')}}">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-box-arrow-right ms-2"></i>
                  <span>تسجيل الخروج</span>
                </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      
    
      @php
        $tenant = Account::getTenantName();
      @endphp
      @if ($tenant === "platform")
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}
      {{-- Start Platform Section --}}
      <li class="nav-item">
        <i class="bi bi-speedometer2"></i>
        <span>المنصه</span>
      </li>

      <!-- -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#configurations-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-key-fill"></i>
          <span>الإعدادات</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="configurations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item me-5" id="sidebar-navone">
            {{-- <a class="nav-link collapsed " href="{{ route('core.back.modules.index') }}"> --}}
            <a class="nav-link collapsed ">
              <i class="fa-solid fa-fingerprint"></i>
              <span>الوحدات</span>
            </a>
          </li>
          <li class="nav-item me-5" id="sidebar-navtwo">
            {{-- <a class="nav-link collapsed" href="{{ route('core.back.settings.index') }}"> --}}
            <a class="nav-link collapsed" >
              <i class="fa-solid fa-people-group"></i>
              <span>المتغيرات</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- -->
      
      {{-- 
      <!-- -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#modules-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-key-fill"></i>
          <span>الوحدات</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="modules-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item me-5" id="sidebar-navone">
            <a class="nav-link collapsed " href="{{ route('core.back.modules.index') }}">
              <i class="fa-solid fa-fingerprint"></i>
              <span>الحسابات</span>
            </a>
          </li>
          <li class="nav-item me-5" id="sidebar-navtwo">
            <a class="nav-link collapsed" href="{{ route('core.back.settings.index') }}">
              <i class="fa-solid fa-people-group"></i>
              <span>الصناديق</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- -->
      --}}

      <!-- -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#accounts-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-key-fill"></i>
          <span>الحسابات</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="accounts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @php
              $hasPermission = Account::hasPermission('manage_tenants');
          @endphp
          @if ($hasPermission)
          <li class="nav-item me-5" id="sidebar-navzero">
            <a class="nav-link collapsed " href="{{ route('account.back.tenants.index') }}">
              <i class="fa-solid fa-fingerprint"></i>
              <span>المستأجرون</span>
            </a>
          </li>
          @endif
          <li class="nav-item me-5" id="sidebar-navone">
            <a class="nav-link collapsed " href="{{ route('account.back.roles.index') }}">
              <i class="fa-solid fa-fingerprint"></i>
              <span>الأدوار</span>
            </a>
          </li>
          <li class="nav-item me-5" id="sidebar-navtwo">
            <a class="nav-link collapsed" href="{{ route('account.back.users.index') }}">
              <i class="fa-solid fa-people-group"></i>
              <span>المستخدمون</span>
            </a>
          </li>
        </ul>
      </li>

      
      <!-- -->
      {{-- End Platform Section --}}
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}
      @endif

      @php
        $tenant = Account::getTenantId();
        $company = App\Models\Fursa\FursaCompany::find($tenant);
      @endphp
      @if ($company != null)
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}
      {{-- Start Tenant Section --}}
      <li class="nav-item">
        <i class="bi bi-person-gear"></i>
        <span>المستأجر</span>
      </li>
      <!-- -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tenant-accounts-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-key-fill"></i>
          <span>الحسابات</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="tenant-accounts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li class="nav-item me-5" id="sidebar-navone">
            <a class="nav-link collapsed " href="{{ route('account.back.roles.index') }}">
              <i class="fa-solid fa-fingerprint"></i>
              <span>الأدوار</span>
            </a>
          </li>
          <li class="nav-item me-5" id="sidebar-navtwo">
            <a class="nav-link collapsed" href="{{ route('account.back.users.index') }}">
              <i class="fa-solid fa-people-group"></i>
              <span>المستخدمون</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed"   href="{{ route('depertment.index') }}" >
          <i class="fa-brands fa-squarespace"></i>
            <span>الاقسام</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="">
          <i class="fa-solid fa-briefcase"></i>
            <span>الوظيفه</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         {{-- |||||||||||||||||||||||||||||| --}}
         <li class="nav-item me-5" id="sidebar-navone">
            <a class="nav-link collapsed"   href="{{ route('companiesJob.index') }}">
                <span>انشاء الوظائف</span>
            </a>
          
          </li>
        {{-- |||||||||||||||||||||||||||||||||||||||| --}}
  
        <li class="nav-item me-5" id="sidebar-navtwo">
            <a class="nav-link collapsed"  href="{{ route('jobStage.index') }}">
                <span>المراحل التوظيفيه</span>
            </a>
        
          </li><!-- End Components Nav -->
        
  
          <li class="nav-item me-5" id="sidebar-navtwo">
            <a class="nav-link collapsed" href="{{ route('Appliction.index') }}">
                <span>التقديم</span>
            </a>
        
          </li><!-- End Components Nav -->
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('Applicant.index') }}">
          <i class="fa-solid fa-user-tie"></i>
            <span>المتقدمين</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('wrokflow.index') }}">
          <i class="fa-solid fa-clipboard-user"></i>
            <span>الشواغر</span>
        </a>
      </li><!-- End Components Nav -->

      
      <!-- -->
      {{-- End Tenant Section --}}
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}
      @endif

      
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}
      {{-- Start User Section --}}
      @if (Account::getTenantName() === "app")
      <li class="nav-item">
        <i class="bi bi-person-gear"></i>
        <span>المستخدم</span>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.jobApplied') }}">
          <i class="bi bi-people"></i><span>الوظائف</span>
        </a>
      </li><!-- End Forms Nav -->
      @endif
      {{-- End User Section --}}
      {{-- |||||||||||||||||||||||||||||||||||||||| --}}


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <strong><span>فرصه</span></strong>. جميع الحقوق محفوضة
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      طور بواسطة <a href="https://github.com/H-7117">H-7117</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
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