<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badmintonstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set error mode to warning so the page doesn't crash on query errors
mysqli_report(MYSQLI_REPORT_ERROR);

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM `payments` WHERE id = $delete_id";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Record deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all payments
$sql = "SELECT id, Name, Phone, Address, `Card_Number`, `Expiry_Month`, `Expiry_Year` FROM `payments`";
$result = $conn->query($sql);
$query_error = "";
if (!$result) {
    $query_error = $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Payments Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .back-btn {
            display: inline-block;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        
        .back-btn:hover {
            background-color: #555;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table thead {
            background-color: #333;
            color: white;
        }
        
        table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        
        table tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 12px;
        }
        
        .delete-btn:hover {
            background-color: #c0392b;
        }
        
        .no-records {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>💳 Payments Management</h2>
        <a href="index.php" class="back-btn">← Back to Store</a>
        
        <?php
        if ($query_error) {
            echo "<div class='no-records' style='color:#e74c3c;'>Database error: " . htmlspecialchars($query_error) . "<br><br>Make sure the <strong>payments</strong> table exists in your <strong>badmintonstore</strong> database.</div>";
        } elseif ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead><tr>";
            echo "<th>Serial</th>";
            echo "<th>Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Address</th>";
            echo "<th>Card_Number</th>";
            echo "<th>Expiry_Month</th>";
            echo "<th>Expiry_Year</th>";
            echo "<th>Action</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            
            $serial = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serial . "</td>";
                echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                echo "<td>" . htmlspecialchars(substr($row['Card_Number'], -4)) . "</td>";
                echo "<td>" . htmlspecialchars($row['Expiry_Month']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Expiry_Year']) . "</td>";
                echo "<td><a href='admin.php?delete_id=" . $row['id'] . "' class='delete-btn' onclick=\"return confirm('Are you sure?')\">Delete</a></td>";
                echo "</tr>";
                $serial++;
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='no-records'>No payments found</div>";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>