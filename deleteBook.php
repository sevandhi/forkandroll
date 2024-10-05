<?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'library');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete book
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php");
?>
