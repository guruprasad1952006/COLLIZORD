<?php
// Database connection
$servername = "localhost";
$username = "root"; // default in XAMPP
$password = "";     // default is empty
$dbname = "collizord";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['Name'];
$email = $_POST['Email'];
$mobile = $_POST['Mobile_No_']; // Correct name below
$message = $_POST['Message'];

// Correcting the field name
if(isset($_POST['Mobile No.'])) {
    $mobile = $_POST['Mobile No.'];
}

// Insert data
$sql = "INSERT INTO `collizord customer` (Name, Email, `Mobile No.`, Message)

        VALUES ('$name', '$email', '$mobile', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
