<?php

    session_start();

    require_once "connection.php";
    
    if (isset($_POST['submit'])) {

        $id = $_POST['id'];
        $p_id = $_POST['p_id'];

        $insert_query = "INSERT INTO cart (userid, product_id) 
                        VALUES ('$id', '$p_id')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('เพิ่มรายการสำเร็จ');</script>";
            // \<!-- GET['id'] จาก add_c.php บรรทัด18 ไป menu.php 176 -->
            header("location: menu.php?id=$id"); 
        
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด');</script>";
        }
    }

?> 
<?php ?>