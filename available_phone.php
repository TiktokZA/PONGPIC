<?php
    include('server.php');
    
    $usernamecheck = new DB_reg_log();

    $phone = $_POST['phone'];
   
    $checkphone_number = $usernamecheck->phoneavaliable($phone);
  
    $num1 = mysqli_num_rows($checkphone_number);
  

    if($num1 > 0 ){
        echo "<span style='color: red;'>Phone number already associted with another account. </span> ";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<span style='color: green;'>Phone number available for registration. </span> ";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
    

?>