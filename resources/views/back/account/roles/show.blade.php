@extends('layouts.back')
@section('view')
    <div class="pagetitle">
      <h1>الأدوار</h1>
      <nav class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item">الحسابات</li>
          <li class="breadcrumb-item active"><a href="{{ route('account.back.roles.index') }}">الأدوار</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
             
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">{{ $role->label }}</h5>

                  <hr>
                  <h2 class="card-title">الاذونات</h2>

                  @foreach($role->permissions as $permission)
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">{{ $permission->label }}</div>
                  </div>
                  @endforeach

                </div>

          </div>

        </div>
      </div>
    </section>

@endsection