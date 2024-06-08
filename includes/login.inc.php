<?php

if (isset($_POST['login-submit'])) {

    require_once "../Model/Data/UserDAO.php";
    //require 'dbh.inc.php';

    $userDAO = new UserDAO();
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];




    if (empty($mailuid) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $user = $userDAO->getUserByUsername($mailuid);
        $row = $user[0];

        session_start();
        $_SESSION['userId'] = $row['idUsers'];
        $_SESSION['userUid'] = $row['uidUsers'];
        $_SESSION['userLevel'] = $row['userLevel'];
        $_SESSION['emailUsers'] = $row['emailUsers'];
        $_SESSION['f_name'] = $row['f_name'];
        $_SESSION['l_name'] = $row['l_name'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['headline'] = $row['headline'];
        $_SESSION['bio'] = $row['bio'];
        $_SESSION['userImg'] = $row['userImg'];
        $_SESSION['coverImg'] = $row['coverImg'];





        header("Location: ../index.php?login=success");
        exit();

        /*if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result))
            {  
                
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false)
                {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['userLevel'] = $row['userLevel'];
                    $_SESSION['emailUsers'] = $row['emailUsers'];
                    $_SESSION['f_name'] = $row['f_name'];
                    $_SESSION['l_name'] = $row['l_name'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['headline'] = $row['headline'];
                    $_SESSION['bio'] = $row['bio'];
                    $_SESSION['userImg'] = $row['userImg'];
                    $_SESSION['coverImg'] = $row['coverImg'];
                    
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else
                {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
    
}
 else 
{
    header("Location: ../login.php");
    exit();*/
    }
}
