@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
       <div class="col">
       <h1 class="alert alert-success text-center">أهلاً بكم في موقعي</h1>
   
          <div class="card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                     <div class="col-sm-4">
                          <form action="{{route('saveH')}}" method="post">
                                @csrf
                                <label for="itemgroupName" class="p-2">ادخل اسم المجموعة</label>
                                <input type="text" class="form-control form-control-sm " name="itemgroupName" required >
                                <label for="groupImg" class="p-2">ادخل رمز المجموعة</label>
                                <input type="text" class="form-control form-control-sm " name="groupImg" required >
                                <div class="text-center">
                                    <button class="btn btn-primary mt-2" onclick="msg()" type="submit">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-body">
                    <table class='table table-bordered text-center'>
                        <thead>
                            <tr>
                                <th>رقم المجموعة </th>
                                <th>اسم المجموعة </th>
                                <th colspan="2">اجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td> {{$row->itemgroupName}}</td>
                                <td><a href=" {{route('edit',['id'=>$row->id]) }}"><i class="bi bi-pencil-square text-success"></i></a></td> 
                                <td><a href=" {{route('del',['id'=>$row->id]) }}"><i class="bi bi-trash text-danger"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>


    @if($issave)
        <script> function msg(){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
           }); }
        </script>
   @endif
</div>

@endsection