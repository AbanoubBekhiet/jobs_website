<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | post creation</title>
</head>
<body style="background-color:#ddd">
  
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
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
</div>
<div class="taskbar2" style="margin-bottom:100px;">THE BEST WEBSITE TO GET A JOB</div>

@if(!empty($message)) 
    <div class="alert alert-info mt-5 text-center" role="alert" >
      {{$message}};
    </div>
  
  
  @endif
  <div class="errors" style="display:flex;flex-wrap:wrap;margin-bottom:50px;justify-content:center">
@foreach ($errors->all() as $error)
   <div class="btn btn-danger m-2">{{ $error }}</div>
@endforeach
</div>
<form action="{{route("store_post")}}" method="post" >
  @csrf
    <div class="border border-primary m-5 p-5">
        <div class="mb-3">
          <label for="post_title" class="form-label">post title</label>
          <input name="post_title"  value="{{old('post_title')}}" type="text" class="form-control" id="post_title" placeholder="Enter post title">
        </div>
        <div class="mb-3">
          <label for="post_description" class="form-label">post description</label>
          <textarea name="post_description" value="{{old('post_description')}}" class="form-control" id="post_description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="post_requirments" class="form-label">post requirments</label>
          <textarea name="post_requirments" value="{{old('post_requirments')}}" class="form-control" id="post_requirments" rows="3"></textarea>
        </div>
        <select name="catigory_name" class="form-select mt-4 mb-4" aria-label="Default select example">
          <option selected>select job catigory</option>
          <option value="Sales">Sales</option>
          <option value="Customer_service/support">Customer_service/support</option>
          <option value="IT/Software development">IT/Software development</option>
          <option value="Accounting/Finance">Accounting/Finance</option>
          <option value="Operations/Managment">Operations/Managment</option>
          <option value="Engineering/Mechanical/Electornic">Engineering/Mechanical/Electornic</option>
          <option value="Markting/advertisment">Markting/advertisment</option>
        </select>
        <div class="mb-3">
          <label for="post_benefits" class="form-label">post benefits</label>
          <textarea name="post_benefits" value="{{old('post_benefits')}}"  class="form-control" id="post_benefits" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="working_location" class="form-label">working location</label>
          <input name="working_location" value="{{old('working_location')}}" type="text" class="form-control" id="working_location" placeholder="Enter working location">
        </div>
        <button type="submit" class="btn btn-primary mt-5" style="position:relative;transform:translateX(-50%);left:50%;">post</button>
        <div class="errors" style="display:flex;flex-wrap:wrap;margin-bottom:50px;justify-content:center">

</div>

    </div>
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


</style>