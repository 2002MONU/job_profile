@extends('front.layouts.app')
@section('maincontent')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Saved Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                             <h3 class="fs-4 mb-1">Saved Jobs</h3>
                             <div style="margin-top:-10px;">
                                 <a href="{{url('create-job')}}" class="btn btn-primary d-flex justify-content-end">Job Post</a>
                              </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($jobs as $job)
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">{{$job->title}}</div>
                                            <div class="info1">{{$job->jobType->name}} . {{$job->location}} </div>
                                        </td>
                                        <td>{{$job->created_at}}</td>
                                        <td>{{$job->vacancy}}</td>
                                        <td>
                                            @if($job->status ==1 )
                                            <div class="job-status text-capitalize">active</div>
                                            @else
                                             <div class="job-status text-capitalize">Block</div>
                                             @endif
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{url('jobedit/'.$job->id)}}"> <i class="fa fa-eye" aria-hidden="true"></i> Update</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div> 
            </div>
        </div>
    </div>
</section>

@endsection