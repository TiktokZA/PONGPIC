<?php
    session_start();
    include('server.php');
    $pay = new User();

    if(isset($_POST['submit_user'])){
        
        $name =$_SESSION['name'];
        $phone = $_SESSION['phone'];
        $date = $_SESSION['date'];
        $timestart =$_SESSION['timestart'];
        $timeend =$_SESSION['timeend'];
        $type = $_SESSION['type'];
        $location =$_SESSION['location'];
        $anyting = $_SESSION['any'];
        $img=$_FILES['file_img']['name'];
        $typemg=$_FILES['file_img']['type'];
        $size=$_FILES['file_img']['size'];
        $tmpimg=$_FILES['file_img']['tmp_name'];

        $path = "uploadimage/";
        $fileim = $path.basename($_FILES["file_img"]["name"]);

        $result = $pay->updatebooking($name,$phone,$date,$timestart,$timeend,$type,$location,$anyting,$fileim,$tmpimg);

        if($result == true){
            echo "<script>alert('Your Payment  Suscess!!');</script>";
            echo "<script>window.location.href='index.php'</script>";
           
        }else{
            echo "<script>alert('Your Payment  failled. Please try again!!');</script>";
            echo "<script>window.location.href='payment.php'</script>";
        }

       
    }
?>