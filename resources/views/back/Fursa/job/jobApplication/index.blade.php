@extends('layouts.back')
@section('content')
    <div class="pagetitle">
      <h1>الملف التقديمي</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mt-2">

                <h5 class="card-title fs-3">البينات المطلوبه</h5>
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
                      الاسم الكامل
                    </th>
                    <th colspan="1">
                   رقم الهاتف
                </th>

                    <th colspan="1">
                   البريد الشخصي
                </th>
                    <th colspan="1">
                   روابط
                </th>
                
                <th colspan="1">
                    السيره الذاتيه
                 </th>
                    <th colspan="4">الإجراءت</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $counter =0;
                        ?>
                  @foreach ($jobApplcation as $jobAppl)
                    @foreach ($jobAppl as $jobApplcations)
                    <tr>
                      <td>{{ $jobApplcations->job->label }}</td>
                      <td>{{ $jobApplcations->name }}</td>
                      <td>{{ $jobApplcations->phone }}</td>
                      <td>{{ $jobApplcations->personalEmail }}</td>
                      <td>{{ $jobApplcations->links }}</td>
                      <td>{{ $jobApplcations->cv }}</td>
                      
                      <td>
                         <button class="btn"><a href="{{ route('Appliction.show',$jobApplcations->id) }}"><i class="bi bi-eye"></i></a></button>
                         <button class="btn"><a href="{{ route('Appliction.edit',$jobApplcations->id) }}"><i class="bi bi-pen"></i></a></button>
                       {{-- <button class="btn"><a href="{{ route('jobApplication.delete',$jobApplcations->id) }}"><i class="bi bi-trash"></i></a></button> --}}
                      {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                      </td>
                    </tr>
                    @endforeach
                  
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