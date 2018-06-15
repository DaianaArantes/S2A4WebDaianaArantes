<?php
    session_start();

    $firstName = $_GET["firstName"];
    $lastName = $_GET['lastName'];
    $phone = $_GET['phone'];
    $city = $_GET['city'];
    $postalCode = $_GET['postalCode'];
    $provinceCode = $_GET['provinceCode'];
    $has_errors = false;

    
    if (empty($firstName)) {
        $firstNameErr = "First name is required";
        echo $firstNameErr;
		echo "<br/>";
     }

     if (empty($lastName)) {
        $lastNameErr = "Last name is required";
        echo $lastNameErr;
		echo "<br/>";
     }

     if (empty($phone)) {
        $phoneErr = "Phone is required";
        echo $phoneErr;
		echo "<br/>";
     }

     if (empty($city)) {
        $cityErr = "City is required";
        echo $cityErr;
		echo "<br/>";
     }

     if(empty($postalCode)){
		$postalErr = "You must input your postal code";
		echo $postalErr;
		echo "<br/>";
	}
	else{ 	    
		$postalCode_patern='^[a-zA-Z][0-9][a-zA-Z][ ]?[0-9][a-zA-Z][0-9]^';
			if(!preg_match($postalCode_patern,$postalCode)){
				$postalCodeErr = "Postal code must be like N2M 5H3";
				echo $postalCodeErr;
				echo "<br/>";
			}		
		}

     if(empty($provinceCode)){
		$provinceCodeErr = "You must insert your province code";
		echo $provinceCodeErr;
		echo "<br/>";
    }

    if(!$has_errors)
    {
        header("location:print_receipt.php?firstName=" . $firstName . "&lastName=" . $lastName . "&phone=" .
            $phone . "&city=" . $city . "&postalCode=" . $postalCode . "&provinceCode=" . $provinceCode);
    }
    else
    {
        header("location:main.php");
    }
?>