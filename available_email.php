<?php
    include('server.php');
    
    $usernamecheck = new DB_reg_log();

    $email = $_POST['email'];
   
    $checkusername = $usernamecheck->emailavaliable($email);
  
    $num1 = mysqli_num_rows($checkusername);
  

    if($num1 > 0 ){
        echo "<span style='color: red;'>Email already associted with another account. </span> ";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo "<span style='color: green;'>Email available for registration. </span> ";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
    

?>