@extends('front.layouts.app')
@section('maincontent')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Login</h1>
                    @if(Session::has('success'))
                 <span class="alert alert-success" role="alert">{{session('success')}}</span>
                    @endif
                    @if(Session::has('error'))
                    <span class="alert alert-danger" role="alert">{{session('error')}}</span>
                     @endif
                    <form action="{{url('account/process-login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@example.com">
                            @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            @if($errors->has('password'))
                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                        </div> 
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2" type="submit" name="submit">Login</button>
                            <a href="forgot-password.html" class="mt-3">Forgot Password?</a>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a  href="{{url('account/registration')}}">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>

@endsection