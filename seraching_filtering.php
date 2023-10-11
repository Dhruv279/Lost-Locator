<!DOCTYPE html>
<html>
<head>
    <title>Search Lost and Found Items</title>
    <style>
        body {
            text-align: center;
            background-color: #CAFEFF;
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-top: 20px;
        }

        .results-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .result {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .result img {
            width: 100%; 
            height: 300px; /* Fixed height for images */
            object-fit: cover;
        }
        
        h2 {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        p {
            margin: 5px 0;
        }

        .no-results {
            margin-top: 20px;
        }
        .back_button {
            background-color: #007bff; 
            color: white; 
            padding: 10px 20px;
            text-decoration: none;
            position: absolute;             
            top: 10px; 
            left: 10px;
        }
    </style>
</head>
<body>
<a class="back_button" href="index.php">&#8592;</a>

    <h1>Search Lost and Found Items</h1>
    <form method="GET" action="">
        <label for="search_term">Search Term:</label>
        <input type="text" id="search_term" name="search_term" required>

        <label for="search_category">Search Category:</label>
        <select id="search_category" name="search_category">
            <option value="item_name">Item Name</option>
            <option value="found_date">Lost Date</option>
            <option value="found_place">Lost Place</option>
        </select>

        <button type="submit">Search</button>
    </form>
    
    <div class="results-container">
        <?php
        include "db_conn.php";
        $filtering = false;

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_term']) && isset($_GET['search_category'])) {
            $filtering = true;
            $search_term = mysqli_real_escape_string($conn, $_GET['search_term']);
            $search_category = $_GET['search_category'];

            $sql = "SELECT * FROM found_data WHERE $search_category LIKE '%$search_term%'";
        } else {
            $sql = "SELECT * FROM found_data";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='result'>";
                echo "<img src='uploads/" . $row['image_url'] . "' alt='Item Image'>";
                echo "<h2>Item Name: " . $row['item_name'] . "</h2>";
                echo "<p>Found Date: " . $row['found_date'] . "</p>";
                echo "<p>Found Place: " . $row['found_place'] . "</p>";
                echo "</div>";
            }
        } else {
            if ($filtering) {
                echo '<div class="no-results">No matching results found.</div>';
            } else {
                echo '<div class="no-results">No results found.</div>';
            }
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
