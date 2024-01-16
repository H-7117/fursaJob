@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>سجل كمنظمة</h1>

</div>
<div class="col-xl-12">
    <div class="card p-4">
{{--  --}}

<form action="{{ route('tenant.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row gy-4">
      <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="الاسم الشركه (الانجليزيه) ">
      </div>
      <div class="col-md-6">
          <input type="text" name="label" class="form-control" placeholder="الاسم الشركه">
      </div>
      <div class="col-md-6">
          <input type="email"  name="email_address" class="form-control" placeholder="البريد الالكتروني">
      </div>
      <div class="col-md-6">
          <input type="text"  name="country" class="form-control" placeholder="البلاد">
      </div>
      <div class="col-md-6">
          <input type="text"  name="city" class="form-control" placeholder="المدينه">
      </div>
      <div class="col-md-6">
          <input type="file" class="form-control" name="logo">
      </div>
      <div class="col-md-12">
          <textarea class="form-control" name="about_company" rows="6" placeholder="عن الشركه"></textarea>
      </div>
      {{-- <div class="col-md-12 text-center"> --}}
          <input type="submit" class="create" />
      {{-- </div>  --}}
  </div>
</form>
    </div>

  </div>
  @endsection