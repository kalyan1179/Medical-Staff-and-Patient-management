<?php
  require 'connect.php';
  session_start();
  if(isset($_SESSION['aid'])){
    if(isset($_POST['submit'])){
      $bn = $_POST['branchname'];
      $d = $_POST['discount'];
      $query = "SELECT * from branch where branch_name='$bn'";
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result)==1){
        $query = "UPDATE `branch` SET `discount`='$d' WHERE branch_name='$bn'";
        $result = mysqli_query($conn,$query);
        ?>
        <script type="text/javascript">
          // alert("Branch already exists!");
          window.location.href="editbranch.php";
        </script>
        <?php
      }else{
        ?>
        <script type="text/javascript">
          alert("Branch doesnot exists!");
          window.location.href="editbranch.php";
        </script>
        <?php
      }
      
      
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
      /*.btn {
		  flex: 1 1 auto;
		  margin: 10px;
		  padding: 30px;
		  text-align: center;
		  text-transform: uppercase;
		  transition: 0.5s;
		  background-size: 200% auto;
		  color: white;
		  box-shadow: 0 0 20px #eee;
		  border-radius: 10px;
		 }
*/
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
    <title>Edit Branch Page</title>
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
    <a href="admin.php"><h4><-Go to Home Page</h4> </a>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h5>Add Branch</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        

                        <div class="form-group row">
                            <label for="branchname" class="col-md-4 col-form-label text-md-right">Branch Name:</label>

                            <div class="col-md-6">
                                <input id="branchname" type="text" class="form-control" name="branchname" placeholder ="Enter branch name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">Discount:</label>

                            <div class="col-md-6">
                                <input id="discount" type="number" step="any" class="form-control " name="discount" placeholder ="Enter discount">

                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Edit Discount
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php 
    $query = "SELECT * from branch";
    $result = mysqli_query($conn,$query);
  ?>
  <div class="container mt-4">
    <h5 class="text-left">Branch details:</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Branch Name</th>
          <th scope="col">Discount(%)</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i=0;
          while ($data = mysqli_fetch_assoc($result)) {
                $i++;      
        ?>
        <tr>
          <th scope="row"><?php echo $i;?></th>
          <td><?php echo $data['branch_name'];?></td>
          <td><?php echo $data['discount'];?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
</table>
  </div>
  <div class="mt-5" style="height: 20px;width: 100%"></div>
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