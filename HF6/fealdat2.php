<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $dob = $_POST["dob"];
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        $gender = "";
    }
    $interests = isset($_POST["interests"]) ? $_POST["interests"] : array();
    $country = $_POST["country"];

    if (empty($name)) {
        $errors[] = "Nem lehet ures a nev mezo";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Az e-mail cim ervenytelen formatumu";
    }

    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/[!@#$%^&*()\-_=+{};:,<.>ยง~]/", $password)) {
        $errors[] = "A jelszonak legalabb 8 karakterbol kell allnia, kell benne legyen nagy betu, szam es specialis karakter";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "A ket jelszo nem egyezik meg";
    }

    if (empty($dob) || !strtotime($dob)) {
        $errors[] = "A szuletesi datum ervenytelen";
    }

    if (empty($errors)) {
        echo "<h2>Sikeres regisztracio!</h2>";
        echo "<p>Nev: $name</p>";
        echo "<p>E-mail: $email</p>";
        echo "<p>Szuletesi datum: $dob</p>";
        echo "<p>Nem: $gender</p>";
        if (!empty($interests)) {
            echo "<p>Erdeklődési teruletek: " . implode(", ", $interests) . "</p>";
        }
        echo "<p>Orszag: $country</p>";
    } else {
        echo "<p style='color: blue; font-size: large; font-weight: bold'>Hibak: </p>";
        echo "<div class='error'>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztracios urlap</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h2>Regisztracios urlap</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nev: <input type="text" name="name"><br>
    E-mail cin: <input type="text" name="email"><br>
    Jelszo: <input type="password" name="password"><br>
    Jelszo megerositese: <input type="password" name="confirmPassword"><br>
    Szuletesi datum: <input type="date" name="dob"><br>
    Nem:
    <input type="radio" name="gender" value="Ferfi"> Ferfi
    <input type="radio" name="gender" value="No"> No
    <input type="radio" name="gender" value="Egyeb"> Egyeb<br>
    Erdeklődési teruletek:
    <input type="checkbox" name="interests[]" value="Sport"> Sport
    <input type="checkbox" name="interests[]" value="Muveszet"> Muveszet
    <input type="checkbox" name="interests[]" value="Tudomany"> Tudomany<br>
    Orszag:
    <select name="country">
        <option value="Magyarorszag">Magyarorszag</option>
        <option value="Romania">Romania</option>
        <option value="Egyesult Allamok">Egyesult Allamok</option>
    </select><br>
    <input type="submit" value="Regisztracion">
</form>

</body>
</html>