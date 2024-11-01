<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | your profile</title>
</head>
<body style="background-color:#ddd">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
      <div class="inside_taskbar1" style="display:flex;align-items:center;justify-content:space-evenly">
      <a href="{{route("candidate_applications",["candidate_id"=>session("candidate_id")])}}" class="btn btn-outline-primary " > YOUR APPLICATIONS</a>

      <form action="{{ route('search') }}" method="POST">
    @csrf
    <div style="display: flex; align-items: center;">
        <input type="text" name="search_for" id="search_for" placeholder="Search jobs, companies..." style="padding: 10px; border-radius: 5px 0px 0px 5px; border: 1px solid black;">
        
        <button type="submit" style="background-color:transparent;border:0;padding:0;">
            <i class="bi bi-search" style="color:black;border:1px solid black;padding:11px 10px;border-radius:0px 5px 5px 0px;"></i>
        </button>

    </div>
</form>
       </div>
    </div>


<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>

<div class="content" style="display:flex;flex-direction:column;align-items:center;margin-top:50px">
    <div class="first_section" style="background-color:#fff;display:flex;justify-content:space-between;width:60%;padding:30px;margin-top:80px;border-radius:5px;">
    @php $image=session("image_path");if($image!="path"&&$image!=null){$image="images/$image";} else{$image="https://static.thenounproject.com/png/5034901-200.png";}  @endphp 
    <a href="{{route("candidate_image_view")}}" title="upload image" style="display:flex;justify-content:center;align-items:center"><img style="width:170px;height:170px;border-radius:50%;background-color:white;" src=" @php echo $image @endphp " alt=""></a>
        <div class="text" style="color:#001e4c;width:60%;display:flex;flex-direction:column;justify-content:space-evenly;align-items:flex-start">
            <div class="name" style="display:flex;justify-content:space-between;width:90%;">
            <h2 style="font-size:27px">@php echo session("candidate_name") @endphp </h2>
            <a href="{{route("candidate_name_edit_function")}}"><i class="bi bi-pen"></i></a>
            </div>
            <div class="address" style="display:flex;justify-content:space-between;width:90%;">
            <h3 style="font-size:15px">@php echo session("address"); @endphp </h3>
            <a href="{{route("address_edit_function")}}"><i class="bi bi-pen"></i></a>
            </div>
        </div>
    </div>
    <div class="education_section" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
            <div class="head" style="display:flex;justify-content:space-between;width:100%;">
            <h2 style="font-size:18px">Education </h2>
            <a href="{{route("education_edit_function")}}"><i class="bi bi-pen"></i></a>
            </div>
            <div class="content" style="display:flex;flex-wrap:wrap;width:100%;">
                <p> @php echo session("education") @endphp </p>
            </div>
    </div>
    <div class="skills_section" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
            <div class="head" style="display:flex;justify-content:space-between;width:100%;">
            <h2 style="font-size:18px">Skills and Tools </h2>
            <a href="{{route("candidate_skill_edit_view")}}"" style="text-decoration:none"><i class="bi bi-plus"></i>Add skills</a>
            </div>
            <div class="content" style="display:flex;flex-wrap:wrap;width:100%;">
                @php 
                $skills_array=session("skills_array");
                @endphp
                @foreach($skills_array as $skill)
                <div style="background-color:#eee;padding:5px;margin:5px;">{{$skill}}</div>
                @endforeach
            </div>
    </div>
    <div class="workexperience_section" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
            <div class="head" style="display:flex;justify-content:space-between;width:100%;">
            <h2 style="font-size:18px">Work Experiences </h2>
            <a href="{{route("candidate_work_experience_edit_view")}}" style="text-decoration:none"><i class="bi bi-plus"></i>Add Work Experience</a>
            </div>
            <div class="content" style="display:flex;flex-direction:column;flex-wrap:wrap">
                @php 
                $work_array=session("work_array");
                @endphp
                @foreach($work_array as $work)
                <div style="background-color:#eee;padding:5px;margin:5px;">{{$work}}</div>
                @endforeach
            </div>
    </div>
   
    <div class="activities_section" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
            <div class="head" style="display:flex;justify-content:space-between;width:100%;">
            <h2 style="font-size:18px">Activities </h2>
            <a href="{{route("candidate_activities_edit_view")}}" style="text-decoration:none"><i class="bi bi-plus"></i>Add Activities</a>
            </div>
            <div class="content" style="display:flex;flex-wrap:wrap;width:100%;">
            @php 
                $activities_array=session("activities_array");
                @endphp
                @foreach($activities_array as $activity)
                <div style="background-color:#eee;padding:5px;margin:5px;">{{$activity}}</div>
                @endforeach
            </div>
    </div>
    <div class="achievements_section" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
            <div class="head" style="display:flex;justify-content:space-between;width:100%;">
            <h2 style="font-size:18px">Achievements </h2>
            <a href="{{route("candidate_achievements_edit_view")}}" style="text-decoration:none"><i class="bi bi-plus"></i>Add Achievement</a>
            </div>
            <div class="content" style="display:flex;flex-wrap:wrap;width:100%;">
                @php 
                $achievements_array=session("achievements_array");
                @endphp
                @foreach($achievements_array as $achievement)
                <div style="background-color:#eee;padding:5px;margin:5px;">{{$achievement}}</div>
                @endforeach
            </div>
    </div>
    <div class="cv_section mb-5" style="background-color:#fff;display:flex;flex-direction:column;justify-content:space-between;width:60%;padding:30px;margin-top:50px;border-radius:5px;">
        <form action="{{route("candidate_cv_function")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="head" style="display:flex;justify-content:space-between;width:100%;position:relative;">
                <div class="upper"><h2 style="font-size:18px">Uplaod Your CV <h6>(not bigger than  1 mega byte )</h6> </h2>
                <div class="mb-3">
                <h4 >@php if(session("cv_path")!=null && session("cv_path")!="path"){echo "cv uploaded" ;}else{echo "cv not uploaded yet";}  @endphp </h4>
                <input class="form-control mt-5" type="file" id="cv" name="cv">
                </div>
            </div>
            @error("cv")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
            <button class="btn btn-primary">upload</button>
            </div>
        </form>
    </div>
