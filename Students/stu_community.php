<?php
    session_start();
    if(!isset($_SESSION['lb_email']) || !isset($_SESSION['lb_psw'])) {
        header("location: stu_signin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/stu_community.css">
    <title>LBuddy Community</title>
</head>
<body>
    <div class="navbar">
        <a href="#">Link</a>
        <a href="#">Link</a>
        <a href="#">Link</a>
        <a href="logout.php" class="right">Logout</a>
    </div>

    <div class="row" >
        <div class="side">
            <div class="card">
                <h2>My Profile</h2>
                <h5>Photo of me:</h5>
                <label>Symbolstar Nongbri</label>
                <label>Mawrang-Rambrai</label>
                <label>19 october, 2019</label>
                <label>symbolstar2016@gmail.com</label>
            </div>
        </div>
        <div class="main">
            <div class="card">
                <form method="POST">
                    <input type="text" name="question" id="" placeholder="Type Your question here!" style="padding: 14px 20px; width:100%;">
                    <input type="submit" class="button" name="question-btn" value="Asked Question ???" style="margin-top:10px">
                </form>
           </div>

           <div style="padding:10px"></div>
           <div class="card">
               <h2>Top Question</h2>
               <hr>
               <div class="card-question">
                    
               </div>
           </div>
        </div>
    </div>
    
    <?php
        include "../layout/footer.php";
    ?>

</body>
</html>

<?php
    if(isset($_POST['question-btn'])) {

        $question = $_POST['question'];
        $email = $_SESSION['lb_email'];

        if(empty($question)) {
            echo "<script>alert('Please fill the question to ask.');</script>";
        }

        if(!empty($email)) {
            $sql = "insert into `lb_question` values ('$question', '$email', 3)";
            require "../connect.php";
            if(mysqli_query($conn, $sql)) {

                echo "<script>alert('Question asked successfully');</script>";
                header("location: ask_success.php");
            } else {
                echo "<script>alert('Question asked failed');</script>";
            }
        }
    }
?>