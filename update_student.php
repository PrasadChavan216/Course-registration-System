<?php include "header.php";?>
<?php 
if (!isset($_SESSION['email'])) {
    header("location:index.php");
}
if(isset($_REQUEST['id']))  
{  
        $update_request_id=$_REQUEST['id'];
        $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
        $link=$connection->connect();
        $response=array();  
        $sql="SELECT * FROM student WHERE u_id=:update_request_id";
        $stmt=$link->prepare($sql);
        $stmt->execute(
          array(
            'update_request_id'=>$update_request_id
          )
        );
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach($result as $row)
          {
           $u_id=$row['u_id'];
           $student_id=$row['student_id'];
           $student_name=$row['student_name'];
           $student_mobile=$row['student_mobile'];
           $student_photo= $row['student_photo'];
           $student_address=$row['student_address'];
          }
        }
?>
    <div class="wrapper">
        <div class="sidebar" data-image="Assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php include "sidebar.php"?>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Template</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <?php
                            if (isset($_SESSION['email'])) {

                                ?>

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                                <?php
                            }
                            ?>
                           
                        </ul>
                    </div>
                </div>
                <?php
              if (isset($_POST['update'])) {
                $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                $link=$connection->connect();
                if (empty($_POST['student_id']) || empty($_POST['student_name']) || empty($_POST['student_mobile']) || empty($_POST['student_address'])) {
                   
                    $student_update_id=$_POST['student_update_id'];
                    
                    $sql="SELECT * FROM student WHERE u_id=?";
                    $stmt=$link->prepare($sql);
                    $stmt->execute([$student_update_id]);
                    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $student_photo=$row['student_photo'];
                    }
                    unlink("../Assets/images/student/".$student_photo);

                    $student_new_image=$_FILES['student_photo']['name'];
                    $tmp_name=$_FILES['student_photo']['tmp_name'];
                    move_uploaded_file($tmp_name,"../Assets/images/student/".$student_new_image);

                    $sql="UPDATE student SET student_photo=? WHERE u_id=?";
                    $stmt=$link->prepare($sql);
                    $stmt->execute([$student_new_image,$u_id]);
                    if ($stmt==TRUE) {
                        $message="Student Image Updated Successfully";
                }
            }
                else if(empty($_FILES['student_photo']['name']))
                {
                    $student_update_id=$_POST['student_update_id'];
                    $student_id=$_POST['student_id'];
                    $student_name=$_POST['student_name'];
                    $student_mobile=$_POST['student_mobile'];
                    $student_address=$_POST['student_address'];
                    $sql="UPDATE student SET student_id=?,student_name=?,student_mobile=?,student_address=? WHERE u_id=?";
                    $stmt=$link->prepare($sql);
                    $stmt->execute([$student_id,$student_name,$student_mobile,$student_address,$student_update_id]);
                    if ($stmt==TRUE) {
                        $message="Course Data Updated Successfully";
                    }
                }
                else {
                    $student_update_id=$_POST['student_update_id'];
                    $student_id=$_POST['student_id'];
                    $student_name=$_POST['student_name'];
                    $student_mobile=$_POST['student_mobile'];
                    $student_photo=$_FILES['student_photo']['name'];
                    $tmp_name=$_FILES['student_photo']['tmp_name'];
                    $student_address=$_POST['student_address'];

                    $sql="SELECT * FROM student WHERE u_id=?";
                    $stmt=$link->prepare($sql);
                    $stmt->execute([$student_update_id]);
                    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $unlink_course_image=$row['student_photo'];
                    }
                    unlink("../Assets/images/courses/".$unlink_course_image);


                    move_uploaded_file($tmp_name,"../Assets/images/student/".$student_photo);
                    
                    $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                    $link=$connection->connect();
                    $sql="UPDATE student SET student_id=?,student_name=?,student_mobile=?,student_photo=?,student_address=? WHERE u_id=?";
                    $stmt=$link->prepare($sql);
                    $stmt->execute([$student_id,$student_name,$student_mobile,$student_photo,$student_address,$student_update_id]);
                    if ($stmt==TRUE) {
                        $message="Student Data Updated Successfully";
                    }
                }
            }
                ?>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                          <h5 class="card-title">Add Student Form</h5>
                        </div>
                      </div>
                      
                    <div class="section">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                              <!-- <h5 class="card-title">Card title</h5> -->
                              <form class="row w-100 text-center" method="POST"  action="update_student.php" enctype="multipart/form-data"> 
                                <!-- Name input -->
                                <span>
                                    <?php
                                    if (isset($message)) {
                                        ?>
                                        <div class="d-flex w-100 bg-success">
                                            <h5 class="text-white"><?php echo $message;?></h5>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </span>


                               
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                        <input type="hidden" name="student_update_id" value="<?php echo $u_id?>">
                                    <label class="form-label"  for="form5Example1">Student User ID</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="student_id" value="<?php if(isset($student_id)){echo $student_id;}?>" class="form-control"/>
                                </div>
                            </div>
                               
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Full Name</label>
                                </div>
                                  <input type="text" id="form5Example1" value="<?php if(isset($student_name)){echo $student_name;}?>"  name="student_name" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Contact Number</label>
                                </div>
                                  <input type="text" id="form5Example1" value="<?php if(isset($student_mobile)){echo $student_mobile;}?>" minlength="10" maxlength="10" size="10" name="student_mobile" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Residential Address</label>
                                </div>
                                  <!-- <input type="text" id="form5Example1"  name="_name" class="form-control"/> -->
                                  <textarea name="student_address" cols="30" class="form-control" style="height:auto;" rows="10"><?php if(isset($student_address)){echo $student_address;}?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Photo</label>
                                </div>
                                <img src="../Assets/images/student/<?php echo $student_photo?>" width="100" height="100" style="float:left" alt="">
                                  <input type="file" id="form5Example1"  name="student_photo" class="form-control"/>
                                </div>
                            </div>
                       
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                              
                                    <button type="submit" name="update" class="btn btn-primary btn-block">Submit Form</button>
    
                                </div>
                            </div>
                              
                            
                         
                              </form>
                            </div>
                          </div>
                       

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
 <?php include "footer.php";?>
