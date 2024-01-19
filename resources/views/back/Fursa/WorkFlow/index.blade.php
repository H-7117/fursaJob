{{-- @foreach($jobs as $job)
    <h2>Job ID: {{$job->id}}</h2>
    @php
        $groupedStages = $job->stages->groupBy('name');
    @endphp
    @foreach($groupedStages as $name => $stages)
        <p>{{$name}} ({{$stages->count()}})</p>
    @endforeach
@endforeach --}}
@extends('layouts.back')
@section('content')

    <div class="pagetitle">

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">

                <h5 class="card-title fs-3">الوظائف الشاغره</h5>
                {{-- <button class="create float-right"><a style="color: white" href="{{ route('companyVacancies.create') }}">أضافه</a></button> --}}

              </div>
              

              @foreach($job_depertments as $job_depertment)
              @foreach ($job_depertment as $job)
              <div class="card col-lg-12 border">
                <div class="container p-3 d-flex  justify-content-between">
                  <div class="d-flex">
                    <h5 class="mt-1 fw-bold text-primary" id="font">{{ $job->label}}</h5>
                    <span class="{{ $job->status == 0 ?  'btn-open' : 'btn-close' }}">{{ $job->status }}</span>
                  </div>
                  <div class="d-flex " style="gap: 5px;">
                    {{-- ============================== --}}
            
            
                    {{-- <div class="btn-group border">
                      <button type="button " style="padding: 0px 20px; border-radius: 8px; height: 30px; border: 1px black; display: flex; justify-content: center; align-items: center " class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        مفتوح
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">مفتوح</a></li>
                        <li><a class="dropdown-item" href="#">مغلق</a></li>
                    </div> --}}
            
                    <div class="btn-group border" >
                      <button type="button " style=" padding: 0px 15px ; border-radius: 8px; border: 1px black; display: flex; justify-content: center; align-items: center " class="btn " data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical" style="color: #757779"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">تعديل</a></li>
                        <li><a class="dropdown-item" href="#">حذف</a></li>
                    </div>
            
                    <div class="btn-group border" >
                      <button type="button " style=" padding: 0px 15px ; border-radius: 8px; border: 1px black; display: flex; justify-content: center; align-items: center " class="btn " >
                       
                        <i class="bi bi-share" style="color: #757779"></i>
                      </button>
            
                    </div>
            
                    {{-- ============================== --}}
            
            
                  </div>
            
                </div>
               {{-- ============================================== --}}
               <div class="d-flex container m-0 px-3 gap-3">
                <p><i class="bi bi-geo-alt" style="margin-left: 2px;"></i>{{ $job->Location }} </p>
                <p> <i class="bi bi-building" style="margin-left: 2px;"></i>{{ $job->departments->label }} </p>
              </div>
            {{-- ===================================================== --}}

              <div class="d-flex mt-3 ">
                {{-- @foreach ( $job->stages as $stage) --}}
                @php
                $groupedStages = $job->stages->groupBy('name');
                @endphp
                {{-- ========================================= --}}
                @foreach($groupedStages as $name => $stages)
               <div>

                 <div style="line-height: 7px;width:100px; text-align: center"><p>{{$stages->count()-1}}</p><p>{{$name}}</p></div>
                 {{-- <div style="position: relative; top:-35px; width: 1px; height: 10px;background-color: #ccc"></div> --}}
               </div>
               
                {{-- <div style="line-height: 7px;width:100px; text-align: center"><p>1</p><p>{{ $stage->name }}</p></div><div style="position: relative; top:10px; width: 1px; height: 10px;background-color: #ccc"></div> --}}
                {{-- <div style="line-height: 7px;width:100px; text-align: center"><p>1</p><p>{{ $stage->name }}</p></div><div style="position: relative; top:10px; width: 1px; height: 10px;background-color: #ccc"></div> --}}
                <a href=""></a>
                @endforeach
            
                {{-- @endforeach --}}
                  
              </div>
            
              {{-- ================================================== --}}
              <div class="d-flex mt-3 container">
                {{-- @php
                $groupedStages = $job->stages->groupBy('fursa__applicant_id');
                @endphp
                @foreach($groupedStages as $name => $stages)
                @endforeach --}}
                <p>تم إنشاء قبل {{ $job->created_at->diffForHumans(null,true) }}، إجمالي المرشحين ....... </p>
                <a href="{{ route('wrokflow.show',$job->id) }}"> &nbsp; اظهر كل المتقدمين</a>
            
            </div>
            
            <div class="d-flex mt-3 container">
          
          </div>
            </div>
              @endforeach
             
            @endforeach

            </div>
          </div>

        </div>
      </div>
    </section>

  @endsection