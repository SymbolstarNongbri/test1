<?php
    session_start();
    include("../connect.php");
    
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/adm_login.css">
</head>
<body>


<div id="id01" class="modal">
  
  <form method="post">
    <div class="imgcontainer">
      <img src="../Image/img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter your email" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="btn_login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

  </form>
</div>

</body>
</html>
<?php
    if(isset($_POST['btn_login'])) {
        $email = $_POST['uname'];
        $psw = $_POST['psw'];
        $_SESSION['uname'] = $email;

        $sql = "select * from `sf-admin` where `sf-adm_email`='$email' and `sf-adm_psw`='$psw'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            mysqli_close($conn);
            header("Location: admin.php");
        } else {
            echo "Invalid credential";
        }
    }
?>