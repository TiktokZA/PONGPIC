<?php 
    include('server.php'); 
 
    $connect =new DB_con();
    $regis = new DB_reg_log();

    if(isset($_POST['reg_user'])){

        $username1 = $_POST['username'];
        $name = $_POST['name'];
        $email1 =  $_POST['email'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone'];
        $password1 = $_POST['password1'];
        $password2 =  $_POST['password2'];
 
            
        $result = $regis->registration($username1,$name,$email1,$address,$phone_number,$password1,$password2);

        $_SESSION['username']=$username1;
        // $_SESSION['success']="You are now logged in";
        
        if($result){
            echo "<script>alert('register Successful!!');</script> ";
            echo "<script>window.location.href='login.php'</script>";
            
        }else{
            // echo"<script>alert('The two password do not match Pleasr try again!!');</script> ";
            echo"<script>window.location.href='register.php'</script>";
            
        }
    
      
    }
?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <Link rel="stylesheet" href="css/styles.css">

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
    
    <div class="header1 ">
        <h2 class="font3"><strong>Register</strong></h2>
    </div>
    <form action="register.php" method="post">
        
        <span class="input-group font2">
            <label for="username">Username</label>
        </span>
        <div class="input-group font2">
            <input type="text" name="username"  placeholder="Please enter your username"  onblur = "checkusername(this.value)" required >
        </div>
        <span id="usernameavailable"></span>
        <span class="input-group font2">
            <label for="name">Name</label></label>
        </span>
        <div class="input-group font2">
            <input type="name" name="name"  placeholder="Please enter your name"  required>
        </div>
        <span class="input-group font2">
            <label for="email">E-mail</label>
            
        </span>
        <div class="input-group font2">
            <input type="email" name="email"  placeholder="example@email.com" onblur = "checkemail(this.value)" required>
        </div>
        <span id="emailavailable"></span>
        <span class="input-group font2">
            <label for="address">Address</label>
            
        </span>
        <div class="input-group font2">
            <input type="address" name="address"  placeholder="Please enter your address " required>
        </div>
        <span class="input-group font2">
            <label for="phone_number">Phone number</label>
            
        </span>
        <div class="input-group font2">
            <input type="tel" name="phone" placeholder="Please enter your phone number" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) onblur = "checkphone(this.value)" required>
        </div>
        <span id="phoneavailable"></span>
        <span class="input-group font2">
            <label for="password1">Password</label>
            
        </span>
        <div class="input-group font2">
            <input type="password" name="password1" placeholder="Please enter your password" required>
        </div>
        <span class="input-group font2">
            <label for="password2">Confirm Password</label>
        </span>
        <div class="input-group font2">
            <input type="password" name="password2" placeholder="Please enter your confirm password" required>
        </div>
        <div class="input-group font2">
            <button type="submit" name="reg_user" id="submit" class="btn">Register</button>
        </div>
        <p class="font2">Already a member? <a href="login.php">Sign in</a></p>
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

    <script src= "https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script>
        function checkusername(val){
            $.ajax({
                type: 'POST',
                url: 'available_username.php',
                data: 'username='+val,
                success: function(data){
                    $('#usernameavailable').html(data);
                }
            });
        }
        function checkemail(val){
            $.ajax({
                type: 'POST',
                url: 'available_email.php',
                data: 'email='+val,
                success: function(data){
                    $('#emailavailable').html(data);
                }
            });
        }
        function checkphone(val){
            $.ajax({
                type: 'POST',
                url: 'available_phone.php',
                data: 'phone='+val,
                success: function(data){
                    $('#phoneavailable').html(data);
                }
            });
        }
        
        
    </script>
    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>