@extends('layouts.back')
@section('content')
    <div class="pagetitle">
      <h1>  بيانات المتقدم {{ $applicants->name }}</h1>
     
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
             
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">اسم المتقدم</div>
                    <div class="col-lg-9 col-md-8">{{ $applicants->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                    <div class="col-lg-9 col-md-8">{{ $applicants->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                    <div class="col-lg-9 col-md-8">  {{ $applicants->personalEmail }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">رابط شخصي</div>
                    <div class="col-lg-9 col-md-8">  {{ $applicants->links }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">السيره الذاتيه</div>
                    <div class="col-lg-9 col-md-8">  <a href="{{ $applicants->cv }}" target="_blank">{{ $applicants->cv }}</a> </div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection