<?php
   if(isset($_POST['signin'])) {
       $email = $_POST['email'];
       $psw = $_POST['psw'];

        require "../connect.php";
        require "validateData.php";
        echo "<script>alert('I am on signin');</script>";
        $sql = "select * from `lb_users` where `usr_email`='$email' and `usr_psw`='$psw'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            mysqli_close($conn);
            $_SESSION['lb_email'] = $email;
            $_SESSION['lb_psw'] = $psw;

            header("location: stu_community.php");
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
   }
?>