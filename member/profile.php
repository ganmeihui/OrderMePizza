<?php 
    require('../member/template-dashboard.php');
    require('../include/connection.php');

    $sql = "SELECT * FROM users_db WHERE email='$_SESSION[email]'";
    $result = mysqli_query($conn,$sql);   

    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $fullname = $row['fullname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
            $gender = $row['gender'];
            $state = $row['state'];
            $address = $row['address'];
        }
    }
?>

<html>
    <head>
        <title> Member Account</title>    
        <style type="text/css">
            h1
            {
                margin-top: 30px;
                margin-bottom: 10px;
                margin-left: 5%;
                color: #d77822;
            }
            h2
            {
                margin-left: 5%;
                font-family: Arial;
            }
            hr
            {
                margin-top: 20px;
                margin-left: 5%;
            }
            table 
            {
                margin: 10px auto;
                justify-content: center;
            }
            #profile 
            {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                font-size: 18px;
                width: 50%;
            }
            #profile td, #profile th
            {
                border: 1px solid #6b6b6b;
                padding: 10px;
                text-align: left;
            }
            #profile tr:nth-child(even)
            {
                background-color: #f2f2f2;
            }
            .pull-right
            {
                padding-right: 20px;
            }
            .editAcc
            {
                font-size: 18px;
                justify-content: center;
                padding-top: 40px;
                margin-left: 45%;
            }
            .editAcc a
            {
                color: white;
                background-color: #d77822;
                padding: 10px 30px;
                border-radius: 6px;
                text-decoration: none;
            }
            .editAcc a:hover 
            {
                color: black;
                background-color: #c2c2c2;
            }
        </style>
    </head> 

    <body>
        <h1>PROFILE</h1>
        <h2>User Account Details:</h2>
        <hr width= 90%><br>
        
        <table id="profile">	
            <tr>
                <th>Fullname</th>
                <td><?php echo $fullname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><?php echo $mobile ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td>******************</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $gender ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $state ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $address ?></td>
            </tr>
            </table>
            <div class="editAcc"><a href="editAccount.php">Edit Account</a></div>
    </body>
</html>
