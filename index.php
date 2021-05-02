<?php include "header.php";?>
<?php
if (isset($_SESSION['email'])) {
    header("location:dashboard.php");
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['login'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $message="Please Fill All The Credentials To Login";
        }
        else
        {
            $id=validate($_POST['email']);
            $password=validate($_POST['password']);

            $connection=new Database(DB_HOST,DB_USER,DB_PASS,DATABASE);
                $link=$connection->connect();
                $sql="SELECT * FROM user WHERE user_email=:email AND user_password=:password";
                $stmt=$link->prepare($sql);
                $stmt->execute(
                        array('email'=> $id,
                        'password'=>md5($password)
                        ) 
                    );
                                   
                    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (is_array($result) && !empty($result)) {                                   
                        $_SESSION['email']=$_POST['email'];
                        // setcookie('id', $_POST['id']);
                        header("Location:dashboard.php");
                        }
                    else {
                      $message="Please Enter Valid Id And Password";
                    }
        }
    }
}
function validate($user)
{
    $user=trim($user);
    $user=stripslashes($user);
    $user=htmlspecialchars($user);
    return $user;
}
?>

<div class="container">
    <div class="row">
        <div class="col-3">
</div>
        <div class="col-md-6 offset-md-3">
            <div class="card">
                

        <div class="row my-5 d-flex justify-content-center">
            <img src="Assets/images/login_user.png" height="250" width="250" alt="">
        </div>
        <div class="row d-flex justify-content-center my-5">
            <form class="w-100" method="post" action="index.php">
                <!-- Email input -->
                <div class="row d-flex justify-content-center">
                    <div class="form-outline mb-4">
                        <input type="email" id="form1Example1" name="email" class="form-control" />
                        <label class="form-label" for="form1Example1">Email address</label>
                    </div>
                </div>
                <!-- Password input -->
                <div class="row d-flex justify-content-center">
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example2" name="password" class="form-control" />
                        <label class="form-label" for="form1Example2">Password</label>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="row d-flex justify-content-center">
                    <div class="form-outline mb-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-body">
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include "footer.php";?>