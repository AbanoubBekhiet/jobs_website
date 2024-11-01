<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | Register</title>
</head>
<body >

@if(!empty($message))
<div class="btn btn-danger " style="position:relative;left:50%;transform:translateX(-50%)">{{ $message }}</div>
@endif
<form action="{{route("employee_login_check")}}" method="post">
  @csrf
  <h2>Login </h2>

    <div class="p-4  m-5 " style="width:70%" >
<input name="email" class="form-control form-control-lg p-3 m-3" style="width:80%" type="email" placeholder="Email : " aria-label=".form-control-sm example" value="{{old('email')}}">
@error("email")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
<input  name ="password" class="form-control form-control-lg p-3 m-3" style="width:80%" type="password" placeholder="Password : " aria-label=".form-control-sm example">
@error("password")
<div class="alert alert-danger" role="alert">{{$message}}</div>
@enderror
<button type="submit" class="btn btn-primary">submit</button>


</div>
</form>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>









<style>
 

body{
  background-image:url("background_images/login_image3.svg");
  background-size:cover;
  background-position:center ;
  background-repeat: no-repeat;
  background-color: #0d6efd;
  
}
h2{
  color:#001e4c;
  background-color: #0d6efd;
  position:absolute;
  z-index: 2;
  top:50px;
  padding:10px 40px;
  border-radius:5px;
  width:100%;
  text-align: center;
}
form{
  margin-top:100px;
   margin-left:0;
   display:flex;
  justify-content:center;
  align-items:center;
  }
  form > div{
    border:solid 1px #0d6efd;
  backdrop-filter: blur(10px); 
  margin-left:0;
  display:flex;
  flex-direction:column;

  justify-content:center;
  align-items:center;
  
}


</style>