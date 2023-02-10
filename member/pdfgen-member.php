<?php
    $html=''; 
    $html .= '<table border="1" cellspacing="0" cellspadding="0" width="100%">
        
    <thead>
            <tr>
                <th>Time</th>
                <th>Date</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th>Member</th>
            </tr>
        </thead>

        <tbody>';
            include('../include/connection.php');

            $sql = "SELECT * FROM transaction";
            $result = mysqli_query($conn, $sql);
            
            if($row > 0) { 
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" .$row['time']."</td>";
                    echo "<td>" .$row['date']."</td>";
                    echo "<td>" .$row['product']."</td>";
                    echo "<td>" .$row['price']."</td>";
                    echo "<td>" .$row['quantity']."</td>";
                    echo "<td>" .$row['subtotal']."</td>";
                    echo "<td>" .$row['total']."</td>";
                    echo "<td>" .$row['email']."</td>";
                    echo "</tr>";
                }
            } else {
                $html .= '<tr aling="center"><td colspan="8">No Transaction</td></tr>';
            }

            $html .= '</tbody>
            </table>';

    //autoload
    require_once __DIR__ . '../vendor/autoload.php';

    $mpdf = new Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-L' ]); 
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html); 

    //output to browser
    $mpdf -> Output('Summary.pdf', 'D'); 

    //send email
    $mpdf -> Output('Summary.pdf', 'S'); 
?>

