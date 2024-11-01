
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <title>twzif | home</title>

    <title>twzif | Home</title>
</head>
<body >

@if(session("image_path")&&session("candidate_id"))
@php 
$source_path=session("image_path");
$source="images/$source_path";
@endphp
@else
@php 
$source="https://static.thenounproject.com/png/5034901-200.png";
@endphp
@endif
<div class="home">
    <div class="first_section">
     <div class="taskbar">
        <div class="logo" style="color:#ffffff"><h1><span style="color:#0d6efd">T</span>WZIF</h1></div>
        <div class="buttons">
            <a href="{{route("candidate_register_form")}}" class="btn btn-primary">LOGIN</a>
            <a href="{{route("employee_register_form")}}" class="btn btn-outline-primary" style="color:#ffff">POST A JOB</a>
          @if(Auth::user()){
              <a href="{{route("candidate_profile")}}" title="view profile" style="position:absolute;top:20px;right:20px;"><img style="width:50px;height:50px;border-radius:50%;margin-left:50px;background-color:white" src= {{"$source"}}  alt=""></a>
          }
          @endif
        </div>
     </div>
     <form action="{{route("search")}}" method="post">
        @csrf
     <div class="content" >
        <p style="font-size:35px;">THE BEST WEBSITE TO START WORKING</p>
        <p style="font-size:26px;">SERACH FOR YOUR JOB</p>
        <div class="search_account" style="display:flex;align-items:center">
        <input type="text" name="search_for" id="search_for" placeholder="search jobs,companies ...." style="width:600px;padding:20px 90px 20px;border:solid 2px #0d6efd">
        <button type="submit" style="background-color:transparent;border:0;"><i class="bi bi-search" style="color:#fff;border:1px solid #ffff;padding:19px 40px ;border-radius:0px 5px 5px 0px;border:solid 2px #0d6efd"></i></button>
      </div>        
     </div>
     </form>
    </div>

    <div class="second-section">
        <p style="font-size:30px;">Get ready for more opportunities!</p>
        <p style="font-size:30px;">You are minutes away from the right job.</p>
        <a href="{{route("candidate_register_form")}}" class="btn btn-primary p-3">GET STARTED</a>
    </div>
    
    <div class="third-section" style="background-color:#eee">
        <div class="container">
            <h4>SEARCH JOBS BY CAREER LEVEL</h4>
            <div class="levels">
                <div class="level1" >SENIOR MANAGMENT JOBS</div>
                <div class="level2" >MANAGMENT JOBS</div>
                <div class="level3" >EXPERINCED JOBS</div>
                <div class="level4" >ENTRY LEVEL JOBS</div>
                <div class="level5" >INTERNSHIPS</div>
            </div>
        </div>
    </div>

    <div class="fourth-section" style="background-color:#fff">
        <div class="container">
            <h4>SEARCH JOBS BY CATIGORY</h4>
            <div class="levels">
                <div class="level1" >Sales Jobs</div>
                <div class="level2" >IT/Software Development Jobs</div>
                <div class="level3" >Creative/Design/Art Jobs</div>
                <div class="level4" >Work from Home Jobs</div>
            </div>
        </div>
    </div>

    <div class="fifth-section" style="background-color:#eee">
        <div class="container">
            <h4>SEARCH JOBS BY LOCATION</h4>
            <div class="levels">
                <div class="level1" >jobs in cairo</div>
                <div class="level2" >jobs in giza</div>
                <div class="level3" >jobs in alexandria</div>
                <div class="level4" >jobs in aswan</div>
            </div>
        </div>
    </div>

    <footer>
        <h3 style="font-size:40px;margin-bottom:50px;">TWZIF</h3>
        <div style="display:flex;justify-content:space-between;align-items:center;width:80%;margin-block:40px;">
        <div class="links">
            <h4>LINKS</h4>
            <ul >
                <li><a href="">CONTACT US</a></li>
                <li><a href="">SERVICES</a></li>
                <li><a href="">INFO</a></li>
            </ul>
        </div>
        <div class="follow">
            <h4>FOLLOW US</h4>
            <ul>
                <li><a href="https://www.linkedin.com/in/abanwb-bekhiet-b3ba86251?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="bi bi-linkedin"></i></a></li>
                <li><a href="https://www.facebook.com/share/uspsoYx8hM8H3fF8/?mibextid=qi2Omg" target="_blank"><i class="bi bi-facebook"></i></a></li>
            </ul>
        </div>
        </div>
       
        <h6>CREATED BY ABANOUB BEKHIET</h6>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
    
    .home .first_section{
        
        position:relative;
        height:100vh;
        background-color: #eee;
        background-image: url("https://c0.wallpaperflare.com/preview/825/34/497/30-35-years-old-adult-hand-indoors.jpg");
        background-size: cover;
        background-position: bottom ;
        margin-bottom:0;
    }
    .home .first_section::before{
        position:absolute;
        content:"";
        top:0;
        left:0;
        width:100%;
        height:100%;
       background-color: rgb(0,0,0,0.5);
    }
    .home .first_section .taskbar{
        display:flex;
        padding:20px;
        margin-inline:20px;
        justify-content: space-evenly;
        align-items: center;
        position: relative;
        z-index: 2;
    }
    .home .first_section .content{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items: flex-start;
        color:#ffff;
    }
    .search_account input{
  position:relative;
  padding:10px 50px 4px 10px;
  outline:0;
  border-radius:5px 0px 0px 5px;
  border:solid #001e4c 1px;
  
}
    .second-section{
        height:60vh;
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
    }
    .third-section,.fourth-section,.fifth-section{
        position:relative;
        padding:30px;
        padding-block:50px;
        border-block:1px solid #0d6efd;
    }
   
    .third-section .container,
    .fourth-section .container,
    .fifth-section .container{
        width:90%;
        margin:auto;
        position:relative;
        
    }
    .third-section .container .levels,
    .fourth-section .container .levels,
    .fifth-section .container .levels{
     display:flex;
     flex-wrap:wrap;
    justify-content: space-evenly;
    align-items:center;
    margin-top:70px;
    }
    .third-section .container h4,
    .fourth-section .container h4,
    .fifth-section .container h4{
        position:relative;
    }
    .third-section .container h4::before,
    .fourth-section .container h4::before,
    .fifth-section .container h4::before{
        position:absolute;
        content:"";
        bottom:-10px;left:0;
        width:100px;
        height:3px;
       background-color: #0d6efd;
    }
    .third-section .container .levels div,
    .fourth-section .container .levels div,
    .fifth-section .container .levels div{
        position:relative;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        align-items:center;
        color:black;
        z-index: 3;
        border-radius:2px;
        font-weight: bold;
        font-size:smaller;
        margin-block:30px;
    }
    .third-section .container .levels div::before,
    .fourth-section .container .levels div::before,
    .fifth-section .container .levels div::before{
        content:"";
        position: absolute;
        width:100%;
        height:100%;
        background-color: rgb(0,0,0,0.4);
        z-index: 2;
        transition-duration: 0.4s;
    }
    .third-section .container .levels div:hover::before,
    .fourth-section .container .levels div:hover::before,
    .fifth-section .container .levels div:hover::before{
        background-color: transparent;

    }

    .fourth-section .container .level1{
        background-image:url('https://static.wuzzuf-data.net/d3b5341de34165b6b89119963f87c288.webp');
        background-size:cover;
        width:270px;
        height:270px;
    }
    .fourth-section .container .level2{
        background-image:url('https://static.wuzzuf-data.net/807fdbf6e6fea3c3a60f161b287699b0.webp');
        background-size:cover;
        width:270px;
        height:270px;
    }
    .fourth-section .container .level3{
        background-image:url('https://static.wuzzuf-data.net/c16f6c3c6395297d12fe1bbe11d1772d.webp');
        background-size:cover;
        width:270px;
        height:270px;   
    }
    .fourth-section .container .level4{
        background-image:url('https://static.wuzzuf-data.net/9d31b883c8ee3dae61ee035d36c81fda.webp');
        background-size:cover;
        width:270px;
        height:270px;  
     }
    
        


        .fifth-section .container .level1{
        background-image:url('https://static.wuzzuf-data.net/e59b7b36521c55e58bba5c764fadbd91.webp');
        background-size:cover;
        width:270px;
        height:270px;
    }
    .fifth-section .container .level2{
        background-image:url('https://static.wuzzuf-data.net/06dcf21ab4351a5f461ab65cfb8f7864.webp');
        background-size:cover;
        width:270px;
        height:270px;
    }
    .fifth-section .container .level3{
        background-image:url('https://static.wuzzuf-data.net/889a8328d4b0724b23cf60fffa96e845.webp');
        background-size:cover;
        width:270px;
        height:270px;   
    }
    .fifth-section .container .level4{
        background-image:url('https://static.wuzzuf-data.net/fe2cb1e55360d0ab1d1bbe4de46a8ede.webp');
        background-size:cover;
        width:270px;
        height:270px;  
     }
   
        
        

        .third-section .container .level1{
        background-image:url('https://static.wuzzuf-data.net/0c19d61b5478d2558236bffe0be4cae8.webp');
        background-size:cover;
        width:200px;
        height:200px;
    }
    .third-section .container .level2{
        background-image:url('https://static.wuzzuf-data.net/03a0cb939761438c60995ca9c3b384ee.webp');
        background-size:cover;
        width:200px;
        height:200px;
    }
    .third-section .container .level3{
        background-image:url('https://static.wuzzuf-data.net/ee7a10cb0d6b9b97865d752e5450d3d0.webp');
        background-size:cover;
        width:200px;
        height:200px;   
    }
    .third-section .container .level4{
        background-image:url('https://static.wuzzuf-data.net/e4eeabd152efdfcf09ca29b4b516fc09.webp');
        background-size:cover;
        width:200px;
        height:200px;  
     }
    .third-section .container .level5{
        background-image:url('https://static.wuzzuf-data.net/ae5c47cd7698132c98b94e50fe6f0a97.webp');
        background-size:cover;
        width:200px;
        height:200px; 
        }
        
        
        footer{
            padding:30px;
            display:flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            color:#fff;
            background-color: #001e4c;
        }
        footer ul li {
            display:inline-block;
            margin-right:20px;
        }
        footer ul li a{
            text-decoration: none;
        }
        .links,.follow{
            display:flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
      
</style>