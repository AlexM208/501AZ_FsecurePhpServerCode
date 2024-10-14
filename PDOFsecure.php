<?php
$servername = "finsecureinfrastructure-rdsinstance-cfhlq1cwkbgg.cu7rraq7soxm.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "password123";
$dbname = "MyDatabase";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query
    $sql = "SELECT * FROM Finsecure";  // Adjust based on your table structure

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Execute the statement
    $stmt->execute();

    // Fetch results as an associative array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        echo "<table border='1'><tr><th>ID</th><th>ID</th><th>Name</th></tr>";
        foreach ($stmt->fetchAll() as $row) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
