<?php 
    require('../member/template-dashboard.php');
    require('../include/connection.php');

    $sql = "SELECT * FROM transaction WHERE email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn,$sql);   

    echo "<table border='1'>
    <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Payment</th>
    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" .$row['date']."</td>";
        echo "<td>" .$row['time']."</td>";
        echo "<td>" .$row['product']."</td>";
        echo "<td>" .$row['price']."</td>";
        echo "<td>" .$row['quantity']."</td>";
        echo "<td>" .$row['total']."</td>";
        echo "<td>" .$row['payment']."</td>";
        echo "</tr>";
    }
?>

<html>
    <head>
        <title> Member Account</title>    
        <style type="text/css">
            .nav 
            {
                background-color: #E5E5E5;
                height: 50px;
                padding: 10px;
                margin-bottom: 15px;
            }
            h2 
            {
                margin-left: 20px;
                font-size: 28px;
            }
            table
            {
                margin: 10px auto;
                justify: center;
                width: 90%;
            }
            th 
            {
                height: 40px;
                font-size: 23px;
                background-color: #aac6e3;
            }
            td
            {
                font-size: 20px;
                height: 30px;
                padding-left: 5px;
                background-color: white;
            }
           .content 
           {
               background-color: pink;
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
   
        </style>
    </head> 

    <body>
        <div class="nav">
            <h2>Transaction History</h2>
        </div><br>  
    </body>
</html>


