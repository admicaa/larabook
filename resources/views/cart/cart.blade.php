@extends('layouts.master')
@section('content')
    @if(isset($products))
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['Qty']}}</span>
                            <strong>{{$product['item']->title}}</strong>
                            <span class="label label-success">  {{ $product['price']}}</span>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">ahmed</a></li>
                                    <li><a href="#">ahmed</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr/>
        <div class="row" style="background:#fff;">
            <div class="col-xs-6 col-xs-offset-3 text-center">
                <strong>Total $ : {{$totalprice}}</strong>
            </div>
        </div>
        <hr/>
        <div class="row" >
            <div class="col-xs-6 col-xs-offset-3 text-center">
                <a href="{{URL::to('/checkout')}}" class="btn btn-lg btn-success" style="margin:0 auto">check out</a>
            </div>
        </div>
    @else
        <div class="col-xs-6 col-xs-offset-3">
            <div class="alert alert-danger text-center">You don't Have Any products</div>
        </div>
    @endif
@endsection