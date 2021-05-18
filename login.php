<?php 
    session_start();
    include_once('server.php'); 
    
    $logg = new DB_reg_log();

    if(isset($_POST['login_user'])){
        $username =$_POST['username'];
        $password = $_POST['password'];

        
        $result = $logg->login($username,$password);
        $row = mysqli_fetch_array($result);
        if($row > 0){
            
            $_SESSION['userlevel'] = $row['userLV'];
            $_SESSION['username']=$username;
            $_SESSION['success'] = "You are now logged in";
            
            if ($_SESSION['userlevel']== 'a') {
                echo "<script>alert('Hello admin.');</script>";
                echo "<script>window.location.href='admin_page.php'</script>";
                // header("Location: admin_page.php");
            }

            if ($_SESSION['userlevel'] == 'u') {
                echo "<script>alert('Hi $username . !!');</script>";
                echo "<script>window.location.href='index.php'</script>";
                // header("Location: index.php");
            }
            // header("location: index.php");
        }else{
            echo "<script>alert('Something went wrong! Please try again. !!');</script>";
            echo "<script>window.location.href='login.php'</script>";
            // header("location: login.php");
        }
    }


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <Link rel="stylesheet" href="css/styles.css">

   

    <!-- Site Metas -->
    
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
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>

                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    <div class="header1 ">
        <h2 class="font3"><strong>LOGIN</strong></h2>
    </div>
   
    <form action="login.php" method="post">
       
        <span class="input-group font2">
            <label for="username">Username</label><br>
        </span>
        <div class="input-group font2">
            <input type="text" name="username" required>
        </div>
        
        <span class="input-group font2">
            <label for="password">Password</label>
        </span>

        <div class="input-group font2">
            <input type="password" name="password" required>
        </div>
            
        <div class="input-group font2">
            <p><button type="submit" name="login_user" class="btn">Login</button></p>
        </div>
        
        <p class="font2">Don't have an account ? <a href="register.php">Sign Up</a></p>
    </form>
    

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

