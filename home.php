<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/home.css">  
  <link rel="stylesheet" href="css/stu_login_dropdown.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/topnav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="js/validateForms.js"></script>
    <title>LearnBuddy</title>
<style>* {box-sizing: border-box;}</style>
</head>
<body>
        
<div class="hero-image">
  <div class="hero-text">
    <h2 style="font-size:35px; color: white;">We are people who code!</h2>
    <p style="color: rgb(170, 170, 170);">We connect them to solution by enable <br>growth, and discovery</p>
    <!-- <input type="radio" name="hero">
    <input type="radio" name="hero"> -->
    <!-- <input type="radio" name="hero" checked> -->
  </div>
</div>

<?php
  include("layout/topnav.php");
?>



<div class="main-content">
    <div class="row">
      <h2>Build for learners, by learners.</h2>
      <hr style="width: 10%; align-items: center; color: chocolate;">

      <p>LearnBuddy is an <label style="color: chocolate;">online community</label>  for developers, students studying <br> 
        computer science, or someone who codes. We help you get answer to your question, <br> 
        share knowledge by answer the question and enjoy learning! 
      </p>
    </div>
</div>

<?php
  include "layout/footer.php";
?>

<script>
  // When the user scrolls the page, execute myFunction
  window.onscroll = function() {stickyTopnav()};

  // Get the navbar
  var navbar = document.getElementById("topnav");

  // Get the offset position of the navbar
  var sticky = navbar.offsetTop;

  // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function stickyTopnav() {
    if (window.pageYOffset >= sticky && window.matchMedia('(min-width: 850px)').matches) {
      navbar.classList.add("sticky");
    } else {
      navbar.classList.remove("sticky");
    }
}



// Start Stuudent Login Form

/* When the user clicks on the button, 
toggle between hiding and showing the login form */
function stuloginShow() {
  document.getElementById("stu_login").classList.toggle("show"); 
}
// // Close the student login form if the user clicks outside of it
// window.onclick = function(a) {
//   if (!a.target.matches(".dropdown-btn")) {
//     var stulogin = document.getElementById("stu_login");
//     if (stulogin.classList.contains('show')) {
//       stulogin.classList.remove('show');
//     }
//   }
// }
 


//  Automatic slideshow every 
</script>
</body>
</html>

<?php
   if(isset($_POST['signin'])) {
       $email = $_POST['email'];
       $psw = $_POST['psw'];

        require "connect.php";
        require "Students/validateData.php";
        echo "<script>alert('I am on signin $email $psw');</script>";
        $sql = "select * from `lb_users` where `usr_email`='$email' and `usr_psw`='$psw'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            mysqli_close($conn);
            $_SESSION['lb_email'] = $email;
            $_SESSION['lb_psw'] = $psw;

            header("location: Students/stu_community.php");
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
   }
?>