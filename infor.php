<?php
//sql
include_once ('connect.php');
// $servername = "sql304.epizy.com";
// $username = "epiz_29413759";
// $password = "QoEm0nebM4XzT";
// $dbName = "epiz_29413759_pkgqrcode";
if ($conn) {
    $MaSP = $_GET['id'] ? $_GET['id'] : "";
    $sql  = "select * from dbproduct where MaSP = '{$MaSP}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
    } else {
        echo " <script type=\"text/javascript\">alert('Không tìm thấy sản phẩm!'); </script>";
        die();
    }


    $Seri = isset($_GET['seri']) ? $_GET['seri'] : "";
    $sql2 = "select SL from tbscan where MaSP = '{$MaSP}' and Seri = '{$Seri}'";
    $rs  = $conn->query($sql2);
    $SL = 0;
    if ($rs->num_rows > 0) {
        $tb = $rs->fetch_assoc();
        $SL = $tb['SL'];
    }
    $SL++;
   
        if ($SL == 1) {
            $sql2 = "insert into tbscan values ('{$MaSP}','{$Seri}',1)";
            
        } 
        else {
            $sql2 = "update tbscan set SL = '{$SL}' where MaSP = '{$MaSP}' and Seri ='{$Seri}'";
           
        }
    
     $conn-> query($sql2);

     // lay thong tin nguoi dung
     $sql = "select * from tbthongtin where MaSP = \"{$MaSP}\" and seri = \"{$Seri}\"";
     $rs = $conn->query($sql);
     if ($rs->num_rows > 0) {
         $rowKH = $rs->fetch_assoc();
     } else  {
         $rowKH['SDT'] = "";
         $rowKH['HoTen'] = "";
         $rowKH['Email'] = "";
         $rowKH['DiaChi'] = "";
         $rowKH['TinhTP'] = "";
         $rowKH['QuanHuyen'] = "";
     }
 

   
}
?>