@extends('layouts.back')
@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mt-2">

              <h5 class="card-title fs-3">المتقدمين</h5>
            </div>
            
            <p></p>

            <!-- Table with stripped rows -->
            <table dir="rtl" id="listTable" class="table ">
              <thead>
                <tr>
                    <th colspan="1">
                        اسم الوظيفه
                      </th>
                    <th colspan="1">
                    الاسم
                  </th>
                  
                  <th colspan="1">
                    رقم الهاتف
                  </th>
                
                  <th colspan="1">
                    الايميل الشخصي
                </th>
                 
                <th colspan="1">
                    روابط اخرى
                </th>
              
                <th colspan="1">
                    السيره الذاتيه
                </th>
                  <th colspan="4">الإجراءت</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jobApplicant as $jobApplicants )
                  @foreach ($jobApplicants as $applicant)
                    
                  <tr>
                    <td>{{ $applicant->label }}</td>
                    <td>{{ $applicant->name }}</td>
                    <td>{{ $applicant->phone }}</td>
                    <td>{{ $applicant->personalEmail }}</td>
                    <td>{{ $applicant->links }}</td>
                    <td><a href="{{ $applicant->cv }}" target="_blank">{{ $applicant->cv }}</a></td>
                    {{-- <td>{{ $depertment->company->name }}</td> --}}
                    <td>
                        <button class="btn"><a href="{{ route('Applicant.show',$applicant->id) }}"><i class="bi bi-eye"></i></a></button>
                       {{-- <button class="btn"><a href="{{ route('depertment.edit',$depertment->id) }}"><i class="bi bi-pen"></i></a></button> --}}
                      {{-- <button class="btn"><a href="{{ route('depertment.delete',$depertment->id) }}"><i class="bi bi-trash"></i></a></button>  --}}
                      {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                    </td>
                  </tr>
                  @endforeach
                @endforeach
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
            {{-- @include('common.pagination', ['paginator' => $applicants])  --}}
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
