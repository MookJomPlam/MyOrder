<?php 

    $conn = mysqli_connect("localhost", "root", "", "id18837104_loginadminuser");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>