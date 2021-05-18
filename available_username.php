<?php
    include('server.php');
    
    $usernamecheck = new DB_reg_log();

    $uname = $_POST['username'];
   
    $checkusername = $usernamecheck->usernameavaliable($uname);
  
    $num1 = mysqli_num_rows($checkusername);
  

    if($num1 > 0 ){
        echo "<span style='color: red;'>Username already associted with another account. </span> ";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<span style='color: green;'>Username available for registration. </span> ";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
    

?>