<?php

    require_once "connection.php";

    if(isset($_GET['id'])) { //จาก viewpost (84)

        $delete_id = $_GET['id'];
        
        // $del = $_GET['userid'];
        
        $delete_query = "DELETE FROM orders WHERE id = $delete_id"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Successfully deleted');</script>";
            header("location: order.php");        
        }
    }
?>
