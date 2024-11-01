<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | apply for job</title>
</head>
<body style="background-color:#ddd">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
      <div class="search_account" style="display:flex;align-items:center">
      <form action="{{ route('search') }}" method="POST">
    @csrf
    <div style="display: flex; align-items: center;">
        <input type="text" name="search_for" id="search_for" placeholder="Search jobs, companies..." style="padding: 10px; border-radius: 5px 0px 0px 5px; border: 1px solid black;">
        
        <button type="submit" style="background-color:transparent;border:0;padding:0;">
            <i class="bi bi-search" style="color:black;border:1px solid black;padding:11px 10px;border-radius:0px 5px 5px 0px;"></i>
        </button>

    </div>
</form>
    <a href="{{route("home")}}" class="btn btn-primary " style="margin-left:50px;">HOME</a>
    <a href="{{route("candidate_profile")}}" class="btn btn-outline-primary " style="margin-left:20px;">PROFILE</a>
      </div>
</div>
<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>


@if(!empty(session("message")))
<div class="alert alert-primary" role="alert" style="margin-top:90px;margin-bottom:-100px;text-align:center">
{{session("message")}}
</div> 
@php session()->forget("message"); @endphp
@endif
<form action="{{route("apply_function",[$post_id,$employee_id])}}" method="post" enctype="multipart/form-data" style="padding:30px;margin-top:200px;position:relative;left:50%;transform:translateX(-50%);display:flex;justify-content:center;flex-direction:column;border:2px solid #001e4c;width:50%;border-radius:5px;background-color:#fff">
    @csrf
    <div class="input" style="border:2px solid #001e4c;border-radius:5px;margin-bottom:30px">
    <label for="name" style="padding:10px 30px 10px 5px">Name</label>
    <input type="text" value="{{old('name')}}" name="name" id="name" placeholder="Enter your name " style="padding:10px 70px 10px 5px;border:0;outline:0;background-color:#eee">
    </div>
    @error("name")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
    <div class="input" style="border:2px solid #001e4c;border-radius:5px;">
    <label for="email" style="padding:10px 30px 10px 5px">Email</label>
    <input type="text" value="{{old('email')}}" name="email" id="email" placeholder="Enter your email " style="padding:10px 70px 10px 5px;border:0;outline:0;background-color:#eee">
    </div>
    @error("email")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
    <div class="input" style="border:2px solid #001e4c;border-radius:5px;margin-block:30px;">
    <label for="phone_number" style="padding:10px 30px 10px 5px">phone number</label>
    <input type="text" value="{{old('phone_number')}}" name="phone_number" id="phone_number" placeholder="Enter your phone number" style="padding:10px 70px 10px 5px;border:0;outline:0;background-color:#eee">
    </div>
    @error("phone_number")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
    <div class="input" style="border:2px solid #001e4c;border-radius:5px">
    <label for="cv" style="padding:10px 30px 10px 5px">Upload your cv</label>
    <input type="file" name="cv" id="cv" placeholder="Upload your cv" style="padding:10px 70px 10px 5px;border:0;outline:0;background-color:#eee">
    </div>
    @error("cv")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
    <input type="submit"  value="Apply" class="btn btn-primary" style="margin-top:10px">
</form>













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>









<style>
  body{
    height:200vh;
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

</style>