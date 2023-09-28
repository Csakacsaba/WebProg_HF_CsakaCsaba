<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$masodpercek = 5555;

if(is_int($masodpercek)) {
    $orak = $masodpercek / 3600;
    echo "A megadott másodpercek száma: <strong>$masodpercek</strong> másodperc.<br>";
    echo "Az órákban kifejezve: <strong>$orak</strong> óra.";
}else {
    echo "Hiba";
}

?>

</body>
</html>

