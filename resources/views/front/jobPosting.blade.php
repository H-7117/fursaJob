@extends('layouts.front')
@section('content')

<body id="jobBody">


    <div class="container jobContiner col-12 col-sm-12" style="height: fit-content">
        <div class="top-job p-3">
            <h5 class="text-end" style="font-size: 14px; font-weight: 700">
                الرئيسية
            </h5>
            <h4 style="float: right; margin-top: 10px; font-weight: 700">
                الوظائف
            </h4>
            <div>
                <!-- Example single danger button -->
                <!-- ============================================================================ -->
                <div class="btn-group">
                    <button type="button" id="events" dir="rtl" class="applay dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        الاحدث
                    </button>

                    
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">الاحدث</a></li>
                        <li><a class="dropdown-item" href="#">الاقدام</a></li>
                    </ul>
                    {{-- ===================================================================================== --}}
                    <button class="btn burger" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" id="togglebtn"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="fa-solid fa-sliders"></i>
                </button>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                        id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <form  action="{{ route('jobPoting.index') }}" method="GET" id="search-form">
                            <div class="row" id="mdd" style="width: 102%; display: flex; flex-direction: row-reverse">
                        <div id="inseid-toggler" class="m-3" dir="rtl">
                            <div>
                                <label for="" style="font-weight: 900; margin-bottom: 10px">بحث</label>
                                <input class="form-control" type="text" value="<?= $_GET['label'] ?? '' ?>" id="filter-search" />
                            </div>
                            <div class="mt-3">
                                <h3>التصنيف</h3>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">برمجة وتطوير</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">تسويق ومبيعات</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">كتابة وترجمة</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">تصميم</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">إدارة وأعمال</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">دعم فني</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">المجالات الأخرى</label>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </form>
            <!-- ==================================================================================== -->

            <form  action="{{ route('jobPoting.index') }}" method="GET" id="search-form">
            <div class="row" id="mdd" style="width: 102%; display: flex; flex-direction: row-reverse">

                <!-- ===================== -->

                <div class="mt-5 col-12 col-lg-3 col-md-3 col-sm-12 left-filter">
                    <div>
                        <label for="" style="font-weight: 900; margin-bottom: 10px">بحث</label>
                        <input class="form-control" type="text" name="label" value="<?= $_GET['label'] ?? '' ?>"   id="filter-search" />
                    </div>

                    <div class="mt-3">
                        <h3>التصنيف</h3>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="checkbox-programming" value="برمجة-وتطوير" name="Category" />
                            <label class="form-check-label" for="checkbox-programming">برمجة وتطوير</label>
                        </div>


                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="تسويق-ومبيعات" name="Category"/>
                            <label class="form-check-label" for="flexSwitchCheckDefault">تسويق ومبيعات</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="كتابة-وترجمة" name="Category"/>
                            <label class="form-check-label" for="flexSwitchCheckDefault">كتابة وترجمة</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="تصميم" name="Category"/>
                            <label class="form-check-label" for="flexSwitchCheckDefault">تصميم</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="إدارة-وأعمال"  name="Category"/>
                            <label class="form-check-label" for="flexSwitchCheckDefault">إدارة وأعمال</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="دعم-فني"  name="Category"/>
                            <label class="form-check-label" for="flexSwitchCheckDefault">دعم فني</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" />
                            <label class="form-check-label" for="flexSwitchCheckDefault">المجالات الأخرى</label>
                        </div>
                    </div>
                </div>
            </form>


                <!-- =========================================================================================== -->
                <div class="mt-5 col-lg-9 col-9 col-md-9 col-sm-12" >
                    @if ($jobs->isEmpty())
                    <div  style="display: flex;" class=" card row mb-5 flex-lg-row flex-md-row flex-column-reverse flex-sm-row" id="job-listings"
                        style="margin-bottom: 20px" >
                        
                        <div class="" id="notfound">
                           
                            ليس هنالك وظائف

                        </div>
                    </div>
                @else
                    <ul id="job-listings">
                       
                @foreach ($jobs as $job)
                <a href="{{ route('jobPoting.show',$job->id)}}" style="text-decoration: none;color:#221c1c;" >
                <div data-status="{{ $job->status }}" style="display: flex" class=" card row mb-5 flex-lg-row flex-md-row flex-column-reverse flex-sm-row" id="job-listings"
                        style="margin-bottom: 20px" >
                        <div class="" style="direction: rtl">
                            
                            <img style="
                    width: 70px;
                    height: 70px;
                    margin-right: -2px;
                    object-fit: fill;
                    margin-top: 10px;
                    border-radius: 8px;
                  "
                                src="{{ asset('uploads/companies/'.$job->company_logo) }}" alt="" />
                        </div>
                        <div class="" style="direction: rtl">
                            <div
                                style="
                    line-height: 2rem;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                  ">
                                <div>
                                    <h5>{{ $job->label }}</h5>
                                    <ul style="list-style: none; display: flex; gap: 5px">
                                        <li>
                                            <i class="fa-regular fa-building">{{ $job->company_label }}</i> 
                                        </li>
                                        <li><i class="fa-solid fa-code"></i> {{ $job->department_label }}</li>
                                        <li><i class="fa-regular fa-clock"></i> {{ $job->Location }}</li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="{{ route('jobPoting.create',[$job->jobApplcation->id]) }}" class="applay">تقدم للوظيفه</a>
                                </div>
                            </div>
                            <div class="pt-3">
                                <p>
                                        {{ $job->job_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                    @endforeach
                    @endif
                </div>
                <div class="d-flex justify-content-center" dir="rtl">
                    {{ $jobs->links('common.pagination') }} 
                </div>

            </div>


            



        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>

        

  
      $(document).ready(function () {
            $('#search-form').submit(function (event) {
                event.preventDefault(); 

                var searchValue = $('#filter-search').val();

                window.location.href = "{{ route('jobPoting.index') }}?label=" + encodeURIComponent(searchValue);
            });
        });


         const jobListings = document.querySelectorAll('#job-listings');

        jobListings.forEach((listing) => {
          const status = listing.dataset.status;
        
          if (status === '1') {
            listing.style.display = 'none';
          }
        });


    
    </script>
</body>
@endsection

