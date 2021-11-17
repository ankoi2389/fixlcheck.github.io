<?php
if (isset($_POST['submit_download'])) {
  $zipname = "QRCode.zip";
  if (file_exists($zipname)) {

    //Define header information
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="' . basename($zipname) . '"');
    header('Content-Length: ' . filesize($zipname));
    header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($zipname);
    unlink($zipname);
    //Terminate from the script
    echo " <script>$('#ModalTB').modal('hide'); </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tạo QR Code cho sản phẩm</title>
  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="/Asset/css/bootstrap4/bootstrap.min.css">
  <link rel="stylesheet" href="/style.css">
</head>

<body>

  <!-- general form elements -->
  <div class="container" style="margin-top: 100px;">
    <form method="POST">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Sinh QR Code Tự động</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label>Link sản phẩm</label>
              <input class="form-control" name="product" placeholder="Nhập link sản phẩm">
            </div>
            <div class="form-group">
              <label> Kích thước QR Code</label>
              <input class="form-control" name="sizeQR" placeholder="VD: 10">
            </div>
            <div class="form-group">
              <label> Số lượng QR Code cần tạo</label>
              <input class="form-control" name="SL">
            </div>
            <div class="form-group">
              <label> Số lượt quét tối đa</label>
              <input class="form-control" name="maxScan">
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary" name="submit">Sinh QR Code</button>


        </form>
      </div>
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTB">
        Launch demo modal
      </button> -->

      <!-- Modal -->
      <div class="modal fade" id="ModalTB" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tạo QR Code thành công!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="dashed-loading"></div> -->
              <label name="message">QR code đã nén thành công! Click để tải xuống</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submit_download" id = "submit_modal" class="btn btn-primary">Download</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thông báo </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label>Tạo mới QR Code thành công</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
        </div>
      </div>

      <!-- /.card -->
    </form>


  </div>


  <!-- Jquery -->
  <script src="/Asset/js/bootstrap4/jquery-3.3.1.min.js"></script>
  <script src="/Asset/js/popper.js/popper.min.js"></script>
  <script src="/Asset/js/bootstrap4/bootstrap.min.js"></script>

</body>

</script>

</html>


<?php
set_time_limit(3600); 
include_once ('connect.php');
require_once("qrcode.php");

function genQR($size, $data, $name) {
    $qr = QRCode::getMinimumQRCode($data, QR_ERROR_CORRECT_LEVEL_L);
     // Tạo qr code
     $im = $qr->createImage($size, 4);

      imagepng($im, "image/" .$name .".png");

}
 //header("Content-type: image/png");
if (isset($_POST['submit'])) {
  
  $product = $_POST['product'];
  $size = $_POST['sizeQR'];
  $SL = $_POST['SL'];
  $maxScan = $_POST['maxScan'];
  //sql



  //------------------------------------- Lấy seri hiện có để add thêm vào link sản phẩm-------------------------------------------------------------------
  $maxx = 900000;
  $sql = "select max(seri) as seri from tbqr";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
  } else {
     //echo " <script type=\"text/javascript\">alert('Không tìm thấy sản phẩm!'); </script>";
     $maxx = 900000;
  }
  if ($row["seri"] == null) $row["seri"] = -1;
  $seri = max($maxx, $row["seri"] + 1);

  //-------------------------------------- Thêm vào bảng sql, Tạo qr code, // Lưu qr code vào một mảng--------------------------------------------------------------------------------------------
  /*


  */

  // insert so luong qr tao vao tbqr 
  
  
  if ($SL > 0) {
    $sql  = 'INSERT INTO `tbqr`(`seri`,`LinkSP`, `MaxScan`) VALUES ';
    for ($i = 1; $i < $SL; $i++) {
      $LinkSP = "{$product}&seri={$seri}";
      genQR($size, $LinkSP, $seri);
      $sql = $sql . sprintf("(%d, \"%s\",%d),",$seri, $LinkSP, $maxScan);
      $seri++;
    }
    $LinkSP = "{$product}&seri={$seri}";
    $sql = $sql . sprintf("(%d, \"%s\",%d);",$seri, $LinkSP, $maxScan);
    genQR($size, $LinkSP, $seri);

    //echo $sql;

    if ($conn->query($sql) === TRUE) {
      echo " <script type=\"text/javascript\">$('#ModalTB').modal({
          keyboard: false,
          backdrop: 'static'
        }) </script>";
    } else {
      echo " <script type=\"text/javascript\">alert('Lỗi khi tạo mới QR Code!'); </script>";
      die();
    }




    // --------------------------------------Tạo qr code, // Lưu qr code vào một mảng---------------------------------------------------------------------

    //----------------------------------------Tạo file zip để tải xuống-----------------------------------------------------------------------------------------
    $zip = new ZipArchive;
    $seri = max($maxx, $row["seri"] + 1);
    //echo $seri . "<br>";
    $zipname = 'QRCode.zip';
    if ($zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

      for ($i = 1; $i <= $SL; $i++) {
        $zip->addFile("image/" . $seri++ . ".png");
       
      }
    //   echo "<h3>Selected files are successfully zipped</h3>";

      $zip->close();
    } else {
    //   echo "<h3>Error Zip file</h3>";
    }
    // Chen vao tbscan
    $str = explode("?id=", $product);
    $MaSP = $str[1];
    $seri = max($maxx, $row["seri"] + 1);
    $sql2 = "insert into tbqr values (\"$MaSP\", \"$seri\", 0)";
    $seri++;
    for ($i = 2; $i <= $SL; $i++) {
        unlink("image/" . $seri . ".png"); // Xoa file png vua them vao
        $sql2 = $sql2 . ", (\"$MaSP\", \"$seri\", 0)";
        $seri++;
      }
      $sql2 = $sql2 . ";";
    //echo $sql2;
      if ($conn->query($sql2) === TRUE) {
        echo " <script type=\"text/javascript\">console.log('Pass update tbscan'); </script>";
      } else {
        echo " <script type=\"text/javascript\">console.log('Wrong update tbscan!'); </script>";
        die();
      }
  }
  ///Then download the zipped file.
  // header("Content-Type: application/octet-stream");
  // header("Content-Transfer-Encoding: Binary");
  // header("Content-disposition: attachment; filename=\"{$zipname}\"");
  // readfile($zipname);
  mysqli_close($conn);
}
?>