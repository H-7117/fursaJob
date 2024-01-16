@extends('layouts.mainlayout')
@section('delete')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <form class="card-body" action="{{ route('jobApplication.destroy', $jobApplcation->id) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <h2 class="card-title">تأكيد الحذف</h2>
            <p class="card-text">هل أنت متأكد أنك تريد حذف هذه السجل</p>
  
            <button type="submit" class="btn btn-danger" >
              حذف
            </button>
         
        </div>
      </div>
    </div>
  </div>
  @endsection
