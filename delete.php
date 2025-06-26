<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "exam"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare a delete statement
    $sql = "DELETE FROM exam_levels WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $id);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to the homepage after successful delete
            header("Location: view_data.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        
        // Close statement
        $stmt->close();
    }
} else {
    echo "Invalid ID parameter.";
}

// Close the database connection
$conn->close();
?>
