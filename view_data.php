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

// Fetch data from the database
$sql = "SELECT * FROM exam_levels";
$result = $conn->query($sql);

// Start HTML table
echo "<html><head><style>

body{
    background-image: url('view5.jpg');
    background-size:cover;

}



    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin-left: 100px;
        background-color: #f2f2f2;
        

    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    .but1{
        background-color: rgb(75, 153, 209);
        border: none;
        color: white;
        padding: 11px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 4px;
        font-size: 12px;
        cursor: pointer;
        border-radius: 10px;
        margin-left: 600px;
        
    }
    
    .but1:hover{
        background-color: black;
    }

   
</style>




</head><body>";

echo "<br><br><br><br><br>";


echo "<table>";
echo "<tr><th>Level</th><th>Exam</th><th>Action</th></tr>";

// Output data of each row
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["level"] . "</td><td>" . $row["exam"] . "</td>";
    echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
}

echo "</table>";

echo "<br>";
echo "<form><button class='but1' type='button' onclick=\"window.location.href='vinu1.html'\">insert data</button></form>";


// Close the database connection
$conn->close();
?>
