<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Candidate;
use App\Models\Info;
use App\Models\Post;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Achievements;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class projectController extends Controller
{


    public function start(){
        return view("start");
    }
    public function dashboard(){
        return view("dashboard");
    }
    public function employee_register(){
        return view("employee_register");
    }
    public function employee_store(Request $request){
        
        $request->validate([
            "name"=>"required|string",
            "age"=>"integer|min:18|required",
            "email"=>"required|email|unique:candidates",
            "gender"=>"required",
            "phone_number"=>"unique:candidates|required",
            "password"=>"required|min:10",
            "cpassowrd"=>"same:password",
        ]);
        
        $name=$request->name;
        $age=$request->age;
        $email=$request->email;
        $gender=$request->gender;
        $password=$request->password;
        $phone_number=$request->phone_number;
    
     
        $user=Employee::create([
            "name"=>$name,
            "password"=>hash::make($password),
            "email"=>$email,
            "phone_number"=>$phone_number,
            "gender"=>$gender,
            "age"=>$age,
        ]);
        Auth::login($user);
        return to_route("home");
    }

    public function employee_login(){
        return view("employee_login");
    }
    public function employee_login_check(Request $request){
        $request->validate([
         "email"=>"required",
         "password"=>"required",
        ]);
        $email=$request->email;
        $password=$request->password;
        
        $employees = Employee::where("email",$email)->first();
        if(!empty($employees) && $employees->password==$password){
            session(["employee_id"=>$employees->employee_id]);
            if(session("candidate_id")){
                session()->forget('candidate_id');
            }
            else if(session("admin_id")){
                session()->forget('admin_id');
            }
                return to_route("create_post");
            }
        else{
            return redirect()->back()->withErrors(["message"=>"password or email is wronge"])->withInput();   
            }
    }












    public function create_post(){
        return view("create_post");
    }
    public function store_post(Request $request){
        $request->validate([
        "post_title"=>"required|string",
        "post_description"=>"required|string",
        "post_requirments"=>"required|string",
        "post_benefits"=>"required|string",
        "working_location"=>"required|string",
        "catigory_name"=>"required|string",
        ]);
       
       
       
        $post_title=$request->post_title;
        $post_description=$request->post_description;
        $post_requirments=$request->post_requirments;
        $post_benefits=$request->post_benefits;
        $working_location=$request->working_location;
        $catigory=$request->catigory_name;
        

        Post::create([
         "post_title"=>$post_title,
         "post_description"=>$post_description,
         "post_requirments"=>$post_requirments,
         "post_benefits"=>$post_benefits,
         "working_location"=>$working_location,
         "catigory_name"=>$catigory,
         "employee_id"=>session("employee_id"),
        ]);
        $message="your job is posted successfully and waiting for acceptence ";
        return view("create_post",["message"=>$message]);

    }


    public function pending_posts(){
        $posts = Post::where("status","pending")->get();
        return view("pending_posts",["posts"=>$posts]);
    }

    public function delete_post($post_id){
        Post::where('post_id', $post_id)->update(['status' => "rejected"]);
        return to_route("dashboard.pending_posts");
        }
        
    public function accept_post($post_id){
        Post::where('post_id', $post_id)->update(['status' => "accepted"]);
        return to_route("dashboard.pending_posts");
        }
        
   
    public function posts_view(){
        // $all_posts=Post::where("status","accepted")->get();
        
        return view("posts_view",["posts"=>Post::where("status","accepted")->Paginate(3)]);
    }
    public function home(){
        return view("home");
    }






    public function candidate_register(){
        return view("candidate_register");
    }
    public function candidate_store(Request $request){
        $request->validate([
            "name"=>"required|string",
            "age"=>"integer|min:18|required",
            "email"=>"required|email|unique:candidates",
            "gender"=>"required",
            "phone_number"=>"unique:candidates|required|max:11",
            "password"=>"required|min:10",
            "cpassowrd"=>"same:password",
        ]);
        
        $name=$request->name;
        $age=$request->age;
        $email=$request->email;
        $gender=$request->gender;
        $password=$request->password;
        $phone_number=$request->phone_number;
    
     
       $user=Candidate::create([
            "name"=>$name,
            "password"=>Hash::make($password),
            "email"=>$email,
            "phone_number"=>$phone_number,
            "gender"=>$gender,
            "age"=>$age,
        ]);
        Auth::login($user);
        return to_route("home");
    }

    public function candidate_login(){
        return view("candidate_login");
    }
    public function candidate_login_check (Request $request){
         
        $request->validate([
        "email"=>"required",
        "password"=>"required",
        ]);



        $email=$request->input("email");
        $password=$request->input("password");
        $candidates = Candidate::where("email",$email)->first();
        if(!empty($candidates->email) && $candidates->password==$password){
            $candidate_id=$candidates->candidate_id;
            session(["candidate_id"=>$candidate_id]);
            //name
            $name=Candidate::where("candidate_id",$candidate_id)->first();
            session(["candidate_name"=>$name->name]);
            //education
            //address
            $education_address=Info::where("candidate_id",$candidate_id)->first();
            if($education_address){
                session(["education"=>$education_address->education]);
                session(["address"=>$education_address->candidate_address]);
            }
            else{
                session(["education"=>"education"]);
                session(["address"=>"address"]);
            }
            //skills
            $skills= Skill::where("candidate_id",$candidate_id)->get();
            $skills_array=[];
            foreach ($skills as $skill) 
            array_push( $skills_array,$skill->skill); 
            session(["skills_array"=>$skills_array]);
            //work
            $work_ar= Experience::where("candidate_id",$candidate_id)->get();
            $work_array=[];
            foreach ($work_ar as $work) 
            array_push( $work_array,$work->experience); 
            session(["work_array"=>$work_array]);
            //activities
            $activities_ar= Activity::where("candidate_id",session("candidate_id"))->get();
            $activities_array=[];
            foreach ($activities_ar as $activity) 
            array_push( $activities_array,$activity->activity); 
            session(["activities_array"=>$activities_array]);
            //achievements
            $achievements_ar= Achievements::where("candidate_id",session("candidate_id"))->get();
            $achievements_array=[];
            foreach ($achievements_ar as $achievement) 
            array_push( $achievements_array,$achievement->achievement); 
            session(["achievements_array"=>$achievements_array]);
            //image
            $image=Info::where("candidate_id",$candidate_id)->first();
            if($image){
                session(["image_path"=>$image->image_path]);
            }
            else{                
                session(["image_path"=>"path"]);
            }
            //cv
            $cv=Info::where("candidate_id",$candidate_id)->first();
            if($cv)
            session(["cv_path"=>$cv->cv_path]);
            else
            session(["cv_path"=>"path"]);
            if(session("admin_id")){
                session()->forget('admin_id');
            }
            else if(session("employee_id")){
                session()->forget('employee_id');
            }
            return to_route("posts_view");
        }
        else{
            return redirect()->back()->withErrors(["message"=>"password or email is wronge"])->withInput();
        }
    }


    public function candidate_profile(){
        return view("candidate_profile");
    }
   

    


    public function candidate_name_edit_view(){
        return view("candidate_name_edit_view");
    }
    public function candidate_name_edit_function(Request $request){
        $request->validate([
            "candidate_name"=>"string",
           ]);
        $name=$request->input("candidate_name");
        $current_name=Candidate::where("candidate_id",session("candidate_id"))->first();
        if(isset($current_name->name)){
            Candidate::where("candidate_id",session("candidate_id"))->update(["name"=>$name]);
        }
        session(["candidate_name"=>$name]);
        return to_route("candidate_profile");
        }
    






    public function education_edit_view(){
        return view("education_edit_view");
    }
   
    public function education_edit_function(Request $request){
        $request->validate([
            "education"=>"string",
           ]);
    $education=$request->input("education");
    $current_education=Info::where("candidate_id",session("candidate_id"))->first();
    if($current_education->education){
        Info::where("candidate_id",session("candidate_id"))->update(["education"=>$education]);
    }
    else{
        Info::create([
        "candidate_id"=>session("candidate_id"),
        "education"=>$education,
        ]);
    }
    session(["education"=>$education]);
    return to_route("candidate_profile");
    }
    


    public function address_edit_view(){
        return view("address_edit_view");
    }
    public function address_edit_function(Request $request){
        $request->validate([
         "address"=>"string",
        ]);
        $address=$request->input("address");
        $current_address=Info::where("candidate_id",session("candidate_id"))->first();
        if(isset($current_address->candidate_address)){
            Info::where("candidate_id",session("candidate_id"))->update(["candidate_address"=>$address]);
        }
        else{
            Info::create([
            "candidate_id"=>session("candidate_id"),
            "candidate_address"=>$address,
            ]);
        }
        session(["address"=>$address]);
        return to_route("candidate_profile");
        }
    public function candidate_skill_edit_view(){
        return view("candidate_skill_edit_view");
    }
    public function candidate_skill_edit_function(Request $request){

        $request->validate([
            "skill"=>"string",
           ]);
        $skill=$request->input("skill");
        Skill::create([
            "candidate_id"=>session("candidate_id"),
            "skill"=>$skill,
        ]);
       $skills= Skill::where("candidate_id",session("candidate_id"))->get();
    $skills_array=[];
       foreach ($skills as $skill) 
        array_push( $skills_array,$skill->skill); 
       session(["skills_array"=>$skills_array]);
      return to_route("candidate_profile");
        }
    public function candidate_work_experience_edit_view(){
        return view("candidate_work_experience_edit_view");
    }
    public function candidate_work_experience_edit_function(Request $request){
        $request->validate([
            "work"=>"string",
           ]);
        $work=$request->input("work");
        Experience::create([
            "candidate_id"=>session("candidate_id"),
            "experience"=>$work,
        ]);
       $work_ar= Experience::where("candidate_id",session("candidate_id"))->get();
    $work_array=[];
       foreach ($work_ar as $work) 
        array_push( $work_array,$work->experience); 
        session(["work_array"=>$work_array]);
      return to_route("candidate_profile");
        }
    
    public function candidate_activities_edit_view(){
        return view("candidate_activities_edit_view");
    }
    public function candidate_activities_edit_function(Request $request){
        $request->validate([
            "activity"=>"string",
           ]);
        $activity=$request->input("activity");
        Activity::create([
            "candidate_id"=>session("candidate_id"),
            "activity"=>$activity,
        ]);
       $activities_ar= Activity::where("candidate_id",session("candidate_id"))->get();
    $activities_array=[];
       foreach ($activities_ar as $activity) 
        array_push( $activities_array,$activity->activity); 
    session(["activities_array"=>$activities_array]);
      return to_route("candidate_profile");
        }
    public function candidate_achievements_edit_view(){
        return view("candidate_achievements_edit_view");
    }
    public function candidate_achievements_edit_function(Request $request){
        $request->validate([
            "achievement"=>"string",
           ]);
        $achievement=$request->input("achievement");
        Achievements::create([
            "candidate_id"=>session("candidate_id"),
            "achievement"=>$achievement,
        ]);
       $achievements_ar= Achievements::where("candidate_id",session("candidate_id"))->get();
    $achievements_array=[];
       foreach ($achievements_ar as $achievement) 
        array_push( $achievements_array,$achievement->achievement); 
    session(["achievements_array"=>$achievements_array]);
      return to_route("candidate_profile");
        }
    public function candidate_image_view(){
        return view("candidate_image_view");
    }
    public function candidate_image_function(Request $request){
        $request->validate([
            "image"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
           ]);
        $file_extension=$request->image->getClientOriginalExtension();
        $file_name=session("candidate_id").".".$file_extension;
        $path=public_path("images");
        $request->image->move($path,$file_name);
        $check_exsistens=Info::where("candidate_id",session("candidate_id"))->first();
         if($check_exsistens){
             Info::where("candidate_id",session("candidate_id"))->update(["image_path"=>$file_name]);
         }
         else{
            Info::create([
            "candidate_id" => session("candidate_id"),
            "image_path"=>$file_name,
            ]);
         }
        
        session(["image_path"=>$file_name]);
        return to_route("candidate_profile");
        }
    public function candidate_cv_function(Request $request){
        $request->validate([
            "cv"=>"required|file|mimes:pdf,doc,docx|max:5120",
           ]);
        $file_extension=$request->cv->getClientOriginalExtension();
        $file_name=session("candidate_id").".".$file_extension;
        $path=public_path("cvs");
        $request->cv->move($path,$file_name);
        $check_exsistens=Info::where("candidate_id",session("candidate_id"))->first();
         if($check_exsistens){
             Info::where("candidate_id",session("candidate_id"))->update(["cv_path"=>$file_name]);
         }
         else{
            Info::create([
            "candidate_id" => session("candidate_id"),
            "cv_path"=>$file_name,
            ]);
         }
        
        session(["cv_path"=>$file_name]);
        return to_route("candidate_profile");
        }
    


        public function employees_view(){
            $employees=Employee::paginate(2);
            return  view("employees_view",["employees"=>$employees]);
        }
        public function candidates_view(){
            $candidates=Candidate::paginate(2);
            return  view("candidates_view",["candidates"=>$candidates]);
        }


        public function admin_login_view(){
        return view("admin_login_view");
        }
        public function admin_login_check(Request $request){
        
        $request->validate([
        "email"=>"required",
        "password"=>"required",
        ]);
        
        
        
        $email=$request->email;
        $password=$request->password;

        $check=Admin::where("email",$email)->first();
        if($check && $check->password==$password){
            if(session("candidate_id")){
                session()->forget('candidate_id');
            }
            else if(session("employee_id")){
                session()->forget('employee_id');
            }
            session(["admin_id"=>$check->admin_id]);
            return to_route("dashboard");
        }
        else{
            return redirect()->back()->withErrors(["message"=>"password or email is wronge"])->withInput();   
           
        }
        }


        function apply_view($post_id,$employee_id){
            if(!session("candidate_id")){
                return to_route("candidate_register_form")->withErrors(["message"=>"you should be registered to apply to a job"]);
            }
        return view("apply_view",["post_id"=>$post_id,"employee_id"=>$employee_id]);
        }
        function apply_function(Request $request,$post_id,$employee_id){
            
            $request->validate([
                "candidate_name"=>"string|required",
                "email"=>"email|required",
                "cv"=>"required|file|mimes:pdf,doc,docx|max:5120",
                "phone_number"=>"required",
            ]);
        $cv_extension=$request->cv->getClientOriginalExtension();
        $cv_name=session("candidate_id").".".$cv_extension;
        $request->cv->move("applications_cvs",$cv_name);
        Application::create([
        "candidate_id"=>session("candidate_id"),
        "employee_id"=>$employee_id,
        "post_id"=>$post_id,
        "email"=>$request->email,
        "phone_number"=>$request->phone_number,
        "cv"=>$cv_name,
        "candidate_name"=>$request->name,
        ]);
        session(["message"=>"your application ws sent successfully"],1);
        return to_route("apply_view",["post_id"=>$post_id,"employee_id"=>$employee_id]);
        }



        function candidate_applications($candidate_id){
    
            $applications = DB::table('applications')
            ->join('posts', 'applications.post_id', '=', 'posts.post_id') 
            ->select('applications.application_id', 'posts.post_title',"posts.post_description"
            ,"posts.post_requirments","posts.post_benefits","posts.working_location")
            ->where("applications.status","pending")
            ->get();
            
        return view("candidate_applications_view",["applications"=>$applications]);
        }
   

        public function delete_application($application_id){
            Application::where('application_id', $application_id)->update(['status' => "rejected"]);
            return to_route("candidate_applications",["candidate_id"=>session("candidate_id")]);
        }


        public function employee_posts_applications(){
            $applications = DB::table('applications')
            ->join('posts', 'applications.employee_id', '=', 'posts.employee_id')
            ->select(
                'applications.application_id',
                'applications.candidate_id',
                'applications.candidate_name',
                'applications.phone_number',
                'applications.email',
                'applications.cv',
                DB::raw('MIN(posts.post_title) as post_title'),  
                DB::raw('MIN(posts.post_description) as post_description') 
            )
            ->where('applications.status', 'pending')
            ->where('posts.status', 'accepted')
            ->groupBy(
                'applications.application_id',
                'applications.candidate_id',
                'applications.candidate_name',
                'applications.phone_number',
                'applications.email',
                'applications.cv'
            )
            ->get();
        
            
        return view("applications_view",["applications"=>$applications]);
        }
        
        
        public function employee_delete_application($application_id){
            Application::where('application_id', $application_id)->update(['status' => "rejected"]);
            return to_route("employee_posts_applications",["candidate_id"=>session("candidate_id")]);
        }


        function employee_posts_view(){
        $posts = Post::where("employee_id",session("employee_id"))->where("status","accepted")->get();
        return view("employee_posts_view",["posts"=>$posts]);
        }


        public function employee_delete_post($post_id){
            Post::where('post_id', $post_id)->update(['status' => "rejected"]);
            return to_route("employee_posts_view");
            }


        public function search(Request $request){
            $posts=Post::where('post_title','like','%'.$request->search_for.'%')
            ->orwhere('catigory_name','like','%'.$request->search_for.'%')
            ->orwhere('post_requirments','like','%'.$request->search_for.'%')
            ->orwhere('working_location','like','%'.$request->search_for.'%')
            ->orwhere('post_description','like','%'.$request->search_for.'%')
            ->where("status","accepted")
            ->paginate(5);
        
            if(count($posts)>0){
            return view("posts_view",["posts"=>$posts]);
            }
            else{
            return view("posts_view",["message"=>"no results found"]);
            }
        }

        

    }