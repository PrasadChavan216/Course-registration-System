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
            <?php include "top_bar.php";?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body d-flex justify-content-center">
                                  <h5 class="card-title">List Of Categories</h5>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <a type="submit" href="add_banner.php" class="btn btn-primary btn-fill pull-right text-white">Add ➕</a>
                        </div>
                    </div>
                    
                      
                    <div class="section">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                              <!-- <h5 class="card-title">Card title</h5> -->
                              <div class="w-100">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <!-- <h4 class="card-title">Striped Table with Hover</h4>
                                    <p class="card-category">Here is a subtitle for this table</p> -->
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                          
                                        </thead>
                                        <tbody>
                                            <?php
                                             $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                                             $link=$connection->connect();
                                             $sql="SELECT * FROM banner";
                                             $stmt=$link->prepare($sql);
                                             $stmt->execute();
                                             $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                                             $sr_no=1;
                                             foreach ($result as $row) {
                                                 
                                             
                                            ?>
                                            <tr>
                                        
                                                <td><?php echo $sr_no?></td>
                                                <td><?php echo $row['banner_text']?></td>
                                                <td><img src="../Assets/images/banner/<?php echo $row['banner_image'];?>" height="100" width="300" alt=""></td>
                                                <td>
                                                  
                                                     
                                                        <a type="submit" href="update_banner.php?id=<?php echo $row['banner_id'];?>" class="btn btn-info btn-fill pull-right">Update  🖋</a>&nbsp;&nbsp;&nbsp;
                                                   
                                                        <a type="submit" href="delete_banner.php?id=<?php echo $row['banner_id'];?>" class="btn btn-danger btn-fill pull-right">Delete ❌</a>
                                                 
                                               
                                     

                                                   
                                                </td>
                                                
                                            </tr>
                                            
                                        <?php
                                        $sr_no++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                    </div>
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
