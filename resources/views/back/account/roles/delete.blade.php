@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>حذف دور</h1>
  <nav class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item">الحسابات</li>
          <li class="breadcrumb-item active"><a href="{{ route('account.back.roles.index') }}">الأدوار</a></li>
        </ol>
      </nav>
</div><!-- End Page Title -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form method="post" action="{{ route('account.back.roles.destroy', $role->id) }}">
            @csrf
            @method('DELETE')
            <h2 class="card-title">تأكيد الحذف</h2>
            <p class="card-text">هل أنت متأكد أنك تريد حذف هذه السجل</p>

            <!-- Delete Button -->
            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              حذف
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection