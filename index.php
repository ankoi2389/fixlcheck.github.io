<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="login/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="login/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a><b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post">
          <div class="input-group mb-3">
            <input class="form-control" placeholder="username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
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
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="btn_submit">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div> -->
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="change_password.php">Change Password</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <?php
    if (isset($_POST['btn_submit']))
    {
      include_once ('connect.php'); 
      
      // Check connection
      if (!$conn) 
      {
        //  die("Connection failed: " . mysqli_connect_error());
        echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu'); </script>";
        die();
     }
      $sql = "SELECT username, password FROM tblogin";
      $result = $conn->query($sql); 

      if ($result->num_rows > 0) 
      {
        // Load dữ liệu lên website
        while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $password = $row["password"];}
        // echo "username: " . $row["username"]. " password: " . $row["password"]. " 
      }
      if($_POST['username']==$username and $_POST['password']==$password)
      {
        // echo " <script type=\"text/javascript\">alert('correct'); </script>";
            //  $str_URL = "product.php?id=";
          header("location: button.php");
          // echo "<script type=\"text/javascript\" language=\"Javascript\">window.open('$str_URL$create_product');</script>";
      }
      else  
        echo " <script type=\"text/javascript\">alert('username or password incorrect'); </script>";
        
      mysqli_close($conn);
    }
  ?>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="login/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="login/dist/js/adminlte.min.js"></script>
</body>
</html>