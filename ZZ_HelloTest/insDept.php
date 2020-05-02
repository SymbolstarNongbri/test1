<?php
    session_start();
    if(!isset($_SESSION['uname']))
        header('Location: adm_login.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>

<style>
    body {
      padding: 20px;
        font-family: Arial;
        background: whitesmoke;
    }
.header {   
    color: white;
    display: block;
    padding: 20px 15px;
    background: rgb(32, 94, 165);
    text-align: right;
}
a {
    color: wheat;
}
a:hover {
    color: chocolate;
}

.header, .footer, .col-left {
    margin-left: -28px;
}
.header, .footer {
    margin-right: -28px;
}
.header {margin-top: -28px;}

    /* clear floats after the columns*/
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Create Two unequal column*/
    .col-left {
        float: left;
        width: 20%;
        height: 100%;
       overflow: auto;
       background: white;
    }

    .col-right {
        float: left;
        width: 75%;
        background: whitesmoke;
        padding: 10px;
        margin-bottom: 20px;
    }
    .dept {
        position: absolute;
        top:20%;
        left: 50%;
    }

    .col-100 {
        width: 100%;
    }
    
    /* Side navigation bar*/
    .navbar {
        overflow: hidden;    
    }
    .a {
        color: chocolate;
        border: none;
        background-color: rgba(0, 0, 0, 0);
        cursor: pointer;
        width: 100%;
        text-align: left;  
    }
   
    .subnav .subnavbtn { 
        border: none;
        outline: none;
        color: chocolate;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        width: 100%;
        text-align: left;
    }
     .a:hover, .subnav:hover .subnavbtn{
        color:white;
        background-color: chocolate;
    } 
    .b {
        color: white;
        background-color: chocolate;
        border: none;
        cursor: pointer;
        text-align: left;  
        width: 100%;
    }
    .a, .b, .subnavbtn {
        padding: 16px 20px;
        font-size: 20px;
    }
    .subnav-content {
        display: none;
        position: absolute;
        left: 0;
        background-color:chocolate;
        color: white;
        z-index: 1;
        width: inherit;
    } 
    .b:hover {
        color: white;
        background-color: black;
    }   
    .subnav:hover .subnav-content {
        display: block;
    }


    .footer {
        color: white;
        text-align: center;
        background: rgba(7, 23, 43, 0.562);
        padding: 40px 30px;
    }
</style>
</head>


<body>

    <div class="header">
        <a href="logout.php">Logout</a>
    </div>


    <div class="row"> 
        <div class="col-left">
            <div class="row">
                <div class="col-100">
                    <button class="side-top"><i class="img-profile"></i></button>
                    <button class="side-top"><h5>Welcome, Symbol</h5></button>
                    <button class="side-top"><i class="ico-message"></i></button>
                    <button class="side-top"><i class="ico-usr"></i></button>
                    <button class="side-top"><i class="ico-setting"></i></button>
                </div>
            </div>

            <div class="row">
                <hr style="color: antiquewhite">
                <div class="navbar">  
                    <button class="a"><i class="ico-mess"></i>Overview</button>
                    <button class="a"><i class="ico-mess"></i>Traffic</button>
                    <div class="subnav">
                        <button class="subnavbtn"><i class="ico-mess"></i>Students</button>
                        <div class="subnav-content">
                            <div class="row"><button class="b"><i class="ico-mess"></i>Add Students</button></div>
                            <div class="row"><button class="b"><i class="ico-mess"></i>Delete Students</button></div>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="subnav">
                        <button class="subnavbtn"><i class="ico-mess"></i>Teachers</button>
                        <div class="subnav-content">
                            <div class="row"><button class="b"><i class="ico-mess"></i>Add Teachers</button></div>
                            <div class="row"><button class="b"><i class="ico-mess"></i>Delete Teachers</button></div>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="subnav">
                            <button class="subnavbtn"><i class="ico-mess"></i>Department & Courses</button>
                            <div class="subnav-content">
                                <div class="row"><button class="b"><i class="ico-mess"></i>Add Department</button></div>
                                <div class="row"><button class="b"><i class="ico-mess"></i>Delete Department</button></div>
                                <div class="row"><button class="b"><i class="ico-mess"></i>Add Courses</button></div>
                                <div class="row"><button class="b"><i class="ico-mess"></i>Delete Courses</button></div>
                            </div>
                        </div>
                    
                </div>
            </div>    
    
        </div>

        <div class="col-right">
            <h3 style="padding: 0 0 2px 40px;">My Dashboard</h3>
            <div name="dept" class="dept">
                <form method="post">
                    <label>Department Name</label>
                    <input type="text" name="dept-name" require> <br>
                    <label>Department ID</label>
                    <input type="text" name="dept-id" require>
                    <input type="submit" name="btn-insert" value="Insert">
                </form>        
            </div>
            
        </div>
    </div>


    <div class="footer"> 
            <strong>Powered by: SCS </strong>
    </div>

    <script>
        function deptCrse() {
            
        }
    </script>

</body>
</html>

<?php
    require "connect.php";
    
    if(isset($_POST['btn-insert'])) {
        $dept_name = $_POST['dept-name'];
        $dept_id = $_POST['dept-id'];

        $sql = "insert into department (dept_name, dept_id) values('$dept_name', $dept_id)";
        if(mysqli_query($conn, $sql)) {
            echo "Department inserted successfully";
        } else {
            echo "Something is not right";
        }
    }
?>