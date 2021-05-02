<?php include "header.php";?>
<?php 
if (!isset($_SESSION['email'])) {
    header("location:index.php");
}
?>
    <div class="wrapper">
        <div class="sidebar" data-image="Assets/img/sidebar-5.jpg">

    <?php include "sidebar.php"?>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
           <?php include "top_bar.php";?>
            <!-- End Navbar -->
            <div class="container">
            <div class="row my-5">
            <div class="col-md-4">
            <div class="card-body shadow p-3 mb-5 bg-white rounded">
  
    <h6 class="card-subtitle mb-2 text-muted text-center">Total Departments</h6>
    <?php
     $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
     $link=$connection->connect();
     $sql="SELECT * FROM categories";
     $stmt=$link->prepare($sql);
     $stmt->execute();
     $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $count_categories=$stmt->rowCount();
    ?>
    <p class="card-text text-center" style="font-size:20px;font-weight:800"><?php if($count_categories>0){echo $count_categories;}else{echo "No Departments Added";}?></p>
  
  </div>
</div>
            <div class="col-md-4">
            <div class="card-body shadow p-3 mb-5 bg-white rounded">
  
    <h6 class="card-subtitle mb-2 text-muted text-center ">Total Courses Available</h6>
    <?php
     $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
     $link=$connection->connect();
     $sql="SELECT * FROM courses";
     $stmt=$link->prepare($sql);
     $stmt->execute();
     $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $count_categories=$stmt->rowCount();
    ?>
    <p class="card-text text-center" style="font-size:20px;font-weight:800"><?php if($count_categories>0){echo $count_categories;}else{echo "No Courses Added";}?></p>
   
  </div>
</div>
            <div class="col-md-4">
            <div class="card-body shadow p-3 mb-5 bg-white rounded">
   
    <h6 class="card-subtitle mb-2 text-muted text-center">Students Enrolled</h6>
    <?php
     $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
     $link=$connection->connect();
     $sql="SELECT * FROM student";
     $stmt=$link->prepare($sql);
     $stmt->execute();
     $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
     $count_categories=$stmt->rowCount();
    ?>
    <p class="card-text text-center" style="font-size:20px;font-weight:800"><?php if($count_categories>0){echo $count_categories;}else{echo "No Students Added";}?></p>
    
  </div>
</div>
            </div>
            </div>
            </div>
            
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                       
                  

                            <div class="container">
                            <div class="card" style="width: 18rem;">
 
                            </div>
                           
 
 <?php include "footer.php";?>
