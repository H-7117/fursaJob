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
            <div class="pagination">
              <ul class="pagination justify-content-center">
                  @if ($jobApplicant[0]->onFirstPage())
                      <li class="page-item disabled">
                          <span class="page-link">&laquo;</span>
                      </li>
                  @else
                      <li class="page-item">
                          <a class="page-link" href="{{ $jobApplicant[0]->previousPageUrl() }}" rel="prev">&laquo;</a>
                      </li>
                  @endif
                  @foreach ($jobApplicant[0]->getUrlRange(1, $jobApplicant[0]->lastPage()) as $page => $url)
                      <li class="page-item {{ $page == $jobApplicant[0]->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                  @endforeach
                  @if ($jobApplicant[0]->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $jobApplicant[0]->nextPageUrl() }}" rel="next">&raquo;</a>
                      </li>
                  @else
                      <li class="page-item disabled">
                          <span class="page-link">&raquo;</span>
                      </li>
                  @endif
              </ul>
          </div>
  
          <!-- Pagination label -->
          <div class="pagination-label">
              Page {{ $jobApplicant[0]->currentPage() }} of {{ $jobApplicant[0]->lastPage() }}
        </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
