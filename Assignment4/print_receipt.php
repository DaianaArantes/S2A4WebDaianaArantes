<?php
    session_start();
    
    $firstName = $_GET["firstName"];
    $lastName = $_GET['lastName'];
    $phone = $_GET['phone'];
    $city = $_GET['city'];
    $postalCode = $_GET['postalCode'];
    $provinceCode = $_GET['provinceCode'];

    $total_amount = 0;

    foreach($_SESSION["item_arr"] as $item)
    {
        $total_amount += $item[1];
    }

?>
<html>

<head>
    <title>Tulip BookStore - Receipt</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script src="Script1.js"></script>
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <img src="style/logo.png" width="40" />
                    <h1><a href="main.php">Tulipooks</a></h1>
                    <h2>Online bookstore</h2>
                </div>
            </div>
        </div>
   
            <div id="site_content">

                <h1>Your order has been processed </h1>
                <p>Please verify the information:</p>

                <div>
                    <table id="printTable">

                        <?php

                        echo "<h4>Shipping to:<h4>"."<br>"."<h6>Name: ". $firstName." ".$lastName ."<br>". "Phone: ". $phone."<br>". "City: ".
                         $city."<br>"."Postal Code: ".$postalCode."<br>"."Province Code: ".$provinceCode."<br><h6>";
                        ?>

                        <h4>Order Information: </h4>
                        <tr>
                            <th>Book</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php foreach($_SESSION["item_arr"] as $item): ?>
                            <tr>
                                <td><img src=<?php echo $item[3] ?>></td>
                                <td><?php echo $item[0] ?></td>
                                <td>$<?php echo number_format($item[1], 2)?></td>
                                <td><?php echo $item[2] ?></td>
                            </tr>
                            
                           
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="3">Sub Total:</th>
                            <th><?php
                            
                                echo "$".number_format($total_amount, 2);
                            ?></th>
                        </tr>
                        <tr>
                            <th colspan="3">Tax:</th>
                            <th>
                                <?php
                                    $taxRate=0;
                                       
                                    switch ($provinceCode) {
                                        case "NL":
                                            $taxRate=$total_amount*0.10;
                                            break;
                                        case "PE":
                                            $taxRate=$total_amount*0.10;
                                            break;
                                        case "NS":
                                            $taxRate=$total_amount*0.10;
                                            break;
                                        case "NB":
                                            $taxRate=$total_amount*0.10;
                                            break;
                                        case "QC":
                                            $taxRate=$total_amount*0.97;
                                            break;
                                        case "ON":
                                            $taxRate=$total_amount*0.10;
                                            break;
                                        case "MB":
                                            $taxRate=$total_amount*0.08;
                                            break;
                                        case "SK":
                                            $taxRate=$total_amount*0.06;
                                            break;
                                        case "BC":
                                            $taxRate=$total_amount*0.07;
                                            break;
                                    }
                                    echo "$".number_format($taxRate, 2);
                            ?> </th>
                        </tr>
                        <tr>
                            <th colspan="3">Delivery Fee: </th>

                            <th><?php 
                                    $deliveryFee=0;
                                    $delivery_date = "";
                                    $date = date("d-M-Y");
                                        if ($total_amount>=0.01&&$total_amount<=25.00){
                                            $deliveryFee=3;
                                            //increment 1 day
                                            $delivery_date = strtotime($date."+ 1 days");
                                        }
                                        else if ($total_amount>=25.01&&$total_amount<=50.00){
                                            $deliveryFee=4;
                                            //increment 1 day
                                            $delivery_date = strtotime($date."+ 1 days");
                                        }
                                        else if ($total_amount>=50.01&&$total_amount<=75.00){
                                            $deliveryFee=5;
                                            //increment 3 days
                                            $delivery_date = strtotime($date."+ 3 days");
                                        }
                                        else if ($total_amount>75){
                                            $deliveryFee=6;
                                            //increment 4 days
                                            $delivery_date = strtotime($date."+ 4 days");
                                        }
                                        echo "$".number_format($deliveryFee, 2);  
                                    ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3">Final Value:</th>
                            <th><?php
                            $final_total = $total_amount + $taxRate + $deliveryFee;
                                echo "$".number_format($final_total, 2);
                            ?></th>
                        </tr>
                        <tr>
                            <th colspan="3">Estimated Delivery Date:</th>
                            <th><?php
                                echo  date("d-M-Y",$delivery_date);
                            ?></th>
                        </tr>                   
                    </table>
                    <?php
                        //reset array, because the checkout was made
                        $_SESSION['item_arr'] = [];
                    ?>
                </div>              
            </div>
        </div>
    </div>
    <footer>
            <p>Copyright &copy; www.tulipbooks.com</p>
    </footer>
    
</body>
</html>
