@extends('front.layouts.app')

@section('maincontent')

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="{{url('account/process-register')}}" name="registrationForm" id="registrationForm" method="POST">
                      @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            @if($errors->has('name'))
                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                            @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            @if($errors->has('password'))
                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter confirm Password">
                            @if($errors->has('confirm_password'))
                            <div class="error text-danger">{{ $errors->first('confirm_password') }}</div>
                        @endif
                        </div> 
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{url('account/login')}}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
{{-- <script>
  $('#registrationForm').submit(function(e){
       e.preventDefault();

       $.ajax({
        url :'{{url("process-register")}}',
        type : 'post',
        data : $('#registrationForm').serializeArray(),
        datatype : 'json',
        success : function(response){
                 if(response.status == false){
                  var errors = response.errors;
                if(errors.name){
                    $('#name').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html(errors.name);
                }else{
                    $('#name').removeClass('is-invalid').
                    siblings('p').removeClass('invalid-feedback')
                    .html('');
                }
                if(errors.email){
                    $('#email').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html(errors.email);
                }else{
                    $('#email').removeClass('is-invalid').
                    siblings('p').removeClass('invalid-feedback')
                    .html('');
                } if(errors.password){
                    $('#password').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html(errors.password);
                }else{
                    $('#password').removeClass('is-invalid').
                    siblings('p').removeClass('invalid-feedback')
                    .html('');
                } if(errors.confirm_password){
                    $('#confirm_password').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html(errors.confirm_password);
                }else{
                    $('#confirm_password').removeClass('is-invalid').
                    siblings('p').removeClass('invalid-feedback')
                    .html('');
                }
                 }else{
                    $('#name').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html('');
                    $('#email').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html('');
                    $('#password').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html('');
                    $('#confirm_password').addClass('is-invalid').
                    siblings('p').addClass('invalid-feedback')
                    .html('');
                 }
        }
       });
  });
</script> --}}
@endsection