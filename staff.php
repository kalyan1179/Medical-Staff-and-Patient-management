<?php
	require 'connect.php';
	session_start();
	if(isset($_SESSION['sid'])){
		$sid = $_SESSION['sid'];
		$query = "SELECT * from staff where staff_id = '$sid'";
		$sresult = mysqli_query($conn,$query);
		$sdata = mysqli_fetch_assoc($sresult);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$phno = $_POST['phonenumber'];
			$age = $_POST['Age'];
			$branchname=$_POST['branchname'];
			// $cost = $_POST['Amount'];
			$query = "SELECT * from `patient` where name='$name' and phone_number='$phno' and age='$age";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0){
				?>
				<script type="text/javascript">
					alert("Patient already exits!");
					window.location.href="staff.php";
				</script>
				<?php
			}
			$query = "INSERT INTO `patient`(`name`, `phone_number`, `age`, `branch_name`) VALUES ('$name','$phno','$age','$branchname')";
			mysqli_query($conn,$query);
			// sleep(5);
			?>
			<script type="text/javascript">
				window.location.href="staff.php";

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
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Staff Home Page</title>
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
                    <li class="nav-item nav-link px-3"><a href="http://donate.therenalproject.com/" target="_blank" class="theme_btn">Payments</a></li>
                    <li class="nav-item nav-link px-3"><a href="slogout.php">Logout</a></li>
                </ul>   
            </div>
      </nav> 
    </header>
    
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h5 class="float-left">Add Patient</h5>
                	<button class="btn btn-primary float-right" onclick="script()">View Patient details</button>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Patient Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder ="Enter Patient's name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone Number:</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="tel" pattern="[6-9]{1}[0-9]{9}" class="form-control" name="phonenumber" placeholder ="Enter Phone Number"> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Age" class="col-md-4 col-form-label text-md-right">Age:</label>

                            <div class="col-md-6">
                                <input id="Age" type="number" min='0' max="150" class="form-control" name="Age" placeholder ="Enter Phone Number" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branchname" class="col-md-4 col-form-label text-md-right">Branch Name:</label>

                            <div class="col-md-6">
                                <!-- <input id="branch" type="email" class="form-control" name="branch" placeholder ="Enter email" autofocus> -->
                                <select class="form-control" name="branchname" placeholder="Select Branch Name">
                                  <!-- <option value="none">Select Branch Name</option> -->
                                  <?php
                                    
                                      $bn = $sdata['branch_name'];
                                      echo ' <option value="'.$bn.'">'.$bn.'</option>';
                                    
                                  ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Appointment Date:</label>

                            <div class="col-md-6">
                                <?php
                                	echo '<input id="date" min="'.date("Y-m-d").'" type="date" class="form-control " name="date" placeholder ="Enter Password">';
                                ?>

                                
                            </div>
                        </div>
 -->
                        <!-- <div class="form-group row">
                            <label for="Amount" class="col-md-4 col-form-label text-md-right">Amount:</label>

                            <div class="col-md-6">
                                <input id="Amount" type="number" class="form-control" name="Amount" placeholder ="Enter Appointment Cost" >
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Add Patient 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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



<script type="text/javascript">
	function script(){
		window.location.href="patientdetails.php";
	}
</script>