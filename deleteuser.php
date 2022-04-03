<?php

    require_once "connection.php";

    if(isset($_GET['del'])) { //จาก viewpost (84)
        $delete_id = $_GET['del'];

        $deleteu_query = "DELETE FROM user WHERE id = '$delete_id'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $deleteu_query)) {
            echo "<script>alert('Successfully deleted');</scropt>";
            header("location: member.php");        
        }
    }
?>