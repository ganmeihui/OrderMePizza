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
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Member Account</title>    
        <link rel="stylesheet" href="../Style/member-dashboard1.css">
    </head> 

    <body>
        <h1>DASHBOARD</h1>
        
        <div id="main"> 
            <div class="col-div-3">
                <div class="box">
                    <p><?php echo $fullname ?><br/><a href="../member/profile.php"><span>Edit profile</span></a></p>
                    <i class="fa fa-users box-icon"></i>
                </div>
            </div>
            
            <div class="col-div-3">
                <div class="box">
                    <!-- count number of rows -->
                    <?Php
                        $sql = "SELECT * from product";

                        if ($result = mysqli_query($conn, $sql)) 
                        {
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                        
                            echo "<p> Total Products : $rowcount <br/>"; 
                        }
                    ?>
                    <a href="../member/product.php"><span>View products</span></a></p>
                    <i class="fa fa-list box-icon"></i>
                </div>
                
            </div>
                
            <div class="clearfix"></div>
            <br/><br/>
            
            <div class="col-div-8">
                <div class="box-8">
                    <div class="content-box">
                        <p>Transaction<span><a href="../member/transaction_detail.php">View Details</a></span></p>
                        <br/>
                        <table>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price (RM)</th>
                                <th>Quantity</th>
                                <th>Total (RM)</th>
                            </tr>
  
                            <?php 
                                $query=mysqli_query($conn,"SELECT * FROM transaction WHERE email = '".$_SESSION['email']."' LIMIT 3");
                                while($row = mysqli_fetch_array($query))
                                {
                                ?>
                                    <tr>
                                        <th><?php echo $row['date']?></th>
                                        <th><?php echo $row['time']?></th>
                                        <th><?php echo $row['price']?></th>
                                        <th><?php echo $row['quantity']?></th>
                                        <th><?php echo $row['total']?></th>
                                    </tr>
                            <?php 
                                } ?>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-div-4">
                <div class="box-4">
                    <div class="content-box">
                    <p>Total Expenses</p>
                        <div class="circle-wrap">
                        <div class="circle">
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
                            <div class="mask half">
                                <div class="fill"></div>
                            </div>
                            <div class="inside-circle">
                            <!-- count number of rows -->
								<?Php
									$sql = "SELECT  SUM(amount) from checkout_db  WHERE email = '".$_SESSION['email']."'";
									$result = $conn->query($sql);
									//display data on web page
									while($row = mysqli_fetch_array($result)){
										echo "RM ". $row['SUM(amount)'];
										echo "<br>";
									}
								?>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfit"></div>
            
        </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    <script type="text/javascript">>
        $(".nav").click(function()
        {
            $("#mySidenav").css('width','70px');
            $("#main").css('margin-left','70px');
            $(".logo").css('visibility', 'hidden');
            $(".logo span").css('visibility', 'visible');
            $(".logo span").css('margin-left','-10px');
            $(".icon-a").css('visibility','hidden');
            $(".icons").css('visibility','visible');
            $(".icons").css('margin-left','-8px');
            $(".nav").css('display','none');
            $(".nav2").css('display','block');
        });
        
        $(".nav2").click(function()
        {
            $("#mySidenav").css('width', '300px');
            $("#main").css('margin-left','300px');
            $(".logo").css('visibility', 'visible');
            $(".logo span").css('visibility', 'visible');
            $(".icon-a").css('visibility','visible');
            $(".icons").css('visibility','visible');
            $(".nav").css('display','block');
            $(".nav2").css('display','none');
        });
    </script>	
        

    </body>

</html>
