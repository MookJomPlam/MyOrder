<?php 

    require_once "connection.php";

    session_start();
    // member.php   edit?= บรรทัด 89
    if(isset($_GET['edit'])) { 
        $edit_id = $_GET['edit'];
        $edit_query = "SELECT * FROM user WHERE id = '$edit_id'"; 
        $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        while ($edit_row = mysqli_fetch_array($run_edit)) {
            $id = $edit_row['id'];
            $firstname = $edit_row['firstname'];
            $lastname = $edit_row['lastname'];
            $userlevel = $edit_row['userlevel'];
        }
    }   
    // อัพเดตข้อมูล
    if (isset($_POST['submit'])) {
        $update_id = $_GET['edit_form'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $userlevel = $_POST['userlevel'];

        $update_query = "UPDATE user SET  firstname = '$firstname', lastname = '$lastname', userlevel = '$userlevel' WHERE id = '$update_id'";

        $result = mysqli_query($conn, $update_query);
        if ($result) {
            echo "<script>alert('อัพเดตข้อมูลแล้ว');</script>";
            header("location: member.php");
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด!');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Page</title>
    <link rel="stylesheet" href="CSS/add_editmember_m.css">
</head>
<body>

    <header>
        <div class="container">
            <nav class="navbar">
                <h2>Admin</h2>
                <h3>ยินดีต้อนรับคุณ : </h3>
            </nav>
    </header>

        <div class="content">
            <div class="content_grid">
            
                <div class="side">
    
                <ul>
                        <li><a href="admin.php">หน้าแรก</a></li>
                        <li><a href="member.php">พนักงาน</a></li>
                        <li><a href="item.php">รายการอาหาร</a></li>
                        <li><a href="order.php">ออเดอร์</a></li>
                        <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                        
                </div>

                <div class="section">
                    <h4>แก้ไขข้อมูล</h4>
                    <hr>

                    <div class="showinfo">

                <form action="editinfo.php?edit_form=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
                    
                    <div class="group">
                        <label>ชื่อจริง : </label>
                        <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                    </div>
        
                    <div class="group">
                        <label>นามสกุล : </label>
                        <input type="text" name="lastname" value = "<?php echo $lastname; ?>">
                     </div>  

                    <div class="group">
                        <label>ตำแหน่ง : </label>
                        <select name="userlevel" alue = "<?php echo $userlevel; ?>">
                            <option value="">เลือกสถานะ</option>
                            <option value="a">ผู้ดูแล</option>
                            <option value="m">พนักงาน</option>
                        </select>
                    </div>

                    <div class="group">
                        <input type="submit" name="submit" value="ยืนยัน">
                    </div>
                    
                </form>
    
</body>
</html>
