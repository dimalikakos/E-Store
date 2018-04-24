<?php

include 'db.php';
if(isset($_POST['login'])){
        $errMsg = '';
        $try_email = trim($_POST['username']);
        $try_password = trim($_POST['password']);


        if($try_email == '')
            $errMsg .= 'You must enter your Username<br>';

        if($try_password == '')
            $errMsg .= 'You must enter your Password<br>';
        if($errMsg == '') {
            try {
                $stmt = $db->prepare('SELECT email,password,fullname,id, isAdmin
                                      FROM  users
                                      WHERE email = ? AND password= ?');


                $stmt->bindParam(1, $try_email);
                $stmt->bindParam(2, $try_password);
                $stmt->execute();

                $count = $stmt->rowCount();
                if ($count > 0) {
                    session_start();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['email'] = $user['email'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['isAdmin'] = $user['isAdmin'];
                    $_SESSION['currentUserID'] = $user['id'];
                    $_SESSION['cart'] = array();


                    header("location: index.php?page=loginmessage");


                }else{
                    $errMsg .= 'Username OR Password are not found<br>';
                }

            } catch (PDOException $e) {
                echo "query error.." . $e;
            }

        }
}
