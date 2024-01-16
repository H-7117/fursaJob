@extends('layouts.mainlayout')
@section('usertable')
    <div class="pagetitle">
      <h1>المراحل التوظيفيه</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">

                <h5 class="card-title fs-3">الوظائف</h5>
              </div>
              
              <p></p>

              <!-- Table with stripped rows -->
              <table dir="rtl" id="listTable" class="table ">
                <thead>
                  <tr>
                    <th colspan="1">
                      عنوان الوظيفه
                    </th>
                  
                    <th colspan="1">
                      اسم المرحله
                    </th>
                    <th colspan="1">
                   ترتيب المرحله 
                </th>
                
                    <th colspan="4">الإجراءت</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $counter =0;
                        ?>
                  @foreach ($JobStage as $JobStages)
                    
                  <tr>
                    <td>{{ $JobStages->job->Title }}</td>
                    <td>{{ $JobStages->name }}</td>
                    <td>{{ $JobStages->round }}</td>
                    
                    <td>
                       <button class="btn"><a href="{{ route('stage.show',$JobStages->id) }}"><i class="bi bi-eye"></i></a></button>
                       <button class="btn"><a href="{{ route('stage.edit',$JobStages->id) }}"><i class="bi bi-pen"></i></a></button>
                     <button class="btn"><a href="{{ route('stage.delete',$JobStages->id) }}"><i class="bi bi-trash"></i></a></button>
                    {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                    </td>
                  </tr>
                  @endforeach
                 
          
   
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  @endsection