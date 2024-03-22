<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['btn']) && $_POST['btn'] == "Insert") {
        // Insertion code (unchanged)

        header("Location: " . BASE);
        exit;
    } elseif (isset($_POST['btn']) && $_POST['btn'] == "Search") {
        // Search code
        $search_term = mysqli_real_escape_string($Config, $_POST['search_term']);
        $search_query = "SELECT * FROM info WHERE book_name LIKE '%$search_term%'";
        $search_result = mysqli_query($Config, $search_query);

        if ($search_result) {
            $_SESSION['search_result'] = $search_result;
        } else {
            $_SESSION['msg'] = "<strong style='color: red;'>Search Error: " . mysqli_error($Config) . "</strong>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Data Insert</title>
</head>

<body>
    <p>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
            echo $_SESSION['msg'];
            $_SESSION['msg'] = "";
        }
        ?>
    </p>
    <form action="action.php" method="post">
        book_name: <input type="text" name="book_name" /> <br />
        book_price: <input type="number" name="book_price" /> <br />

        <input type="submit" name="btn" value="Insert" />
    </form>

    <!-- Add a search form below -->
    <form action="index.php" method="post">
        Search by book name: <input type="text" name="search_term" />
        <input type="submit" name="btn" value="Search" />
    </form>

    <?php
    // Display search results if available
    if (isset($_SESSION['search_result'])) {
        echo "<strong>Search Results:</strong><br>";
        while ($row = mysqli_fetch_assoc($_SESSION['search_result'])) {
            echo "Book Name: " . $row['book_name'] . " | Book Price: " . $row['book_price'] . "<br>";
        }
        $_SESSION['search_result'] = null; // Clear search result session
    }
    ?>
</body>

</html>