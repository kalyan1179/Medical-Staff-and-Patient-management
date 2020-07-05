<?php 

require 'connect.php';
session_start();
if($_SESSION['did']){
	if(isset($_POST['submit'])){
		$sdate = $_POST['sdate'];
		$edate = $_POST['edate'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    <li class="nav-item nav-link px-3"><a href="dlogout.php">Logout</a></li>
                </ul>   
            </div>
      </nav> 
    </header>
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h5>Period</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="">
                        

                        <div class="form-group row">
                            <label for="sdate" class="col-md-4 col-form-label text-md-right">Start Date:</label>

                            <div class="col-md-6">
                                <input id="sdate" type="date" class="form-control" name="sdate" placeholder ="Enter email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="edate" class="col-md-4 col-form-label text-md-right">End Date:</label>

                            <div class="col-md-6">
                                <input id="edate" type="date" class="form-control " name="edate" placeholder ="Enter Password">

                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Submit
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
	<div id="curve_chart" style="width: 900px; height: 500px"></div>
		
	</div>
</body>
</html>



<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Number Of Patients'],
          <?php

          	$query = "SELECT `date`,count(*) as c from bill where `date`>='$sdate' and `date`<='$edate' group by `date`";
          	$result = mysqli_query($conn,$query);
          	while($data = mysqli_fetch_assoc($result)){

          ?>
          ["<?php echo $data['date'];?>",  <?php echo $data['c'];?>,],
          	<?php 
          }
          	?>
          
        ]);

        var options = {
          title: "Patient's Appointments",
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        // chart.draw(data, google.charts.Line.convertOptions(options));
      }
    </script>
<?php

}
else{
	?>
	<script type="text/javascript">
		alert("Login first!");
		window.lcocation.href="dlogin.php";
	</script>
	<?php
}
?>