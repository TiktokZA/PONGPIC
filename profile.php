<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">


    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
</style>

<body class="host_version" bgcolor="#f3dbb7">

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
                        <li class="nav-item"><a class="nav-link" href="calender.php">Tables</a></li>
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
    <!----------------------------------ส่วนตรงกลางงงงง------------------------------------>
    <p class="m-1 text-center text-black font3">PROFILE</p>
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p1.jpg"></a><img src="images/p1.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p13.jpg"><img src="images/p13.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p3.jpg"><img src="images/p3.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p4.jpg"><img src="images/p4.jpg" width="350" height="250" alt=""></a></button>
    </button>
    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p5.jpg"><img src="images/p5.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p6.jpg"><img src="images/p6.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p7.jpg"><img src="images/p7.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p8.jpg"><img src="images/p8.jpg" width="350" height="250" alt=""></a></button>
    </button>
    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p9.jpg"><img src="images/p9.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p10.jpg"><img src="images/p10.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p11.jpg"><img src="images/p11.jpg" width="350" height="250" alt=""></a></button>
    </button>
    &nbsp;&nbsp;
    <button>
        <a href="file:///D:/sa/photo/images/p12.jpg"><img src="images/p12.jpg" width="350" height="250" alt=""></a></button>
    </button>
    <br><br>
    <!--------------------------------จบส่วนกลาง------------------------------  -->





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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>