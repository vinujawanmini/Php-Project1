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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $levels = ['level1', 'level2', 'level3', 'level4'];

    foreach ($levels as $level) {
        if (isset($_POST[$level . '_exams'])) {
            foreach ($_POST[$level . '_exams'] as $exam) {
                // Insert data into the database
                $sql = "INSERT INTO exam_levels (level, exam) VALUES ('$level', '$exam')";
                $conn->query($sql);
            }
        }
    }

    echo "Data inserted successfully";
    header("Location: view_data.php");
}

// Close the database connection
$conn->close();
?>
