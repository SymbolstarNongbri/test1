<?php
    session_start();
    if(isset($_SESSION['lb_email']) && isset($_SESSION['lb_psw'])) {
        header("location: stu_community.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/stu_signup.css">
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/footer.css">

    <script src="../js/validateForms.js"></script>
    <title>LBuddy SignUp</title>
</head>
<body>
<div class="topnav" id="topnav">
    <div class="row">
        <div class="col-50">
            <a href="../home.php" class="topnav-btn"><i class=""></i>Home</a>
       </div>  
    </div>   
</div>

    <!-- <div class="bg-image"></div> -->
<div class="main">    
 <center>   
        <div class="signup-container">
            <div class="column left">
                <div class="slideshow-container">
                    <div class="mySlides fade">                
                        <img src="../Image/digitalMarketing2.jpg">
                    </div>

                    <div class="mySlides fade">
                        <img src="../Image/chemistry1.jpg">
                    </div>

                    <div class="mySlides fade">
                        <img src="../Image/mathematics3.jpg">
                    </div>
                </div>
            </div>

            <div class="column right">
            <img src="../Image/img_BrandLogo.png" alt="sFriends" style="float:right; width: 50px; height: 50px; margin:10px 5px 0;">
            <label style="float:right; padding:5px; margin-top:20px; font-family:cursive; color:whitesmoke;">LearnBuddy</label>    
            <h2 style="margin-left: 10px;">SignUp</h2>
               
                <hr>
                <div class="card-signup" >
                    <form name="frm-signup" method="POST" onsubmit="return validateSignup()">
                        <label for="name" style="float:left">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your Name">
                        <label for="email" style="float:left">Email</label>
                        <input type="text" name="email" id="email" placeholder="Your Email">
                        <label for="mob-no" style="float:left">Mobile Number</label>
                        <input type="text" name="mob-no" id="mob-no" placeholder="Your Phone Number">
                        <label for="psw" style="float:left">Password</label>
                        <input type="password" name="psw" id="psw" placeholder="Your password">
                        <label for="conf-psw" style="float:left">Confirm Password</label>
                        <input type="password" name="conf-psw" id="conf-psw" placeholder="Confirm your password">

                        <button type="submit" name="signup">Signup</button>
                    </form>
                    <center style="margin-top:5px;">
                        <label style="font-size: 15px; display:inline;">Already have account?</label>
                        <a href="stu_signin.php" class="signin" style="color:chocolate;">SignIn</a>
                    </center>
                </div>
            </div>
        </div>
</center>
</div>

<?php
    include("../layout/footer.php");
?>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            // for (i = 0; i < dots.length; i++) {
            //     dots[i].className = dots[i].className.replace(" active", "");
            // }
            
            slides[slideIndex-1].style.display = "block";  
            // dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }

</script>
</body>
</html>

<?php
    if(isset($_POST['signup'])) {
        require "../connect.php";
        require "validateData.php";

        $name = ""; $email = "";  $phoneNo = ""; $psw = ""; $confPsw = "";

        if(empty($_POST['name'])) {
            echo "<script>  alert('Name must be filled out!');
                document.forms['frm-signup']['name'].focus();  </script>";
        } else {
            $name = testInput($_POST['name']);
            if(empty($_POST['email'])) {
                echo "<script>  alert('Email must be filled out!');
                document.forms['frm-signup']['email'].focus();   </script>";
            } else {
                $email = testInput($_POST['email']);
                if(empty($_POST['mob-no'])) {
                    echo "<script>  alert('Phone Number must be filled out!');
                    document.forms['frm-signup']['mob-no'].focus();   </script>";
                } else {
                    $phoneNo = testInput(($_POST['mob-no']));
                    if(empty($_POST['psw'])) {
                        echo "<script>  alert('Password must be filled out!');
                        document.forms['frm-signup']['psw'].focus();   </script>";
                    } else {
                        $psw = testInput($_POST['psw']);
                        if(empty($_POST['conf-psw'])) {
                            echo "<script>  alert('Confirm Password must be filled out!');
                            document.forms['frm-signup']['conf-psw'].focus();   </script>";
                        } else {
                            $confPsw = testInput($_POST['conf-psw']);
                            if($confPsw != $psw) {
                                echo '<script>  alert("Confirm Password Must be equal to password!");
                                document.forms["frm-signup"]["conf-psw"].value = "";
                                document.forms["frm-signup"]["conf-psw"].focus();  </script>';
                            } else {
                                 echo "<script>alert('$name $email $phoneNo $psw');</script>";
                                $sql = "insert into lb_users values('$name', '$email', '$phoneNo', '$psw')";
                                echo "<script>alert('Im on testing');</script>";

                                 if(mysqli_query($conn, $sql)) {
                                    // echo "<script>alert('SignUp Successfull');</script>";
                                    mysqli_close($conn);
                                    header("location: welcome.php");
                                 } else {
                                     echo "<script>alert('SignUp failed');</script>";
                                }
                            }
                        }
                    }
                }
            }
        }
       
    }
    
?>