
@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>اضافه وظائف</h1>

</div><!-- End Page Title -->
<div class="col-xl-12">
    <div class="card p-4">
      <form action="{{ route('companiesJob.update',$jobs->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="label" value="{{ $jobs->label }}" class="form-control" placeholder="اسم الوظيفه" required>
          </div>
        <div class="col-md-6">
          <input type="text" name="name" value="{{ $jobs->name }}" class="form-control" placeholder="اسم الوظيفه (باالانجليزيه)" required>
        </div>


        <div class="col-md-6">
          <select name="job_type" id="" class=" form-control">
            <option value="">نوع الوظيفه</option>
            <option {{ $jobs->job_type == 'دوام-جزائي' ?  'selected':'' }} value="دوام-جزائي">دوام جزائي</option>
            <option {{ $jobs->job_type == 'دوام-كامل'  ?  'selected':'' }} value="دوام-كامل">دوام كامل </option>
          </select>
        </div>
        
        <div class="col-md-6">
          <select name="Location"  id="" class=" form-control">
            <option  value="">الموقع</option>
            <option {{ $jobs->Location == 'عدن' ?  'selected':'' }} value="عدن">عدن</option>
            <option {{ $jobs->Location == 'صنعاء' ?  'selected':'' }} value="صنعاء">صنعاء</option>
            <option {{ $jobs->Location == 'مارب' ?  'selected':'' }} value="مارب">مارب</option>
          </select>
        </div>

        <div class="col-md-6">
          <select name="depertment_id" id="" class=" form-control">
            <option value="">القطاع</option>
           @foreach ($depertments as $depertment)
           <option {{ $jobs->depertment_id == $depertment->id ?  'selected':'' }} value="{{ $depertment->id }}">{{ $depertment->label }}</option>
           @endforeach
           
          </select>
        </div>


        
 
        <div class="col-md-12">
          <textarea class="form-control" name="job_description" rows="6" placeholder="وصف الوظيفه" required>{{ $jobs->job_description }}</textarea>
        </div>

        <div class="col-md-12 text-center">
       
          <div class="d-flex justify-content-end">
          
              <button type="submit" class="create ">التالي</button>
          </div>

        </div>

      </div>
      </form>
    </div>

  </div>
  @endsection