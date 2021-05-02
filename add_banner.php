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
                    if (empty($_POST['banner_text']) || empty($_FILES['banner_image']['name'])) {
                        $message="Please Fill All The Fields";
                    }
                    else
                    {
                        $banner_text=$_POST['banner_text'];
                        $banner_image=$_FILES['banner_image']['name'];
                        $tmp_name=$_FILES['banner_image']['tmp_name'];
                        move_uploaded_file($tmp_name,"../Assets/images/banner/".$banner_image);
                        $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                        $link=$connection->connect();
                        $sql="INSERT INTO banner(banner_text,banner_image) VALUES(?,?)";
                        $stmt=$link->prepare($sql);
                        $stmt->execute([$banner_text,$banner_image]);
                        if ($stmt==TRUE) {
                            $message="Banner Added Successfully";
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
                          <h5 class="card-title">Add Banner Form</h5>
                        </div>
                      </div>
                      
                    <div class="section">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                              <!-- <h5 class="card-title">Card title</h5> -->
                              <form class="row w-100 text-center" method="POST"  action="add_banner.php" enctype="multipart/form-data"> 
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
                                    <label class="form-label"  for="form5Example1">Banner Text</label>
                                </div>
                                  <input type="text" id="form5Example1"  name="banner_text" class="form-control"/>
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="form-outline mb-4">
                                    <div class="d-flex justify-content-start">
                                    <label class="form-label"  for="form5Example1">Banner Image</label>
                                </div>
                                  <input type="file" id="form5Example1"  name="banner_image" class="form-control"/>
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
    
 <?php include "footer.php";?>
