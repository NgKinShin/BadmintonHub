<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badmintonstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the payments table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS `payments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(255) NOT NULL,
    `Phone` VARCHAR(50) DEFAULT '',
    `Address` VARCHAR(500) NOT NULL,
    `Card_Number` VARCHAR(20) DEFAULT '',
    `Expiry_Month` VARCHAR(2) DEFAULT '',
    `Expiry_Year` VARCHAR(4) DEFAULT '',
    `Email` VARCHAR(255) DEFAULT '',
    `Total` DECIMAL(10,2) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createTable);

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
    $address = isset($_POST['address']) ? $conn->real_escape_string($_POST['address']) : '';
    $card_number = isset($_POST['card_number']) ? $conn->real_escape_string($_POST['card_number']) : '';
    $expiry_month = isset($_POST['expiry_month']) ? $conn->real_escape_string($_POST['expiry_month']) : '';
    $expiry_year = isset($_POST['expiry_year']) ? $conn->real_escape_string($_POST['expiry_year']) : '';
    $total = isset($_POST['total']) ? floatval($_POST['total']) : 0;
    
    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = "Name is empty";
    if (empty($email)) $errors[] = "Email is empty";
    if (empty($phone)) $errors[] = "Phone is empty";
    if (empty($address)) $errors[] = "Address is empty";
    if (empty($card_number)) $errors[] = "Card Number is empty";
    if (empty($expiry_month)) $errors[] = "Expiry Month is empty";
    if (empty($expiry_year)) $errors[] = "Expiry Year is empty";
    if ($total <= 0) $errors[] = "Total is 0 (did you add items to cart?)";

    if (!empty($errors)) {
        die("Validation failed: " . implode(", ", $errors) . " (Total received: $total)");
    }
    
    // Insert payment record into the database
    $sql = "INSERT INTO `payments` (`Name`, `Email`, `Phone`, `Address`, `Card_Number`, `Expiry_Month`, `Expiry_Year`, `Total`) VALUES ('$name', '$email', '$phone', '$address', '$card_number', '$expiry_month', '$expiry_year', $total)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<!DOCTYPE html><html><head><title>Checkout Confirmation</title>";
        echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
        echo "<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap' rel='stylesheet'>";
        echo "<style>
            body { font-family: 'Poppins', sans-serif; background: #f5f5f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
            .card { background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; max-width: 500px; }
            h2 { color: #22c55e; margin-bottom: 20px; }
            p { margin: 8px 0; color: #333; }
            a { display: inline-block; margin-top: 20px; padding: 12px 24px; background: #333; color: white; text-decoration: none; border-radius: 8px; transition: 0.3s; }
            a:hover { background: #555; }
        </style></head><body>";
        echo "<div class='card'>";
        echo "<h2>✅ Order Confirmed!</h2>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
        echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";
        echo "<p><strong>Card Number:</strong> **** **** **** " . htmlspecialchars(substr($card_number, -4)) . "</p>";
        echo "<p><strong>Total:</strong> RM" . number_format($total, 2) . "</p>";
        echo "<a href='index.html'>← Back to Store</a>";
        echo "</div></body></html>";
    } else {
        echo "Error saving order: " . $conn->error;
    }
} else {
    echo "No checkout data received.";
    echo "<p><a href='index.html'>Back to Store</a></p>";
}

$conn->close();
?>
