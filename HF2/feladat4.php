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
function atalakit($tomb, $keszlet){
        if($keszlet === "kisbetu"){
            return array_map('strtolower', $tomb);
        } elseif($keszlet === "nagybetu"){
            return array_map('strtoupper', $tomb);
        } else {
            return $tomb;
        }
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

$kisbetus_szinek = atalakit($szinek, "kisbetu");
print_r($kisbetus_szinek);

$nagybetus_szinek = atalakit($szinek, "nagybetu");
print_r($nagybetus_szinek);


?>

</body>
</html>
