<?php

if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"])) {
    echo "Minden mező kitöltése kötelező.";
} else {
    $email = $_POST["email"];
    if (empty($_POST["attend"])) {
            echo "Legalább egy eseményt ki kell választani.";
    } else {
        if (isset($_POST["terms"]) && $_POST["terms"] == "agreed") {
            echo "<h4>Regisztrációs adatok:</h4>";
            echo "Keresztnév: " . $_POST["firstName"] . "<br>";
            echo "Vezetéknév: " . $_POST["lastName"] . "<br>";
            echo "E-mail cím: " . $email . "<br>";
            echo "Részt vesz az eseményeken: " . implode(", ", $_POST["attend"]) . "<br>";
            echo "T-Shirt méret: " . $_POST["tshirt"] . "<br>";
            echo "Absztrakt fájl neve: " . $_FILES["abstract"]["name"] . "<br>";
        } else {
            echo "Kérjük, fogadja el a felhasználási feltételeket.";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Conference Registration</title>
</head>
<body>
<h3>Online conference registration</h3>
<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="email" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4">Event 4<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract (PDF only, max 3MB)<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="agreed">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>
</body>
</html>
