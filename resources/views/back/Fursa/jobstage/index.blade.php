@extends('layouts.back')
@section('content')

<div class="pagetitle">
  <h1>المراحل التوظيفيه</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex  mt-2" style="
    justify-content: end;
">
            
            <button class="create "><a style="color: white" href="{{ route('jobStage.create') }}">أضافه</a></button>
          </div>
          
          <p></p>

          <!-- Table with stripped rows -->
          <table dir="rtl" id="listTable" class="table ">
            <thead>
              <tr>
                <th colspan="1">الاسم الوظيفه</th>
                <th colspan="1">اسم المرحله</th>
                <th colspan="1">ترتيب المرحله</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($JobStage as $JobStages)
              @foreach ($JobStages as $job)
              <tr>
                <td>{{ $job->job->label }}</td>
                <td>{{ $job->name }}</td>
                <td>{{ $job->round }}</td>
                
              </tr>
              @endforeach
              
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