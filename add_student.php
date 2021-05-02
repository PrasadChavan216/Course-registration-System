<?php include "header.php";?>
<?php 
if (!isset($_SESSION['email'])) {
    header("location:index.php");
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
                if (isset($_POST['add_data'])) {
                    if (empty($_POST['student_id']) || empty($_POST['student_password']) || empty($_POST['student_name']) || empty($_FILES['student_photo']['name']) || empty($_POST['student_mobile']) || empty($_POST['student_address'])) {
                        $message="Please Fill All Fields";
                    }
                    else
                    {

                        $student_id=$_POST['student_id'];
                        $student_password=md5($_POST['student_password']);
                        $student_name=$_POST['student_name'];
                        $student_mobile=$_POST['student_mobile'];
                        $student_photo=$_FILES['student_photo']['name'];
                        $tmp_name=$_FILES['student_photo']['tmp_name'];
                        move_uploaded_file($tmp_name,"../Assets/images/student/".$student_photo);
                        $student_address=$_POST['student_address'];
                        $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                        $link=$connection->connect();
                        $sql="INSERT INTO student(student_id,student_password,student_name,student_mobile,student_photo,student_address) VALUES(?,?,?,?,?,?)";
                        $stmt=$link->prepare($sql);
                        $stmt->execute([$student_id,$student_password,$student_name,$student_mobile,$student_photo,$student_address]);
                        if ($stmt==TRUE) {
                            $message="Student Added Successfully";
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
                              <form class="row w-100 text-center" method="POST"  action="add_student.php" enctype="multipart/form-data"> 
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
                                    <label class="form-label"  for="form5Example1">Student User ID</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="student_id" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student User Password</label>
                                </div>
                                  <input type="password" id="form5Example1"  name="student_password" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Full Name</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="student_name" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Contact Number</label>
                                </div>
                                  <input type="text" id="form5Example1" minlength="10" maxlength="10" size="10" name="student_mobile" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Student Residential Address</label>
                                </div>
                                  <!-- <input type="text" id="form5Example1"  name="_name" class="form-control"/> -->
                                  <textarea name="student_address" cols="30" class="form-control" style="height:auto;" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Image</label>
                                </div>
                                  <input type="file" id="form5Example1"  name="student_photo" class="form-control"/>
                                </div>
                            </div>
                       
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                              
                                    <button type="submit" name="add_data" class="btn btn-primary btn-block">Submit Form</button>
    
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
