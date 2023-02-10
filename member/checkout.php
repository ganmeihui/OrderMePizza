<?php
	session_start();
    $email = $_SESSION['email'];
	require('../include/connection.php');

    $query = "SELECT * FROM users_db WHERE email='$_SESSION[email]'";
    $result = mysqli_query($conn,$query);   

    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $fullname = $row['fullname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
        }
    }
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Checkout</title>
        <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        * 
        {
            box-sizing: border-box;
            font-family: segoe ui, Arial, sans-serif;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }	

        html 
        {
            width: 100%;
            height: 100%;
        }
            
        body 
        {
            position: relative;
            min-height: 100%;
            color: black;
            background-color: #F8F9F9;
            margin: 0;
            padding-bottom: 100px;
        }
            
        .nav 
        {
            display: block;
            background: #ffa343;
            padding: 20px 20px;
            width: 100%;
        }
            
        a 
        {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration-line: none;
            font-family: Tahoma;
        }
        
        .content1 
        {
            width: 700px;
            margin: 0 auto;	
            display: block;
            background: white;
            padding: 30px 30px;
        }
        
        input, textarea, select
        {
            border: 1px solid #ccc;
            padding: 10px;
            display: block;
            width: 70%;
            box-sizing: border-box;
            border-radius: 2px;
            background-color: #fff;
        }
        
        hr 
        {
            border-top: 1px dashed white;
        }
        
        .subtotal 
        {
            text-align: right;
        }
        
        button 
        {
            background: #ffa343;
            color: #FFFFFF;	
            padding: 12px 20px;
            border: 0;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            float: right;
            width:100%;
        }
    
        button:hover 
        {
            background: #ff4500;
        }
            
        h2
        {
            font-size: 28px;
            color: #ff8243;
            font-family:monospace;
        }
        
        .order-label
        {
            margin-bottom: 1%; 
            font-weight: bold;
        }
        
        table, th, td 
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
            
        th, td 
        {
            padding: 6px;
            text-align: left;
        }

        </style>
    </head>

    <body>
        <div class="nav">
            <a href="product.php"><i class="fa fa-angle-left"> Checkout</i></a>
        </div><br>
        
        <div class="content1">
            <form method="post" action="">
                <h2>Delivery Detail</h2>
                <div class="order-label">Full Name:
                    <input type="text" name="fullname" placeholder="E.g. John Smith" value="<?php echo $fullname ?>" required><br>
                </div>
                <div class="order-label">Phone Number:
                    <input type="tel" name="phone" placeholder="E.g. 1x-xxxxxxx" value="<?php echo $mobile ?>"required><br>
                </div>
                <div class="order-label">Email:
                    <input type="email" name="email" placeholder="E.g. abc@example.com" value="<?php echo $email ?>"required><br>
                </div>
                <div class="order-label">Shipping Address:
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" required></textarea>
                </div>
                </div><br>	 
                                    
                <div class="content1">
                    <h2>Payment Method</h2>
                    <select name="payment">
                    <option value="" selected disabled>-Select Payment-</option>
                    <option>Cash On Delivery</option>
                    <option>Online Banking</option>
                    <option>Debit/Credit Card</option>
                    </select><br><br>
                </div><br>	

                <div class="content1">
                    <h2>Your Order</h2>
                    <table style="width:100%">
                    <table1>
                        <thead>
                            <tr>
                            <th>No.</th>
                            <th>Product</th>	
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
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
                            </tr>
                        
                            <?php $index++; } ?>
            
                        </tbody>
                    </table1>
                    <?php
                    }
                    ?> 
                    
                    <tr>
                        <th colspan="4">Cart SubTotal</th>
                        <td colspan="4">RM <?php echo $_SESSION['total'];?></td>
                    </tr>
                    <tr>
                        <th>Delivery Fee</th>
                        <td colspan="4">Free</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td colspan="4">RM <?php echo $_SESSION['total'];?></td>
                    </tr>
                    </table>
                </div><br>
                
                <div class="content1">
                    <br><label>Message (optional):</label>
                    <br><br><textarea rows="4" cols="50" name="message" placeholder="Leave message here..."></textarea><br>
                    <button class="button" type="submit" name="placeorder">Place Order</button><br>
                </div>
        </form>
    </body>
</html>

<?php
	if(isset($_POST['placeorder']))
	{	
        $index = 0;
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$payment = $_POST['payment'];
		$amount = $_SESSION['total'];
		$message = $_POST['message'];

		$query = "INSERT INTO checkout_db (full_name, phone, email, address, payment, amount, message) VALUES('$fullname','$phone','$email','$address','$payment','$amount','$message')";
		if($conn->query($query)===TRUE)
		{
			echo '<script> alert("Place Order Done!")</script>'; 
		}
		else{
			echo '<script> alert("Place Order Failed!")</script>';	
		}
		
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date('Y-m-d');
		$time = date('H:i:s');
        $fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
        $address = $_POST['address'];
		$product = $_SESSION['product'];
		$price = $_SESSION['price'];
		$quantity = $_SESSION['quantity'];
		$total = $_SESSION['total'];
        $payment = $_POST['payment'];

		 $sql = "INSERT INTO transaction (date, time, full_name, phone, email, address,  product, price, quantity, total, payment) VALUES('$date','$time','$fullname','$phone','$email','$address','$product','$price','$quantity','$total','$payment')";
		//$sql = "INSERT INTO transaction (date, time, product, price, quantity, subtotal, total, member) VALUES('$date','$time','$product','$price','$quantity', '$subtotal','$total','$email')";
        if($conn->query($sql)===TRUE)
		{
			echo '<script> alert("Saved!")</script>';
			unset($_SESSION['total']);
            echo "<meta http-equiv='refresh' content='1; URL=receipt.php'>";
		}
		else{
			echo '<script> alert("Failed to Save!")</script>';	
		}
		
		$index++;
	}
	$conn->close();
?>