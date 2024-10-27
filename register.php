<?php

// phpinfo();


define('BASEPATH', true);
//require_once '__register.php';
require 'connect.php';

if (isset($_POST['submit'])) {
  try {
    $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if ($pass == $cpass) {
      //compare password
      $pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));




      $sql = "SELECT COUNT(email) AS num FROM admin WHERE email = :email";
      $stmt = $dsn->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($row['num'] > 0) {
        echo '<script>alert("Email already exist");</script>';
      } else {
        $stmt = $dsn->prepare("INSERT INTO admin (username,email,password) VALUES(
               :username,:email,:password
           ) ");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam('password', $pass);

        if ($stmt->execute()) {
          echo '<script>alert("Registration successful");</script>';
          //header('refresh:1;url:welcome.php');
        } else {
          $error = "Error: " . $e->getMessage();
          echo '<script>alert("' . $error . '");</script>';
        }
      }
    } else {
      //display error if passwords donot match
      echo '<script>alert("passwords do not match");</script>';;
    }
  } catch (PDOException $e) {
    $error = "Error: " . $e->getMessage();
    echo '<script>alert("' . $error . '");</script>';
  }
}

include("../derfla_tube/partials/header.php");
?>
<div class="container hold-transition mb-3 mx-auto">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-dark">
          <div class="card-header text-center">
            <b class="h1">Register</b></a>
          </div>
          <div class="card-body">
            <p class="login-box-msg h4">
            
              <?php // require_once "" 
              ?>


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
                <input type="text" class="form-control form-control-lg" placeholder="User Name" name="username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
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

              <div class="input-group mb-3">
                <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="cpassword">
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
                  <button name="submit" type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


            <p class="mb-1 mt-3">
              <!--        <a href="forgot-password.html">I forgot my password</a>-->
            </p>
            <p class="mb-0 col-4">
              <h4><a href="signin.php" class="form-control text-left">Login Now</a></h4>
            </p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.login-box -->
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include("../derfla_tube/partials/footer.php"); ?>