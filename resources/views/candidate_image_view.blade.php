<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | image</title>
</head>
<body style="background-color:#ddd">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
      <div class="search_account" style="display:flex;align-items:center">
        <input type="search" name="search" id="search" placeholder="search jobs,companies ....">
        <i class="bi bi-search" style="color:#001e4c;border:1px solid #001e4c;padding:7px 20px ;border-radius:0px 5px 5px 0px"></i>
      </div>
</div>
<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>


<form action="{{route("candidate_image_function")}}" method="post" enctype="multipart/form-data" style="padding:30px;margin-top:200px;position:relative;left:50%;transform:translateX(-50%);display:flex;justify-content:center;align-items:center;flex-direction:column;border:2px solid #001e4c;width:50%;border-radius:5px">
    @csrf
    <div class="input" style="border:2px solid #001e4c;border-radius:5px">
    <label for="image" style="padding:10px 30px 10px 5px">upload image</label>
    <input type="file" name="image" id="image"  style="padding:10px 70px 10px 5px;border:0;outline:0;">
    </div>
    @error("image")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
    <input type="submit" value="submit" class="btn btn-primary" style="margin-top:10px">
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