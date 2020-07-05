<?php
  require 'connect.php';
  session_start();
  if(isset($_SESSION['aid'])){
      if(isset($_POST['submit'])){
      $bn = $_POST['bn'];
      if($bn=="none"){
        ?>
        <script type="text/javascript">
          alert("Select a Branch");
        </script>
        <?php
      }
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phno = $_POST['phonenumber'];
      $password = $_POST['password'];
      $query = "SELECT * from `doctor` where email='$email'";
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
        ?>
        <script type="text/javascript">
          alert("email already exists!");
          window.location.href='adddoctor.php';
        </script>
        <?php
      }
      $query = "INSERT INTO `doctor` (`name`, `email`,  `phone_number`, `branch_name`,`password`) VALUES ('$name','$email','$phno','$bn','$password')";
      mysqli_query($conn,$query);
      ?>
      <script type="text/javascript">
        window.location.href="adddoctor.php";
      </script>
      <?php
      }
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
      .login{
      	background: lightgray;
      	color : black;
      }
      .btn {
		  flex: 1 1 auto;
		  margin: 10px;
		  padding: 30px;
		  text-align: center;
		  text-transform: uppercase;
		  transition: 0.5s;
		  background-size: 200% auto;
		  color: white;
		 /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
		  box-shadow: 0 0 20px #eee;
		  border-radius: 10px;
		 }

		/* Demo Stuff End -> */

		/* <- Magic Stuff Start */

		.btn:hover {
		  background-position: right center; /* change the direction of the change here */
		}

		.btn-1 {
		  background-image:linear-gradient(to right, #fc5862 0%, #fdb065 51%, #fc5862 100%);
		}
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Doctor Login Page</title>
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
                    <li class="nav-item nav-link px-3"><a href="alogout.php">Logout</a></li>
                    <li class="nav-item nav-link px-3"><a href="http://donate.therenalproject.com/" target="_blank" class="theme_btn">Payments</a></li>
                </ul>   
            </div>
      </nav> 
    </header>
    <a href="admin.php"><h4><-Go to Home Page</h4> </a>

    <div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h5>Add Doctor</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder ="Enter Name" required  autofocus>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder ="Enter email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone Number:</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="tel" pattern="[6-9]{1}[0-9]{9}" class="form-control" name="phonenumber" placeholder ="Enter Phone Number" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branchname" class="col-md-4 col-form-label text-md-right">Branch Name:</label>

                            <div class="col-md-6">
                                <!-- <input id="branch" type="email" class="form-control" name="branch" placeholder ="Enter email" autofocus> -->
                                <select class="form-control" name="bn" placeholder="Select Branch Name">
                                  <option value="none">Select Branch Name</option>
                                  <?php
                                    $query = "SELECT * FROM `branch` WHERE 1";
                                    $result = mysqli_query($conn,$query);

                                    while($data = mysqli_fetch_assoc($result)){
                                      $bn = $data['branch_name'];
                                      echo ' <option value="'.$bn.'">'.$bn.'</option>';
                                    }
                                  ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" placeholder ="Enter Password">

                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Add Doctor
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-sm">
  <h4 class="mt-3">Doctor's Details:</h4>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Branch</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = "SELECT * from `doctor`";
        $result = mysqli_query($conn,$query);
        $i=0;
        while($data = mysqli_fetch_assoc($result)){
          $i++;
      ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['phone_number'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['branch_name'];?></td>
      </tr>
    <?php } ?>
    </tbody>
    
  </table>
  
</div>

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