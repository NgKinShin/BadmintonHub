<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badmintonstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "DELETE FROM payments WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to admin.php after successful deletion
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided";
}

$conn->close();
?>
