<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | your applications</title>
</head>
<body style="background-color:#ddd">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
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
<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>

<div class="d-flex flex-wrap p-3" style="justify-content:center;margin-top:100px;" >
              @foreach ($applications as $application)
              <div class="card m-2" >
                        <div class="card-body">
                            <h5 name="title" class="card-title">{{$application->post_title}}</h5>
                            <label class="text-primary">job description :</label> 
                            <p name="description" class="card-text">{{$application->post_description}}</p>
                            <label class="text-primary">job requirments :</label> 
                            <p name="requirments" class="card-text">{{$application->post_requirments}}</p>
                            <label class="text-primary">job benefits :</label> 
                            <p name="benefits" class="card-text">{{$application->post_benefits}}</p>
                            <label class="text-primary">job working_location :</label> 
                            <p name="working_location" class="card-text">{{$application->working_location}}</p>
                            <div class="buttons d-flex justify-content-between">

                    <form action="{{ route('delete_application', [$application->application_id]) }}" method="POST" style="display:block;width:20%;margin:auto;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                          </div>
                        </div>
                </div> 
              @endforeach
    </div>













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
@media(max-width:500px){
  .taskbar1{
    flex-direction:column !important;
  }
  .taskbar2{
   top:110px;
   margin-bottom:50px !important;
  }
}
</style>