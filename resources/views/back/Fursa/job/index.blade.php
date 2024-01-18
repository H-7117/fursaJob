@extends('layouts.back')
@section('content')


    <div class="pagetitle">
      <h1>سجل الوظائف</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">

                <h5 class="card-title fs-3">الوظائف</h5>
                <button class="create float-right"><a style="color: white" href="{{ route('companiesJob.create') }}" >أضافه</a></button>
              </div>
              
              <p></p>

              <!-- Table with stripped rows -->
              <table dir="rtl" id="listTable" class="table ">
                <thead>
                  <tr>
                    <th colspan="1">
                      الاسم
                    </th>
                  
                    <th colspan="1">
                      نوع الوظيفه
                    </th>
                    <th colspan="1">
                   الموقع </th>
                   <th colspan="1">
                    حاله الوظيفه</th>
                   <th colspan="1">
                    القطاع</th>
                 
                 
                    <th colspan="4">الإجراءت</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($job_depertments as $job_depertment)
                  @foreach ( $job_depertment as $job)
                  <tr>
                      <td>{{ $job->label }}</td>
                      <td>{{ $job->job_type }}</td>
                      <td>{{ $job->Location }}</td>
                      <td>{{ $job->status }}</td>
                      <td>{{ $job->departments->name }}</td>
                      
                      <td>
                         <button class="btn"><a href="{{ route('companiesJob.show',$job->id) }}"><i class="bi bi-eye"></i></a></button>
                         <button class="btn"><a href="{{ route('companiesJob.edit',$job->id) }}"><i class="bi bi-pen"></i></a></button>
                       <button class="btn"><a href="{{ route('companiesJob.delete',$job->id) }}"><i class="bi bi-trash"></i></a></button>
                        {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                      </td>
                    </tr>
                      @endforeach
                  
                  @endforeach
                 
          
   
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <div class="pagination">
                <ul class="pagination justify-content-center">
                    @if ($job_depertments[0]->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $job_depertments[0]->previousPageUrl() }}" rel="prev">&laquo;</a>
                        </li>
                    @endif
                    @foreach ($job_depertments[0]->getUrlRange(1, $job_depertments[0]->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $job_depertments[0]->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    @if ($job_depertments[0]->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $job_depertments[0]->nextPageUrl() }}" rel="next">&raquo;</a>
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
                Page {{ $job_depertments[0]->currentPage() }} of {{ $job_depertments[0]->lastPage() }}
          </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  
    
  @endsection