<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Category;
use App\Models\JobType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AccountController extends Controller
{
    // this methods show register
    public function registration(){
        return view('front.account.registration');
    }
 
      public function processRegistration(Request $request){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:5|same:confirm_password',
                'confirm_password' => 'required',
            ]);

            $user = new User;
           $user->name = $request->name; 
           $user->email = $request->email; 
           $user->password = Hash::make($request->password); 
           $user->save(); 
           return redirect('account/login')->with('success','Register Successfully');
      }
    // this methods show login
    public function login(){
        return view('front.account.login');
    }

    public function processLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
          return redirect('account/profile')->with('success','Login Successfully');
        }else{
            return redirect('account/login')->with('error' ,'Please Fill Valid  Email and Password');
        }
    }

    public function profile(){
       
         $id = Auth::user()->id;
         $user = User::where('id',$id)->first();
         //dd($user);
         return view('front.account.profile',compact('user'));
    }

    public function profileupdate(Request $request,$id){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'mobile' => 'required|min:10|max:12',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->mobile = $request->mobile;
        $user->save();
        return redirect('account/profile')->with('success','Update Successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect('account/login')->with('success','User Logout Successfully');
    }

    public function imageupdate(Request $request,$id){
        
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
                $user = User::find($id);
                if($request->hasFile('image')){
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $file->move('web_assets/homeimages/', $name);
                $user->image = $name;
        }
                $user->save();
                return redirect('account/profile')->with('success','Update Successfully');
    }

//    public function jobpost(){
//        $id = Auth::user()->id;
//        $user = User::where('id',$id)->first();
//        return view('front.account.postjob',compact('user'));
//    }
    
    public function createJob(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        
      $categories =  Category::orderBy('name','ASC')->where('status',1)->get();
      $jobtypes = JobType::orderBy('name','ASC')->where('status',1)->get();
       return view('front.account.job.create', compact('user', 'categories', 'jobtypes'));
    }
    
    public function saveJob(Request $request) {
       // return $request;
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'vacancy' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'description' => 'required',
            'benefits' => 'required',
            'responsability' => 'required',
            'qualifications' => 'required',
            'keywords' => 'required',
            'experience' => 'required',
            'company_name' => 'required',
            'company_location' => 'required',
            'company_website' => 'required',
        ]);
       // return $request;
         $jobsave = new Job;
         $jobsave->title = $request->title;
         $jobsave->category_id = $request->category;
         $jobsave->job_type_id = $request->jobtype;
         $jobsave->user_id = Auth::user()->id;
         $jobsave->vacancy = $request->vacancy;
         $jobsave->salary = $request->salary;
         $jobsave->location = $request->location;
         $jobsave->description = $request->description;
         $jobsave->benefits = $request->benefits;
         $jobsave->responsability = $request->responsability;
         $jobsave->qualifications = $request->qualifications;
         $jobsave->keywords = $request->keywords;
         $jobsave->experience = $request->experience;
         $jobsave->company_name = $request->company_name;
         $jobsave->company_location = $request->company_location;
         $jobsave->company_website = $request->company_website;
         $jobsave->save();
         return redirect('my-jobs')->with('success','Job Save Successfully');
         
    }
    
    public function  myJobs() {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        
        $jobs = Job::where('user_id',Auth::user()->id)->with('jobType')->get();
        //dd($jobs);
       return view('front.account.job.my-jobs', compact('user', 'jobs')); 
    }
    
    public function jobsedit($id){
           $ide = Auth::user()->id;
        $user = User::where('id',$ide)->first();
         $categories =  Category::orderBy('name','ASC')->where('status',1)->get();
      $jobtypes = JobType::orderBy('name','ASC')->where('status',1)->get();
      $item = Job::where([
          'user_id' => Auth::user()->id,
          'id' => $id,
      ])->first();
      if($item == null){
          abort(404);
      }
        return view('front.account.job.jobedit', compact('user', 'categories', 'jobtypes', 'item'));
    }
    
    public function updatejob(Request $request, $id){
         $request->validate([
            'title' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'vacancy' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'description' => 'required',
            'benefits' => 'required',
            'responsability' => 'required',
            'qualifications' => 'required',
            'keywords' => 'required',
            'experience' => 'required',
            'company_name' => 'required',
            'company_location' => 'required',
            'company_website' => 'required',
        ]);
         
         $job = Job::find($id);
         
    }
}
