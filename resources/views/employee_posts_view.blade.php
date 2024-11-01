<!DOCTYPE html>
<html lang="en">
<head>
    <title>TAWZIF | posts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>
</head>
@php $image=session("image_path");if($image!="path"&&$image!=null){$image="images/$image";} else{$image="https://static.thenounproject.com/png/5034901-200.png";}  @endphp 
@php $admin=session("admin_id");$candidate=session("candidate_id");$employee=session("employee_id");   @endphp
<?php if($admin) {$style='style="display:none"';} else{$style='style="display:block"';}?>  
@php   @endphp
<body style="background-color:#ccc">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
      <div class="search_account" style="display:flex;align-items:center">
      @if($admin)
    <ul class="links" style="display:flex;list-style:none">
        <li><a href="{{ route('dashboard') }}" style="text-decoration:none;margin-inline:5px;">Home</a></li>
        <li><a href="{{ route('dashboard.pending_posts') }}" style="text-decoration:none;margin-inline:5px;">Pending Posts</a></li>
        <li><a href="{{ route('posts_view') }}" style="text-decoration:none;margin-inline:5px;">Accepted Posts</a></li>
        <li><a href="{{ route('employees_view') }}" style="text-decoration:none;margin-inline:5px;">Employees</a></li>
        <li><a href="{{ route('candidates_view') }}" style="text-decoration:none;margin-inline:5px;">Candidates</a></li>
    </ul>
@elseif($candidate)
    <div style="display: flex; align-items: center;">
        <input type="search" name="search" id="search" placeholder="Search jobs, companies ..." style="padding:7px; margin-right:10px;">
        <i class="bi bi-search" style="color:#001e4c; border:1px solid #001e4c; padding:7px 20px; border-radius:0px 5px 5px 0px;"></i>
        <a href="{{ route('candidate_profile') }}" style="text-decoration:none; margin-inline:5px;">
            <img src="{{ $image }}" alt="Profile Image" style="width:50px; height:50px; border-radius:50%; margin-left:50px; background-color:white;">
        </a>
    </div>

@elseif($employee)
      <div class="search_account" style="display:flex;align-items:center;justify-content:space-evenly">
        <a href="{{route("create_post")}}">CREATE POST</a>
        <a href="{{route("candidates_view")}}">CANDIDATES</a>
        <a href="{{route("employee_posts_view")}}">YOUR POSTS</a>
        <a href="{{route("employee_posts_applications")}}">APPLICATIONS</a>
        <a href="{{route("home")}}" class="btn btn-primary">HOME</a>

    </div>
<style>
  .search_account a{
    text-decoration:none;
    margin-inline:20px;
  }
  .search_account a:hover{
    color:#ac3e3e;
    margin-top:3px;
  }
</style>
@endif

       
      </div>
</div>
<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>

<div class="d-flex flex-wrap " style="justify-content:center;flex-direction:column;align-items:center;position:relative;top:100px;" >
              @foreach ($posts as $post)
              <div class="card m-2 " style="width:60%">
                        <div class="card-body" >
                            <h5 name="title" class="card-title">{{$post->post_title}}</h5>
                            <label class="text-primary">job description :</label> 
                            <p name="description" class="card-text">{{$post->post_description}}</p>
                            <label class="text-primary">job requirments :</label> 
                            <p name="requirments" class="card-text">{{$post->post_requirments}}</p>
                            <label class="text-primary">job benefits :</label> 
                            <p name="benefits" class="card-text">{{$post->post_benefits}}</p>
                            <label class="text-primary">job working_location :</label> 
                            <p name="working_location" class="card-text">{{$post->working_location}}</p>
                            <form action="{{ route('employee_delete_post', [$post->post_id]) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('PUT')
                              <button type="submit" class="btn btn-danger">Delete Post</button>
                        </form>
                        </div>
                </div> 
              @endforeach
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
 
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
 ul a:hover{
    transform:translateY(3px);
    color:#ac3e3e;
    }
    .search_account input{
  position:relative;
  padding:10px 50px 4px 10px;
  outline:0;
  border-radius:5px 0px 0px 5px;
  border:solid #001e4c 1px;
}
</style>