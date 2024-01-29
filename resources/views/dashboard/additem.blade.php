@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
         <div class="card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                     <div class="col-sm-4">
                          <form action="{{route('additem')}}" method="post">
                                @csrf
                                <label for="itemName" class="p-2">ادخل اسم المنتج</label>
                                <input type="text" class="form-control form-control-sm " name="itemName">
                                <label for="color" class="p-2">اللون</label>
                                <input type="text" class="form-control form-control-sm " name="color">
                                <label for="qty" class="p-2">الكمية</label>
                                <input type="number" class="form-control form-control-sm " name="qty">
                                <label for="price" class="p-2">السعر</label>
                                <input type="number" class="form-control form-control-sm " name="price">
                                <label for="itemImg" class="p-2">ادخل رمز النتج</label>
                                <input type="text" class="form-control form-control-sm " name="itemImg" >
                                <label for="itemgroupno" class="p-3">اختر مجموعة المنتج</label>
                                <select name="itemgroupno" class="form-select "> 
                                @foreach($data2 as $row)
                                  <option value="{{$row->id}}">{{$row->itemgroupName}}</option>
                                @endforeach
                               </select>                               
                                <div class="text-center">
                                    <button class="btn btn-primary mt-2" type="submit">حفظ</button>
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
                                <th>رقم المنتج </th>
                                <th>اسمه</th>
                                <th>لونه </th>
                                <th>كميته </th>
                                <th>سعره</th>
                                <th colspan="2">اجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->itemName}}</td>
                                <td>{{$row->color}}</td>
                                <td>{{$row->qty}}</td>
                                <td>{{$row->price}}</td>
                                <td><a href=" {{route('editItem',['id'=>$row->id]) }}"><i class="bi bi-pencil-square text-success"></i></a></td> 
                                <td><a href=" {{route('delItem',['id'=>$row->id]) }}"><i class="bi bi-trash text-danger"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection