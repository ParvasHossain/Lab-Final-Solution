<?php
require_once("con_db.php");

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Perform a search query based on the entered name
    $searchQuery = "SELECT * FROM tbl_student WHERE name LIKE '%$search%'";
    $searchResults = mysqli_query($dbCon, $searchQuery);

    // Check if results were found
    if ($searchResults) {
        while ($row = mysqli_fetch_assoc($searchResults)) {
            echo "Name: " . $row['name'] . ", Blood Group: " . $row['blood'] . "<br>";
        }
    } else {
        echo "No results found.";
    }
}
?>
