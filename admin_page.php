<?php
    session_start();
    include('server.php');
    $adm = new Admin();
    $name ='';
    $phone ='';
    $date ='';
    $timest ='';
    $timefi ='';
    $type ='';
    $location ='';
    $status ='';
    $anyting ='';
    $update=false;
    $userid = 0;
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="You must log in first";
        header('location: login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }
    if(isset($_POST['save'])){
        $name =$_POST['name'];
        $phone =$_POST['phone'];
        $date =$_POST['date'];
        $timest =$_POST['timestart'];
        $timefi =$_POST['timefinish'];
        $type =$_POST['type'];
        $location =$_POST['location'];
        $status =$_POST['status'];
        $anything =$_POST['anything'];

        $img=$_FILES['file_img']['name'];
        $typemg=$_FILES['file_img']['type'];
        $size=$_FILES['file_img']['size'];
        $tmpimg=$_FILES['file_img']['tmp_name'];
        $path = "uploadimage/";
        $fileim = $path.basename($img);

        $result = $adm->Creat($name,$phone,$date,$timest,$timefi,$type,$location,$status,$anything,$fileim,$tmpimg);

        if($result == true){
            echo "<script>alert('Your Creat  Suscess!!');</script>";
            echo "<script>window.location.href='admin_page.php'</script>";
           
        }else{
            echo "<script>alert('Your Creat  failled. Please try again!!');</script>";
            echo "<script>window.location.href='admin_page.php'</script>";
        }

    }
    if(isset($_GET['del'])){
        $userid=$_GET['del'];
        $adm->Delete($userid);
        header("location: admin_page.php");
    }

    if(isset($_GET['edit'])){
        $userid=$_GET['edit'];
        $result = $adm->Check($userid);
        $row = mysqli_fetch_array($result);
        if( $row > 0){
            $update=true;
            $name =$row['name'];
            $phone =$row['phone'];
            $date =$row['date'];
            $timest =$row['timestart'];
            $timefi =$row['timeend'];
            $type =$row['Type'];
            $location =$row['location'];
            $status =$row['status'];
            $anything =$row['anyting'];
        }

    }
    if(isset($_POST['update'])){
        $userid=$_POST['id'];
        $name =$_POST['name'];
        $phone =$_POST['phone'];
        $date =$_POST['date'];
        $timest =$_POST['timestart'];
        $timefi =$_POST['timefinish'];
        $type =$_POST['type'];
        $location =$_POST['location'];
        $status =$_POST['status'];
        $anything =$_POST['anything'];
        $update=false;
        $result = $adm->Update($name,$phone,$date,$timest,$timefi,$type,$location,$status,$anything,$userid);
        if($result){
            echo "<script>alert('Your Update  Suscess!!');</script>";
            echo "<script>window.location.href='admin_page.php'</script>";
        }
        else{
            echo "<script>alert('Your Update  failled. Please try again!!');</script>";
            echo "<script>window.location.href='admin_page.php'</script>";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <Link rel="stylesheet" href="stylesAD.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <Link rel="stylesheet" href="css/stylesAD.css">
    <Link rel="stylesheet" href="css/lightbox.min.css">

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
        font-size: 15px;


    }
    .font3 {
        font-family: title;
        font-size: 25px;
        
    }
    .font4 {
        font-family: title;
        font-size: 40px;
        
    }
</style>
<body>
    <?php require_once 'admin_page.php';?>
    <!-- Start header -->
    <header class="top-navbar">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="indexx.php">
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
    
    <center>
    <form action="admin_page.php" method="POST"  enctype="multipart/form-data">
    <!-- <div class="container"> -->
    <input type="hidden" name ="id" value="<?php echo $userid;?>">
    <div class="  text-center font2 m-1" >
        <!-- notification message -->
        

        <!-- logged in user information -->

        <?php if(isset($_SESSION['username'])) : ?>
           <div class="font3">
            <strong>ADMIN :</strong> &nbsp;<?php echo $_SESSION['username'];?>  </div>
           <p><a href="index.php?logout='1'" style="coloe: red;">Logout</a></p>
        <?php endif;?>
    </div>
    
    <h1 class="mt-5 font4 text-center"><strong>Information Page<strong></h1>
    <br>
    
    <div class="row justify-content-center">
    <table class="table  font2" enctype="multipart/form-data">
        <thead>
            <th>#ID</th>
            <th>name</th>
            <th>phone</th>
            <th>date</th>
            <th>timestart</th>
            <th>timeend</th>
            <th>Type</th>
            <th>location</th>
            <th>anyting</th>
            <th>status</th>
            <th>Image</th
            
        </thead>
        <tbody class=" font2">
            <?php
                
                
                $sql = "SELECT * FROM boking ";
                // $result=mysqli_query($conn,$sql)
                if($result=mysqli_query($adm->conn,$sql)){
                    while($row =mysqli_fetch_array($result)){

                
                

            ?>
                <tr>
                    <td></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['timestart'];?></td>
                    <td><?php echo $row['timeend'];?></td>
                    <td><?php echo $row['Type'];?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['anyting']; ?></td>
                    <td><?php echo $row['status'];?></td>
                    
                    <td>
                        <a href="<?php echo $row['Image']; ?>" data-lightbox="image-1" data-title="My caption">
                            <img src="<?php echo $row['Image']; ?>"  width="100px" height="100px">
                        </a>
                    </td>
                    
                    <td><a href="admin_page.php?del= <?php echo $row['id'];?>" class="btn1 btn-danger">delete</a></td>
                    <td><a href="admin_page.php?edit= <?php echo $row['id'];?>" class="btn1 btn-info">edit</a> </td>
                </tr>
                
            <?php
                    }
                }
            ?>
        </tbody>
        
    </table>
    <div class="form-group">
            <label>Name</label><br>
            <input type="text" name="name" class = "form-control" value="<?php echo $name; ?>" placeholder="Enter name" >
        </div>
        <div class="form-group">
            <label>Phone</label><br>
            <input type="text" name="phone" class = "form-control" value="<?php echo $phone; ?>" placeholder="Enter Phone" >
        </div>
        <div class="form-group">
            <label>Date</label><br>
            <input type="text" name="date" class = "form-control" value="<?php echo $date; ?>" placeholder="Enter Date" >
        </div>
        <div class="form-group">
            <label>Timestart</label><br>
            <input type="text" name="timestart" class = "form-control" value="<?php echo $timest; ?>" placeholder="Enter name" >
        </div>
        <div class="form-group">
            <label>Timefinish</label><br>
            <input type="text" name="timefinish" class = "form-control" value="<?php echo $timefi; ?>" placeholder="Enter timefinish" >
        </div>
        <div class="form-group">
            <label>Type</label><br>
            <input type="text" name="type" class = "form-control" value="<?php echo $type; ?>" placeholder="Enter type" >
        </div>
        <div class="form-group">
            <label>Location</label><br>
            <input type="text" name="location" class = "form-control" value="<?php echo $location; ?>" placeholder="Enter location" >
        </div>
        <div class="form-group">
            <label>Anything</label><br>
            <input type="text" name="anything" class = "form-control" value="<?php echo $anyting; ?>" placeholder="Enter anything" >
        </div>
        <div class="form-group">
            <label>Status</label><br>
            <input type="text" name="status" class = "form-control" value="<?php echo $status;?>" placeholder="Enter status" >
        </div>
        <div class="form-group">
            <label>Image</label><br>
            <input type="file" name="file_img" >
        </div>

        <?php
        if($update==true){
        ?>          
                
                <td><p><button type="submit" name="update" class="btn">UPDATE</button></p></td>
        <?php
        }else{  
        ?>      
                <td><p><button type="submit" name="save" class="btn">SAVE</button></p></td>
                
        <?php
        }
        ?>
    </div>
    </div>

    </form>
    </center>

    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>