<?php
session_start();

if (isset($_POST["elkuld"])) {
    if (isset($_POST["szam1"], $_POST["szam2"], $_POST["muv"])) {
        $szam1 = $_POST["szam1"];
        $szam2 = $_POST["szam2"];
        $operator = $_POST["muv"];

        if (is_numeric($szam1) && is_numeric($szam2)) {
            if ($operator == "+") {
                $result = $szam1 + $szam2;
            } elseif ($operator == "-") {
                $result = $szam1 - $szam2;
            } elseif ($operator == "*") {
                $result = $szam1 * $szam2;
            } elseif ($operator == "/") {
                if ($szam2 == 0) {
                    $result = "nullával nem lehet osztani";
                } else {
                    $result = $szam1 / $szam2;
                }
            }
            $_SESSION["result"] = $result;
        } else {
            $result = "Valamelyik mező üresen maradt";
        }
    } else {
        $result = "Hiányzó adatok";
    }
} else {
    $result = "";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Számológép</title>
</head>
<body>
<form method="POST" action="">
    <br>Az első szám:
    <input type="number" name="szam1" value="<?php echo isset($_POST["szam1"]) ? $_POST["szam1"] : ''; ?>">

    <br>A második szám:
    <input type="number" name="szam2" value="<?php echo isset($_POST["szam2"]) ? $_POST["szam2"] : ''; ?>">

    <br>Műveleti jel:
    <select name="muv">
        <option <?php if(isset($_POST["muv"]) && $_POST["muv"] == "+") echo "selected"; ?>>+</option>
        <option <?php if(isset($_POST["muv"]) && $_POST["muv"] == "-") echo "selected"; ?>>-</option>
        <option <?php if(isset($_POST["muv"]) && $_POST["muv"] == "*") echo "selected"; ?>>*</option>
        <option <?php if(isset($_POST["muv"]) && $_POST["muv"] == "/") echo "selected"; ?>>/</option>
    </select><br>
    <input type="submit" name="elkuld" value="Számol">
</form>

<?php
if (isset($_SESSION["result"])) {
    echo "<br>Eredmény: " . $_SESSION["result"];
    unset($_SESSION["result"]);
}
?>
</body>
</html>
