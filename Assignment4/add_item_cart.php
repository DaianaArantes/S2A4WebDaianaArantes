<?php
    session_start();

    $name = $_GET["name"];
    $price = $_GET["price"];
    $img = $_GET["img"];
	$new_item = true;
    
    for ($i = 0; $i < count($_SESSION['item_arr']); $i++)
	{
        // If the item exists, add one to the count
		if ($name == $_SESSION['item_arr'][$i][0])
		{
            $_SESSION['item_arr'][$i][1] += $price;
            $_SESSION['item_arr'][$i][2] += 1;
            $new_item = false;
			break;
        }
	}

	if ($new_item)
	{
		array_push($_SESSION['item_arr'], array($name, $price, 1, $img));
    }

    header("location:main.php");
?>