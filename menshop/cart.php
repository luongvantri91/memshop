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
            ?>   
            <?php
                
                    if(isset($_GET['xoasp'])){
                        $id = $_GET['xoasp'];
                        for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                if($_SESSION['giohang'][$i]["id"] == $id){
                                    unset($_SESSION['giohang'][$i]);
                                    header("Location: cart.php");
                                    break;
                                }else{
                                    echo "khong xoa dc";
                                }                                                                        
                        }                        
                    } 
 
                 if(isset($_POST['update'])){
                    $sluong = $_POST['sua'];
                      for($i = 0; $i < count($_SESSION['giohang']); $i++){
                               if($_SESSION['giohang'][$i]["soluong"] != $sluong){
                                   $_SESSION['giohang'][$i]["soluong"] = $sluong;
                                   break;     
                               }                                                                        
                      }     
                 }                                                           
                 $_SESSION['giohang']=array_values($_SESSION['giohang']);
            ?>
            <div class="content"> 
                <div class="cart">
                    <h2 style="text-align: center; margin-top: 50px;">Thông Tin Giỏ Hàng</h2>    
                    <table style="border-collapse: collapse;border: 1px solid;; width: 800px; display: table; margin-left: 100px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Hình Ảnh</td>
                                <td>Tên Sản Phẩm</td>
                                <td>Mã Sản Phẩm</td>
                                <td>Giá</td>      
                                <td>Số Lượng</td>
                                <td>Thành Tiềń</td>
                                <td>Xóa    </td>
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
                        
                            <form action="" method="POST">
                                <tr>
                                    <td><img src="<?php echo $row['anhsp']?>" style="width: 50px; height=80px"/></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['masp']?></td>
                                    <td> <?php echo $row['gia'] ?>
                                    <td><input style="width: 50px;" type="text" name="sua" value="<?php echo $_SESSION['giohang'][$i]["soluong"]?>"/>
                                        <a href="?suasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>"><input style="width: 70px;" type="submit" name="update" value="Sửa"/> </a>
                                    </td>
                                    <td><?php echo ($_SESSION['giohang'][$i]["soluong"]*$row['gia'])?> VNĐ</td>
                                    <td>
                                        
                                    <a href="?xoasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a>
                                        
                                    </td>
                                
                                </tr>
                            </form>
                        <?php
                            }   
                         }else{
                            echo "Không Có Sản Phẩm!";
                         }
                        ?>
                            
                        </tbody>
                    </table>
                    <?php 
                        
                        
                    ?>
                    <span>
                        <a href="index.php"><button style="margin-left: 100px; margin-top: 20px; background: #FFCBA0; height: 30px; width: 180px; font-weight: bold; border-radius: 28; font-size: 16px;">Tiếp Tục Mua Hàng</button></a>
                        <a href="ttdh.php"><button style="margin-left: 100px; margin-top: 20px; background: #FFCBA0; height: 30px; width: 180px; font-weight: bold; border-radius: 28; font-size: 16px;">Mua Hàng</button></a>
                    </span>
                    
                    <p style="float: right; margin-right: 220px; margin-top: 25px; font-weight: bold; font-size: 18px;">Tổng Tiền: 
                                <?php 
                                $tongtien = 0;
                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                    $q_cart = "select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                    $r_cart = mysqli_query($dbc,$q_cart);
                                    $row = mysqli_fetch_array($r_cart);
                                    $tongtien = $tongtien + ($_SESSION['giohang'][$i]["soluong"]*$row['gia']);
                                
                                } echo $tongtien;      
                                ?> VNĐ</p>
                    
                </div>                  
            </div>   
            <?php
             include('includes/footer.php');
    		?>	

     </div>
	</body>
</html>