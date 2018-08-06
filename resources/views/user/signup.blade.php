@extends('layouts.master')
@section('content')
    <div class="row">
        
        <div class="col-md-4 col-md-offset-4 signup-form">
            <h1 class="text-center">Sign Up</h1>
            <form action="/register" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="name">
                <small id="helpId" class="form-text text-muted">Enter Your Name.</small>
                </div>
                <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Example@example.com">
                <small id="emailHelpId" class="form-text text-muted">Enter your E-mail adress</small>
                </div>
                <div class="form-group">
                <label for="password">Password </label>
                <input type="password" class="form-control" name="password" id="" placeholder="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sign up .</button>
                </div>
            </form>
        </div>    
    </div>    
@endsection