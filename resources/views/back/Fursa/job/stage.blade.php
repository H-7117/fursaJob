@extends('layouts.mainlayout')
@section('addUser')
<div class="pagetitle">
  <h1>اضافه وظائف</h1>

</div><!-- End Page Title -->
<div class="col-xl-12">
    <div class="card p-4">
      <form action="{{ route('stage.store') }}" method="POST" >
        @csrf
        <input type="text" hidden name="jobId" value="{{ $job_id }}"> 
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="اسم المرحله" required>
          </div>

          <div class="col-md-6">
            <input type="text" name="round" class="form-control" placeholder="ترتيب المرحله" required>
          </div>
          <div class="col-md-12 text-center">
         
            <div class="d-flex justify-content-end">
            
                <button type="submit" class="create ">حفظ</button>
            </div>

          </div>

        </div>
      </form>
    </div>

  </div>
  @endsection