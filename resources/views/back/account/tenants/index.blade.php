@extends('layouts.back')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  ">
        <button type="button " class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h5 class="modal-title d-flex justify-content-end" id="deleteModalLabel">تأكيد الحذف</h5>
      </div>
      <div class="modal-body">
        <p>هل أنت متأكد أنك تريد حذف هذه السجل</p>
      </div>
      <div class="modal-footer d-flex justify-content-start">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button type="button" class="btn btn-danger">حذف</button>
      </div>
    </div>
  </div>
</div>

    <div class="pagetitle">
      <h1>المستأجرون</h1>
      <nav class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"></li>
          <li class="breadcrumb-item">الحسابات</li>
          <li class="breadcrumb-item active">المستأجرون</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">

                <h5 class="card-title fs-3">المستأجرون</h5>
                <button class="create float-right"><a style="color: white" href="{{ route('account.back.tenants.create') }}">أضافه</a></button>
              </div>

              <!-- Table with stripped rows -->
              <table dir="rtl" id="listTable" class="table ">
                <thead>
                  <tr>
                    <th colspan="1">
                      الاسم
                    </th>
                
                    <th colspan="4">الإجراءت</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tenants as $tenant)
                  <tr>
                    <td>{{ $tenant->label }}</td>
                    <td>
                      <button class="btn"><a href="{{ route('account.back.tenants.view', $tenant->id) }}"><i class="bi bi-eye"></i></a></button>
                      <button class="btn"><a href="{{ route('account.back.tenants.edit', $tenant->id) }}"><i class="bi bi-pen"></i></a></button>
                      <button class="btn"><a href="{{ route('account.back.tenants.delete', $tenant->id) }}"><i class="bi bi-trash"></i></a></button>
                      {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                    </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              @include('common.pagination', ['paginator' => $tenants]) 
              <!-- Include custom pagination view -->
            </div>
          </div>

        </div>
      </div>
    </section>

  @endsection