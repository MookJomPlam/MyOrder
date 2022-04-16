<?php 

    require_once "connection.php";

    session_start();

    // member_view _GET id อัพสถานะอาหาร 125
    if (isset($_GET['id'])) {
        $geturlatid = $_GET ['id'];
        $updatetbl_user = "UPDATE tbl_user SET cartstatus='3' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('Successfully deleted');</script>";
            header("location:member_view.php?id=$geturlatid");        
        }
     
    }
?>      


