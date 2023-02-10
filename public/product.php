<?php 
    session_start();
    include('../include/Header-public.php');
    include('../include/connection.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Menu Page</title>
			
        <!-- <link rel="stylesheet" type="text/css" href="../Style/style-page.css/"> -->
		<!-- Icon library -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
		 .container 
        {
            max-width: 25%;
            height: 440px;
            margin: 20px 20px 20px 20px;
            padding: 10px 10px 10px 10px;
            border:solid 1px grey;
            display: inline-block;
            font-size: 14px;
            overflow: hidden;
            float: left;
        }

        .product
        {
            width: 70%;
        }

        img
        {
            width: 200px;
            height: 140px;
        }
            
        .btn, .remove-button
        {
            background: #2980B9 ;   
            border:none;
            height:35px;
            color:#ffffff;
            width:100%;
            border-radius: 1px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display:block;
            text-decoration: none;
            font-size: 18px;
            padding: 5px;
        }
            
        .btn:hover
        {
            height:35px;
            color:#FD5765;
            background:black;
            width:100%;
            border-radius:2px;
        }
            
        .cart
        {
            display: block;
        }
            
        td
        {
            padding: 0 15px;
        }

        .product-desc
        {
            display: block;
            padding: 5px;
            block-size: 95px;
            font-family: sans-serif;
            color: #2C3E50;
        }

        .product-name
        {
            display:block;
            block-size: 55px;
        }

        .product-qty{
            height: 25px;
        }

        .remove-button, .checkout-button, .clear-button 
        {
            background: red;   
            border:none;
            height:20px;
            font-size: 14px;
            padding: 2px;
        }
            
        .checkout-button, .clear-button
        {
            background: orange;
            text-decoration: none;
            font-size: 22px;
            color: #ffffff;
        }
            
        .clear-button
        {
            background: red;
        }

        button a
        {
            text-decoration: none;
        }

        onclick
        {
            cursor: pointer;
        }
		</style>
	</head>
	
	<body>
        <!--Displaying products-->
	<?php
  

	$sql = "SELECT * FROM product";
	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query))
	{
	?>
	<div class="product">
		<div class="container">
			<img src="<?=$row['img']?>" alt="product image">
	
			<div class="product-name"><h2>
				<?=$row['name']?></h2></div>
			<div class="product-desc">
				<h4><?=$row['description']?></h4></div>

			<em><h2>RM <?php echo $row["price"]; ?></h2></em>

	<input class="product-qty" type="text" name="quantity" value="1"><br><br>

	<a href="cart-action.php?action_type=add_item&id=<?=$row['id']?>&name=<?=$row['name']?>&quantity=1&price=<?=$row['price']?>" class="btn"><i class="fa fa-shopping-cart"> Add to Cart</i></a>
	</div>
	</div>
	<?php } ?>
	<br>
	
	<!-- Display Cart -->
	<aside>	
	<div class="cart">
	<h1>My Cart</h1>
	<br><hr><br>
	<?php 
	$Total=0;
	if(isset($_SESSION['cart'])) { ?>
		<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(!empty($_SESSION["cart"]))
				{
				$Total = 0;
				$index = 0;
				$i=1;
				foreach($_SESSION['cart'] as $key => $val) 
				{   
					$index++;
					$Subtotal = $val["quantity"] * $val["price"];
					$Total = $Total + $Subtotal;
			?> 

			<tr>
				<td><?=$i++?></td> 
				<td><?=$val['name']?></td>
				<td><?=$val['price']?></td>				   
				<td><?=$val['quantity']?></td>
				<td><?=$Subtotal?></td> 
				
				<?php 
				foreach($_SESSION['cart']as $key => $val){
				$_SESSION['product'] = $val['name'];
				$_SESSION['price'] = $val['price'];
				$_SESSION['quantity'] = $val['quantity'];
				$_SESSION['subtotal'] = $Subtotal;
				}?>
				
				<td><a href="cart-action.php?action_type=remove_item&index=<?=$key?>" class="remove-button">Remove </a></td>
			</tr>

			<?php $index++;} ?>
			
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>Total</b></td>
			<td><?=$Total?></td>
			<?php $_SESSION['total'] = $Total;?>
			<td></td>
			</tr>
		</tbody>
		</table>
		<a href="cart-action.php?action_type=clear_item" class="clear-button">Clear All </a>&nbsp;

        <a class="checkout-button" onclick="myalert()">Checkout</a>
    
        <script>
            function myalert() 
            {
                alert("Please register first before place order..!");
                window.location = "../member/Register.html";
            }  
        </script>
        
        <?php 
		}} 
		?>
	</div>
	</aside>
</body>
</html>