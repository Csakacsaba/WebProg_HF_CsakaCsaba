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
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $nyelv => $napokNev) {
    $index = 1;
    echo "$nyelv: ";
    foreach ($napokNev as $nap) {
        if ($index % 2 == 0) {
            echo "<b>$nap</b>, ";
        } else {
            echo "$nap, ";
        }
        $index += 1;
    }
    echo "<br>";
}

?>

</body>
</html>
