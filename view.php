<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
            flex-direction: column; 
			background-color: #CAFEFF;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px;
            max-width: 1200px;
            padding: 20px;
			margin-top: 30px;
        }

        .alb {
            padding: 5px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .alb img {
            width: 100%; 
            height: 300px;
            object-fit: cover; 
			
        }

        .alb p {
            margin: 5px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        h1 {
            text-align: center;
            background-color: #007bff; 
			color: white; 
			padding: 10px 20px;
			border-radius:10px;
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
<a class="back_button" href="found.php">&#8592;</a>
<h1>Founded Items</h1>
<div class="container">
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "lost_and_found";

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM found_data ORDER BY user_id DESC";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="alb">
                <img src="uploads/<?= $row['image_url'] ?>">
                <p><strong>Product Name:</strong> <?= $row['item_name'] ?></p>
                <p><strong>Found Date:</strong> <?= $row['found_date'] ?></p>
                <p><strong>Found Place:</strong> <?= $row['found_place'] ?></p>
                <p><strong>Description:</strong> <?= $row['product_description'] ?></p>
                <p><strong>Name:</strong> <?= $row['contact_name'] ?></p>
                <p><strong>Contact No:</strong> <?= $row['contact_no'] ?></p>
            </div>
            <?php
        }
    }

    mysqli_close($conn);
    ?>
</div>
</body>
</html>
