<?php
if (isset($_POST['submit']) && isset($_FILES['image'])) {
    include "db_conn.php";

    // Escape user inputs to prevent SQL injection
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $lost_date = mysqli_real_escape_string($conn, $_POST['found_date']);
    $lost_place = mysqli_real_escape_string($conn, $_POST['found_place']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);

    // File upload handling
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        if ($img_size > 12500000) {
            $em = "Sorry, your file is too large.";
            header("Location: found.php?error=$em");
            exit();
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                // Generate a unique filename based on the current timestamp
                $new_img_name = 'IMG-' . time() . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database with product details
                $sql = "INSERT INTO found_data(image_url, item_name, found_date, found_place, product_description, contact_name, contact_no) 
                        VALUES('$new_img_name', '$item_name', '$lost_date', '$lost_place', '$product_description', '$contact_name', '$contact_no')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: view.php");
                    exit();
                } else {
                    $em = "Error: " . mysqli_error($conn);
                    header("Location: found.php?error=$em");
                    exit();
                }
            } else {
                $em = "You can't upload files of this type";
                header("Location: found.php?error=$em");
                exit();
            }
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: found.php?error=$em");
        exit();
    }
} else {
    header("Location: found.php");
    exit();
}
?>
