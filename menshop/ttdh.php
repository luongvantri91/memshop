
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
        
		<div class="container"> 
            <?php
                session_start();
                include('includes/top.php');
                include('includes/header.php');
                include('includes/menu.php');
                include('includes/mysqli_connect.php');
                include('includes/function.php');
                ?>
            <div id="content">
                <?php 
                    if(isset($_POST['dathang'])){
                        $username = $_SESSION['username'];
                        $tongtien = 0;
                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                    $q_cart = "select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                    $r_cart = mysqli_query($dbc,$q_cart);
                                    $row = mysqli_fetch_array($r_cart);
                                    $tongtien = $tongtien + ($_SESSION['giohang'][$i]["soluong"]*$row['gia']);
                                
                                }
                         $hoten = $_POST['htnn'];
                         $diachi = $_POST['diachi'];
                         $sdt = $_POST['sdt'];   
                         $trangthai = 0;
                        $q_insert = "insert into donhang(username,tongtien,hotennn,diachinn,sdt,trangthaitt) values('{$username}','{$tongtien}','{$hoten}','{$diachi}','{$sdt}','{$trangthai}')";
                        $r_insert = mysqli_query($dbc,$q_insert);
                        if($r_insert){
                            for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                $q_max = "select max(madh) from donhang";
                                $r_max = mysqli_query($dbc,$q_max);
                                $row = mysqli_fetch_array($r_max);
                                $madh = $row[0];
                                $masp = $_SESSION['giohang'][$i]['id'];
                                $soluong = $_SESSION['giohang'][$i]['soluong'];
                         //       $size = $_SESSION['giohang'][$i]['size'];
                                
                        //        $q_cart ="select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                         //       $r_cart =mysqli_query($dbc,$q_cart);
                         //       $row1 = mysqli_fetch_array($r_cart);            
                         //       $gia = $_SESSION['giohang'][$i]['soluong'] * $row1['gia'];
                                
                                $q_dh = "insert into ctdh(madh,masp,soluong) values('$madh','$masp','$soluong')";
                                $r_dh = mysqli_query($dbc,$q_dh);
                            }
                        }
                        unset($_SESSION['giohang']);
                        header("Location: index1.php");
                    }
                    
                    
                ?>
                <form action="" method="post">
                    <fieldset>
                        <legend>Thông Tin Đặt Hàng</legend>
                        <div class="ttdh">
                            <div class="left_dh" style="float: left; width: 400px; height: auto;">
                                <?php 
                                      $q_user = "select * from khachhang";
                                      $r_user = mysqli_query($dbc,$q_user);
                                      $row2 = mysqli_fetch_array($r_user);
                                      
                                ?>
                                
                                <div>
                                    <label for="hoten">Họ Tên Người Nhận: <span class="dh">*</span>
                                    </label>
                                    <input type="text" tabindex="1" name="htnn" value="<?php echo $row2['fullname']?>"/>
                                </div>
                                <div>
                                    <label for="diachi">Địa Chỉ Người Nhận: <span class="dh">*</span>
                                    </label>
                                    <input type="text" tabindex="2" name="diachi" value="<?php echo $row2['diachi']?>"/>
                                </div>
                                <div>
                                    <label for="sdt">Số Điện Thoại Người Nhận: <span class="dh">*</span>
                                    </label>
                                    <input type="text" tabindex="2" name="sdt" value="<?php echo $row2['sdt']?>"/>
                                </div>
                               
                                <div>
                                    <label for="httt">Hình Thức Thanh Toán: 
                                        
                                    </label>
                                    <label for="ttknh"><input  style="width: 20px;" type="radio" id="ttknh" name="sex" value=""/> Thanh Toán Khi Nhận Hàng</label>
                                  <!--  <label for="tttt"><input type="radio" id="tttt" name="sex" value=""/> Thanh Toán Trực Tuyến</label> -->
                                </div>
                            </div>
                            <div class="right_dh"  style="float: right; width: 580px; height: auto;">
                               <div class="ctdh">
                                    <h2 style="text-align: center;">Chi Tiết Đơn Hàng</h2>    
                                    <table style="border-collapse: collapse;border: 1px solid;; width: 580px; display: table; margin-top: 30px;">
                                        <thead style="background: silver; font-size: 20px; font: bolder;">
                                            <tr style="text-align: center;">
                                                <td>Mã Sản Phẩm</td>
                                                <td>Tên Sản Phẩm</td>
                                                <td>Giá</td>
                                                <td>Số Lượng</td>
                                                <td>Thành Tiềń</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                 if(isset($_SESSION['giohang'])){
                                                    for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                                        $q_cart ="select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                                        $r_cart =mysqli_query($dbc,$q_cart);
                                                        $row = mysqli_fetch_array($r_cart);         
                                            ?>
                                                <tr style="text-align: center; margin-top: 10px;">
                                                    <td><?php echo $row['masp']?></td>
                                                    <td><?php echo $row['tensp']?></td>
                                                    <td><?php echo $row['gia'] ?></td>
                                                    <td><?php echo $_SESSION['giohang'][$i]["soluong"]?></td>
                                                    <td><?php echo ($_SESSION['giohang'][$i]["soluong"]*$row['gia'])?> VNĐ</td>
                                                </tr>
                                            <?php   }
                                                   } 
                                            ?>
                                        </tbody>
                                    </table>
                                    <p style="float: right; font-weight: bold; margin-top: 20px;">Tổng Tiền: 
                                        <?php  $tongtien = 0;
                                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                                    $q_cart = "select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                                    $r_cart = mysqli_query($dbc,$q_cart);
                                                    $row = mysqli_fetch_array($r_cart);
                                                    $tongtien = $tongtien + ($_SESSION['giohang'][$i]["soluong"]*$row['gia']);
                                                
                                                } echo $tongtien;   
                                        ?> VNĐ
                                    </p>
                            </div>
                         </div> 
                        </div>
                        <input type="submit" name="dathang" value="Đặt Hàng" style=" margin-left: 400px; height: 30px; width: 150px; font-weight: bold; border-radius: 28; font-size: 18px;"/>
                        
                    </fieldset>
                </form>
            </div>
            
        </div>
	</body>
</html>