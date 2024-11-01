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
<div class="alert alert-danger" role="alert" style="position:relative;text-align:center">
{{$message}}
</div>
@endif

<div class="errors" style="display:flex;flex-wrap:wrap;margin-bottom:50px;justify-content:center">
@foreach ($errors->all() as $error)
   <div class="btn btn-danger m-2">{{ $error }}</div>
@endforeach
</div>
<form action="{{route("employee_register_store")}}" method="POST" >
  @csrf
  <h2>Register </h2>

    <div class="p-4  m-5" style="width:70%;flex-wrap:wrap;" >
<input value="{{old("name")}}"         name="name" class="form-control form-control-lg p-3 m-3" style="width:40%" type="text" placeholder="Name : " aria-label=".form-control-lg example">
<input value="{{old("age")}}"          name="age" class="form-control form-control-lg p-3 m-3" style="width:40%" type="number" placeholder="Age : " aria-label=".form-control-sm example" min="15">
<input value="{{old("email")}}"        name="email" class="form-control form-control-lg p-3 m-3" style="width:40%" type="email" placeholder="Email : " aria-label=".form-control-sm example">
<input value="{{old("phone_number")}}" name="phone_number" class="form-control form-control-lg p-3 m-3" style="width:40%" type="text" placeholder="Phone Number : " aria-label=".form-control-sm example">
<input name="password" class="form-control form-control-lg p-3 m-3" style="width:40%" type="password" placeholder="Password : " aria-label=".form-control-sm example">
<input name="cpassword" class="form-control form-control-lg p-3 m-3" style="width:40%" type="password" placeholder="Confirm Password : " aria-label=".form-control-sm example">
<select name="gender" class="form-select p-3 m-3 mb-5" style="width:40%;" aria-label="Default select example">
  <option selected>Select your gender</option>
  <option value="male">male</option>
  <option value="female">female</option>
</select>
<button type="submit" class="btn btn-primary mt-5" style="position:absolute;bottom:10px;margin-top:50px;background-color:#aaa;border:none;color:#000;">submit</button>

<a href="{{"employee_login"}}" class="login" style="position:absolute;bottom:30px;right:30px;text-decoration:none;color:#eee">have an account ?</a>

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
form{
  position:relative;
  margin-top:50px;
   margin-left:0;
   display:flex;
  justify-content:center;
  align-items:center;
  }
  form > div{
  backdrop-filter: blur(10px); 
  margin-left:0;
  display:flex;
  justify-content:center;
  align-items:center;
  
}
h2{
  color:#001e4c;
  background-color: #0d6efd;
  position:absolute;
  z-index: 2;
  top:0;
  padding:10px 40px;
  border-radius:5px;
  width:100%;
  text-align: center;
}
@media (max-width:650px){
      form div {
        display:flex;
        flex-direction:column;
      }
      form > div input,form > div select{
        width:100% !important;
      }
      button{
        position:relative !important;
        bottom:50px !important;
      }
}

</style>