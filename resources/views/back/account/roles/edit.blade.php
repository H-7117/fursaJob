@extends('layouts.back')
@section('edit')
<div class="pagetitle">
  <h1>تحديث دور</h1>
  <nav class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item">الحسابات</li>
          <li class="breadcrumb-item active"><a href="{{ route('account.back.roles.index') }}">الأدوار</a></li>
        </ol>
      </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="py-4 px-2">
            <form method="POST" action="{{ route('account.back.roles.update', $role->id) }}"  class="" >
            @csrf
            @method('PUT')
            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form7Example1">الاسم</label>
              <input type="text" name="name" value="{{ $role->name }}" id="form7Example1" class="form-control" />
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form7Example1">العنوان</label>
              <input type="text" name="label" value="{{ $role->label }}" id="form7Example1" class="form-control" />
            </div>

            <div class="tab-pane pt-3" id="">
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">الاذونات</label>
                  <div class="col-md-8 col-lg-9">
                    @foreach($permissions as $permission)
                    <div class="form-check">
                      <!-- <input type="checkbox" name="permissions[]" class="form-check-input" id="changesMade-{{ $permission->id}}" {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}> -->
                      <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                      <label class="form-check-label" for="changesMade">
                        {{ $permission->label }}
                      </label>
                    </div>
                    @endforeach

                  </div>
                </div>

                <div class="text-start">
                  <button type="submit" class="btn btn-primary">حفظ</button>
                </div>

            </div>

            </form><!-- End settings Form -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection