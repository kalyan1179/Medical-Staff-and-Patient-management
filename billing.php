<?php
	require 'connect.php';
	session_start();
	if(isset($_SESSION['sid'])){
		
	$sid = $_SESSION['sid'];
  $query="SELECT * from staff where staff_id = '$sid'";
  $sresult = mysqli_query($conn,$query);
  $staffdata = mysqli_fetch_assoc($sresult);
  $branch = $staffdata['branch_name'];
  $query = "SELECT * from branch where branch_name='$branch'";
  $sresult = mysqli_query($conn,$query);
  $sdata = mysqli_fetch_assoc($sresult);
  $discount = $sdata['discount'];
	if(isset($_POST['submit'])){
		$cost = $_POST['cost'];
    $date = date("Y-m-d");
    if(isset($_GET['id'])){

    $idn = $_GET['id'];
    }
    $query = "INSERT INTO `bill`( `id`, `cost`, `date`,`discount`) VALUES ('$idn','$cost','$date','$discount')";
    mysqli_query($conn,$query);
    ?>
    <script type="text/javascript">
      // window.location.reload();
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

     /*#details-table td,th,tr th,table{
      border: 1px solid black;
     }*/

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
    <title>Admin Login Page</title>
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
                    <li class="nav-item nav-link px-3"><a href="slogout.php">Logout</a></li>
                    <li class="nav-item nav-link px-3"><a href="http://donate.therenalproject.com/" target="_blank" class="theme_btn">Payments</a></li>
                </ul>   
            </div>
      </nav> 
    </header>
    <div class="container mt-5">
    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                	<h5>Add Dialysis Cost</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        

                        <div class="form-group row">
                            <label for="cost" class="col-md-4 col-form-label text-md-right">Amount:</label>

                            <div class="col-md-6">
                                <input id="cost" type="number" class="form-control" name="cost" placeholder ="Enter amount" required autocomplete="email" >
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button name="submit" type="submit" class="btn btn-primary">
                                    Add to bill
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
          if(isset($_GET['id'])){
            $idn = $_GET['id'];
          }
          $q = "select * from `patient` where patient_id = '$idn'";
          $r = mysqli_query($conn,$q);
          $d = mysqli_fetch_assoc($r);
        ?>
        <div class="col-md-6" id="details-table">
          <table class="table table-light" style="border: 1px solid black">
            <tr>
              <th colspan="2" class="text-center" style="border: 1px solid black">Patient details</th>
            </tr>
            <tr>
              <th style="border: 1px solid black">Name</th>
              <td style="border: 1px solid black"><?php echo $d['name'];?></td>
            </tr>
            <tr>
              <th style="border: 1px solid black">Age</th>
              <td style="border: 1px solid black"><?php echo $d['age'];?></td>
            </tr>
            <tr>
              <th style="border: 1px solid black">Phone Number</th>
              <td style="border: 1px solid black"><?php echo $d['phone_number'];?></td>
            </tr>
            <tr>
              <th style="border: 1px solid black">Branch</th>
              <td style="border: 1px solid black"><?php echo $d['branch_name'];?></td>
            </tr>
          </table>
        </div>
    </div>
</div>

<div class="container-sm mt-5">
  <h4>Billing Details:</h4>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">S.no</th>
        <th scope="col">Date</th>
        <th scope="col">Amount</th>
        <th scope="col">Discount(%)</th>
        <th scope="col">Discount Amount</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_GET['id'])){
          $idn = $_GET['id'];
        }
        $query = "SELECT * from bill where id = '$idn'";
        $result = mysqli_query($conn,$query);
        $i=0;
        while($data = mysqli_fetch_assoc($result)){
          $i++;
          $da = ($data['discount']*$data['cost'])/100;
          $a = $data['cost']-$da;
      ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['date'];?></td>
        <td><?php echo $data['cost'];?></td>
        <td><?php echo $data['discount'];?></td>
        <td><?php echo "-".$da;?></td>
        <td><?php echo $a;?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
<div class="container-sm mt-5">
  <h4>Billing Details:</h4>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">S.no</th>
        <th scope="col">Date</th>
        <th scope="col">Discount(%)</th>
        <th scope="col-4">Details</th>
        <th scope="col-4">Details</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_GET['id'])){
          $idn = $_GET['id'];
        }
        $query = "SELECT * from bill where id = '$idn'";
        $result = mysqli_query($conn,$query);
        $i=0;
        while($data = mysqli_fetch_assoc($result)){
          $i++;
          $da = ($data['discount']*$data['cost'])/100;
          $a = $data['cost']-$da;
      ?>
      <tr>
        <td rowspan="4" style="border: 1px solid black"><?php echo $i;?></td>
        <td rowspan="4" style="border: 1px solid black"><?php echo $data['date'];?></td>
        <td rowspan="4" style="border: 1px solid black"><?php echo $data['discount'];?></td>

        <tr>
          <td rowspan="1" style="border: 1px solid black">Dialysis Cost</td>
          <td rowspan="1" style="border: 1px solid black"><?php echo $data['cost'];?></td> 
          <td rowspan="4" style="border: 1px solid black"><?php echo $a;?></td>
        </tr>
        <tr>
          <td rowspan="1" style="border: 1px solid black">Discount</td>
          <td style="border: 1px solid black">-<?php echo $da;?></td>
        </tr>
        
        <tr>
          <td rowspan="1" style="border: 1px solid black">Total cost</td>

          <td style="border: 1px solid black"><?php echo $a;?></td>
        </tr>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
<div class="mt-5" style="height: 20px;"></div>
    </body>
</html>






<?php
}
else{
  ?>
  <script type="text/javascript">
    alert("Login First!");
    window.location.href="slogin.php";
  </script>
  <?php
}
?>
