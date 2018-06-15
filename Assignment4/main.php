<?php
    session_start();

    //if the array is not created, create it
    if(!isset($_SESSION['item_arr']))
    {
        // [0] = name
        // [1] = price
        // [2] = quantity
        // [3] = img
        $_SESSION['item_arr'] = [];
    }
?>
<html>

<head>
    <title>Tulip BookStore</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script src="Script1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script>
        //function to Add a item to cart
        function add_item (div_id){
            var name = document.getElementById(div_id + "_name").value;
            var price = document.getElementById(div_id + "_price").value;
            var img = document.getElementById(div_id + "_img").src;

            window.location.href = "add_item_cart.php?name=" + name + "&price=" + price + "&img=" + img; 
        }
        //Animate when a book is added to cart
        $(document).ready(function(){
            $("#cart_num").animate({fontSize:'30px'});
            $("#cart_num").animate({fontSize:'20px'});
        });
    </script>
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <img src="style/logo.png" width="40" />
                    <h1><a href="index.html">TulipBooks</a></h1>
                    <h2>Online bookstore</h2>
                </div>
            </div>
            <div id="menubar">
                <ul id="menu">

                    <li class="selected"><a href="main.html">Home</a></li>
                    <li><a href="stores.html">Stores</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <div id="shopping_cart">
                        <span id="cart_num">
                            <?php
                            //Create an array with name, price, quantity and img of the item
                            if(!empty($_SESSION["item_arr"]))
                            {
                                $amount_of_items = 0;

                                foreach ($_SESSION["item_arr"] as $item) {
                                    $amount_of_items += $item[2];
                                }

                                echo $amount_of_items;
                            }
                            ?>	
                        </span>	
                        <a href="checkout.php">
                            <img src="style/cart.png" width="35" alt="cart" title="Cart" />
                        </a>
                    </div>
                </ul>
            </div>
        </div>
        
        <div id="site_content">
            <h1>Books available to sell on our online store</h1>

            <div id="item_div">
                       
                <div class="items" id="item1">
                    <img id="item1_img" src="style/book1.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item1')">
                    <p>Seeds of hope</p>
                    <p>Price - $25</p>
                    <input type="hidden" id="item1_name" value="Seeds of hope">
                    <input type="hidden" id="item1_price" value="25">
                </div>

                <div class="items" id="item2">
                    <img id="item2_img" src="style/book2.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item2')">
                    <p>The book of life</p>
                    <p>Price - $15</p>
                    <input type="hidden" id="item2_name" value="The book of life">
                    <input type="hidden" id="item2_price" value="15">
                </div>

                <div class="items" id="item3">
                    <img id="item3_img" src="style/book3.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item3')">
                    <p>That hideous strength</p>
                    <p>Price - $35</p>
                    <input type="hidden" id="item3_name" value="That hideous strength">
                    <input type="hidden" id="item3_price" value="35">
                </div>

                <div class="items" id="item4">
                    <img id="item4_img" src="style/book4.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item4')">
                    <p>An unkindness of magicians</p>
                    <p>Price - $14</p>
                    <input type="hidden" id="item4_name" value="An unkindness of magicians">
                    <input type="hidden" id="item4_price" value="14">
                </div>

                <div class="items" id="item5">
                    <img id="item5_img" src="style/book5.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item5')">
                    <p>All the night we cannot see</p>
                    <p>Price - $30</p>
                    <input type="hidden" id="item5_name" value="All the night we cannot see">
                    <input type="hidden" id="item5_price" value="30">
                </div>

                <div class="items" id="item6">
                    <img id="item6_img" src="style/book6.jpg">
                    <input type="button" value="Add To CART" onclick="add_item('item6')">
                    <p>A E R I E</p>
                    <p>Price - $20</p>
                    <input type="hidden" id="item6_name" value="A E R I E">
                    <input type="hidden" id="item6_price" value="20">
                </div>
            </div>
        </div>
    </div>

    <footer>     
            <p>Copyright &copy; www.tulipbooks.com</p>     
    </footer>
    

</body>
</html>
