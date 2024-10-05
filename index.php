<?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'library');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch books
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Library Management</h1>
        <div class="book-list">
            <h2>Book List</h2>
            <table id="bookTable">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['author'] . "</td>";
                                echo "<td><button class='delete-book' data-id='" . $row['id'] . "'>Delete</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No books found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="add-book">
            <h2>Add New Book</h2>
            <form action="addBook.php" method="POST">
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <button type="submit">Add Book</button>
            </form>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>

<?php
    $conn->close();
?>
