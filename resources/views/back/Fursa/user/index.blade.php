@extends('layouts.back')
@section('content')

<div class="pagetitle">
  <h1>الوظائف المتقدم لها</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex  mt-2" style="
    justify-content: end;
">
          </div>
          
          <p></p>

          <!-- Table with stripped rows -->
          <table dir="rtl" id="listTable" class="table ">
            <thead>
              <tr>
                <th colspan="1">اسم الوظيفه</th>
                <th colspan="1">اسم المرحله</th>

               
              </tr>
            </thead>
            <tbody>
                @foreach ($jobStages as $jobStage)
                <tr>
                <td>{{ $jobStage->fursa_job_name }}</td>
                <td>{{ $jobStage->job_stage_name }}</td>
            </tr>
            @endforeach
                
               
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          {{-- @include('common.pagination', ['paginator' => $depertments]) --}}
        </div>
      </div>

    </div>
  </div>
</section>

@endsection