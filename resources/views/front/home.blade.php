@extends('layouts.front')

@section('content')
 <section class="hero">
      <div class="inside">
        <h1>
          في عالمنا، كل يوم هو فرصة <span>للابتكار والنجاح.</span> انضم إلينا
          لتكون جزءًا من هذه الرحلة الملهمة
        </h1>
        <h4>البحث عن وظائف، فرص العمل، وفرص الحياة المهنية</h4>
      </div>
<form action="{{ route('jobPoting.index') }}" method="GET">


      <div class="search">
        <div class="first-left">
          <select dir="rtl" name="Category" id="">
            <option value="">المجال</option>
            @foreach ( $Category as $Categories )
            <option value="{{ $Categories }}">{{ $Categories }}</option>
            @endforeach
          </select>
          <i class="fa-solid fa-briefcase"></i>
        </div>

        <div class="second-left">
          <select dir="rtl" name="Location" id="">
            <option value="">الموقع</option>
            @foreach ( $locations as $location )
           
            <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
          </select>
          <i class="fa-regular fa-map"></i>
        </div>

        <div class="thred-left">
          <input dir="rtl" type="text" name="label" placeholder="الوظيفة" />
          <i class="gg-menu-grid-o"></i>
        </div>
        <div class="btn">
          <button type="submit">البحث</button>
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
    </form>
      {{--  --}}
    </section>
<!-- =================================================== -->
    <section class="HTA" data-aos="fade-up" data-aos-duration="1500">
      <h1><span>كيف تتقدم للوظائف</span></h1>

      <div class="services" >
        <div class="services_card">
          <div class="icon"><i class="fa-regular fa-address-card"></i></div>
          <div class="info">
            <h2>أنشئ ملفك الشخصي</h2>
            <p>
              أنشئ حساب وأضف مهاراتك وخبراتك ونماذج أعمالك السابقة في ملفك
              الشخصي.
            </p>
          </div>
        </div>

        <div class="services_card">
          <div class="icon"><i class="fa-regular fa-address-card"></i></div>
          <div class="info">
            <h2>تصفح الوظائف</h2>
            <p>
              اطلع على الوظائف بمختلف التخصصات وتصفح ملفات الشركات التي لديها
              شواغر.
            </p>
          </div>
        </div>

        <div class="services_card">
          <div class="icon"><i class="fa-regular fa-address-card"></i></div>
          <div class="info">
            <h2>أنشئ ملفك الشخصي</h2>
            <p>
              أنشئ حساب وأضف مهاراتك وخبراتك ونماذج أعمالك السابقة في ملفك
              الشخصي.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="US" id="about-us">
      <h1><span>من نحن؟</span></h1>
      <p>
        موقع فرصة هو المكان الأمثل لاكتشاف فرص العمل والتوظيف ، حيث يجمع بين
        الشركات والمؤسسات الباحثة عن أفضل الكفاءات والمواهب المحلية والعالمية في
        مختلف المجالات. يتيح لك الموقع إضافة ونشر الوظائف والتواصل مع المرشحين
        المثاليين الذين يتمتعون بالمهارات والخبرات المطلوبة.
      </p>
    </section>

    <section class="USB">
      <img
      data-aos="fade-up" data-aos-duration="2500"
        src="{{ asset('assets/img/774shots_so.png') }}"
        alt=""
      />
    </section>

    <section class="apply">
      <h1>
        منصة فرصه توفر مجموعة واسعة من الخدمات لكل من الشركات والباحثين عن العمل
      </h1>
      <div class="features">
        <div class="featuresApply">
          <i
            class="fa-solid fa-briefcase"
            data-aos="zoom-in"
            data-aos-duration="500"
          ></i>
          <p>نشر الوظائف يمكن للشركات نشر وظائفها المتاحة على المنصة.</p>
        </div>
        <div class="featuresApply">
          <i
            class="fa-solid fa-headset"
            data-aos="zoom-in"
            data-aos-duration="500"
          ></i>
          <p>
            تتيح لصاحب العمل التواصل المباشر معا المتقدمين بشكل مباشر من خلال
            معلومات المتقدم
          </p>
        </div>
        <div class="featuresApply">
          <i
            class="fa-solid fa-bullseye"
            data-aos="zoom-in"
            data-aos-duration="500"
          ></i>
          <p>
            متابعة العملية التوظيفية: يمكن لصاحب العمل متابعة العملية التوظيفية
            بشكل شامل على المنصة.
          </p>
        </div>
      </div>
    </section>
    <!-- =================================== -->
    <section class="jobs">
      <h1><span>وظائف في كافة المجالات</span></h1>

      <p>تصفح الوظائف في التخصصات المختلفة وتقدم للوظيفة المناسبة</p>
      <div class="jobsInfo">
        <div class="jobTarget">
          <a href="">
            <i class="fa-solid fa-code"></i>
            <p>وظائف برمجة وتطوير الموقع</p>
          </a>
        </div>
        <div class="jobTarget">
          <a href="">
            <i class="fa-solid fa-chart-pie"></i>
            <p>وظائف تسويق ومبيعات</p>
          </a>
        </div>
        <div class="jobTarget">
          <a href="">
            <i class="fa-regular fa-newspaper"></i>
            <p>وظائف كتابة وترجمة</p>
          </a>
        </div>

        <div class="jobTarget">
          <a href="">
            <i class="fa-solid fa-film"></i>
            <p>وظائف تصميم</p>
          </a>
        </div>
        <div class="jobTarget">
          <a href="">
            <i class="fa-solid fa-users-line"></i>
            <p>وظائف إدارة وأعمال</p>
          </a>
        </div>
        <div class="jobTarget">
          <a href="">
            <i class="fa-solid fa-users-viewfinder"></i>
            <p>وظائف في مجالات الأخرى</p>
          </a>
        </div>
      </div>
    </section>
    <!-- =================================== -->
    <footer class="footer-distributed">
      <div class="footer-left">
        <img src="{{ asset('assets/img/logo22.png') }}" alt="" />
        <!-- <p class="footer-company-name">فرصه © 2023</p> -->
        <p class="footer-company-name">
          عندما يلتقي <span>الطموح</span> بالفرص، وتُبنى قصة نجاح فريدة.
        </p>

        <div class="footer-links">
          <a href="#"><i class="fa-brands fa-github"></i></a>

          <a href="#"><i class="fa-brands fa-google"></i></a>

          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>

          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        
      </div>
    </footer>

    <div class="end">
      <p>
        fursa.com © 2024 - فرصه هي كيان قانوني مسجل بموجب قوانين جمهورية اليمن.
        كل الحقوق محفوظة
      </p>
    </div>
    
   

@endsection
