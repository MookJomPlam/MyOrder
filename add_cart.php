<?php

    session_start();

    require_once "connection.php";
    //menu บรรทัด 262   _GET จาก add_cart.php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $p_id = $_GET['p_id'];

        $insert_query = "INSERT INTO cart (userid, product_id) 
                        VALUES ('$id', '$p_id')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('เพิ่มรายการสำเร็จ');</script>";
            header("location: menu.php?id=$id"); 
        
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด');</script>";
        }
    }

?> 
<?php ?>