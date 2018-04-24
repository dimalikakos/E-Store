<?php
if(isset($_POST['signUp'])) {
    $semail = trim($_POST['newEmail']);
    $spass = trim($_POST['newPass']);
    $spass2 = trim($_POST['newPass2']);
    $sfullname = trim($_POST['newFullname']);

    if($sfullname=="") {
        $error[] = "Please provide your full name!";
    }
    else if($spass!=$spass2) {
        $error[] = "Passwords do not match. Please try again.";
    }
    else if($spass=="") {
        $error[] = "Please provide a password.";
    }
    else if(strlen($spass) < 6){
        $error[] = "Password must be at least 6 characters";
    } else {
        try {
            $stmt2 = $db->prepare("SELECT email FROM users WHERE email=?");

            $stmt2->bindParam(1, $semail);
            $stmt2->execute();

            $count2 = $stmt2->rowCount();
            if ($count2 > 0) {
                $error[] = "Username already taken.";
            } else {
                $stmt = $db->prepare("INSERT INTO dimitris_demo.users(fullname,email,password)
                                                   VALUES(?, ?, ?)");

                $stmt->bindparam(1, $sfullname);
                $stmt->bindparam(2, $semail);
                $stmt->bindparam(3, $spass);
                $stmt->execute();
                header("location: index.php?page=signupmessage");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
