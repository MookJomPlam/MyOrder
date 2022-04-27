<?php 

    require_once "connection.php";

    session_start();

    // adminลบออเดอร์ที่ลูกค้าสั่ง order 120
    if (isset($_GET['id'])) {
        $geturlatid = $_GET ['id'];
        
        $update_query = "DELETE FROM orders WHERE user_id=$geturlatid";
        $result = mysqli_query($conn, $update_query);
    
        $updatetbl_user = "UPDATE tbl_user SET location='0', cartstatus='0' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('Successfully deleted');</script>";
            header("location: order.php");        
        }
     
    }
?>      


