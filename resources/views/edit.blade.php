@extends('layouts.dashboard')

@section('content')
    
    @isset($group)
    <div class="row">
       <div class="col">
          <div class="card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                     <div class="col-sm-4">
                          <form action="{{route('update1')}}" method="post">
                                @csrf
                                <input type="hidden" class="form-control form-control-sm " name="id" value="{{$group->id}}">
                                <label for="itemgroupName" class="p-2"> اسم المجموعة</label>
                                <input type="text" class="form-control form-control-sm " name="itemgroupName" value="{{$group->itemgroupName}}">
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
    @endisset
    

    @isset($item)
    <div class="row">
      <div class="col">
         <div class="card">
              <div class="card-body">
                  <div class="row d-flex justify-content-center">
                     <div class="col-sm-4">
                          <form action="{{route('update2')}}" method="post">
                                @csrf
                                <input type="hidden" class="form-control form-control-sm " name="id" value="{{$item->id}}">
                                <label for="itemName" class="p-2"> اسم المنتج</label>
                                <input type="text" class="form-control form-control-sm " name="itemName" value="{{$item->itemName}}">
                                <label for="color" class="p-2">اللون</label>
                                <input type="text" class="form-control form-control-sm " name="color" value="{{$item->color}}">
                                <label for="qty" class="p-2">الكمية</label>
                                <input type="number" class="form-control form-control-sm " name="qty" value="{{$item->qty}}">
                                <label for="price" class="p-2">السعر</label>
                                <input type="number" class="form-control form-control-sm " name="price" value="{{$item->price}}">
                                <label for="itemgroupno" class="p-3"> مجموعة المنتج</label>
                                <select name="itemgroupno" class="form-select ">
                                 
                                    @foreach($itemgroup as $row)
                                    @if($row->id == $item->itemgroupno)
                                    <option value="{{$row->id}}">{{ $row->itemgroupName}}</option>
                                    @endif
                                    @endforeach  

                                    @foreach($itemgroup as $row)
                                    @if($row->id != $item->itemgroupno)
                                    <option value="{{$row->id}}">{{ $row->itemgroupName}}</option>
                                    @endif
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
   @endisset

@endsection
