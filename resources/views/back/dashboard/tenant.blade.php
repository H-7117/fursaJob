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
                    
                        <h3>{{ $jobs_count }}</h3>
                 
                  </div>
                  <div class="ps-3">
                    
                   

                  </div>
                </div>
              </div>

            </div>
          </div>

         
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

            

              <div class="card-body">
                <h5 class="card-title">المتقدمين</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                   <h3>{{ $count }}</h3>
                  </div>
                  <div class="ps-3">
                    
                   

                  </div>
                </div>
              </div>

            </div>
          </div>

          
          

       

            

              
          
               
@endsection

