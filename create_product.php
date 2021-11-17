<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
       <form method="POST" enctype="multipart/form-data">
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tạo sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" name="TenSP">
                  </div>
                  <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input class="form-control" name="MaSP">
                  </div>
                  <div class="form-group">
                    <label>Nhà sản xuất</label>
                    <input class="form-control" name="NhaSX"> 
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" name="SDT">
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" name="DiaChi">
                  </div>
                  <div class="form-group">
                    <label>Quận/huyện</label>
                    <input class="form-control" name="QuanHuyen">
                  </div>
                  <div class="form-group">
                    <label>Tỉnh/Thành phố</label>
                    <input class="form-control" name="TinhTP">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label>Mã doanh nghiệp</label>
                    <input class="form-control" name="MaDN">
                  </div>
                 <div class="form-group">
                    <label>Thông tin sản phẩm</label>
                    <input class="form-control" name="MoTa">
                  </div>
                 <div class="form-group">
              <label> Tải ảnh sản phẩm</label>
              <input type="file" name="userfile[]" multiple />
              <!-- <button type="submit" name="upload">Tải ảnh lên</button> -->
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" style ="width:100px;" class="btn btn-primary" name="btn_submit">Tạo</button>
                </div>
              </form>
            </div>

            <!-- /.card -->
       </form>
       </div>

       <?php

     function reArrayFiles($file_post)
  {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i = 0; $i < $file_count; $i++) {
      foreach ($file_keys as $keys) {
        $file_ary[$i][$keys] = $file_post[$keys][$i];
      }
    }
    return $file_ary;
  }
      if (isset($_POST['btn_submit']))
        {
       // xu li sql them san pham tai day
      
       include_once ('connect.php');
       // Check connection
       if (!$conn) {
      //  die("Connection failed: " . mysqli_connect_error());
       echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu, tạo mới sản phẩm không thành công thành công!'); </script>";
       die();
       }
       $TenSP = $_POST['TenSP'];
       $MaSP = $_POST['MaSP'];
       $NhaSX = $_POST['NhaSX'];
       $SDT = $_POST['SDT'];
       $DiaChi = $_POST['DiaChi'];
       $QuanHuyen = $_POST['QuanHuyen'];
       $TinhTP = $_POST['TinhTP'];
       $email = $_POST['email'];
       $MaDN = $_POST['MaDN'];
       $TTSP = $_POST['MoTa'];
       $sql = "select * from dbproduct where MaSP = \"{$MaSP}\"";
       $rs = $conn->query($sql);
       
       if ($rs->num_rows > 0) {
         // update or delte
         $cmd = "delete from dbproduct where MaSP = \"{$MaSP}\"";
         $conn->query($cmd);
        $cmd = "delete from tbscan where MaSP = \"{$MaSP}\"";
         $conn->query($cmd);
       }
       $sql = sprintf("insert into dbproduct values (\"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\", \"%s\",\"\")",$TenSP, $MaSP, $NhaSX, $SDT, $DiaChi, $QuanHuyen, $TinhTP, $email, $MaDN, $TTSP);
       if ($conn->query($sql) === TRUE) {
         echo " <script type=\"text/javascript\">alert('Tạo mới sản phẩm thành công!'); </script>";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo " <script type=\"text/javascript\">alert('Lỗi khi tạo mới sản phẩm!'); </script>";
        die();
      }

    // upload anh
    $file_array = reArrayFiles($_FILES['userfile']);
    $sql = "select * from image where MaSP = \"{$MaSP}\"";
    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
      //update or delete
      $cmd = "delete from image where MaSP = \"{$MaSP}\"";
      $conn->query($cmd);
    }
    //insert
    $sql  = "insert into image(MaSP,img1,img2,img3,img4,img5) values (\"{$MaSP}\",";
    $target = "photo/";
    for ($i = 0; $i < count($file_array); $i++) {
      $extensions = array('jpg', 'img', 'png', 'jpeg');
      $file_ext = explode('.', $file_array[$i]['name']);
      $file_ext = end($file_ext);
      $file_size = $file_array[$i]['size'];
      if ($file_size > 2097152) {
        $errors = 'Kích thước file không được lớn hơn 2MB';
        echo "<script language=\"javascript\">alert('$errors');</script>";
        die();
      }
      if (in_array($file_ext, $extensions)) {
        move_uploaded_file($file_array[$i]['tmp_name'], "" . $target . $file_array[$i]['name']);
        rename("".$target . $file_array[$i]['name'], "".$target .$MaSP ."_".$file_array[$i]['name']);
        //$list[] = $file_array[$i]['name'];
        // echo "upload file pass" . "<br>";
        $sql = $sql . "\"{$MaSP}_{$file_array[$i]['name']}\",";
      } else {
        $errors = "Chỉ hỗ trợ tải lên ảnh dạng JPEG, JPG, IMG hoặc PNG.";
        echo "<script language=\"javascript\">alert('$errors');</script>";
      }
    }
    for ($i = count($file_array) + 1; $i <= 5; $i++) $sql = $sql . "\"\",";
    $sql = chop($sql, ",") . ");";
    if ($conn->query($sql) === TRUE) {
      echo "<script language=\"javascript\">console.log('upload anh thanh cong');</script>";
    } else {
      echo "<script language=\"javascript\">console.log('upload anh fail');</script>";
    }
    
    mysqli_close($conn);


       // Chuyen huong sang link san pham
           $str_URL = "infor_product.php?id=";
          // header('location: ' .$str_URL.$Code_product);
          echo "<script type=\"text/javascript\" language=\"Javascript\">window.open('$str_URL$MaSP');</script>";

 }

?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
