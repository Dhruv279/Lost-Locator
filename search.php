<?php
include "db_conn.php"; // Include your database connection code

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the search term and category from the form
    $search_term = mysqli_real_escape_string($conn, $_GET['search_term']);
    $search_category = $_GET['search_category'];

    // Construct the SQL query based on the selected category
    $sql = "SELECT * FROM found_data WHERE $search_category LIKE '%$search_term%'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display the search results
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='uploads/" . $row['image_url'] . "' alt='Item Image'>";
            echo "<h2>Item Name: " . $row['item_name'] . "</h2>";
            echo "<p>Found Date: " . $row['found_date'] . "</p>";
            echo "<p>Found Place: " . $row['found_place'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
