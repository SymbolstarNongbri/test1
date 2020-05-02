<?php 
    session_start();
    if(!isset($_SESSION['uname']))
        header('Location: adm_login.php');   
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Admin</title>
</head>


<body>

    <div class="header">
        <h2>Shillong College, Shillong</h2>
        <a href="logout.php">Logout</a>
    </div>


    <div class="row" style="margin-top: 20px; margin-left: 10px;"> 
        <div class="col-left">
            <div class="row">
                <div class="col-100">
                    <div class="adm-profile">
                        <h5>Welcome, Symbol</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <hr style="color: antiquewhite">
                <div class="navbar">  
                    <button class="nav-btn">Overview</button>
                    <button class="nav-btn">Traffic</button>
                    <button class="dropdown-btn">Students <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <button class="nav-btn">Add Students</button>
                        <button class="nav-btn">Update Students</button>
                        <button class="nav-btn">Delete Students</button>
                    </div>
                    <button class="dropdown-btn">Departments <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <button class="nav-btn" onclick="document.getElementById('modal_insdept').style.display='block'">Add Department</button>
                        <button class="nav-btn" onclick="document.getElementById('modal_upddept').style.display='block'">update Department</button>
                        <button class="nav-btn" onclick="document.getElementById('modal_deldept').style.display='block'">Delete Department</button>
                    </div>
                    <button class="dropdown-btn">Courses <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-container">
                        <button class="nav-btn" onclick="document.getElementById('modal_inscrse').style.display='block'">Add Course</button>
                        <button class="nav-btn" onclick="document.getElementById('modal_updcrse').style.display='block'">update Course</button>
                        <button class="nav-btn" onclick="document.getElementById('modal_delcrse').style.display='block'">Delete course</button>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-right">
            <h3 style="padding: 0 0 2px 40px;">My Dashboard</h3> 
        </div>
    </div>


    <?php
        include "../layout/footer.php";   
    ?>









    <!--- 
    
    WE Will start write code for modal  UI
    
    -->

    <!-- Insert Department Modal -->
    <div id="modal_insdept" class="modal_insdept">
        <span onclick="document.getElementById('modal_insdept').style.display='none'" class="close" title="Close Department">
            &times;</span>
        <form class="modal_insdept-content" method="post">
            <div class="container">
                <h1>Add Department</h1>
                <p>Please Fill The Form Below To Add Department</p>
                <hr>

                <label for="dept-name"><b>Name</b></label>
                <input type="text" placeholder="Department Name" name="dept-name" required>
                
                <label for="dept-id"><b>ID</b></label>
                <input type="text" name="dept-id" placeholder="Department ID" required>
                
                <div class="clearfix">
                    <button type="button" class="btn-dept_cancel" onclick="document.getElementById('modal_insdept').style.display='none'"><b>Cancel</b></button>
                    <button type="submit" class="btn-dept_insert" name="btn_insertDepartment">Add Department</button>
                </div>
            </div>
        </form>
    </div>

    <!-- update department Modal -->
    <div id="modal_upddept" class="modal_upddate">
        <span onclick="document.getElementById('modal_upddept').style.display='none'" class="close" title="Close Department">
            &times;
        </span>

        <form class="modal_upddept-content" method="post">
            <?php require "../connect.php"; ?>
            
            <div class="container">
                <h1>Update Department</h1>
                <hr>
                <div class="row">
                    
                        <select name="upddept-search">
                            <option value="">Please Select Department</option>
                            <?php
                                $sql = "select * from `sf-department`";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc(@$result)) {
                                ?>
                                <option value="<?php echo $row['sf-dept_id']; ?>"><?php echo  $row["sf-dept_name"]; ?>
                                </option>    
                                
                                <?php }
                            ?>
                        </select>
                  
                        <input type="submit" class="btn-upddept-search" name="btn_upddept_search" value="Search">
                                   
                </div>
                <?php
                    if(isset($_POST['btn_upddept_search'])) {
                        $dept_id = $_POST['upddept-search'];
                        $dept_name = "";

                        $sql = "select * from `sf-department` where `sf-dept_id`='$dept_id'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dept_name = $row['sf-dept_name'];
                                $dept_id = $row['sf-dept_id'];
                            }
                        }
                        echo "<script> document.getElementById('modal_upddept').style.display='block'; </script>";    
                    }
                ?>

                <label for="dept-id"><b>ID</b></label>
                <input type="text" placeholder="Department ID" name="dept-id" value="<?php echo @ $dept_id; ?>" readonly>

                <label for="dept-name"><b>Name</b></label>
                <input type="text" placeholder="Department Name" name="dept-name" value="<?php echo @ $dept_name; ?>">

                <div class="clearfix">
                    <button  class="btn-dept_cancel" onclick="document.getElementById('modal_upddept').style.display='none'">Cancel</button>
                    <button  class="btn-dept_update" name="btn_updateDepartment">Update Department</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete  department Modal -->
    <div id="modal_deldept" class="modal_deldept">
        <span onClick="document.getElementById('modal_deldept').style.display='none'" class="close" title="Close Department">
            &times;</span>
        <form class="modal_deldept-content" method="post">
            <div class="container">
                <h1>Delete Department</h1>
                <hr>
                <div class="row">
                    <select name="deldept-search">
                        <option value ="">Select Department</option>
                        <?php
                            require '../connect.php';

                            $sql = "select * from department";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc(@$result)) {
                             ?>
                             <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>   
                           <?php } ?>
                    </select>

                    <input type="submit" class="btn-deldept-search" name="btn_deldept_search" value="Search">
                </div>
                <?php 
                    if(isset($_POST['btn_deldept_search'])) {
                        $dept_id = $_POST['deldept-search'];
                        $dept_name = "";

                        $sql = "select * from department where dept_id = '$dept_id'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) == 1) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dept_name = $row['dept_name'];
                                $dept_id = $row['dept_id'];
                            }
                        }
                        echo "<script> document.getElementById('modal_deldept').style.display='block'; </script>";
                    }
                ?>

                <label for="dept-id"><b>ID</b></label>
                <input type="text" placeholder="Department ID" name="dept-id" value="<?php echo @ $dept_id; ?>"readonly>

                <label for="dept-name"><b>Name</b></label>
                <input type="text" placeholder="Department Name" name="dept-name" value="<?php echo @ $dept_name; ?>" readonly>

                <div class="clearfix">
                    <button type="button" class="btn-dept_cancel" onclick="document.getElementById('modal_deldept').style.display='none'">Cancel</button>
                    <button type="button" class="btn-dept_delete">Delete Department</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Insert Courses -->
    <div id="modal_inscrse" class="modal_inscrse">
        <span onclick="document.getElementById('modal_inscrse').style.display='none'" class="close" title="Close Course">
            &times;</span>
        
            <form class="modal_inscrse-content">
                <div class="container">
                    <h1>Insert Course</h1>
                    <hr>

                    <label for="crse-id"><b>ID</b></label>
                    <input type="text" placeholder="Course ID" name="crse-id" required>

                    <label for="crse-name"><b>Name</b></label>
                    <input type="text" placeholder="Course Name" name="crse-name" readonly>

                    <div class="clearfix">
                        <button type="button" class="btn-crse_cancel" onclick="document.getElementById('modal_inscrse').style.display='none'">Cancel</button>
                        <button type="button" class="btn-crse_insert">Insert Course</button>
                    </div>
                </div>
            </form>
    </div>

    <!-- Update Course -->
    <div id="modal_updcrse" class="modal_updcrse">
        <span onclick="document.getElementById('modal_updcrse').style.display='none'" class="close" title="Close Course">
            &times;</span>
        
            <form class="modal_updcrse-content">
                <div class="container">
                    <h1>Update Course</h1>
                    <hr>

                    <label for="crse-id"><b>ID</b></label>
                    <input type="text" placeholder="Course ID" name="crse-id" required>

                    <label for="crse-name"><b>Name</b></label>
                    <input type="text" placeholder="Course Name" name="crse-name" readonly>

                    <div class="clearfix">
                        <button type="button" class="btn-crse_cancel" onclick="document.getElementById('modal_updcrse').style.display='none'">Cancel</button>
                        <button type="button" class="btn-crse_update">Insert Course</button>
                    </div>
                </div>
            </form>
    </div>

    <!-- Delete Course -->
    <div id="modal_delcrse" class="modal_delcrse">
        <span onclick="document.getElementById('modal_delcrse').style.display='none'" class="close" title="Close Course">
            &times;</span>
        
            <form class="modal_delcrse-content">
                <div class="container">
                    <h1>Delete Course</h1>
                    <hr>

                    <label for="crse-id"><b>ID</b></label>
                    <input type="text" placeholder="Course ID" name="crse-id" required>

                    <label for="crse-name"><b>Name</b></label>
                    <input type="text" placeholder="Course Name" name="crse-name" readonly>

                    <div class="clearfix">
                        <button type="button" class="btn-crse_cancel" onclick="document.getElementById('modal_delcrse').style.display='none'">Cancel</button>
                        <button type="button" class="btn-crse_delete">Insert Course</button>
                    </div>
                </div>
            </form>
    </div>


    <!-- JavaScript Start here -->
    <script lang="javascript">
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
                    
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display == "block") {
                    dropdownContent.style.display = "none";
                
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        } 
    </script>
</body>
</html>

<?php
    // insert department
    if(isset($_POST['btn_insertDepartment'])) {
        require "../connect.php";
        $dept_name = $_POST['dept-name'];
        $dept_id = $_POST['dept-id'];

        $sql = "insert into `sf-department` (`sf-dept_name`, `sf-dept_id`) values ('$dept_name', $dept_id)";
        if(mysqli_query($conn, $sql)) {
            echo "Department Inserted Successfully";
        } else {
            echo "Could not insert Department", mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>

<?php
    // update department
    if(isset($_POST['btn_updateDepartment'])) {
        $dept_id = $_POST['dept-id'];
        $dept_name = $_POST['dept-name'];

        $sql = "update `sf-department` set `sf-dept_id` = $dept_id, `sf-dept_name` = '$dept_name' where `sf-dept_id` = $dept_id";
        if(mysqli_query($conn, $sql)) {
            echo "Department Update Successfully.";
        } else {
            echo "Could not Update Department";
        }

        mysqli_close($conn);
    }
?>

<?php 
    // Delete department

?>