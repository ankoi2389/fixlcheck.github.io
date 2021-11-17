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
    echo " <script type=\"text/javascript\">$('#ModalTB').modal('hide'); </script>";
    //Terminate from the script

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
              <input class="form-control" name="sizeQR" placeholder="VD: 300">
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:none;">Close</button>
              <button type="submit" name="submit_download" class="btn btn-primary">Download</button>
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

</html>


<?php
set_time_limit(3600); 
function getRandomUserAgent()

{

  $userAgents = array(

    "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6)    Gecko/20070725 Firefox/2.0.0.6",

    "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",

    "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",

    "Opera/9.20 (Windows NT 6.0; U; en)",

    "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",

    "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",

    "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",

    "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48"

  );

  $random = rand(0, count($userAgents) - 1);



  return $userAgents[$random];
}
function genQR($url, $size)
{
  $data = array(
    "data" => "{$url}",
    "file" => "png",
    "download" => "imageUrl",
    "size" => $size
  );

  $data_string = json_encode($data);

  $curl = curl_init('https://api.qrcode-monkey.com//qr/custom');
  curl_setopt($curl, CURLOPT_USERAGENT, getRandomUserAgent());
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt(
    $curl,
    CURLOPT_HTTPHEADER,
    array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string)
    )
  );

  $result = curl_exec($curl);
  curl_close($curl);
  return $result;
}
if (isset($_POST['submit'])) {

  $product = $_POST['product'];
  $size = $_POST['sizeQR'];
  $SL = $_POST['SL'];
  $maxScan = $_POST['maxScan'];
  //sql
  $servername = "localhost";
  $username = "root";
  $password = "12345678";
  $dbName = "product";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbName);

  // Check connection
  if (!$conn) {
    echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu!'); </script>";
    die();
  }


  //------------------------------------- Lấy seri hiện có để add thêm vào link sản phẩm-------------------------------------------------------------------
  $maxx = 1000000;
  $sql = "select max(seri) as seri from tbqr";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
  } else {
    // echo " <script type=\"text/javascript\">alert('Lỗi khi tìm sản phẩm!'); </script>";
  }
  if ($row["seri"] == null) $row["seri"] = -1;
  $seri = max($maxx, $row["seri"] + 1);
  echo $seri . "<br>";

  //-------------------------------------- Thêm vào bảng sql, Tạo qr code, // Lưu qr code vào một mảng--------------------------------------------------------------------------------------------


  // insert so luong qr tao vao tbqr 
  $array_QR = array();
  if ($SL > 0) {
    $sql  = 'INSERT INTO `tbqr`(`LinkSP`, `MaxScan`) VALUES ';
    for ($i = 1; $i < $SL; $i++) {
      $LinkSP = "{$product}&seri={$seri}";
      $array_QR[] = genQR($LinkSP, 500);
      $seri++;
      $sql = $sql . sprintf("('%s',%d),", $LinkSP, $maxScan);
    }
    //$product = $product . "&seri={$seri}";
    $LinkSP = "{$product}&seri={$seri}";
    $sql = $sql . sprintf("('%s',%d);", $LinkSP, $maxScan);
    $array_QR[] = genQR($LinkSP, 500);

    // echo $sql;
    for ($i = 0; $i < sizeof($array_QR); $i++) {
      $item = $array_QR[$i];
      $t = array("imageUrl\":\"\/\/", "\\", "{\"", "\"}");
      $item = str_replace($t, "", $item);
      $array_QR[$i] =  $item;
    }



    //----------------- Lưu ảnh vào thư mục image -------------
    $seri = max($maxx, $row["seri"] + 1);
    echo $seri . "<br>";
    foreach ($array_QR as $item) {
      $url_to_img = "https://{$item}";
      $my_save_dir = 'image/';
      $filename = basename($url_to_img);
      $complete_save_loc = $my_save_dir . ++$seri . ".png";
      file_put_contents($complete_save_loc, file_get_contents($url_to_img));
    }

    if ($conn->query($sql) === TRUE) {
      //echo " <script type=\"text/javascript\">alert('OK'); </script>";

      echo " <script type=\"text/javascript\">$('#ModalTB').modal({
          keyboard: false,
          backdrop: 'static'
        }) </script>";
    } else {
      echo " <script type=\"text/javascript\">alert('Lỗi khi tạo mới QR Code!'); </script>";
      die();
    }


    // Xóa kết quả khỏi bộ nhớ
    mysqli_close($conn);
    //end sql






    // --------------------------------------Tạo qr code, // Lưu qr code vào một mảng---------------------------------------------------------------------

    //----------------------------------------Tạo file zip để tải xuống-----------------------------------------------------------------------------------------
    $zip = new ZipArchive;
    $seri = max($maxx, $row["seri"] + 1);
    echo $seri . "<br>";
    $zipname = 'QRCode.zip';
    if ($zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

      foreach ($array_QR as $item) {
        $zip->addFile("image/" . $seri++ . ".png");
      }
      echo "<h3>Selected files are successfully zipped</h3>";

      $zip->close();
    } else {
      echo "<h3>Error Zip file</h3>";
    }
  }
  ///Then download the zipped file.
  // header("Content-Type: application/octet-stream");
  // header("Content-Transfer-Encoding: Binary");
  // header("Content-disposition: attachment; filename=\"{$zipname}\"");
  // readfile($zipname);
}
?>