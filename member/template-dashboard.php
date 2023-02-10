<?php
    session_start();
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/289e32f898.js" crossorigin="anonymous"></script> 

        <style>
            *
            {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            img
            {
                margin-top: 30px;
                margin-bottom: 20px;
            }
            .logo
            {
                margin: 0px;
                margin-left: 20px;
                font-weight: bold;
                color: white;
                margin-bottom: 30px;
                font-size: 36px;
            }
            .logo span
            {
                color: #f7403b;
            }
            aside
            {
                height: 100%;
                width: 250px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #272c4a;
                overflow: hidden;
                transition: 0.5s;
                padding-top: 30px;
            }
            aside a
            {
                padding: 15px 8px 15px 32px;
                text-decoration: none;
                font-size: 20px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }
            aside a:hover
            {
                color: #f1f1f1;
                background-color: #1b203d;
            }
            .vertical-menu 
            {
                width: 250px;
            }
            .vertical-menu a 
            {
                background-color: #ecf0f3;
                color: black;
                display: block;
                padding: 12px;
                text-decoration: none;
            }
            .vertical-menu a:hover 
            {
                background-color: #ccc;
            }
            .vertical-menu a.active 
            {
                background-color: #969696;
                color: white;
            }
            .header
            {
                background-color: #414558;
                padding: 20px;
            }
            ul
            {
                margin-left: 65%;
            }
            .menu ul li, .menu ul li a
            {
                display: inline-block;
                margin-left: 20px;
                font-size: 20px;
                color: white;
            }
            .menu ul li a:hover
            {
                color: #c6cfff;
            }
            body
            {
                width: 81%;
                float: right;
            }

        </style>
    </head>

    <body> 
        <aside>
            <p class="logo"><span>Order Me</span> Pizza</p>
            <a href="../member/dashboard.php" class="icon-a"><i class="fa fa-dashboard icons"></i>&nbsp;&nbsp;Member Dashboard</a>
            <a href="../member/profile.php" class="icon-a"><i class="fa fa-user-o"></i>&nbsp;&nbsp;Profile</a>
            <a href="../member/transaction_detail.php" class="icon-a"><i class="fa fa-list-alt icons"></i>&nbsp;&nbsp;Transaction</a>
            <a href="../logout.php" class="icon-a"><i class="fa fa-user icons"></i>&nbsp;&nbsp;Logout</a>
        </aside>

        <div class="header">
            <div class="menu">
                <ul>
                    <li><?php echo $email;?></li>
                    <li><a href="../member/mainpage.php"><i class="fa fa-home"> Home</i></a></li>
                </ul>
            </div>
        </div>
    </body>
</html>