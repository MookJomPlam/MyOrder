<?php

    require_once "connection.php";

    if(isset($_GET['del'])) { //จาก viewpost (84)
        $delete_id = $_GET['del'];

        $delete_query = "DELETE FROM tbl_product WHERE p_id = '$delete_id'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Successfully deleted');</script>";
            header("location: item.php");        
        }
    }
?>
