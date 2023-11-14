<?php
global $conn;
include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM hallgatok WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Hallgató törölve.";
        $stmt->close();
        header('Location: listazas.php');
        exit();
    } else {
        echo "Hiba: " . $stmt->error;
    }
}

$conn->close();
?>
