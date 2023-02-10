<?php 
include('../include/Header-member.php');
include('../include/connection.php');

if(isset($_POST["cart"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'id'			=>	$_GET["id"],
				'name'			=>	$_POST["hidden_name"],
				'price'		=>	$_POST["hidden_price"],
				'quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'id'			=>	$_GET["id"],
			'name'			=>	$_POST["hidden_name"],
			'price'		=>	$_POST["hidden_price"],
			'quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $val)
		{
			if($val["id"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
			}
		}
	}

	if($_GET["action"] == "clear")
	{
		unset($_SESSION['cart']);
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Menu Page</title>
		<!--<link rel="stylesheet" type="text/css" href="../Style/style-page.css">-->
		<!-- Icon library -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
         /* Pizza Menu Page style */
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
//				if(mysqli_num_rows($result) > 0)
//				{
                while($row = mysqli_fetch_array($query))
                {
            ?>

			<div class="product">
				<form method="post" action="product.php?action=add&id=<?php echo $row["id"]; ?>">

					<div class="container">
						<img src="<?php echo $row["img"]; ?>" alt="product image"><br />

						<div class="product-name">
                        <h2><?php echo $row["name"]; ?></h2>
                        </div>

                        <div class="product-desc">
                        <h4 class="product-desc"><?php echo $row["description"]; ?></h4>
                        </div><br><br>

                        <em><h2>RM <?php echo $row["price"]; ?></h2></em>

                        <input class="product-qty" type="text" name="quantity" value="1"><br><br>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<button type="submit" name="cart" class="btn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
					</div>

				</form>
			</div>
		<?php
		    }
		?>

        <!-- Displaying Cart -->
        <aside>
        <div class="cart"></div>
		<br><br><br>
        <h1>My Cart</h1>
        <br><hr><br>
        <?php 
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
                    $total = 0;
                    $index = 0;
                    $i=1;
                    foreach($_SESSION["cart"] as $keys => $val)
                    {
                        $index++;
                        $subtotal = $val["quantity"] * $val["price"];
                        $total = $total + $subtotal;
                ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $val["name"]; ?></td>
                    <td><?php echo $val["price"]; ?></td>
                    <td><?php echo $val["quantity"]; ?></td>
                    <td><?php echo $subtotal; ?></td>

					<?php 
                    foreach($_SESSION['cart']as $key => $val){
                    $_SESSION['product'] = $val['name'];
                    $_SESSION['price'] = $val['price'];
                    $_SESSION['quantity'] = $val['quantity'];
                    $_SESSION['subtotal'] = $subtotal;
                    }?>

                    <td><a href="product.php?action=delete&id=<?php echo $val["id"]; ?>" class="remove-button">Remove</a></td>
                </tr>
                
                <?php $index++; } ?>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><?php echo $total; ?></td>
					<?php $_SESSION['total'] = $total;?>
                    <td></td>
                </tr>

                </tbody>
                </table>    
            
            <a href="product.php?action=clear" class="clear-button">Clear All</a>
            <a class="checkout-button" href="checkout.php">Checkout</a>
        <?php
            }}
        ?> 
    </div>
</div>

</body>
</html>



