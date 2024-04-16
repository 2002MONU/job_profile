@extends('front.layouts.app')
@section('maincontent')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{url('account/profile')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post a Job</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
          
            <div class="col-lg-9">
                <form action="{{url('save-job')}}" method="POST" >
                    @csrf
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Job Title" id="title" name="title" value="{{old('title')}}" class="form-control">
                           @if($errors->has('title'))
                            <div class="error text-danger">{{ $errors->first('title') }}</div>
                        @endif
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if($categories != '')
                                     @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach
                                    @endif
                                   
                                </select>
                            @if($errors->has('category'))
                            <div class="error text-danger">{{ $errors->first('category') }}</div>
                        @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                <select name="jobtype" class="form-select">
                                    <option value="">Select Job Nature</option>
                                     
                                     @foreach($jobtypes as $jobType)
                                   <option value="{{$jobType->id}}">{{$jobType->name}}</option>
                                     @endforeach
                                
                                   
                                </select>
                            @if( $errors->has('jobtype'))
                            <div class="error text-danger">{{ $errors->first('jobtype') }}</div>
                        @endif
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" placeholder="Vacancy" id="vacancy" value="{{old('vacancy')}}" name="vacancy" class="form-control">
                             @if($errors->has('vacancy'))
                            <div class="error text-danger">{{ $errors->first('vacancy') }}</div>
                        @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" placeholder="Salary" id="salary" name="salary" value="{{old('salary')}}" class="form-control">
                            @if($errors->has('salary'))
                            <div class="error text-danger">{{ $errors->first('salary') }}</div>
                        @endif
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" placeholder="location" id="location" value="{{old('location')}}" name="location" class="form-control">
                             @if($errors->has('location'))
                            <div class="error text-danger">{{ $errors->first('location') }}</div>
                        @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" value="{{old('description')}}" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                         @if($errors->has('description'))
                            <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" id="benefits" value="{{old('benefits')}}" cols="5" rows="5" placeholder="Benefits"></textarea>
                      @if($errors->has('benefits'))
                            <div class="error text-danger">{{ $errors->first('benefits') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsability" value="{{old('responsability')}}" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                        @if($errors->has('responsibility'))
                            <div class="error text-danger">{{ $errors->first('responsibility') }}</div>
                        @endif
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualifications" value="{{old('qualifications')}}"  id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                        @if($errors->has('qualifications'))
                            <div class="error text-danger">{{ $errors->first('qualifications') }}</div>
                        @endif
                        </div>
                        
                         <div class="row">
                             <div class="mb-4 col-md-6">
                            <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                            <input type="text" placeholder="keywords" id="keywords" value="{{old('keywords')}}" name="keywords" class="form-control">
                        @if($errors->has('keywords'))
                            <div class="error text-danger">{{ $errors->first('keywords') }}</div>
                        @endif
                             </div>
                          <div class="mb-4 col-md-6">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
<!--                            <input type="text" placeholder="experience" id="experience" value="{{old('experience')}}" name="experience" class="form-control">-->
                                 <select name="experience" id="category" class="form-control">
                                    <option value="">Select Experience</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option> 
                                    <option value="5">5 Years</option> 
                                    <option value="6">6 Years</option> 
                                    <option value="7">7 Years</option>
                                    <option value="8">8 Years</option>
                                    <option value="9">9 Years</option>
                                    <option value="10">10 Years</option>
                                    <option value="10+">10+ Years</option>
                                       
                                       
                                       
                                       
                                  </select>
                            @if($errors->has('experience'))
                            <div class="error text-danger">{{ $errors->first('experience') }}</div>
                        @endif
                          </div>
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Company Name" value="{{old('company_name')}}" id="company_name" name="company_name" class="form-control">
                              @if($errors->has('company_name'))
                            <div class="error text-danger">{{ $errors->first('company_name') }}</div>
                        @endif
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Company Location</label>
                                <input type="text" placeholder="Company Location" value="{{old('company_location')}}" id="location" name="company_location" class="form-control">
                             @if($errors->has('company_location'))
                            <div class="error text-danger">{{ $errors->first('company_location') }}</div>
                        @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" placeholder="Website" id="website" value="{{old('company_website')}}" name="company_website" class="form-control">
                         @if($errors->has('company_website'))
                            <div class="error text-danger">{{ $errors->first('company_website') }}</div>
                        @endif
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" name="submit" class="btn btn-primary">Save Job</button>
                    </div>               
            </div>
            </form>
        </div>
    </div>
</section>

@endsection