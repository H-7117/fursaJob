@extends('layouts.back')
@section('content')
<div class="pagetitle">
    <h1>اضافه وظائف</h1>
  
  </div><!-- End Page Title -->
  <div class="col-xl-12">
      <div class="card p-4">
  
        <form action="{{ route('jobStage.store') }}"  method="POST" >
          @csrf
          <select name="job_id" id="" class="mb-4 form-control">
            <option value="" >الوظائف</option>
           @foreach ($job as $jobs)
           <option value="{{ $jobs->id }}">{{ $jobs->label }}</option>
           @endforeach
           
          </select>
            <table class="table table-bordered" id="table">
                <tr>
                  <th>اسم المرحله</th>
                  <th>ترتيب المرحله</th>
                  <th>الحذف</th>
                </tr>
                {{-- =========================== --}}
                <tr>
                    <td><input type="text" name="inputs[0][name]" placeholder="ادخل اسم المرحله" class="form-control"></td>
                    <td><input type="number" name="inputs[0][round]" placeholder="ترتيب المرحله" class="form-control"></td>
                    <td><button type="button" name="id" id="add" class="btn btn-success">اضاف المزيد</button></td>
                </tr>
            </table>
            <div class="d-flex justify-content-end">
              
              <button type="submit" class="create">التالي</button>
          </div>
        </form>
      </div>
  
    </div>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `
                <tr>
                    <td>
                        <input type="text" name="inputs[`+i+`][name]" placeholder="اسم المرحله" class="form-control"/>
                    </td>
                    <td>
                        <input type="text" name="inputs[`+i+`][round]" placeholder="ترتيب المرحله" class="form-control"/>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-table-row">الحذف</button>
                    </td>
                </tr>
                `
            )
        })
    
        $(document).on('click','.remove-table-row',function(){
            $(this).parents('tr').remove();
        });
    </script>
  @endsection

 