<?php

global $conn;
include "database.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}


$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='10'>";
    echo "<tr><th>ID</th><th>Név</th><th>Szak</th><thÁtlag</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nev"] . "</td>";
        echo "<td>" . $row["szak"] . "</td>";
        echo "<td>" . $row["atlag"] . "</td>";
        echo "<td><a href='update.php?id=".$row["id"]."'>Update</a></td>";
        echo "<td><a href='delete.php?id=".$row["id"]."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href='hozzaadas.php'>". "Diak hozzaadasa" ."</a>";
} else {
    echo "0 results";
}