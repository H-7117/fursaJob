@extends('layouts.back')
@section('content')

<div class="pagetitle">
  <h1>المراحل التوظيفيه</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="d-flex  mt-2" style="
    justify-content: end;
">
            
            <button class="create "><a style="color: white" href="{{ route('jobStage.create') }}">أضافه</a></button>
          </div>
          
          <p></p>

          <!-- Table with stripped rows -->
          <table dir="rtl" id="listTable" class="table ">
            <thead>
              <tr>
                <th colspan="1">الاسم الوظيفه</th>
                <th colspan="1">اسم المرحله</th>
                <th colspan="1">ترتيب المرحله</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach ($JobStage as $JobStages)
              @foreach ($JobStages as $job)
              <tr>
                <td>{{ $job->job->label }}</td>
                <td>{{ $job->name }}</td>
                <td>{{ $job->round }}</td>
                
              </tr>
              @endforeach
              
              @endforeach
            </tbody>
          </table>
          <div class="pagination">
            <ul class="pagination justify-content-center">
                @if ($JobStage[0]->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $JobStage[0]->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif
                @foreach ($JobStage[0]->getUrlRange(1, $JobStage[0]->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $JobStage[0]->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                @if ($JobStage[0]->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $JobStage[0]->nextPageUrl() }}" rel="next">&raquo;</a>
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
            Page {{ $JobStage[0]->currentPage() }} of {{ $JobStage[0]->lastPage() }}
      </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection