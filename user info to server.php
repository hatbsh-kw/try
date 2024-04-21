<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apply";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    
    // Upload photo
    $target_dir = "C:\uploded photos";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    $photo = $target_file;

    // Insert data into database
    $sql = "INSERT INTO user_info (name, country, email, phone, description, photo) VALUES ('$name', '$country', '$email', '$phone', '$description', '$photo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Data inserted successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
