@extends('layouts.front')
@section('content')

    <div class="form-wrapper">
        
        <div class="info-side col-6 col-md-6 col-sm-12 ">
            
            <img src="{{ asset('assets/img/Sign up-amico.svg') }}" alt="Mock" class="mockup" />
         
        </div>


        <div class="form-side col-6 col-md-6 col-sm-12">
           
            <form action="{{ route('signAsUser.store') }}" method="POST" class="my-form">
               @csrf
     
               @if (request()->filled('tenant'))
               <input class="form-control" type="hidden" name="tenant" value="{{ request()->input('tenant') }}">
               @endif
               
                <div class="text-field">
                    <label for="username">: اسم المستخدم
                    </label>
                    <input type="text" name="username" id="username" autocomplete="off" placeholder="اسم المستخدم"
                    required>
                </div>

                <div class="text-field">
                    <label for="email">: عنوان البريد الإلكتروني
                    </label>
                    <input type="email" id="email" name="email" autocomplete="off" placeholder="عنوان البريد الإلكتروني"
                    required>
                </div>
                <div class="text-field">
                    <label for="password">: كلمة المرور
                        
                  
                    </label>
                    <input id="password" type="password" name="password" placeholder="كلمة المرور" title="Minimum 6 characters at 
                                                        least 1 Alphabet and 1 Number"
                            required>
                </div>
                <div class="text-field">
                    <label for="confirm-password">اعد كلمة السر
                        
                    </label>
                    <input id="confirm-password" type="password" name="password" placeholder="اعد كلمة السر"
                            title="Minimum 6 characters at east 1 Alphabet and 1 Number"
                            required>
                </div>
                <button class="my-form__button" type="submit">
                    تسجيل الدخول
                </button>
                <div class="mt-2 text-center">Already have an account? <a href="{{ route('account.front.signin') }}">Sign In</a></div>
            </form>
            
        </div>
    </div>
@endsection


