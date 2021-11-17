<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>verify.icheck.vn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/n/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/n/vendor/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="/n/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/n/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet">
    <link href="/n/vendor/select2/select2.min.css" rel="stylesheet">
    <link href="/n/stylesheets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"> -->
    <link href="https://unpkg.com/loyalty-module@1.2.12/check-code/check-code.loyalty.css" rel="stylesheet">
    <style>
        #update {
            /* #B4B4B4 */
            color: white;
            position: fixed;
            background-color: rgb(71, 117, 209);
            width: 150px;
            height: 30px;
            bottom: 0;
            text-align: center;
            margin: 0px;
        }
        
        .update {
            bottom: 20px;
            position: fixed;
            /* font-style: italic; */
            /* font-weight: 500; */
            /* font-size: 14px; */
            /* line-height: 17px; */
            color: white;
            margin-left: 33%;
            background-color: rgb(71, 117, 209);
        }
        /* button {
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            text-decoration: none !important;
        } */
        .container{background:#D8D8D8}
    </style>
</head>

<body style="overflow-y: auto;">
   
        <div class="container" style="padding: 0">
            <div class="loyalty">
                <div class="row" style="margin: 0">
                    
                    <div class="box-header">
                    <div class="images-list owl-carousel owl-loaded">
                        <?php
                        include 'showimg.php';
                        ?> 
                    </div>
                    </div>


                    <div class="pd-container" style="background: #FFF">
                        <p class="titleHead" name="TenSP">
                            <?php echo $row["TenSP"]; ?>
                        </p>
                        <div>
                            <p class="price dl-inline-block"></p>
                            <img class="dl-inline-block" src="http://ucontent.icheck.vn/ensign/VN.png" alt="1" style="margin-right: 4px;width:20px">
                            <p class="nameCountry dl-inline-block"> Việt Nam</p>
                            <div class="barcode"><img class="dl-inline-block" src="/n/images/1/vector.png" alt="1" style="margin-right: 4px;">
                                <p class="dl-inline-block" name="MaSP">
                                    8938536323039
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="boxError" id ="bError">
                    <img src="/n/images/1/ic_waring_white_24px.png" alt="ic_waring_white_24px">
                    <p style="padding:12px 3px;white-space: pre-line">SẢN PHẨM NÀY ĐÃ VƯỢT QUÁ SỐ LƯỢT QUÉT, QUÝ KHÁCH LƯU Ý KHI MUA VÀ SỬ DỤNG SẢN PHẨM</p>
                </div>
                <div class="boxSuss" id = "bSuss">
                    <img src="/n/images/1/ic_succ_30px.png" alt="ic_succ">
                    <p style="padding:12px 3px;white-space: pre-line">SẢN PHẨM CHÍNH HÃNG CỦA DOANH NGHIỆP TƯ NHÂN HỒ QUANG TRÍ SẢN XUẤT</p>
                </div>
                <div class="pd-container box-serial baseBox"><div class="serial"><p>Serial: <?php echo $row['MaSP'],' - ',$Seri; ?></p></div></div>
                <div class="pd-container box-serial baseBox">
                    <div class="clearfix">
                        <div class="fl-left w-50" style="position: relative">
                            <img class="dl-inline-block" src="/n/images/1/Group2424.png" alt="Group2424">
                            <div class="dl-inline-block count">
                                <p name="scan">
                                    <?php echo $SL; ?>
                                </p>
                                <p>Số lần quét</p>
                            </div>
                            <div class="lineCenter"></div>
                        </div>
                        <div class="fl-left w-50">
                            <img class="dl-inline-block" src="/n/images/1/Group2426.png" alt="Group2426">
                            <div class="dl-inline-block count">
                                <p><?php if($SL==1)echo '1';else echo'2'; ?></p>
                                <p>Số người quét</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="baseBox pd-container salePoint">
                    <div class="clearfix">
                        <!--img.fl-left.avatarCompany(src='/images/1/Rectangle541.png', alt='Rectangle541')-->
                        <div class="fl-left boxCompany">
                            <div class="clearfix">
                                <div class="fl-left" style="width: calc(100% - 33px)">
                                    <div class="clearfix">
                                        <p class="companyTitle fl-left maxLength" name="NhaSX">
                                            <?php echo $row['NhaSX']; ?>
                                        </p>
                                        <!--img.fl-left.verifiedCompany(src='/images/1/ic_verified_24px.png', alt='ic_verified_24px')-->
                                    </div>
                                    <p class="producer">Nhà sản xuất</p>
                                </div>
                                <div class="fl-left detailCompany" onclick="showModalVendor()">
                                    <img class="fl-left" src="/n/images/1/Mask2.png" alt="Mask2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-bottom: 10px;margin-top: 10px;">
                    <div>
                        <div class="warrantyInformation clearfix">
                            <img src="/n/images/1/Polygon1.png" alt="Polygon1">
                            <p><?php echo $row['SDT']; ?></p>
                        </div>
                        <div class="warrantyInformation clearfix">
                            <img src="/n/images/1/Polygon1.png" alt="Polygon1">
                            <p><span>
                                <?php echo $row['DiaChi'],', Huyện ',$row['QuanHuyen'],', Tỉnh ',$row['TinhTP']; ?></strong>
                            </span></p>
                        </div>
                        <div class="warrantyInformation clearfix">
                            <img src="/n/images/1/Polygon1.png" alt="Polygon1">
                            <p name="MaDN">
                            <?php echo "Mã doanh nghiệp: " . $row['MaDN']; ?>
                            </p>
                        </div>
                    </div>
                  
                </div>








                <div class="modal fade" id="modal-vendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-keyboard="false" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-loyalty-content modal-content">
                            <div class="modal-body" style="overflow-y: auto;">
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span style="font-size: 31px;position: relative;top: -9px;" aria-hidden="true">×</span>
                            </button>
                                <h4 class="text-center" style="font-size: 1.5rem;margin-bottom: 20px;">
                                <?php echo $row['NhaSX']; ?></h4>
                                <div class="form-group" name="DiaChi2"><strong>Địa chỉ:</strong>
                                    <?php echo $row['DiaChi']; ?></div>
                                <div class="form-group" name="QuanHuyen"><strong>Quận/huyện:</strong> <?php echo $row['QuanHuyen']; ?></div>
                                <div class="form-group" name="TinhTP"><strong>Tỉnh/thành phố:</strong><?php echo $row['TinhTP']; ?></div>
                                <div class="form-group" name="SDT"><strong>Số điện thoại:</strong> <?php echo $row['SDT']; ?></div>
                                <div class="form-group" name="Email"><strong>Email:</strong> <?php echo $row['Email']; ?></div>
                                <div class="form-group" name="MaDN"><strong>Mã GLN:</strong> <?php echo $row['MaDN']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="baseBox pd-container salePoint" style="margin-bottom:0px;">
                    <div class="clearfix">
                        <p class="salePointTitle fl-left">THÔNG TIN SẢN PHẨM</p>
                    </div>
                    <div class="detailProduct">
                        <p></p>
                        <p style="text-align: center;"><span style="color:#ff0000"><strong><?php echo $row['NhaSX'] ?></strong></span>
                        </p>
                       

                         <!-- <p style="text-align: center;"><strong>abc</strong></p> -->

                      
                        <p  style="text-align: justify;"> 
                            <?php echo $row['TTSP']; ?>
                        </p>
                        <p></p>
                        <div class="shadowContent">
                            <p class="readMore" onclick="getInfoProduct('183709','THÔNG TIN SẢN PHẨM')">Xem chi tiết &nbsp;<img src="/n/images/1/Mask22.png" alt="Mask22">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="text-align:center">
                    <button class="btn btn-primary btn-submit-info" type="button" style="width: 200px;background-color: #3C5A99!important;color:#fff" onclick="showUpdate()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>&nbsp;  Cập nhật thông tin</button>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-update-info" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-loyalty-content modal-content">
                    <div class="modal-body">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span style="font-size: 31px;position: relative;top: -9px;" aria-hidden="true">×</span>
                    </button>
                        <form id="form-info-loyalty" style="margin-top:10px" method = "POST">
                            <div class="form-modal-update-info" style="height: 500px; overflow: auto; margin-right: 0px; position: relative; right: -8px; margin-top: 20px;">
                                <div class="form-group">
                                    <label >Số điện thoại<span class="text-danger">(*)</span>
                                </label>
                                    <input class="flex-grow-1 form-control" id="evs_phone" has_info="false" name = "SDTKH" placeholder="Nhập số điện thoại" value="<?php echo $rowKH["SDT"]; ?>" type="text">
                                </div>
                                <div class="form-group">
                                    <label >Họ và tên<span class="text-danger"></span>
                                </label>
                                    <input name = "HoTenKH" class="flex-grow-1 form-control" id="name" placeholder="Nhập họ tên" type="text" value="<?php echo $rowKH["HoTen"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label >Email</label>
                                    <input name = "EmailKH" class="flex-grow-1 form-control" id="email" placeholder="Nhập email" type="text" value="<?php echo $rowKH["Email"]; ?>">
                                </div>
                                <div class="form-group">
                                <label>Tỉnh/Thành Phố</label>
                                <select name="calc_shipping_provinces" class="flex-grow-1 form-control" required="">
                                    <option value="" selected="selected"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quận Huyện</label>
                                <select name="calc_shipping_district" class="flex-grow-1 form-control" required="">
                                    <option value="">Quận / Huyện</option>
                                </select>
                            </div>
                            <input class="billing_address_1" name="" type="hidden" value="">
                            <input class="billing_address_2" name="" type="hidden" value="">
                                <div class="form-group">
                                    <label >Địa chỉ
                                </label><span class="text-danger"></span>
                                    <input  name = "DiaChiKH" class="flex-grow-1 form-control" id="address" placeholder="Nhập địa chỉ" type="text" value="<?php echo $rowKH["DiaChi"]; ?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-submit-info" type="submit" name ="submitinfo" style="width: 100%;background-color: #3C5A99!important;color:#fff">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-info-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false" data-keyboard="false" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-loyalty-content modal-content">
                    <div class="modal-body" style="overflow-y: auto;">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span style="font-size: 31px;position: relative;top: -9px;" aria-hidden="true">×</span>
                    </button>
                        <h5 class="modal-title-content">THÔNG TIN SẢN PHẨM</h5>
                        <div class="modal-body-content">
                            <p style="text-align: center;"><span style="color:#ff0000"><strong><?php echo $row['NhaSX']; ?></strong></span>
                            </p>
                            
                            <p style="text-align: justify;">
                                <?php echo $row['TTSP']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


   

        <script>
            function showModalVendor() {
                $('#modal-vendor').modal('show');
            }

            function getInfoProduct() {
                $('#modal-info-product').modal('show');
            }

            function showUpdate() {
                $('#modal-update-info').modal('show');
            }
        </script>
         <script src="/n/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/n/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/n/vendor/owl-carousel/js/owl.carousel.js"></script>
    <script src="/n/javascripts/geo-min.js"></script>
    <script src="/n/javascripts/main.js"></script>
    <script src="/n/javascripts/fingerprint.js"></script>
    <script src="/n/vendor/select2/select2.min.js"></script>
    <script src="/n/javascripts/customize/modal.js"></script>
    <script src="/n/javascripts/customize/scan.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
    <!-- <script src="https://unpkg.com/loyalty-module@1.2.14/check-code/check-code.loyalty.js"></script>  -->
     <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        // if (address_2 = localStorage.getItem('address_2_saved')) {
        //     $('select[name="calc_shipping_district"] option').each(function() {
        //         if ($(this).text() == address_2) {
        //             $(this).attr('selected', '')
        //         }
        //     })
        //     $('input.billing_address_2').attr('value', address_2)
        // }
        // if (district = localStorage.getItem('district')) {
        //     $('select[name="calc_shipping_district"]').html(district)
        //     $('select[name="calc_shipping_district"]').on('change', function() {
        //         var target = $(this).children('option:selected')
        //         target.attr('selected', '')
        //         $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        //         address_2 = target.text()
        //         $('input.billing_address_2').attr('value', address_2)
        //         district = $('select[name="calc_shipping_district"]').html()
        //         localStorage.setItem('district', district)
        //         localStorage.setItem('address_2_saved', address_2)
        //     })
        // }
        // $('select[name="calc_shipping_provinces"]').each(function() {
        //     var $this = $(this),
        //         stc = ''
        //     c.forEach(function(i, e) {
        //         e += +1
        //         stc += '<option value=' + e + '>' + i + '</option>'
        //         $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
        //         if (address_1 = localStorage.getItem('address_1_saved')) {
        //             $('select[name="calc_shipping_provinces"] option').each(function() {
        //                 if ($(this).text() == address_1) {
        //                     $(this).attr('selected', '')
        //                 }
        //             })
        //             $('input.billing_address_1').attr('value', address_1)
        //         }
        //         $this.on('change', function(i) {
        //             i = $this.children('option:selected').index() - 1
        //             var str = '',
        //                 r = $this.val()
        //             if (r != '') {
        //                 arr[i].forEach(function(el) {
        //                     str += '<option value="' + el + '">' + el + '</option>'
        //                     $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
        //                 })
        //                 var address_1 = $this.children('option:selected').text()
        //                 var district = $('select[name="calc_shipping_district"]').html()
        //                 localStorage.setItem('address_1_saved', address_1)
        //                 localStorage.setItem('district', district)
        //                 $('select[name="calc_shipping_district"]').on('change', function() {
        //                     var target = $(this).children('option:selected')
        //                     target.attr('selected', '')
        //                     $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        //                     var address_2 = target.text()
        //                     $('input.billing_address_2').attr('value', address_2)
        //                     district = $('select[name="calc_shipping_district"]').html()
        //                     localStorage.setItem('district', district)
        //                     localStorage.setItem('address_2_saved', address_2)
        //                 })
        //             } else {
        //                 $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
        //                 district = $('select[name="calc_shipping_district"]').html()
        //                 localStorage.setItem('district', district)
        //                 localStorage.removeItem('address_1_saved', address_1)
        //             }
        //         })
        //     })
        // })
    </script>
    <script>
        $('select[name="calc_shipping_provinces"]').each(function() {
            var $this = $(this),
                stc = '';
            var
                a = <?php if ($rowKH['TinhTP']=="") echo 0; else echo $rowKH['TinhTP']; ?>,
                b = '<?php echo $rowKH['QuanHuyen']; ?>'
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = c[a - 1]) {
                    $('select[name="calc_shipping_provinces"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })

                }
            })
            if (c[a - 1] != "") {
                i = $this.children('option:selected').index() - 1
                var str = '',
                    r = $this.val()
                if (r != '') {
                    arr[i].forEach(function(el) {
                        str += '<option value="' + el + '">' + el + '</option>'

                    })
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                    $('select[name="calc_shipping_district"]').on('change', function() {
                        var target = $(this).children('option:selected')
                        target.attr('selected', '')
                        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                    })
                } else {
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                }
                $('select[name="calc_shipping_district"] option').each(function () {
                    if (this.text == b )  $(this).attr('selected','');
                 })
            }
            $this.on('change', function(i) {
                i = $this.children('option:selected').index() - 1
                var str = '',
                    r = $this.val()
                if (r != '') {
                    arr[i].forEach(function(el) {
                        str += '<option value="' + el + '">' + el + '</option>'

                    })
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                    $('select[name="calc_shipping_district"]').on('change', function() {
                        var target = $(this).children('option:selected')
                        target.attr('selected', '')
                        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
                    })
                } else {
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
                }

            })


        })
    </script>
</body>

</html>

<?php
 // kiem tra chinh hang hay k 
 $sql3 = "select MaxScan from tbqr where seri = '{$Seri}'";
 $res = $conn->query($sql3);
 if ($res->num_rows > 0) {
     $rowScan = $res->fetch_assoc();
 }
 $rowScan['MaxScan'] = isset($rowScan['MaxScan'])  ? $rowScan['MaxScan'] : 0;
 if ($Seri == "") $rowScan['MaxScan'] = 10000000;
 if ($SL <= $rowScan['MaxScan']) {
     // Show Chinh hang

     echo "
     <script>    
     document.getElementById('bError').style.display='none';
     document.getElementById('bSuss').style.display='block';
     </script>
     ";
 } else {
     // Canh bao
     echo "
     <script>    
     document.getElementById('bSuss').style.display='none';
     document.getElementById('bError').style.display='block';
     </script>
     ";
   
 }
 if (isset($_POST['submitinfo'] )) {
    // get thong tin 
    $SDTKH = $_POST['SDTKH'];
    $HoTenKH = $_POST['HoTenKH'];
    $EmailKH = $_POST['EmailKH'];
    $DiaChiKH = $_POST['DiaChiKH'];
    $Tinh = $_POST['calc_shipping_provinces'];
    $QuanHuyen = $_POST['calc_shipping_district'];
    // Kiem tra co du lieu o trong chua
    $sql = "select * from tbthongtin where MaSP = \"{$MaSP}\" and seri = \"{$Seri}\"";
    $rs = $conn->query($sql);
    $sql2 = "";
   if ($rs->num_rows > 0) {
        // update
        $sql2 = sprintf("update tbthongtin set SDT = \"{$SDTKH}\",HoTen = \"{$HoTenKH}\",Email = \"{$EmailKH}\",TinhTP = \"{$Tinh}\",QuanHuyen = \"{$QuanHuyen}\",DiaChi = \"{$DiaChiKH}\" where MaSP =\"{$MaSP}\" and Seri =\"{$Seri}\"  ");
    } else {
        //insert
        $sql2 = sprintf("insert into tbthongtin values (\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\")", $MaSP, $Seri, $SDTKH, $HoTenKH, $EmailKH, $Tinh, $QuanHuyen, $DiaChiKH);
    }
    
    if ($conn->query($sql2) === TRUE) {
        echo "
        <script> console.log('update infor pass'); </script>
        ";
    } 
    else {
        echo "
        <script> console.log('update infor fail'); </script>
        ";
    }
}
?>