@extends('layouts.back')
@section('content')
<div class="pagetitle">
    <h1>بيانات المتقدمين</h1>
   
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">

        <form action="{{ route('wrokflow.update') }}" method="POST">
            @csrf
        @method('put')
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
           
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
            
                <div class="row">

                    <div class="" style="display: flex; flex-wrap: wrap; gap:1.5rem; "  >
                      @foreach ($uniqueNames as $name => $applicants)
                      <div class="col-3 " id="stages">
                      
                        <div class="form-check">
                          <label class="form-check-label" for="exampleRadios1">
                              <p>{{ $name }}</p>
                          </label>
                      </div>
                        @foreach ($applicants as $applicantData)
                            @if ($applicantData)
                            
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="applicant_{{ $applicantData->id }}" id="exampleRadios1" value="{{ $applicantData->id }}">
                                <label class="form-check-label" for="exampleRadios1">
                                    <p>{{ $applicantData->name }}</p>
                                </label>
                            </div>

                            @endif
                        @endforeach
                      </div>
                      @endforeach
                     
                    </div>
                </div>
 
               

              </div>

            </div><!-- End Bordered Tabs -->
              <div style="display: flex;justify-content: end">
                <button type="submit" class="create" >تحديث</button>
              </div>
          </div>
        </div>

    </form>



      </div>
    </div>
  </section>
@endsection

