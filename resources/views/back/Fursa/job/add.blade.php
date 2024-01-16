@extends('layouts.back')
@section('content')
<div class="pagetitle">
  <h1>اضافه وظائف</h1>

</div><!-- End Page Title -->
<div class="col-xl-12">
    <div class="card p-4">
      <form action="{{ route('companiesJob.store') }}" method="POST" >
        @csrf
        
        <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="label" class="form-control" placeholder="اسم الوظيفه" required>
            </div>
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="اسم الوظيفه (باالانجليزيه)" required>
          </div>
     

          <div class="col-md-6">
            <select name="job_type" id="" class=" form-control">
              <option value="">نوع الوظيفه</option>
              <option value="دوام-جزائي">دوام جزائي</option>
              <option value="دوام-كامل">دوام كامل </option>
            </select>
          </div>
          
          <div class="col-md-6">
            <select name="Location"  id="" class=" form-control">
              <option value="">الموقع</option>
              <option value="عدن">عدن</option>
              <option value="صنعاء">صنعاء</option>
              <option value="مارب">مارب</option>
            </select>
          </div>

          <div class="col-md-6">
            <select name="Category"  id="" class=" form-control">
              <option value="">التصنيف</option>
              <option value="برمجة-وتطوير">برمجة وتطوير</option>
              <option value="تسويق-ومبيعات">تسويق ومبيعات</option>
              <option value="كتابة-وترجمة">كتابة وترجمة</option>
              <option value="تصميم">تصميم</option>
              <option value="إدارة-وأعمال">إدارة وأعمال</option>
              <option value="دعم-فني">دعم فني</option>
            </select>
          </div>

          <div class="col-md-6">
            <select name="depertment_id" id="" class=" form-control">
              <option value="">القطاع</option>
             @foreach ($depertment as $depertments)
             <option value="{{ $depertments->id }}">{{ $depertments->label }}</option>
             @endforeach
             
            </select>
            {{-- ////////////////////////////////////////////////////////////////////// --}}
          </div>
          <select id="status" name="status" class="form-control">
            <option value="open" >Open</option>
            <option value="closed" >Closed</option>
        </select>

          
   
          <div class="col-md-12">
            <textarea class="form-control" name="job_description" rows="6" placeholder="وصف الوظيفه" required></textarea>
          </div>

          <div class="col-md-12" >
            <textarea  name="job_tasks" class="form-control" id="editor"  rows="6" placeholder="المهام الوظيفيه" required></textarea>
          </div>
          
          <div class="col-md-12 text-center">
         
            <div class="d-flex justify-content-end">
            
                <button type="submit" class="create" onclick="submitForm()">التالي</button>
            </div>

          </div>

        </div>
      </form>
    </div>

  </div>

  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
  <script>
      var job_tasks = null;
  
      ClassicEditor.create(document.querySelector('#editor'))
      .then(ckEditor => {
          job_tasks = ckEditor;
      })
      .catch(error => {
          console.error(error);
      });
  
      function submitForm() {
          document.querySelector('textarea[name="job_tasks"]').value = job_tasks.getData();
  
          document.forms[0].submit();
      }
  </script>
  @endsection