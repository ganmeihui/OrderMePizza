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
            $password = $row['password'];
            $gender = $row['gender'];
            $state = $row['state'];
            $address = $row['address'];
        }
    }
?>


<html>
    <style type="text/css">
        body
        {
            display: flex;
            justify-content: center;	
            background: white;
        }
        .container
        {
            height: 112%;
            width: 650px;
            padding: 0px 35px;
            background-color: #ecf0f3;
        }
        h1
        {
            color: #d77822;
            font-size: 40px;
            font-family: Algerian;
            margin-bottom: -10px;
        }
        h3
        {
            font-family: Arial;
        }
        form
        {
	        justify-content: center;
            margin: center;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            font-size: 18px;
        }
        .form  
        {
            padding-bottom: 20px;
        }
        .form label 
        {
            font-size: 18px;
            color: #575757;
        }
        .form input[type=text], select
        {
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }
        .btn
        {
            position: absolute;
            padding-left: 150px;
        }
        button, a
        {
            font-size: 18px;
            color: white;
            background-color: #d77822;
            padding: 10px 30px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            margin: 20px 8px;
        }
        button:hover, a:hover
        {
            color: black;
            background-color: #c2c2c2;
        }
    </style>


    <body>
        <div class="container">
            <h1>Order Me Pizza</h1>
            <h3>Edit Account Details:</h3>	
            <hr width= 100%><br>		

            <div class="acc details">
            <form action="accountUpdatee.php" method="post">	     
                <!--fullname-->
                <div class="fullname">
                    <div class="form">
                        <label>Full Name* </label>
                        <br><input type="text" id="fullname" name="fullname" placeholder="Enter your fullname" value="<?php echo $fullname ?>" required>
                    </div>  
                </div>

                <!--email-->
                <div class="email" name="email">
                    <div class="form">
                        <label>Email* </label>
                        <br><?php echo $email ?>
                    </div>  
                </div>

                <!--mobile-->
                <div class="mobile">
                    <div class="form">
                        <label>Mobile* </label>
                        <br><input type="text" id="mobile" name="mobile" placeholder="xx-xxxxxxxx" value="<?php echo $mobile ?>" required>
                    </div>  
                </div>

                <!--password-->
                <div class="password">
                    <div class="form">
                        <label>Password* </label>
                        <br>******************
                    </div>  
                </div>

                <!--Gender-->
                <div class="gender">
                    <div class="form">
                        <label>Gender </label>
                        <div class="gendercategory">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male') { echo 'checked'; } ?> required> Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female') { echo 'checked'; } ?> required> Female
                        </label>
                    </div>
                </div>

                <!--State-->
                <div class="state">
                    <div class="form">
                        <label>State* </label>
                        <br><select  id="state" name="state" value="<?php echo $state ?>" required>
                            <option value="">--Select your state--</option>
                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Putrajaya"> Putrajaya</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Johor">Johor</option>
                            <option value="Perak">Perak</option>
                            <option value="Pahang"> Pahang</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Penang">Penang</option>   
                            <option value="Melaka"> Melaka</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                        </select>
                    </div> 
                </div>

                <!--address-->
                <div class="address">
                    <div class="form">
                        <label>Address </label>
                        <br><input type="text" id="address" name="address" placeholder="Please enter your address" value="<?php echo $address ?>">
                    </div>  
                </div>

                <div class="btn">
                    <button type="submit" name="update">Save Changes </button>             
                    <a href="profile.php" > Back</a></td></tr>
                </div>
            </form>
        </div>
    </body>
</html>