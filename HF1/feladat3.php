<?php
$a = 11;
$b = 6;

$osszeadas = $a + $b;
$kivonas = $a - $b;
$szorzas = $a * $b;

if ($b != 0) {
    $osztas = $a / $b;
} else {
    $osztas = "Hiba: Nullával nem oszthatunk!";
}
$hatvanyozas = pow($a, $b);

echo "Az alábbi műveletek eredményei a megadott értékekkel:\n";
echo "Összeadás: $a + $b = $osszeadas\n";
echo "Kivonás: $a - $b = $kivonas\n";
echo "Szorzás: $a * $b = $szorzas\n";
echo "Osztás: $a / $b = $osztas\n";
echo "Hatványozás: $a ^ $b = $hatvanyozas";
