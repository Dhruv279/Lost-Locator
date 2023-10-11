<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found - PDEU</title>
    <link rel="stylesheet" type="text/css" href="lost_style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="lost.php">Lost</a></li>
                <li><a href="found.php">Found</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <section id="lost-form">
        <h2>Report a Lost Item</h2>
        <form action="process_lost_item.php" method="POST" enctype="multipart/form-data">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>

            <label for="lost_date">Lost Date:</label>
            <input type="date" id="lost_date" name="lost_date" required>

            <label for="lost_place">Lost Place:</label>
            <input type="text" id="lost_place" name="lost_place" required>

            <label for="product_description">Description:</label>
            <textarea id="product_description" name="product_description" rows="4" required></textarea>

            <fieldset>
                <legend>Contact Information</legend>
                <label for="contact_name">Your Name:</label>
                <input type="text" id="contact_name" name="contact_name" required>

                <label for="contact_no">Contact No.:</label>
                <input type="tel" id="contact_no" name="contact_no" title="Please enter a valid 10-digit phone number" required>
            </fieldset>

            <label for="image">Upload an Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <button type="submit" name="submit">Submit</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 PDEU - Lost and Found</p>
    </footer>
</body>
</html>
