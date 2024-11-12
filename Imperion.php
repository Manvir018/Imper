<?php
// MySQL database connection details
$servername = "localhost"; // Database server address
$username = "root"; // Your MySQL username
$password = "1871"; // Your MySQL password (leave blank if there is none)
$dbname = "Imperion"; // Your database name

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO IMP (first_name, last_name, email, phone, message) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the MySQL connection
$conn->close();
?>
