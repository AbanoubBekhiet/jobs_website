<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | Pending posts</title>
</head>
<body style="background-color:#ddd">
<div class="taskbar1">
      <div class="logo"><h1 style="color:#001e4c">TAWZIF</h1></div>
      <div class="search_account" style="display:flex;align-items:center">
        <ul class="links" style="display:flex;list-style:none;display:flex;align-items:center;">
           <a href="{{route("home")}}" style="text-decoration:none;margin-inline:5px;" class="btn btn-primary"><li>Home</li></a>
            <a href="{{route("dashboard")}}" style="text-decoration:none;margin-inline:5px;"><li>dashboard</li></a>
            <a href="{{route("dashboard.pending_posts")}}" style="text-decoration:none;margin-inline:5px;"><li>Pending Posts</li></a>
            <a href="{{route("posts_view")}}" style="text-decoration:none;margin-inline:5px;"><li>Accepted Posts</li></a>
            <a href="{{route("employees_view")}}" style="text-decoration:none;margin-inline:5px;"><li>Employees</li></a>
            <a href="{{route("candidates_view")}}" style="text-decoration:none;margin-inline:5px;"><li>Candidates</li></a>
        </ul>
      </div>
</div>
<div class="taskbar2">THE BEST WEBSITE TO GET A JOB</div>

    <div class="d-flex flex-wrap p-3" style="justify-content:center;margin-top:100px;" >
              @foreach ($posts as $post)
              <div class="card m-2" >
                        <div class="card-body">
                            <h5 name="title" class="card-title">{{$post->post_title}}</h5>
                            <label class="text-primary">job description :</label> 
                            <p name="description" class="card-text">{{$post->post_description}}</p>
                            <label class="text-primary">job requirments :</label> 
                            <p name="requirments" class="card-text">{{$post->post_requirments}}</p>
                            <label class="text-primary">job benefits :</label> 
                            <p name="benefits" class="card-text">{{$post->post_benefits}}</p>
                            <label class="text-primary">job working_location :</label> 
                            <p name="working_location" class="card-text">{{$post->working_location}}</p>
                            <div class="buttons d-flex justify-content-between">
                    <form action="{{ route('accept_post', [$post->post_id]) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-primary">Accept</button>
                    </form>

                    <form action="{{ route('delete_post', [$post->post_id]) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger">Reject</button>
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
    ul a:hover{
    transform:translateY(3px);
    color:#ac3e3e;
    }
    

</style>