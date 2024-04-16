<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3 ">
        <a href="{{ asset('web_assets/homeimages/'.$user->image) }}">
            <img src="{{ asset('web_assets/homeimages/'.$user->image) }}" style="width:100px;height:100px;"  class="card rounded-circle img-responsive mx-auto " alt="No image"  > 
         </a>
             <h5 class="mt-3 pb-0">{{Auth::user()->name}}</h5>
        <p class="text-muted mb-1 fs-6">{{Auth::user()->designation}}</p>
        <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
        </div>
    </div>
</div>
<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{url('account/profile')}}">Account Settings</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{url('create-job')}}">Post a Job</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{url('my-jobs')}}">My Jobs</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="job-applied.html">Jobs Applied</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="saved-jobs.html">Saved Jobs</a>
            </li>  
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{url('account/logout')}}">Logout</a>
            </li>                                                        
        </ul>
    </div>
</div>