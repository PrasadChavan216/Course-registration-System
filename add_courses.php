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
                if (isset($_POST['submit'])) {
                    if (empty($_POST['cat_id']) || empty($_POST['course_title']) || empty($_POST['course_desc']) || empty($_FILES['course_image']['name']) || empty($_POST['course_author']) || empty($_POST['course_price']) || empty($_POST['course_trainer']) || empty($_POST['course_time'])) {
                        $message="Please Fill All Fields";
                    }
                    else
                    {

                        $cat_id=$_POST['cat_id'];
                        $course_title=$_POST['course_title'];
                        $course_desc=$_POST['course_desc'];
                        $course_image=$_FILES['course_image']['name'];
                        $tmp_name=$_FILES['course_image']['tmp_name'];
                        move_uploaded_file($tmp_name,"../Assets/images/courses/".$course_image);
                        $course_author=$_POST['course_author'];
                        $course_price=$_POST['course_price'];
                        $course_trainer=$_POST['course_trainer'];
                        $course_time=$_POST['course_time'];
                        $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                        $link=$connection->connect();
                        $sql="INSERT INTO courses(course_title,course_image,course_author,course_trainer,course_price,course_completion_time,course_description,cat_id) VALUES(?,?,?,?,?,?,?,?)";
                        $stmt=$link->prepare($sql);
                        $stmt->execute([$course_title,$course_image,$course_author,$course_trainer,$course_price,$course_time,$course_desc,$cat_id]);
                        if ($stmt==TRUE) {
                            $message="Course Added Successfully";
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
                          <h5 class="card-title">Add Courses</h5>
                        </div>
                      </div>
                      
                    <div class="section">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                              <!-- <h5 class="card-title">Card title</h5> -->
                              <form class="row w-100 text-center" method="POST"  action="add_courses.php" enctype="multipart/form-data"> 
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
                                        <label class="form-label"  for="form5Example1">Select Course Category</label>
                                    </div>
                                     <select name="cat_id" id="" class="form-control">
                                         <option value="">Select Course Category</option>
                                         <?php 
                                        $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                                        $link=$connection->connect();
                                        $sql="SELECT * FROM categories";
                                        $stmt=$link->prepare($sql);
                                        $stmt->execute();
                                        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row) {
                                            # code...
                                        
                                         ?>
                                         <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                        <?php
                                        }
                                        ?>

                                     </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Title</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="course_title" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Description</label>
                                </div>
                                  <!-- <input type="text" id="form5Example1"  name="_name" class="form-control"/> -->
                                  <textarea name="course_desc" cols="30" class="form-control" style="height:auto;" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Image</label>
                                </div>
                                  <input type="file" id="form5Example1"  name="course_image" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Author</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="course_author" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Price</label>
                                </div>
                                  <input type="number" id="form5Example1"  name="course_price" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Trainer</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="course_trainer" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Course Completeion Time</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="course_time" class="form-control"/>
                                </div>
                            </div>

                         

                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                              
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit Form</button>
    
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
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
 <?php include "footer.php";?>
