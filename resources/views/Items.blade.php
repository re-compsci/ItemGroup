@extends('layouts.app')

@section('content')
  <div class="container overflow-hidden">
    <h1 class="alert alert-success text-center">{{$group->itemgroupName}}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center d-flex align-items-center justify-content-center">
     @if($data!= null)
        @foreach($data as $row)
      <div class="col-sm-6 text-center">
   
        <div class="card h-100" style="width: 18rem;">
            <img src="/imgs/{{$row->itemImg}}" class="card-img-top" alt="...">
      
        <div class="card-body">
        <h5 class="card-title">{{$row->itemName}}</h5>
            <p class="card-text">SAR {{$row->price}} </p>
            <p class="card-text">{{$row->color}}</p>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{route('AddtoCart',['id'=>$row->id])}}" class="btn btn-primary">Add to cart</a>
       </div>
    </div>

      </div> 
        @endforeach
        @endif
    </div>
  </div>
@endsection