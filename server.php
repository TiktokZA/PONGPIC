<?php

        
    define('db_server','localhost');
    define('db_user','root');
    define('db_pass','');
    define('db_name','db_register');
    
    class DB_con {
        public $conn;
        function __construct(){

            $this->conn = mysqli_connect(db_server,db_user,db_pass,db_name);
            

            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL:" . mysqli_connect_error();
            }
            // else{
            //     echo "Success!!";
            // }
        }
      
    }

    class Tables extends DB_con{
        public function getdata(){
            $result = mysqli_query($this->conn,"SELECT * FROM boking");
            return  $result;
        }
    }

    class DB_reg_log extends DB_con {
        
        public function usernameavaliable($username){
            $checkuser = mysqli_query($this->conn,"SELECT username FROM users WHERE username = '$username'");
            return  $checkuser;
        }
        public function emailavaliable($email){
            $checkuser = mysqli_query($this->conn,"SELECT email FROM users WHERE email = '$email'");
            return  $checkuser;
        }
        public function phoneavaliable($phone){
            $checkuser = mysqli_query($this->conn,"SELECT phone_number FROM users WHERE phone_number = '$phone'");
            return  $checkuser;
        }
       

        public function registration($username,$name,$email,$address,$phone_number,$password1,$password2){
            
            if($password1 != $password2){
                echo"<script>alert('The two password do not match Pleasr try again!!');</script> ";
                return false;
            }else{
               
                $update=mysqli_query($this->conn,"INSERT INTO users (username,pasword,name,email,address,phone_number,userLV) VALUES('$username','$password1','$name','$email','$address','$phone_number','u')"); 
                return true;
            }
            
        }

        public function login($username,$password){
            
            $log =mysqli_query($this->conn,"SELECT * FROM users WHERE username = '$username' AND pasword = '$password'");
            return $log;
        }
        
    }

    class Admin extends DB_reg_log{
        public function Check($id){
            $result =mysqli_query($this->conn,"SELECT * FROM boking WHERE id ='$id'");
            return $result;
        }
        public function Update($name,$phone,$date,$timest,$timefi,$type,$location,$status,$anything,$userid){
            
            $sql ="UPDATE boking SET name='$name',phone='$phone',date='$date',timestart='$timest',timeend='$timefi',Type='$type',location='$location',anyting='$anything',status='$status' WHERE id='$userid'";
            $result = mysqli_query($this->conn,$sql);
            return $result;
            
        }
        public function Delete($id){
            $sql="DELETE FROM boking WHERE id='$id'";
            $result = mysqli_query($this->conn,$sql);
            return $result;
        }
        public function Creat($name,$phone,$date,$timest,$timefi,$type,$location,$status,$anything,$fileim,$tmpimg){
            if(move_uploaded_file($tmpimg, $fileim)){

                $sql ="INSERT INTO boking (name,phone,date,timestart,timeend,Type,location,anyting,image,status) 
                    VALUES('$name','$phone','$date','$timest','$timefi','$type','$location','$anything',?,'$status')";
                
                $stmt = mysqli_prepare($this->conn, $sql);
                mysqli_stmt_bind_param($stmt,"s",$fileim);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_query($this->conn,$sql);
                    return true;
                    
                }else{
                    return false;
                }
            }
            else{
                return false;
                
            }
        }
    }

    class User extends DB_reg_log{
        public function checkbooking($name,$phone){
            
            $result = mysqli_query($this->conn,"SELECT * FROM boking WHERE name ='$name' OR phone='$phone' ");
            return $result;
        }
        public function updatebooking($name,$phone,$date,$timestart,$timeend,$type,$location,$anyting,$fileim,$tmpimg){

            if(move_uploaded_file($tmpimg, $fileim)){

                $sql ="INSERT INTO boking (name,phone,date,timestart,timeend,Type,location,anyting,image,status) 
                    VALUES('$name','$phone','$date','$timestart','$timeend','$type','$location','$anyting',?,'W')";
                
                $stmt =mysqli_prepare($this->conn, $sql);
                mysqli_stmt_bind_param($stmt,"s",$fileim);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_query($this->conn,$sql);
                    return true;
                    
                }else{
                    return false;
                }
            }
            else{
                return false;
                
            }
        }
    }


?>