<?php 

    require_once "connection.php";

    session_start();

    

    if (isset($_POST['submit'])) {
        // $location = $_POST['location'];
        $geturlatid = $_POST ['id'];
        // $edit_query = "SELECT * FROM cart WHERE userid = '$geturlatid'"; 
        // $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        // while ($edit_row = mysqli_fetch_array($run_edit)) {
            $result = mysqli_query($conn, $update_query);
            if ($result){
               
            }
        // }
        $updatetbl_user = "UPDATE tbl_user SET cartstatus='0' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('Successfully deleted');</scropt>";
            header("location:menu.php?id=1");        
        }
     
    }
?>      


