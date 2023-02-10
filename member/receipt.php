<?php 
    session_start();
    $email= $_SESSION['email'];
    require('../include/connection.php');

    $query = "SELECT * FROM checkout_db WHERE email = '$_SESSION[email]'";
    $result = mysqli_query($conn,$query);   

    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $full_name = $row['full_name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
            $payment = $row['payment'];
            $amount = $row['amount'];
        }
    }
?>

<html lang="en">
<head>
    <title>Payment Receipt</title>
    <style type="text/css">
        a 
        {
            color: #5D6975;
            text-decoration: underline;
        }

        body
        {
            width: 21cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            border: 1px transparent rgb(114, 114, 114);
            box-sizing: border-box;
            position: relative;
            color: #001028;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 12px; 
            font-family: Arial;
        }

        header 
        {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo 
        {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img 
        {
            width: 90px;
        }

        h1 
        {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project 
        {
            float: left;
            margin-bottom: 50px;
        }

        #project span 
        {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 30px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company 
        {
            float: right;
            text-align: right;
        }

        #project div,
        #company div 
        {
            white-space: nowrap;
        }

        table 
        {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td 
        {
            background: #F5F5F5;
        }

        table th,
        table td 
        {
            text-align: center;
        }

        table th 
        {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal;
        }

        table .desc 
        {
            text-align: left;
        }

        table td 
        {
            padding: 20px;
            text-align: center;
        }

        table td.desc 
        {
            vertical-align: top;
        }

        #notices .notice 
        {
            color: #5D6975;
            font-size: 1.2em;
        }

        button
        {
            display: inline-block;
            border-radius: 8px;
            background-color: #e7e7e7;
            border: none;
            color: black;
            text-align: center;
            font-size: 10px;
            text-decoration: none; 
            padding: 12px 15px;
            width: 150px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 8px;
        }

        button span 
        {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        button span:after 
        {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        button:hover span 
        {
            padding-right: 25px;
        }

        button:hover span:after 
        {
            opacity: 1;
            right: 0;
        }

        footer 
        {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <div id="logo">
            <img src="../images/Logo1.png">
        </div>
        <div id="company" class="clearfix">
            <div>Order Me Pizza</div>
            <div>123 Mia Heights, <br /> Jln Jugah, 93550 Malaysia</div>
            <div>(60) 1-23456789</div>
            <div><a href="mailto:ordermepizza@pizza.com">ordermepizza@pizza.com</a></div>
        </div>
        <div id="project">
            <div><span>CLIENT</span><?php echo $full_name ?></div>
            <div><span>PHONE</span><?php echo $phone ?></div>
            <div><span>ADDRESS</span><?php echo $address ?></div>
            <div><span>EMAIL</span><?php echo $email ?></div>
        </div>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><?php echo $total; ?></td>
                    <?php $_SESSION['total'] = $total;?>
                </tr>        
            </tbody>
        <?php
            }
        ?>
         
        </table>
        <div id="notices">
            <div>NOTICE: </div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>

        <br><br>
        <form>
            <input type="button" value="Print receipt" onClick="window.print()">
        </form>
        <!-- <button type="submit" class="btn"><span><a href="pdfgen-member.php">Print receipt</a></span></button> -->
        <button type="submit" class="btn"><span><a href="product.php">Continue Shop</a></span></button>

    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>

</body>
</html>

<?php

    //clear the cart item once done checkout
		if(isset($_SESSION['cart']))
		{
			unset($_SESSION['cart']);
		}

?>