</div>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>









<style>
  body{
    height:200vh;
  }
  .inside_taskbar1 a{
    margin-right:30px;
}
.taskbar1 {
  position:fixed;
  background-color:#ffff ;
  margin-bottom:50px;
  display:flex;
  justify-content: space-evenly;
  align-items: center;
  width:100%;
  margin-bottom:100px;
  z-index: 2;
  padding:15px;
 } 
.taskbar2{
position:relative;
top:82px;
background-color: #001e4c;
padding:15px;
display:flex;
justify-content: center;
align-items: center;
color:#ffff;
 }
.search_account input{
  position:relative;
  padding:10px 50px 4px 10px;
  outline:0;
  border-radius:5px 0px 0px 5px;
  border:solid #001e4c 1px;
}

@media (max-width:650px){
  .taskbar1{
    flex-direction:column;
  }
  .taskbar2{
    position: relative;
    top: 115px;
    background-color: #001e4c;
    padding: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffff;
    margin-bottom: 50px;
  
 }
 .inside_taskbar1 a{
    margin-right:30px;

}
}
@media (max-width:480px){
    .inside_taskbar1{
    flex-direction:column;
    align-items:center !important;
    justify-content: none !important;
}
.inside_taskbar1 a{
    margin-block:20px;
    margin-right:0px;

}
.taskbar2{
    position: relative;
    top: 190px;
    background-color: #001e4c;
    padding: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffff;
    margin-bottom: 150px;
  
 }
}
@media (max-width:950px){
    .first_section{
        position:relative;
        flex-direction:column;
        align-items:center;
    }
    
    .first_section  >div div:first-of-type{
        margin-block:30px;
    }
    .first_section  .text{
        margin-left:30px;
    }

    .first_section  .text div:first-of-type h2{
        font-size:20px !important;
    }
    .first_section  .text div{
        display: flex;
        flex-direction: column;
        align-items:center;
    }
    .first_section   div  div h2,.first_section   div  div h3{
        text-align: center;
    }
    
}
@media (max-width:550px){
    .first_section a:first-of-type img{
        width:110px !important;
        height:110px !important;
    }
    .head{
        flex-direction:column !important;
        align-items: center;
        margin-bottom:10px;
    }
}


</style>