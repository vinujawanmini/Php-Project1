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

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data for the given ID
    $sql = "SELECT * FROM exam_levels WHERE id = $id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $level = $row['level'];
        $exam = $row['exam'];
    } else {
        echo "No data found for the given ID.";
        exit;
    }
} else {
    echo "ID parameter is missing.";
    exit;
}

$conn->close();
?>

<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h2>Edit Data</h2>
    <fieldset>
        <br><br>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Level: <input type="text" name="level" value="<?php echo $level; ?>"><br><br>
        Exam: <input type="text" name="exam" value="<?php echo $exam; ?>"><br><br>
        <input class="but"  type="submit" value="Update"> 
        <br><br><br>

        <img src="vinu edit 1.jpg" alt="">
    </form>
    </fieldset>
</body>
</html>
