<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PDEU Lost and Found</title>
    <link rel="stylesheet" type="text/css" href="contact_style.css">
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

    <section id="contact-form">
        <h2>Contact Form</h2>
        <form action="process_contact.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 PDEU - Lost and Found</p>
    </footer>
</body>

</html>
