<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/no.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>

    <!-- <header class="header">
        <div class="logo">
          <img src="./image/logo22.png" alt="" />
        </div>
        
      </header> -->

    <div class="container pt-5" dir="rtl">
       <div class="container">
        <div class="bd-example">
            <div class="logo">
              </div>
            <nav>
                

              <div class="nav nav-tabs"  style="position: relative; display: flex;align-items: center;justify-content: center;" id="nav-tab" role="tablist">
                <div style="float: right; position: absolute; right: 0; bottom: -10px;">
                    <img src="{{ asset('assets/img/logo22.png') }}" alt=""  width="100px" height="100px"/> 
                </div>
                <div style="display: flex;align-items: center;justify-content: center;">

                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"  aria-controls="nav-home" aria-selected="true">عن الشركه</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"  aria-controls="nav-profile" aria-selected="false">التسجيل</button>
                
                </div>
              </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
              <div class=" tab-pane fade  show active company " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container  ">
                  @foreach ($companyName as $companyNames)
                    
                  
                        <div class="card border-0 inner-card">
                            <div class="card-img" style="padding: 5px;">
                              
                                <img   src="{{ asset('uploads/companies/'.$companyNames->logo) }}" alt="img" />
                            </div>
                          <div class="text-center">
                            <h6 class="text-orang text-uppercase small letter-spacing-1" style="color: var(--secondery-color);">
                              {{ $companyNames->label }}
                            </h6>
                            <h3 class="text-primary-dark" >{{ $companyNames->about_company }}</h3>
                            <p class="text-black-50">
                              {{ $companyNames->email_address }} 
                              </p>
                          </div>
                          @endforeach

                        </div>
                   
                </div>
            </div>
              <div class="tab-pane  fade applaction" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container  ">
                    <div class="card border-0 inner-cardd">
                        <form action="{{ route('Applicant.store') }}" method="POST" role="form" class="container p-5">
                          @csrf
                          <input type="text" value="{{ $jobApplcation->id }}" name="jobApplcationId" hidden>
                          <input type="text" value="{{ $jobApplcation->job_id }}" name="job_id" hidden>
                         @if ($jobApplcation)
                           
                            @if ($jobApplcation->name)
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">الاسم الكامل</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
                              </div>
                            @endif
                           
                              @if ($jobApplcation->phone)
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" >
                              </div>
                              @endif
                             
                              @if ($jobApplcation->personalEmail)
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">البريد الالكتروني</label>
                                <input type="email" name="personalEmail" class="form-control" id="exampleFormControlInput1">
                              </div>
                              @endif
                            
                              @if ($jobApplcation->cv)
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">السيره الذاتيه</label>
                                <input type="file" name="cv" class="form-control" id="exampleFormControlInput1">
                              </div>
                              @endif
                              @if ($jobApplcation->links)
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">رابط github</label>
                                <input type="text" name="links" class="form-control" id="exampleFormControlInput1" placeholder="www.example.com">
                              </div>
                              @endif
                          @endif
                            <button type="submit" class="btn btn-primary mt-3">رفع</button>
                          </form>

                    </div>
               
            </div></div>

            </div>
            </div>  
       </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>