@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>إنشاء شركة جديده</h1>

</div>
<div class="col-xl-12">
    <div class="card p-4">
{{--  --}}

<form action="{{ route('depertment.update',$depertment->id) }}" method="POST" >
  @csrf
  @method('PUT')
  <div class="row gy-4">
      <div class="col-md-6">
          <input type="text" name="name" value="{{ $depertment->name }}" class="form-control" placeholder="الاسم">
      </div>
      <div class="col-md-6">
          <input type="text" name="name" value="{{ $depertment->label }}" class="form-control" placeholder="الاسم">
      </div>
     
      <div class="col-md-12">
          <textarea class="form-control" name="description" rows="6" placeholder="الوصف">{{ $depertment->description }}</textarea>
      </div>
      <div class="col-md-12 text-start">
          <input type="submit" class="create" />
      </div> 
  </div>
</form>
    </div>

  </div>
  @endsection