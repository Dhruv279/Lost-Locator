<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found and Claimed - PDEU</title>
    <link rel="stylesheet" type="text/css" href="found_style.css">
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
    <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
    <section id="found-form">
        <h2>Report a Found Item</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>

            <label for="found_date">Found Date:</label>
            <input type="date" id="found_date" name="found_date" required>

            <label for="found_place">Found Place:</label>
            <input type="text" id="found_place" name="found_place" required>

            <label for="description">Description:</label>
            <textarea id="product_description" name="product_description" rows="4" required></textarea>

            <fieldset>
                <legend>Contact Information</legend>
            <label for="contact_name">Your Name:</label>
            <input type="text" id="contact_name" name="contact_name" required>

            <label for="contact_no">Contact No.:</label>
            <input type="tel" id="contact_no" name="contact_no" 
                title="Please enter a valid 10-digit phone number" required>
            </fieldset>
            <label for="image">Upload an Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <!-- <button type="submit" value="Upload">Submit</button> -->
            <input type="submit" name="submit" value="Upload">

        </form>

    </section>

    <footer>
        <p>&copy; 2023 PDEU - Found and Claimed</p>
    </footer>
</body>

</html>
