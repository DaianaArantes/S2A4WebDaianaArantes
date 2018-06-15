// JavaScript source code
function TrimText(text) {
    text = text.trim();
    return text;
}

function ToUpperCase(text) {
    text = text.toUpperCase();
    return text;
}

function Capitalize(text) {

    var newText = "";

    if (text.indexOf(" ") > 0) {

        text.split(" ").forEach(function (word) {
            newText += word[0].toUpperCase() + word.slice(1) + " ";
        })

        newText = newText.trim();
    }
    else if (text.length > 0) {
        newText = text[0].toUpperCase() + text.slice(1);
    }
    else {
        newText = text;
    }


    return newText;
}

function ValidateForm(form) {
    document.getElementById("errorBox").hidden = true;
    document.getElementById("errorBox").innerHTML = "";

    var formValidated = true;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phone = document.getElementById("phone").value;
    var city = document.getElementById("city").value;
    var postalCode = document.getElementById("postalCode").value;
    var provinceCode = document.getElementById("provinceCode").value;

    if (!ValidateFirstName(firstName)) formValidated = false;
    if (!ValidateLastName(lastName)) formValidated = false;
    if (!ValidatePhone(phone)) formValidated = false;
    if (!ValidateCity(city)) formValidated = false;
    if (!ValidatePostalCode(postalCode)) formValidated = false;
    if (!ValidateProvinceCode(provinceCode)) formValidated = false;

    if (formValidated) {
        //document.getElementById("form").submit();
        // AQUI VC REDIRECIONA ELE PRO PHP
        window.location.href = "validate.php?firstName=" + firstName + "&lastName=" + lastName + "&phone=" +
         phone + "&city=" + city + "&postalCode=" + postalCode + "&provinceCode=" + provinceCode;
    }
    else
    {
        document.getElementById("errorBox").style.border = "2px solid #E7746F";
    }
}

function ValidateFirstName(firstName) {
    var regex = /^[a-zA-Z]/;

    if (!regex.test(firstName)) {
        document.getElementById("errorBox").hidden = false;
        
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper First Name with only letters<br/>";
        document.getElementById("firstName").focus();
        return false;
    }
    else {
        return true;
    }
}

function ValidateLastName(lastName) {
    
    var regex = /^[a-zA-Z]/;

    if (!regex.test(lastName)) {
        document.getElementById("errorBox").hidden = false;
       
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper Last Name with only letters<br/>";
        document.getElementById("lastName").focus();
        return false;
    }
    else {
        
        return true;
    }
}

function ValidatePhone(phone) {

    var phone = document.getElementById("phone").value;
    var regex = /^[0-9]{10}$/;

    if (!regex.test(phone)) {
        document.getElementById("errorBox").hidden = false;
        
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper phone with max 10 numbers<br/>";
        document.getElementById("phone").focus();
        return false;
    } else {
        
        return true;
    }
}

function ValidateCity(city) {

    
    var regex = /^[a-zA-Z]/;
    if (!regex.test(city)) {
        document.getElementById("errorBox").hidden = false;
       
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper city with only letters<br/>";
        document.getElementById("city").focus();

        return false;
    } else {
        
        return true;
    }
}

function ValidatePostalCode(postalCode) {
    var valPostalCode = /^[a-zA-Z][0-9][a-zA-Z](| |)[0-9][a-zA-Z][0-9]$/;
    
    if (!valPostalCode.test(postalCode)) {
        document.getElementById("errorBox").hidden = false;
       
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper Postal Code, eg. N2M 5H3<br/>";
        document.getElementById("postalCode").focus();
        return false;
    }
    else {
        
        return true;
    }
}

function ValidateProvinceCode(provinceCode) {
    var valProvinceCode = /^[a-zA-Z][a-zA-Z]$/;
    
    if (!valProvinceCode.test(provinceCode)) {
        document.getElementById("errorBox").hidden = false;
       
        document.getElementById("errorBox").innerHTML +=
            "* Please insert a proper Province Code, eg. ON<br/>";
        document.getElementById("provinceCode").focus();
        return false;
    }
    else {
        return true;
    }
}