<?php
if (isset($_POST['elkuldott'])) {
    if (isset($_COOKIE['generaltSzam'])) {
        $generaltSzam = (int)$_COOKIE['generaltSzam'];
    } else {
        $generaltSzam = rand(1, 10);
        setcookie('generaltSzam', $generaltSzam, time() + 3600); // A süti 1 óráig érvényes
    }

    $talalgatas = (int)$_POST['talalgatas'];

    if ($talalgatas > $generaltSzam) {
        echo "A szám kisebb";
    } elseif ($talalgatas < $generaltSzam) {
        echo "A szám nagyobb";
    } else {
        echo "A két szám egyenlő";
        setcookie('generaltSzam', '', time() - 3600); // Töröljük a sütit
    }
}
?>

<form method="POST" action="">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>

