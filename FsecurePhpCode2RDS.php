<?php
$conn = new mysqli('finsecureinfrastructure-rdsinstance-cfhlq1cwkbgg.cu7rraq7soxm.us-east-1.rds.amazonaws.com', 'admin', 'password123', 'MyDatabase');
if ($conn->connect_error) {
              die('Connection failed: ' . $conn->connect_error);
            }
            echo 'Connected Successfully to RDS!<br>';
            // Query the table
            $sql = 'SELECT * FROM Finsecure';
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              
                echo 'Data: ' . $row['id'] . ' - ' . $row['name'] . '<br>';
              }
            } else {
              echo 'No records found in the Finsecure table.';
            }            
            $conn->close();
            ?>" 