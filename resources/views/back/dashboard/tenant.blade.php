@extends('layouts.back')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
  <title>Updated Dashboard Cards</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .info-card {
      transition: transform 0.2s;
    }

    .info-card:hover {
      transform: scale(1.05);
    }

    .card-body {
      text-align: center;
      padding: 29px 20px;

    }

    .datatable-wrapper{
      padding: 20px;
      box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    }
    .card-icon {
      width: 68px;
      height: 68px;
      background-color: #007bff;
      opacity: 0.5;
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 35px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h5 {
      font-size: 1rem;
      color: #343a40;
    }

    h3 {
      margin: 0;
      font-size: 1.5rem;
      font-weight: bold;
      color: #fff;
    }
    .jobLast{
      padding: 20px ;
    }
    .chart,.jobLast{
      background: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
      margin-bottom: 20px;
      border-radius:8px; 
      margin-left: 20px;
    }
    table{
      
      border-radius: 8px;
      border-spacing: 0;
    border-collapse: separate;
    border-radius: 10px;
    border: 1px solid black;
    }
    .table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
  background-color: #007bff;
  opacity: 0.3;
  color: white
 }

 
  </style>
</head>
<body>

<div class="container mt-3">
    <div class="col-lg-12 mb-5">
        <div class="row top-cards">
         @foreach ($categoryCount as $categoryId => $category)
         
         <input type="hidden" class="count" value="{{ $count = $category['count']; }}" >
         <input type="hidden" class="names" value="{{ $count = $category['name']; }}" >
         @endforeach
        
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="filter">
              

              <div class="card-body">
             
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3 me-5" >
                    <h6>الوظائف</h6>
                    <span class="text-success small pt-1 fw-bold">{{ $jobs_count }}</span> 

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>



      {{--  --}}

      <div class="col-xxl-3 col-md-3">
        <div class="card info-card sales-card">

          <div class="filter">
          

          <div class="card-body">
         
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-user-tie"></i>
              </div>
              <div class="ps-3 me-5">
                <h6>الوظائف المقفله</h6>
                <span class="text-success small pt-1 fw-bold">{{ $jobsState_count }}</span> 

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    {{--  --}}
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

            <div class="filter">
            

            <div class="card-body">
           
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="ps-3 me-5">
                  <h6>المتقدمين</h6>
                  <span class="text-success small pt-1 fw-bold">{{ $countApplcatnt }}</span> 

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


{{--  --}}

<div class="col-xxl-3 col-md-3">
  <div class="card info-card sales-card">

    <div class="filter">
    

    <div class="card-body">
   
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="ps-3 me-5">
          <h6>المرفوضين</h6>
          <span class="text-success small pt-1 fw-bold">{{ $countApplcatnt }}</span> 

        </div>
      </div>
    </div>

  </div>
</div>
</div>
    
    {{--  --}}
    </div>
</div>

<div class="row bottom-card">

  <div class="col-5 chart col-sm-12 col-md-12 col-lg-5 col-sm-12">
    <div class="container mt-5">

      <div>
        <canvas id="myChart"></canvas>
      </div>

      
      
    </div>
</div>


  <div class="col-6 col-sm-12 col-md-12  col-lg-6 "> 

 
      <div class="container jobLast pb-2">
        <h5 class="text-dark pt-3  mb-2 fw-bolder">اخر الوظائف المنشوره</h5>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>الاسم</th>
              <th>القطاع</th>
            </tr>
          </thead>
          <tbody>
            @php
            $rowIndex = 0; // Initialize the row index
            @endphp
        
            @foreach ($job_depertments as $jobs)
              @foreach ($jobs as $job)
                <tr class="{{ $rowIndex % 2 === 0 ? 'even' : '' }}">
                  <td>{{ $job->label }}</td>
                  <td>{{ $job->departments->name }}</td>
                </tr>
                @php
                $rowIndex++;
                @endphp
              @endforeach
            @endforeach
          </tbody>
        </table>
        
      </div>
  </div>


 


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script>
let counts = [];
let names = [];
$('.count').each(function(){
  counts.push($(this).val());
})
$('.names').each(function(){
  names.push($(this).val());
})

console.log(counts);

const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: names,
    datasets: [{
      label: '# of Votes',
      data: counts,
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});


</script>
@endsection

