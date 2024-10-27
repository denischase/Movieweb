<?php
include("../derfla_tube/partials/header.php");

define('BASEPATH', true);
require_once 'connect.php';

//$_SESSION['user'] = '';

if (isset($_POST['submit'])) {
    try {
        $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_login = !empty($_POST['email']) ? ($_POST['email']) : null;
        $passwordAttempt = !empty($_POST['password']) ? ($_POST['password']) : null;

        //retrieve
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $dsn->prepare($sql);

        $stmt->bindValue(':email', $user_login);
       // $stmt->bindValue(':username', $username);


        //Executes
        $stmt->execute();

        //fetch
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //if row is false
        if ($user === false) {
            echo '<script>alert("invalid email or pasword")</script>';
        } else {
            //compare passwords
            $validPassword = password_verify($passwordAttempt, $user['password']);

            if ($validPassword) {
                $_SESSION['user'] = $user_login;
                //$_SESSION['username'] = $username;
                $_SESSION['users']  = array(
                   
                    'username' => json_encode($user[0])
                );
                //header('Location:welcome.php');
                echo '<script>window.location.replace("index.php")</script>';
            } else {
                echo '<script>alert("invalid email or password")</script>';
            }
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        echo '<script>alert("' . $error . '");</script>';
    }
}
?>

<div class="container hold-transition mb-3 mx-auto">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card card-outline card-dark">
                    <div class="card-header text-center">
                        <b class="h1">Sign In</b>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg h4">
                            Sign in to start your session

                            <span style='display:block;height:10px;color:red;'> <?php //require_once "" 
                                                                                ?></span>


                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember" class="h4">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <!-- /.col -->
                                <div class="col-4">
                                    <button name="submit" type="submit" class="btn btn-primary btn-block btn-sm ">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <div><hr/></div>
                        <div class="row mb-0 mt-3">
                            <div class="col-8">
                                <p class=" h5">
                                    <a href="">I forgot my password</a>
                                </p>
                            </div>
                            <div class="col-4 h5">
                                <p> <a href="register.php">Register</a> </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->

<?php include("../derfla_tube/partials/footer.php"); ?>