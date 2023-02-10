<html>
    <!--auto redirect after 2 second-->
    <meta http-equiv = "refresh" content = "2; url = index.html" /> 
    <body>
        <?php
            session_start();
            
            //destroy or unset the session to logout
            session_unset();
            session_destroy();

            // Display the alert box 
            echo '<script>alert("You have logged out successfully..!")</script>';
        ?>  
    </body>
</html>