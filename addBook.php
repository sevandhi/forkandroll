<?php
$conn = new mysqli('localhost', 'root', '', 'library');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
    
    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $title, $author);
    
    if ($stmt->execute() === false) {
        die("Error executing the SQL statement: " . $stmt->error);
    } else {
        echo "Book added successfully!";
    }
    
    $stmt->close();
}

$conn->close();

header("Location: index.php");  
?>
