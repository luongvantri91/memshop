<?php
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
            <div id="content">
                <h1 style="margin-top: 30px; margin-left: 200px; font-weight: bold;">Thêm Đơn Hàng Thành Công!</h1>         
                
            </div>
        </div>
    </body>
 </html>