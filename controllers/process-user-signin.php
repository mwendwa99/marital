<?php
    session_start();
    include "connect.php";

    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email =validate( $_POST['email']);
        $pass =md5( $_POST['password']);

        if( empty($email) && empty($pass) ){
            header("location: ../user/login.php?error=Username and Password Are Required");
            exit();

        }else if (empty($email)){
            header("location: ../user/login.php?error=email Is Required");
            exit();
        } else if (empty($pass)){
            header("location: ../user/login.php?error=Password Is Required");
            exit();
        } 
        else {
           
            $sql = "SELECT * FROM user WHERE email = '$email' AND password ='$pass'";

            $result = mysqli_query($connection , $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);

                if ($row['email'] === $email && $row['password'] === $pass){
                    $_SESSION['user_id']= $row['id'];
                    $_SESSION['Fname']= $row['fname'];
                    $_SESSION['Lname']= $row['lname'];
                    $_SESSION['email'] = $row['email'];                  
                    $_SESSION['pno']= $row['phone'];                  
                    header("location: ../user/dashboard.php");
                      exit();
                }else{
                    header("location: ../user/login.php?error=Username or Password Is Wrong");
                exit();
                }

            }else{
                header("location: ../user/login.php?error=Username or Password Is Wrong");
            exit();
            }
        }

    }
    else{
        header("location: ../user/login.php?error");
        exit();
    }
?>