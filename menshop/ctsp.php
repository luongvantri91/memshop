<?php
ob_start();
session_start();

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
        
		<div class="container"> 
            
            <?php
            
                include('includes/top.php');
                include('includes/header.php');
                include('includes/menu.php');
                include('includes/mysqli_connect.php');
                include('includes/function.php');
                ?>
                <?php
                    $j =0;
                    if (isset($_POST['submit'])){
                        $masp = $_GET['masp'];
                        if (isset($_SESSION['username'])){
                            $username = $_SESSION['username'];    
                        
                            $soluong = $_POST['quantity'];
                    //        $size = $_POST['menu'];
                            
                            $q_gia = "select gia from sanpham where masp='".$masp."'";
                            $r_gia = mysqli_query($dbc, $q_gia);
                            $r = mysqli_fetch_array($r_gia, MYSQLI_ASSOC);  
                            $gia = $r['gia'];
                            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                                
                            }
                            else{
                                 $_SESSION['giohang'] = array();
                            }   
                                    $count = count($_SESSION['giohang']);
                                    $_SESSION['giohang'][$count]["id"] = $masp;
                                    $_SESSION['giohang'][$count]["soluong"] = $soluong;
                                    
                              //      $_SESSION['giohang'][$count]["size"] = $size;
      
                                      header("Location: index.php");
                            }else{
                                header("Location: login.php");
                        }
                    }else{
                     ?>   
                
            <div id="content">
                <h1>Chi Tiết Sản Phẩm</h1>
                <?php
                    $masp = $_GET["masp"];  
                    $sql = "select * from sanpham where masp = '".$masp."'";
                    $ctsp = mysqli_query($dbc,$sql);
                    $row1 = mysqli_fetch_array($ctsp,MYSQLI_ASSOC); 
                    
                ?>

                <div class="ctsp">
                    <div class="left">
                        <a href="#"> <img src="<?php echo $row1["anhsp"] ?>" width="380" height="400"/></a>
                    </div>
                    
                    <div class="right">
                        <form id="" action="" method="post">
                            <p style="text-align: center;"><?php echo $row1["tensp"] ?></p>
                            <p >Mã Sản Phẩm: <?php echo $row1["masp"] ?> </a>
                            <p>Giá: <?php echo $row1["gia"] ?> VNĐ </p>
                 <!--           <div class="size">
                                <span>Size: </span>    <select name="menu">
    
                                            <option value="M" >M</option>
                                        
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                         </select>
                              </div>           -->
                             <div class="sl">           
                                <span>Số Lượng: </span> <input type="text" name="quantity" size="2" value="1"></
                            </div> 
                            <p><input style="width: 200px; height: 30px; font-size: 16px;" type="submit" id="submit" name="submit" value="Thêm vào giỏ hàng"/></p>
                        </form>
                        
                        </div>
                    </div>
                </div>
                
            </div>
               <?php }
                ?>
          <?php
             include('includes/footer.php');
    		?>	
            
        </div>
	</body>
</html>
<?php ob_flush();?>