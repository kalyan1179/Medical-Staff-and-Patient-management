<?php
	require 'connect.php';
	session_start();
	if(isset($_SESSION['sid'])){
		$sid = $_SESSION['sid'];
		$query = "SELECT * from staff where staff_id = '$sid'";
		$sresult = mysqli_query($conn,$query);
		$sdata = mysqli_fetch_assoc($sresult);
		$bn = $sdata['branch_name'];

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
</head>
<body>
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
	
<div class="container-sm">
<h4 class="mt-5">Patient details in <?php echo $bn;?> branch:</h4>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">S.no</th>
			<th scope="col">Name</th>
			<th scope="col">Age</th>
			<th scope="col">Phone Number</th>
			<!-- <th scope="col">Appointment Date</th> -->
			<th scope="col">Billing Details</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$bn = $sdata['branch_name'];
		$i=0;
		$query = "SELECT * from `patient` where branch_name='$bn'";
		$result = mysqli_query($conn,$query);
		while($data = mysqli_fetch_assoc($result)){
			$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $data['name'];?></td>
			<td><?php echo $data['age'];?></td>
			<td><?php echo $data['phone_number'];?></td>
			<!-- <td><?php echo $data['date'];?></td> -->
			<td><a href="billing.php?id=<?php echo $data['patient_id'];?>"><button class="btn btn-primary">Add/View</button></a></td>
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
