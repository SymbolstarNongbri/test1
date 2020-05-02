<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .profile-container {
           
            padding: 15px;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
       
    </style>
</head>

<body>
    <div class="profile-container">
        <form  method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select File</label>
            <input type="file" name="fileToUpload">
            <input type="submit" value="upload Image" name="submit">
            <input type="submit" value="Display" name="display">
        </form>
    </div>
</body>

</html>
<?php
    $server_name = "localhost";
    $user_name = "bca17symb30";
    $user_psw = "bca17symb30";
    $db_name = "test_profile";

    // create a new connection
    $conn = new mysqli($server_name, $user_name, $user_psw, $db_name);

    // check connection
    if($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
?>

<?php
    if(isset($_POST['submit'])) {
        // echo "<pre>", print_r($_POST), "</pre>";
        // echo "<pre>", print_r($_FILES), "</pre>";
        // echo "<pre>", print_r($_FILES['fileToUpload']), "</pre>";
        // echo "<pre>", print_r($_FILES['fileToUpload']['name']), "</pre>";

        $profile_pic = time()."_".$_FILES['fileToUpload']['name'];
        $target = "prof_pic/"."$profile_pic";
        echo "$target";

        // To upload file in php we use the function called     move_uploader_file()
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
        $sql = "insert into user values ('Hello1', '$target')";
        if(mysqli_query($conn, $sql)) {
            echo "Profile update successfully";
        } else {
            echo "Profile update failed";
        }
    }

    if(isset($_POST['display'])) {
        $sql = "select * from user where name='Hello1'";
        if($result = mysqli_query($conn, $sql)) {
            if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    
                    $name = $row['name'];
                    $image = $row['profile'];
                    echo "<img src= '$image' style='width: 100px; height: 100px;'>";
                    echo "$image";
                
            }
        } else {
            echo "Something Not Right";
        }

        //die();
    }
?>
