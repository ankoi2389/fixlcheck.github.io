<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>

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
    <a><b>Change Password</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p> -->

      <form method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Current Password" name="current_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="new_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-primary btn-block" name="btn_submit">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php
    if (isset($_POST['btn_submit']))
    {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbName = "login";   
      // Create connection
      $conn = mysqli_connect($servername, $username, $password,$dbName);   
      // Check connection
      if (!$conn) 
      {
        //  die("Connection failed: " . mysqli_connect_error());
        echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu'); </script>";
        die();
      //   }
      //   $username = $_POST['username'];
      //   $password = $_POST['password'];
      //   $sql = sprintf("insert into dblogin values ('%s', '%s')",$username, $password);
      //   if ($conn->query($sql) === TRUE) {
      //     echo " <script type=\"text/javascript\">alert('Tạo mới sản phẩm thành công!'); </script>";
      //   } else {
      //    echo " <script type=\"text/javascript\">alert('Lỗi khi tạo mới sản phẩm!'); </script>";
      //    die();
      //  }
      // echo " <script type=\"text/javascript\">alert('correct'); </script>";
      // echo " <script type=\"text/javascript\">alert('Username or password in correct'); </script>";
      }
      $current_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];

      $sql = "SELECT username, password FROM dblogin";
      $result = $conn->query($sql); 

      if ($result->num_rows > 0) 
      {
        // Load dữ liệu lên website
        while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $password = $row["password"];}
        // echo "username: " . $row["username"]. " password: " . $row["password"]. " 
      }
      if($current_password==$password)
      {
        // echo " <script type=\"text/javascript\">alert('correct'); </script>";
            //  $str_URL = "product.php?id=";
        if($new_password==$confirm_password)
          {
            $sql = "UPDATE dblogin SET password ='$new_password' WHERE username='admin'";
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();
            // header("location: /AdminLTE-3.1.0/pages/examples/login.php");

            ?><script type="text/javascript">
            alert("Change password successfully");
            window.location.href = "login.php";
            </script>
            <?php
          }
          // echo "<script type=\"text/javascript\" language=\"Javascript\">window.open('$str_URL$create_product');</script>";
        else
          echo " <script type=\"text/javascript\">alert('Confirm Password incorrect'); </script>";  
      }
      else  
        echo " <script type=\"text/javascript\">alert('Current Password incorrect'); </script>";
        
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
