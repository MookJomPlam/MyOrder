<?php 

    require_once "connection.php";

    session_start();

    
    // ยืนยันออเดอร์ที่กดสั่งซื้อ menu 102
    if (isset($_POST['submit'])) {
        $location = $_POST['location'];
        $geturlatid = $_POST ['id'];
        
        $edit_query = "SELECT * FROM cart WHERE userid = '$geturlatid'"; 
        $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        while ($edit_row = mysqli_fetch_array($run_edit)) {
            $id =$edit_row['id'];
            $userid=$edit_row['userid'];
            $product_id =$edit_row['product_id'];
            
            $update_query = "INSERT into orders(user_id,product_id,location) values ($userid,$product_id,$location)";
            $result = mysqli_query($conn, $update_query);
            if ($result){
               
            }
        }
        $updatetbl_user = "UPDATE tbl_user SET location='$location', cartstatus='1' WHERE id ='$geturlatid'"; 
        // check ถ้าสำเร็จ
        if (mysqli_query($conn, $updatetbl_user)) {
            echo "<script>alert('Successfully deleted');</script>";
            header("location:menu.php?id=$geturlatid");        
        }
     
    }
?>      


