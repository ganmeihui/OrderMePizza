<html>
    <!--auto redirect after 1 second-->
    <meta http-equiv = "refresh" content = "1; url = profile.php" /> 

<?php
    include '../include/connection.php';

    session_start();
    $email = $_SESSION['email'];

    if(isset($_POST['update']))
    {
        $fullname = $_POST['fullname'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $state = $_POST['state'];
        $address = $_POST['address'];


        $sql = "UPDATE users_db SET fullname='$fullname',mobile='$mobile',gender='$gender',state='$state',address='$address' WHERE email='$_SESSION[email]'";
        $result = mysqli_query($conn,$sql);

        if($result) 
        {
            echo "<script>alert('Profile Updated successfully.');</script>";
        } 
        else 
        {
            echo "<script>alert('Profile not Updated.');</script>";
            echo  $conn->error;
        }
    }

?>