<?php
    include('server.php');
    $TB = new Tables(); 
?>
<?php
    session_start();
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }
?>


<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Pong Pic Stuido</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="styleC.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    
    <link href='fullcelendar/main.css' rel='stylesheet' />
    <script src='fullcelendar/main.js'></script>
    

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  </head>
  
  <style>
    @font-face {
        font-family: title;
        src: url('fonts/supermarket.ttf');
    }
    
    .font1 {
        font-family: title;
        font-size: 12px;
    }
    .font2 {
        font-family: title;
        font-size: 20px;
    }
    .font3 {
        font-family: title;
        font-size: 40px;
    }
    .font4 {
        font-family: title;
        font-size: 25px;
    }
</style>
  <body>
    <!-- Start header -->
    <header class="top-navbar">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="  images/logohome6.png" width="220" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
                <div class="collapse navbar-collapse font1" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Aboutus.php">About Us</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Photo </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="Event.php">Event </a>
                                <a class="dropdown-item" href="Orination.php">Orination </a>
                                <a class="dropdown-item" href="Nurse.php">Nurse </a>
                                <a class="dropdown-item" href="Graduation.php">Graduation </a>
                                <a class="dropdown-item" href="profile.php">Profile</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="Video.php">Video</a></li>
                        <li class="nav-item"><a class="nav-link" href="calender.php">Table</a></li>
                        <?php if(isset($_SESSION['userlevel'])) { 
                            if($_SESSION['userlevel']=='a'){

                            
                        ?>
                            <li class="nav-item"><a class="nav-link" href="admin_page.php">Admin Edit</a></li>
                        

                        <?php 
                            }
                            else{
                        ?>
                            <li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
                        <?php
                                  
                            }
                        }
                        else {
                        ?>
                            
                            <li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
                        <?php    
                        }
                        ?>
                        

                        <?php if(isset($_SESSION['username'])) { ?>
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><?php echo $_SESSION['username'];?> </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                    <a class="dropdown-item" href="index.php?logout='1'">Logout </a>
                                    
                                </div>
                            </li>
                        
                        <?php 
                            }
                            else{
                                ?>
                                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <?php    
                            }
                        ?>


                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    <div class="text-center font4">
        <p>**Note : P = [Pass], W = [Wait], C = [Cancel]**&nbsp;&nbsp;&nbsp;</p>
    </div>
    <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Date</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Type</th>
								<th class="column100 column4" data-column="column4">Status</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            
                            
                            if($result=$TB->getdata()){
                                while($row =mysqli_fetch_array($result)){

                        ?>  
                            <tr>
                          
                                <tr class="row100">
								<td class="column100 column1" data-column="column1"><?php echo $row['date'];?> : <?php echo $row['timestart'];?> - <?php echo $row['timeend'];?></td>
								<td class="column100 column2" data-column="column2"><?php echo $row['name'];?></td>
								<td class="column100 column3" data-column="column3"><?php echo $row['Type'];?></td>
								<td class="column100 column4" data-column="column4"><?php echo $row['status'];?></td>
                                
							</tr>
                            
                            <?php
                                }
                            }
                        ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    
    
  </body>
  <!-- Footer -->
  <footer class="py-4 bg-dark height-10">
        <div class="container font1 ">
            <p class="m-1 text-center">
                <a href="https://www.facebook.com/PongsatonPicture/"><img src="images/icon1.png" width="50" height="50" alt=""></a>
                <a href="https://www.instagram.com/pongspic/"><img src="images/icon2.png" width="50" height="50" alt=""></a>
                <a href="https://line.me/th/"><img src="images/icon3.png" width="50" height="50" alt=""></a>
                <a href="https://www.youtube.com/channel/UCS8-svSO2XT5LQGzco6PTXw"><img src="images/icon4.png" width="50" height="50" alt=""></a>
            </p>
            <p class="m-0 text-center text-white font2">E-mail: sjpongswork101@gmail.com</p>
            <p class="m-1 text-center text-white">Copyright @2021 PongsPic Production, System analysis and design Department of Computer and Information Science KMUTNB. All rights reserved.</p>
        </div>
    </footer>
  
</html>