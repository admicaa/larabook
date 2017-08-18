@extends('layouts.master')
@section('content')
  @if($flash = session('my'))
    <div class="alert alert-success">{{$flash}}</div>
  @endif
  @foreach($products->chunk(3) as $productRow)
  <div class="row">
    @foreach($productRow as $product)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail wow zoomIn">
        <img src="{{$product->img}}" class="img img-responsive">
        <div class="caption">
          <h3>{{$product->title}}</h3>
          <p class="description">{{$product->description}}</p>
          <div class="clearfix pricepaernt">
            <div class="price pull-left">${{$product->price}}</div>
              <a href="/add-to-cart/{{$product->id}}" class="btn btn-default pull-right btn-success" role="button">Add to cart</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @endforeach
@endsection
