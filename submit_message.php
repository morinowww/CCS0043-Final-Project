<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_proj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =!empty($_POST['name'])? $_POST['name'] : 'Anonymous';
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (name, message) VALUES (?,?)");
    $stmt->bind_param("ss", $name, $message);

    if ($stmt->execute()) {
    } else {
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT name, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: ". $conn->error);
}

if ($result === FALSE) {
    die("Error: ". $conn->error);
}

header("Location: " . "freedomwall.php");


?>
