<?php
    session_start();
    include('server.php');

    $book =new User();

    if(isset($_POST['booking_user'])){
        $name =$_POST['visitor_name'];
        $phone =$_POST['visitor_phone'];
        $date = $_POST['checkin'];
        $timestart =$_POST['Booking1'];
        $timeend = $_POST['Booking2'];
        $type =$_POST['tpye_preference'];
        $location = $_POST['vitisor_message1'];
        $anyting =$_POST['visitor_message2'];
        
        $check = $book->checkbooking($name,$phone);
        $result=mysqli_fetch_array($check);

        if($result > 0){
            echo "<script>alert('You already have a Booking. Want to continue booking?. ');</script>";
        }
        $_SESSION['name']=$name;
        $_SESSION['phone']=$phone;
        $_SESSION['date']=$date;
        $_SESSION['timestart']=$timestart;
        $_SESSION['timeend']=$timeend;
        $_SESSION['type']=$type;
        $_SESSION['location']=$location;
        $_SESSION['any']=$anyting;
        $_SESSION['status']='W';
        $_SESSION['success']="You are Booking Suscess!!";
        // header('location: payment.php');
        echo "<script>window.location.href='payment.php'</script>";
    }
?>