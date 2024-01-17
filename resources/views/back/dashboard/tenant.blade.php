@extends('layouts.back')
@section('content')
<div>
    <div class="col-lg-8">
        <div class="row">

         
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

            

              <div class="card-body">
                <h5 class="card-title">الوظائف</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    @foreach($job_counts as $depertment_id => $job_count)
                        <h3>{{ $job_count }}</h3>
                    @endforeach
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    
                   

                  </div>
                </div>
              </div>

            </div>
          </div>

         
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown" data-ur1313m3t="true" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">Today</a></li>
                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">This Month</a></li>
                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>$3,264</h6>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div>

          
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown" data-ur1313m3t="true" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">Today</a></li>
                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">This Month</a></li>
                  <li><a class="dropdown-item" href="#" data-ur1313m3t="true">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Customers <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div>

       

            

              
          
               
@endsection

