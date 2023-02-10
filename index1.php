<!DOCTYPE html>
<html>
    <head>
        <title>Choose Character</title>
        <!--auto redirect after 1 second-->
        <meta http-equiv = "refresh" content = "1; url = index.html" /> 
    </head>

    <body>
        <?php
            $character = isset($_GET['character'])? htmlspecialchars($_GET['character']) : '';
            if($character == "")    //user no select any selection
            {
                // Display the alert box 
                echo '<script>alert("You must choose one of the character! If you dont choose any characters, you wont be able to access the page! Auto redirecting back to index page...")</script>'; 
            }
            else if($character != "")
            {
                if($character == 'user')  //Public User
                {
                    header('Location: public/mainpage.php');
                }
                else if($character == 'member')  //Registered Member signin
                {
                    header('Location: member/Login.html');
                }
                else if($character == 'admin')  //Administrator sigin
                {
                    header('Location: admin/adminLogin.html');
                }
            }
        ?>
    </body>
</html>