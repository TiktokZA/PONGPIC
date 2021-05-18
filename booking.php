<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="You must log in first";
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Link rel="stylesheet" href="css/stylesBK.css">

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
        font-size: 20px;
        
    }
    .font2 {
        font-family: title;
        font-size: 20px;


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
  <div class="header1 text-center font1">
      <h2>Booking Page</h2>
      <?php if(isset($_SESSION['username'])) : ?>
          
           <p><strong><?php echo $_SESSION['username'];?></strong></p>
            
           <p><a href="index.php?logout='1'" style="coloe: red;"> Logout </a></p>
      <?php endif;?>
  </div>

<form action="booking_db.php" method="post">
  <div class="font2 text-center">
    <center><p>** เงื่อนไขการจอง **</p></center>
    <p>1. โปรดโอนเงินค่ามัดจำก่อน 50% ของราคาจ้าง</p>
    <p>2. สามารถเลื่อนหรือยกเลิกการจองได้ภายใน 30 วัน</p>
    <P>3. เมื่อยกเลิกการจองทางเราจะไม่คืนเงินมัดจำทุกกรณี</P>
    <P>4. ชำระเงินส่วนที่เหลือเต็มจำนวนในวันงาน</P>
    <p>******************************************************</p>
  </div>
  <hr>
  
  <div class=" text-center">
  <div class="elem-group font2">
    <label for="name">Name  </label>
    <input type="text" id="name" name="visitor_name" placeholder="Please enter your name"  required>
  </div>
  <div class="elem-group font2">
    <label for="phone">Phone Number  </label>
    <input type="tel" id="phone" name="visitor_phone" placeholder="Please enter your number" required>
  </div>
  <div class="elem-group inlined font2">
    <label for="booking date">Date  </label>
    <input type="date" id="checkin-date" name="checkin" required>
  </div>
  <div class="elem-group inlined font2">
    <label for="booking time">Booking time(start:end)  </label>
    <input type="time" id="start time" name="Booking1" required>
    <input type="time" id="end time" name="Booking2" required>
  </div>
  
  <div class="elem-group font2">
    <label for="room-selection">Select Type   </label>
    <select id="room-selection" name="tpye_preference" required>
        <option value="">Choose a Type from the List</option>
	    <option value="Take picture">Take picture [1,500 Bath]</option>
        <option value="Small team 2000">Small team [2,000 Bath]</option>
        <option value="Middle team 3000">Middle team [3,000 Bath] </option>
        <option value="Extra team 12000">Extra team [12,000 Bath]</option>
    </select>
  </div>

  <div class="elem-group font2">
    <label for="message">Location </label><br>
    <textarea id="message" name="vitisor_message1" placeholder="Please enter your location" required></textarea>
  </div>
  
  <div class="elem-group font2">
    <label for="message">Comment</label><br>
    <textarea id="message" name="visitor_message2" placeholder="Please enter your Comment" required></textarea>
  </div>
  <button type="submit" name="booking_user" class="btn font2">Confirm Booking</button>
  </div>
  
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