<?php 

    require_once "connection.php";

    session_start();

    // เคลียร์โต๊ะ  ไปบรรทัด 122 menu.php 
    if (isset($_GET['id'])) {
        $geturlatid = $_GET ['id'];
        
        $update_query = "DELETE FROM orders  WHERE user_id=$geturlatid";
        $update_query2 = "DELETE FROM cart  WHERE userid=$geturlatid";
        $result = mysqli_query($conn, $update_query);
        $result2 = mysqli_query($conn, $update_query2);
      
        $updatetbl_user = "UPDATE tbl_user SET cartstatus='0', status = '0' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('เคลียร์ออเดอร์');</script>";
            header("location: member_order.php");        
        }
     
    }
?>   