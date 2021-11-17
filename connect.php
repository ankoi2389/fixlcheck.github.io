<?php
// $servername = "localhost";
// $username = "root";
// $password = "12345678";
// $dbName = "product";
$servername = "sql304.epizy.com";
$username = "epiz_29413759";
$password = "QoEm0nebM4XzT";
$dbName = "epiz_29413759_pkgqrcode";

$conn = mysqli_connect($servername, $username, $password, $dbName);
$conn->set_charset("utf8");
  if (!$conn) {
    echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu!'); </script>";
    die();
  }
?>