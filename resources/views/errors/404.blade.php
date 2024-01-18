@extends('layouts.front')
@section('content')
<main class="container p-5" style="position: relative; top:40px">
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h3>الصفحة المطلوبة غير موجودة 404
        </h3>
        <h5>للأسف لم يتم العثور على الصفحة التي طلبتها. قد يكون الرابط خاطئ أو أن الصفحة قد حذفت.
        </h5>
        <div class="page_notFound">
            <a class="btn" class="text-center"  href="{{ route('home.front') }}">الصفحه الريئيسه</a>
        </div>
        <img src="{{ asset('assets/img/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found" style="height: 400px !important" width="50%">
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </section>

    </div>
  </main>
@endsection