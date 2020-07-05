<?php
  session_start();
  if(isset($_SESSION['aid'])){


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style type="text/css">
      /*header{
        padding: 10px 50px 10px 30px;

      }*/

      body {
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;

      }

      a,h5{
        text-decoration: none;
        color: black;
      }

      li{
        /*font-style: muli;
        font-family: sans-serif;
        font-size: 14px;*/
        font: 400 18px/57px "Muli", sans-serif;
      }

      li a{
        color: black;
      }

      .main_header_area.navbar_fixed {
      position: fixed;
      width: 100%;
      top: -70px;
      left: 0;
      right: 0;
      z-index: 999;
      padding: 0 180px;
      background: #fff;
      box-shadow: 0px 0px 18px 0px rgba(222, 222, 222, 0.75);
      transform: translateY(70px);
      transition: transform 500ms ease, background 200ms ease;
      }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Login Page</title>
  </head>
  <body >
    
    <header class="main_header_area" style="background: linear-gradient(to right, #fc5862 0%, #fdb065 51%, #fc5862 100%);">  
      <nav class="navbar navbar-expand-md navbar-light">
      <!-- Brand -->
      <a class="navbar-brand" href="https://www.therenalproject.com/index.html">
        <img src="logo.png">
      </a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="navbar-collapse navbar_supported collapse show" id="collapsibleNavbar">
                <ul class="nav navbar-nav navbar-right"> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/index.html">Home</a></li> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/about.html">About</a></li> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/services.html">Services</a></li>
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/gallery.html">Gallery</a></li>
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/media.html">Media</a></li>  
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/centers.html">Centers</a></li> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/team.html">Team</a></li> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/partners.html">Partners</a></li> 
                    <li class="nav-item nav-link px-3"><a href="https://www.therenalproject.com/contact.html">Contact</a></li> 
                    <!-- <li class="nav-item nav-link px-3"><a href="login.php">Login</a></li> -->
                    <li class="nav-item nav-link px-3"><a href="alogout.php">Logout</a></li>
                    <li class="nav-item nav-link px-3"><a href="http://donate.therenalproject.com/" target="_blank" class="theme_btn">Payments</a></li>
                </ul>   
            </div>
      </nav> 
    </header>
    <section class="container-sm" >
        <div class="row mt-4" >
          <div class="col-md-3 mb-4 mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="addbranch.php">
              
              <img src="addbranch.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
              <h5  class="mt-2 text-center" >Add Branch</h5>
            </a>
          </div>
          <div class="col-md-3 mb-4  mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="addstaff.php">
            <img src="addperson.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
            <h5 class="mt-2 text-center" >Add/View Staff</h5>
            </a>
          </div>

          <div class="col-md-3 mb-4  mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="adddoctor.php">
            <img src="addperson.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
            <h5 class="mt-2 text-center" >Add Doctor</h5>
            </a>
          </div>
          
          
        </div>

        <div class="row mt-4" >
          <div class="col-md-3 mb-4 mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="editbranch.php">
              
              <img src="addbranch.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
              <h5  class="mt-2 text-center" >Edit Branch Discount</h5>
            </a>
          </div>
          <div class="col-md-3 mb-4  mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="editstaff.php">
            <img src="addperson.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
            <h5 class="mt-2 text-center" >Edit Staff Details</h5>
            </a>
          </div>
          <div class="col-md-3 mb-4  mx-auto" style="border: 2px black solid;height: 280px;width: 200px;background: white;" >
            <a href="editadmindetails.php">
            <img src="editdetails.png" style="width: 150px;height: 150px;margin:auto;display: flex;margin-top:25%;" >
            <h5 class="mt-2 text-center">Edit Admin Details</h5>
            </a>
          </div>
          
        </div>

    </section>
    </body>
</html>

<?php
}
else{
  ?>
  <script type="text/javascript">
    alert("Login First!");
    window.location.href="alogin.php";
  </script>
  <?php
}
?>




