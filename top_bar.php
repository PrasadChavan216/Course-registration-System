<nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                   
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                     
                        <ul class="navbar-nav ml-auto">
                            
                            <?php
                            if (isset($_SESSION['email'])) {

                                ?>

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="btn btn-primary">Log out<i class="fa fa-sign-out" aria-hidden="true"></i></span>
                                </a>
                            </li>
                                <?php
                            }
                            ?>
                           
                        </ul>
                    </div>
                </div>
            </nav>