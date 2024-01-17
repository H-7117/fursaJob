@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>إنشاء قطاع جديده</h1>

</div>
<div class="col-xl-12">
    <div class="card p-4">
{{--  --}}

<form action="{{ route('depertment.store') }}" method="POST" >
  @csrf
  <div class="row gy-4">
      <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="(بالانجليزيه) الاسم القسم">
      </div>
      <div class="col-md-6">
          <input type="text" name="label" class="form-control" placeholder="الاسم القسم">
      </div>
      
      <select class="form-control" name="company_id" id="">
        @foreach ($Company as $Companies)
        <option class="" value="{{ $Companies->id }}">
            {{ $Companies->label }}
        </option>
      @endforeach
        
      </select>
      <div class="col-md-12">
          <textarea class="form-control" name="description" rows="6" placeholder="عن القسم"></textarea>
      </div>
      <div class="col-md-12 text-start">
          <input type="submit" class="create" />
      </div> 
  </div>
</form>
    </div>

  </div>
  @endsection