@extends('layouts.front')

@section('content')
<!-- START: Main Content-->
<div class="form-wrapper" style="display: flex; align-items: center;justify-content: center;">
        
    <div class="info-side col-6 col-md-6 col-sm-12 ">
        
        <img src="{{ asset('assets/img/Sign up-amico.svg') }}" alt="Mock" class="mockup" />
     
    </div>


    <div class="form-side col-6 col-md-6 col-sm-12">
      
        <form method="POST" action="{{ route('account.front.signin.submit') }}" class="my-form">
           @csrf
         @if (request()->filled('tenant'))
         <input class="form-control" type="hidden" name="tenant" value="{{ request()->input('tenant') }}">
         @endif

         
                <div class="text-field">
                    <label for="email">: اسم الشركه
                    </label>
                    <input type="text" name="tenant" id="tenant" autocomplete="off" placeholder="ادخل اسم الشركه"
                    required>
                </div>
            <div class="text-field">
                <label for="email">: اسم المستخدم
                </label>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="ادخل اسم المستخدم"
                required>
            </div>
            <div class="text-field">
                <label for="password">: كلمة المرور
                    
              
                </label>
                <input id="password" type="password" name="password" placeholder="ادخل كلمة المرور" title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                         required>
            </div>
            <button class="my-form__button" type="submit">
                تسجيل الدخول
            </button>
              <div class="mt-2 text-center"> 
                
                  <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary" style="color: #4978f0 !important;border-color:#4978f0 !important ;">إنشاء حساب</button>
                      <button type="button" style="color: #4978f0 !important;border-color:#4978f0 !important ;" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                        <span class="visually-hidden">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item"href="{{ route('companySignUp.view') }}">سجل كا سجل كمنظمه</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item"href="{{ route('signAsUser.index') }}">سجل كا باحث</a></li>
                      </ul>
                    </div>
                    هل ليس لديك حساب؟
            </div>
        </form>
    </div>
</div>
        <!-- END: Content-->
@endsection