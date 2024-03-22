<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['btn']) && $_POST['btn'] == "Insert") {
        // Insertion code
        $book_name = mysqli_real_escape_string($Config, $_POST['book_name']);
        $book_price = mysqli_real_escape_string($Config, $_POST['book_price']);

        $inSql = "INSERT INTO info (book_name, book_price) VALUES ('$book_name', '$book_price')";
        $qryIn = mysqli_query($Config, $inSql);

        // Uncomment the following lines if you want to display a message after insertion
        // if ($qryIn) {
        //     $_SESSION['msg'] = "<strong style='color: green;'>Insert Successfully</strong>";
        // } else {
        //     $_SESSION['msg'] = "<strong style='color: red;'>Insert Error: " . mysqli_error($Config) . "</strong>";
        // }

        header("Location: " . BASE);
        exit;
    } elseif (isset($_POST['btn']) && $_POST['btn'] == "Search") {
        // Search code
        $search_term = mysqli_real_escape_string($Config, $_POST['search_term']);
        $search_query = "SELECT * FROM info WHERE book_name LIKE '%$search_term%'";
        $search_result = mysqli_query($Config, $search_query);

        if ($search_result) {
            // Display search results
            while ($row = mysqli_fetch_assoc($search_result)) {
                echo "Book Name: " . $row['book_name'] . " | Book Price: " . $row['book_price'] . "<br>";
            }
        } else {
            $_SESSION['msg'] = "<strong style='color: red;'>Search Error: " . mysqli_error($Config) . "</strong>";
        }

        header("Location: " . BASE);
        exit;
    }
}
?>