<?php

global $conn;
include "database.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: hozzaadas.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $average = $_POST['average'];

        $count_query = "SELECT COUNT(*) AS count FROM hallgatok";
        $count_result = $conn->query($count_query);
        $row = $count_result->fetch_assoc();
        $count = $row['count'];

        $id = $count + 1;

        $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $course, $average);


        if ($stmt->execute()) {
            echo "Új hallgató sikeresen hozzáadva.";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Hiba: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>
<h2>Új Hallgató Hozzáadása</h2>

<form action="" method="post">
    Név:<br>
    <input type="text" name="name"><br><br>
    Szak:<br>
    <input type="text" name="course"><br><br>
    Átlag:<br>
    <input type="text" name="average"><br><br>
    <input type="submit" name="add" value="Hozzáadás">
    <a href="listazas.php">Listazas</a>
    <a href="logout.php">Kijelentkezes</a>
</form>
