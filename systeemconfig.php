<?php
// Database configuratie
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gemeente";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
