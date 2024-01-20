@extends('layouts.front')
@section('content')
<div  style="margin-top: 120px; height: 120vh " class="container  text-end text-dark" >
    <h3 class="mt-2 mb-5">{{ $job->name }} / {{ $job->label }}</h3>

    <div class="row " >
        <div class="col-4 col-lg-4 col-md-6 col-sm-12 p-3" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius:8px; height: 46vh ">
            <div class=" row " >
                <h3>بطاقة الوظيفة</h3>
                <div class="border-bottom border-black mb-4"></div>
                <div class="col-6">
                    <h6>{{ $job->job_type }}</h6>
                    <h6> {{  $job->created_at->diffForHumans(null,true) }} منذ</h6>
                </div>
                <div class="col-6">
                    <h5>نوع الوظيفة</h5>
                    <h5>تاريخ نشر الوظيفه</h5>
                </div>
                <div class="border-bottom border-black mt-4"></div>
                {{-- ========================== --}}
                
            </div>
            {{-- ====================================== --}}
            <div >
                <h5>الشركة</h5>
                <div  class="float-end d-flex p-2">
                    <div style="margin-right: 20px">
                        <div><p>{{ $job->company_label }}</p></div>
                        <div >
                            <ul style="display: flex;  list-style: none">
                                <li style="margin-right: 20px">{{ $job->Location }} <i class="fa-solid fa-location-dot"></i></li>
                                <li >{{ $job->department_label }} <i class="fa-solid fa-briefcase"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div  style="width: 80px;height: 80px;border: 1px solid black"><img style="width: 100%;height: 100%;" src="{{ asset('uploads/companies/'.$job->company_logo) }}" alt=""></div>
                </div>
            </div>
            {{-- ======================================================= --}}
        </div>

        {{-- =========================================================================================== --}}
        <div class="col-8 col-lg-8 col-md-6 col-sm-12 ">
            <div class="container p-3" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius:8px;">
                
                <div class="px-3">
                    <h3>وصف الوظيفة</h3>
                    <p>{{ $job->job_description }}</p>
                   
                </div>

                <div dir="rtl"  class="border-top border-black px-3 pt-3">
                    <h3>المهام الوظيفية</h3>
                    <p >{!! $job->job_tasks !!}</p>
                </div>
            </div>


           
    </div>
    
    </div>
</div>

@endsection