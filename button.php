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
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <form method="post">
                <div class="input-group mb-3">
                    <button class="btn btn-primary btn-block" name="btn_submit1" onclick="window.open('create_product.php', '_blank')">Tạo sản phẩm</button>
                    <button class="btn btn-primary btn-block" name="btn_submit2" onclick="window.open('genQRCode_v2.php', '_blank')">Sinh QR</button>
                </div>
            </form>
        </div>
    </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="login/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="login/dist/js/adminlte.min.js"></script>
</body>
</html>