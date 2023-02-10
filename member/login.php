<!DOCTYPE html>
<html>
    <head>
        <title>Member Database Validation</title>
        <!--auto redirect after 1 second-->
        <meta http-equiv = "refresh" content = "1; url = Login.html" /> 
    </head>
</html>

<?php
    require_once('../include/connection.php');

    $email = $password = $psw = '';

    $email = $_POST['email'];
    $psw = $_POST['password'];
    $password = MD5($psw);  //encrypt password before store in database (security)

    $sql = "SELECT * FROM users_db WHERE email='$email' AND password='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row["ID"];
            $email = $row["email"];
            session_start();
            $_SESSION['id'] = $id;
		    $_SESSION['email'] = $email;
        }
        header("Location: ../member/mainpage.php");

    }
    else
    {
        // Display the alert box 
        echo '<script>alert("Login failed. Invalid email or password!! Auto redirect to previous page...")</script>'; 
    }
?>