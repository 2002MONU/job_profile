@extends('front.layouts.app')
@section('maincontent')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            @if(Session::has('success'))
                 <span class="alert alert-success" role="alert">{{session('success')}}</span>
            @endif
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
               @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                   <form action="{{url('account/updateprofile',$user->id)}}" method="POST" name="userForm" id="userForm">
                    @csrf
                    <div class="card-body  p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                       
                        <div class="mb-4">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" value="{{$user->name}}">
                            @if($errors->has('name'))
                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="name" placeholder="Enter Email" class="form-control" value="{{$user->email}}">
                            @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Designation*</label>
                            <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control" value="{{$user->designation}}">
                            @if($errors->has('designation'))
                            <div class="error text-danger">{{ $errors->first('designation') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Mobile*</label>
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control" value="{{$user->mobile}}">
                            @if($errors->has('mobile'))
                            <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
                    </div>
                   </form>
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Change Password</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Old Password*</label>
                            <input type="password" placeholder="Old Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">New Password*</label>
                            <input type="password" placeholder="New Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" placeholder="Confirm Password" class="form-control">
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{url('account/updateimage',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf  
			<div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" id="image"  name="image">
				
					<img src="{{ asset('web_assets/homeimages/'.$user->image) }}" style="width:100px"   class="card" alt="No image"  >
                            @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                     @endif
              </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mx-3">Update</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
           </form>
        </div>
      </div>
    </div>
  </div>

@endsection