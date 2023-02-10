<?php include('../include/Header-public.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>OrderMePizza Main Page</title>
			
		<!-- add icon link -->
		<link rel="icon" href="file:///C:/Users/User/OneDrive/Desktop/OrderMe%20(main%20page)/image/Ordermelogo.png" type="image/icon type">	
		
		<script src="https://kit.fontawesome.com/289e32f898.js" crossorigin="anonymous"></script> 
		
		<style type="text/css">
			header, section, footer, aside, article
			{
				display: block;				
			}
			
			body
			{
				background-image: url("images/background.png");
				font-family: Times New Roman;
			}
			
			header
			{
				background: rgb(11, 103, 165); 
				text-align: center;
				color: white;
				width: 100%;
				height: 75px;
			}
				
			header img
			{
				width: 65px;
				margin: 5px 0px 0px 0px;
			}
			
			nav ul li
			{
				display: inline-block;
			}
			
			nav ul li a
			{
				color: white;
				font-size: 17px;
				padding: 7px 13px; 
				border-radius: 3px;
				text-transform: uppercase;
				text-decoration: none;
			}

			nav ul li a:hover, nav ul li a.active
			{
				background:rgba(252, 7, 7, 0.712);
			}
			
			.order
			{
				color: #010102;
				text-shadow: 1px 2px 4px #333;
				text-transform: uppercase;
				font-size:25px;
				word-spacing: 12px;
				font-family: sains-serif;
				margin: 30px;
				text-align: center;
				position: relative;
			}	
			
			.order:before 
			{
				background-color: #c2c3e2;
				content: "";
				display: inline-block;
				width: 60px;
				height: 2px;
				position: relative;
				vertical-align: middle;
				margin: 0px 10px 0px 0px;
			}
			
			.order:after
			{
				background-color: #c2c3e2;
				content: "";
				display: inline-block;
				width: 60px;
				height: 2px;
				position: relative;
				vertical-align: middle;
				margin: 0px 10px 0px 0px;
			}
			
			.button 
			{
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 16px 60px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				transition-duration: 0.4s;
				cursor: pointer;
			}
			
			.button1
			{
				background-color: white; 
				color: black; 
				border: 2px solid #5759d7;
			}

			.button1 a 
			{
				text-decoration: none;
			}
			
			.button1:hover, .button1 a:hover
			{
				background-color: #5759d7;
				color: white;
			}

			.button2 
			{
				background-color: white; 
				color: black; 
				border: 2px solid red;
			} 
			
			.button2:hover 
			{
				background-color: red;
				color: white;
			}
			
			article 
			{
				clear: both;
				overflow: auto;
				width: 100%;
			}
			
			.promotion
			{
				margin-top: 50px;
				text-align: center;
			}
			
			footer
			{
				background-color: #c2c2c2;
				width: 1485px;
				padding: 10px;
				word-spacing: 5px;
				margin-top: 50px;
			}
				
			.navigation
			{
				text-align: center;	
				display: block;
				block-size: 40px;
				background-color: #adadad;
				font-weight: bolder;
			}
			
			.navigation li
			{
				display: inline-block;
				margin: 10px;	
			}
			
			.navigation li a
			{
				text-decoration: none;
				color: black;
				font-size: 15px;
				font-family: Bahnschrift SemiBold SemiConden;
			}
			
			.navigation li a:hover
			{
				color: white;
			}
			
			.icon
			{
				display: flex;
				justify-content: center;
				cursor: pointer;
				margin-top: 40px;
			}
			.icon a
			{
				width: 40px;
				height: 40px;
				text-align: center;
				color: black;
				box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.15);
				margin: 0 20px;
				border-radius: 50%;					
			}
			
			.icon a:hover
			{
				transform: translate(0, -8px);
			}
			
			.icon a .fa
			{
				font-size: 25px;
				line-height: 30px;
				margin: 6px;
				transition-duration: color 0.5s;
			}
			
			.icon a:hover .fa
			{
				color: #cb2045;
			}
			
			.payment
			{
				margin-top: 20px;
				text-align: center;
			}
			
			h5
			{
				word-spacing: 2px;	
				text-align: justify;
				margin: 0px 20px;
			}
		</style>
	</head>
	
	<body>
		<section class="banner">
			<article>
				<img src="../images/ordermebanner.jfif" alt="Banner" width="100%" height="350"/><br></br>
			</article>
			
			<div class="order">
				Start your order
				<button class="button button1"><a href="../public/product.php">Delivery</a></button>
				<button class="button button2">Take Away</button>
			</div>
			
			<div class="promotion">
				<img src="../images/pizza 1.png" alt="Poster" width="580" height="320">
				<img src="../images/pizza 2.png" alt="Poster" width="580" height="320">
			</div>
			
		</section>
	
		
		<?php include("../include/footer.html") ?>
	</body>
	
</html>