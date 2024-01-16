@extends('layouts.front')
@section('content')

{{-- <form action="{{ route('companySignUp.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row mt-5 pt-5 gy-4 container" dir="rtl">
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
        <input type="password"  name="password" class="form-control" placeholder="كلمه المرور">
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
    
        <input type="submit" class="create" />
   
</div>
</form>
@endsection --}}

{{-- @extends('layouts.front')

@section('content') --}}
<!-- START: Main Content-->
<div class="form-wrapper" style="display: flex; align-items: center;justify-content: center;">
        
    <div class="info-side col-6 col-md-6 col-sm-12 ">
        
        <img src="{{ asset('assets/img/Sign up-amico.svg') }}" alt="Mock" class="mockup" />
     
    </div>


    <div class="form-side col-6 col-md-6 col-sm-12">
      
        <form action="{{ route('companySignUp.store') }}" method="POST" enctype="multipart/form-data" class="my-formx">
           @csrf
         @if (request()->filled('tenant'))
         <input class="form-control" type="hidden" name="tenant" value="{{ request()->input('tenant') }}">
         @endif

         <div class=" container" dir="rtl">
               
            <div style="display: flex">
                <div class="col-md-6 text-field">
                    <input type="text" name="name" class="form-control" placeholder="الاسم الشركه (الانجليزيه) ">
                </div>
                <div class="col-md-6 text-field">
                    <input type="text" name="label" class="form-control" placeholder="الاسم الشركه">
                </div>
            </div>
                    
                        <div style="display: flex">
                            <div class="col-md-6 text-field">
                                <input type="text"  name="country" class="form-control" placeholder="البلاد">
                            </div>
                            <div class="col-md-6 text-field">
                                <input type="text"  name="city" class="form-control" placeholder="المدينه">
                            </div>
                        </div>
                      
                       
                        <div style="display: flex">
                            <div class="col-md-6 text-field">
                                <input type="email"  name="email_address" class="form-control" placeholder="البريد الالكتروني">
                            </div>
                            <div class="col-md-6 text-field">
                                <input type="password"  name="password" class="form-control" placeholder="كلمه المرور">
                            </div>
                        </div>
                    
                        <div>
                            <div class="col-md-6 text-field">
                                <input type="file" class="form-control" name="logo">
                            </div>
                            <div class="col-md-12 text-field">
                                <textarea class="form-control" name="about_company" rows="6" placeholder="عن الشركه"></textarea>
                            </div>
                        </div>
                    
              
            </div>
            <button class="my-form__button" type="submit">
                تسجيل الدخول
            </button>
             
        </form>
    </div>
</div>


{{-- <form action="{{ route('companySignUp.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row mt-5 pt-5 gy-4 container" dir="rtl">
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
            <input type="password"  name="password" class="form-control" placeholder="كلمه المرور">
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
        
            <input type="submit" class="create" />
       
    </div>
    </form>
    @endsection --}}