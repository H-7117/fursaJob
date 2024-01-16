@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>تعديل بيانات المطلوبه</h1>

</div><!-- End Page Title -->
<div class="col-xl-12">
    <div class="card p-4">
      <form action="{{ route('Appliction.update',$jobApplcation->id) }}" method="POST" >
        @csrf
        @method('PUT')
    
        <div class="row gy-4">
            <div class="form-check form-switch">
                <input class="form-check-input" @if ($jobApplcation->name)
                    checked                    
                @endif   
                name="name" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">الاسم</label>
              </div>

              <div class="form-check form-switch">
                <input class="form-check-input" 
                @if ($jobApplcation->phone)
                    checked                    
                @endif
                name="phone" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">الرقم</label>
              </div>

              <div class="form-check form-switch">
                <input class="form-check-input" name="personalEmail" 
                @if ($jobApplcation->personalEmail)
                    checked                    
                @endif
                type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">الايميل الشخصي</label>
              </div>

              <div class="form-check form-switch">
                <input class="form-check-input" 
                @if ($jobApplcation->links)
                    checked                    
                @endif
                name="links" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">رابط شخصي</label>
              </div>

              <div class="form-check form-switch">
                <input class="form-check-input" name="cv" 
                @if ($jobApplcation->cv)
                    checked                    
                @endif
                type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">السيره الذاتيه</label>
              </div>

             
          <div class="col-md-12 text-center">
         
            <div class="d-flex justify-content-end">
            
                <button type="submit" class="create ">حفظ</button>
            </div>

          </div>

        </div>
      </form>
    </div>

  </div>
  @endsection