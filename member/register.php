<!DOCTYPE html>
<html>
    <head>
        <title>Choose Character</title>
      
    </head>

    <?php
        require_once('../include/connection.php');

        $fullname = $email = $mobile = $password = $psw = $gender = $state = '';

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $psw = $_POST['password'];
        $password = MD5($psw);  //encrypt password before store in database (security)
        $gender = $_POST['gender'];
        $state = $_POST['state'];

        //check whether the same email exist in database
        $sql = "SELECT * FROM users_db WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            echo '<script>alert("Sorry... Email already exist! Try something else.")</script>'; 
        }
        else
        {
            $sql = "INSERT INTO users_db (fullname,email,mobile,password,gender,state) VALUES ('$fullname','$email','$mobile','$password','$gender','$state')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("Location: Login.html");
            }
            else
            {
                echo "Error :".$sql;
            } 
        }
    ?>

</html>
