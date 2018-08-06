@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 signup-form">
            <h1 class="text-center">Login</h1>
            <form action="/login" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Example@example.com">
                  <small id="emailHelpId" class="form-text text-muted">Your Email Ardress</small>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
                <div class="form-group">
                    <a href="/register">Or Signup .</a>
                </div>

                
            </form>
        </div>
    </div>
@endsection