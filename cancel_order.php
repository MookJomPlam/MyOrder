<?php 

    require_once "connection.php";

    session_start(); 

    if (isset($_POST['submit'])) {
        $geturlatid = $_POST ['id'];
        $update_query = "DELETE FROM orders WHERE user_id=$geturlatid";
        $result = mysqli_query($conn, $update_query);

        $updatetbl_user = "UPDATE tbl_user SET status='0', cartstatus='0' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('Successfully deleted');</scropt>";
            header("location:menu.php?id=$geturlatid");        
        }
     
    }
?>      


