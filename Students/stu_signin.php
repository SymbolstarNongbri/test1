<?php
    session_start();
    if(isset($_SESSION['lb_email']) && isset($_SESSION['lb_psw'])) {
        header("location: stu_community.php");
    }

    include("lb_signin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/stu_signin.css">
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/footer.css">

    <script src="../js/validateForms.js"></script>
    <title>LBuddy SignIn</title>
</head>
<body>
    <!-- <div class="bg-image"></div> -->
    
<div class="topnav" id="topnav">
    <div class="row">
        
        <div class="col-50">
            <a href="../home.php" class="topnav-btn"><i class=""></i>Home</a>
       </div>  
        <div class="col-50">
            <img name="sFriends" src="../Image/img_BrandLogo.png" style="width: 40px; height: 40px; float: right; padding: 5px;">
            <label style="float:right; padding:5px; margin-top:5px; font-family:cursive; color:whitesmoke;">LearnBuddy</label>
        </div>
    </div>   
</div>

<div class="main">
<center>
        <div class="signin-box">
                <h1 style="color:White">Log in</h1>
                <hr>
            <form method="POST" name="frm-signin" onsubmit="return validateSignin()">
    
                <label for="email" style="float:left"><b>Email</b></label>
                <input type="text" placeholder="Your Email" name="email" required>
    
                <label for="psw" style="float: left;"><b>Password</b></label>
                <input type="password" placeholder="Your Password" name="psw" required>
    
                <div>
                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>
                    <a href="#" style="float: right;">Forgot Password?</a>
                </div>
                
                
    
                <div class="clearfix">
                    <a href="../home.php" class="cancelbtn">Cancel</a>
                    <button type="submit" class="signinbtn" name="signin">SignIn</button>
                </div>
                <center>
                    <label style="font-size: 15px; display:inline;">Don't have account?</label>
                    <a href="stu_signup.php" class="signin">SignUp</a>
                </center>
            </form>
        </div>
</center>
</div>

<?php
    include("../layout/footer.php");
?>
</body>
</html>