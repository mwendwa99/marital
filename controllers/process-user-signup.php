<?php
    session_start();
    include "connect.php";

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
     && isset($_POST['pno']) && isset($_POST['password'])
     && isset($_POST['re_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $fname =validate( $_POST['fname']);
        $sname =validate( $_POST['lname']);
        $email =validate( $_POST['email']);
        $phone =validate( $_POST['pno']);
        $pass =validate( $_POST['password']);
        $re_pass =validate( $_POST['re_password']);

        $user_data = 'fname=' . $fname. '&lname='. $sname .'&email='. $email .'&pno='. $phone ;
        

        if( empty($fname) && empty($sname) && empty($email) && empty($phone) && empty($pass) && empty($re_pass) ){
            header("location: ../user/signup.php?error=fill all the spaces&$user_data");
            exit();

        }else if (empty($fname)){
            header("location: ../user/signup.php?error=first name Is Required&$user_data");
            exit();
        }else if (empty($sname)){
            header("location: ../user/signup.php?error=second name Is Required&$user_data");
            exit();
        }else if (empty($email)){
            header("location: ../user/signup.php?error=email Is Required&$user_data");
            exit();
        }else if (empty($phone)){
            header("location: ../user/signup.php?error=phone number Is Required&$user_data");
            exit();
        } else if (empty($pass)){
            header("location: ../user/signup.php?error=Password Is Required&$user_data");
            exit();
        } else if (empty($re_pass)){
            header("location: ../user/signup.php?error=repeat Password&$user_data");
            exit();
        } 
        else if ($pass !== $re_pass){
            header("location: ../user/signup.php?error=the confirmation password does not match&$user_data");
            exit();
        } 
        else {
            //hashing the password

            

                $sql = "SELECT * FROM user WHERE email='$email'";
                $result = mysqli_query($connection , $sql);
            
                if(mysqli_num_rows($result) > 0){
                    header("location: ../user/signup.php?error=email is already taken&$user_data");
            exit();
                }else{
                       $password = md5($pass);
                       $sql2 = "INSERT INTO user(fname, lname, email, phone , password) VALUES('$fname', '$sname', '$email', '$phone', '$password' )";
                       $result2 = mysqli_query($connection , $sql2);
                       if($result2){
                           header("location: ../user/login.php?success=your account has been created: login to your account");
                        exit();

                       }else{
                        header("location: ../user/signup.php?error=unknownerror has occured&$user_data");
                        exit();

                       }
                }
 
        }

    }
    else{
        header("location: ../user/signup.php?error");
        exit();
    }
?>