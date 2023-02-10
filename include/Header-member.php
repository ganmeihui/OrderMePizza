<?php
    session_start();
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	
        <link rel="stylesheet" href="../Style/style-header.css">
        <script src="https://kit.fontawesome.com/289e32f898.js" crossorigin="anonymous"></script> 
    </head>
    
    <body>
        <div class="topnav">
            <ul>
                <li><a href="../logout.php"><i class="fa fa-sign-out"> Logout</i></a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $email;?></button>
                        <div class="dropdown-content">
                            <a href="../member/dashboard.php">Account</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
            
        <div class="bottomnav">
            <ul>
                <li><a href="">Order Me Pizza</a></li>	
                <li><a href="../member/mainpage.php"><i class="fa fa-home"> Home</i></a></li>
                <li><a href="product.php"><i class="fa fa-book"> Menu</i></a></li>
            </ul>
        </div>
    </body>
</html>