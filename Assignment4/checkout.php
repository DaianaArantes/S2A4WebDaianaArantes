<?php
    session_start();        
?>
<html>

<head>
    <title>Tulip BookStore - Cart</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script src="Script1.js"></script>
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <img src="style/logo.png" width="40" />
                    <h1><a href="main.php">TulipBooks</a></h1>
                    <h2>Online bookstore</h2>
                </div>
            </div>
                <div id="menubar">
                    <ul id="menu">
                        <li><a href="main.php">Home</a></li>
						<li><a href="stores.html">Stores</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                       <a href="checkout.php"><img src="style/cart.png" width="35" alt="cart" title="cart" /></a>
                    </ul>
                </div>
        </div>
        
        <div id="site_content">
           
            <div>
            <h1>Your Cart</h1>
                <div>
                <table id="printTable">
                    <tr>
                        <th>Book</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    <?php
                    //Print all itens added to cart
                    foreach($_SESSION["item_arr"] as $item): ?>
                        <tr>
                            <td><img src=<?php echo $item[3] ?>></td>
                            <td><?php echo $item[0] ?></td>
                            <td>$<?php echo number_format($item[1], 2) ?></td>
                            <td><?php echo $item[2] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                            <th colspan="3">Sub Total:</th>
                            <th><?php
                            //Print total amount of itens
                            $total_amount = 0;

                            foreach($_SESSION["item_arr"] as $item)
                            {
                                $total_amount += $item[1];
                            }
                                echo "$".number_format($total_amount, 2);
                            ?></th>
                        </tr>
                </table>
            </div>
                <h1>Client Billing Information</h1>
                <p>Please fill the form below:</p>

                <form id="form">

                    <label>First Name:</label>
                    <input type="text" id="firstName" required autofocus onblur="this.value = TrimText(this.value);
                        this.value = Capitalize(this.value);" />
                    <br />
                    <label>Last Name:</label>
                    <input type="text" id="lastName" required autofocus onblur="this.value = TrimText(this.value);
                        this.value = Capitalize(this.value);" />
                    <br />
                    <label>Phone:</label>
                    <input type="text" id="phone" required />
                    <br />
                    <label>City:</label>
                    <input type="text" id="city" required onblur="this.value = TrimText(this.value);
                         this.value = Capitalize(this.value)" />
                    <br />
                    <label>Postal Code:</label>
                    <input type="text" id="postalCode" onblur="this.value=ToUpperCase(this.value)" 
                           pattern="[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]" required title="Ex. 'N2M 5H3'" 
                           placeholder="Ex. 'N2M 5H3'" />
                    <br />
                    <label>Province Code:</label>
                    <input type="text" id="provinceCode" required placeholder="Ex. 'ON'" pattern="^[a-zA-Z]{2}" 
                           title="Ex. 'ON'" onblur="this.value=TrimText(this.value);this.value=ToUpperCase(this.value)" />
                    <br />
                    <br />
                    <input type="button" value="Submit" onclick="ValidateForm();">
                    <input type="reset" id="reset" value="Reset Fields">
                    <br />
                    <label type="text" id="errorBox" hidden></label>
                </form>
            </div>
        </div>
    </div>
    <footer>
            <p>Copyright &copy; www.tulipbooks.com</p>
        </div>
    </footer>
    
</body>
</html>
