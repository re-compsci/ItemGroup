@extends('layouts.app')

@section('content')
  <div class="container overflow-hidden">
    <h1 class="alert alert-success text-center">أهلاً بكم في موقعي</h1>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col">
        <img src="imgs\Aq.jpg" alt="img" width="1150">
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center d-flex align-items-center justify-content-center">
     @if($data!= null)
        @foreach($data as $row)
      <div class="col-sm-6 text-center">
       
        <a href="{{route('Items',['id'=>$row->id])}}">
        <div class="card h-100" style="width: 18rem;">
        <img src="/imgs/{{$row->groupImg}}" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">{{$row->itemgroupName}}  </p>
       </div>
    </div>
       
        </a>
      </div> 
        @endforeach
        @endif
    </div>
  </div>
@endsection