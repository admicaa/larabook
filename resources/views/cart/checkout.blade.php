@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
            <h1 class="text-center">CheckOut</h1>
            <h4 class="text-center">your total : $ {{$total}}</h4>
            <div class="alert alert-danger hidden" id="errory" role="alert">
                <strong></strong>
            </div>
            <form action="{{URL::to('checkout')}}" method="post" id="check-out">
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="name">card</label>
                  <input type="text" name="card" id="card" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="cvc">cvc</label>
                  <input type="text" name="cvc" id="cvc" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Submit</button>


            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="/js/checkout.js"></script>
@endsection