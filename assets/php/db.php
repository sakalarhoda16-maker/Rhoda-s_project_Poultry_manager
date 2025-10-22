<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = ""; // default is empty
$dbname = "poultry_manager"; // replace with your actual DB name

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    echo "connection successful";
}
?>
