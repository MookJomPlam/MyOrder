<?php 

    require_once "connection.php";

    session_start();

    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    }

    //   edit?= 
    if(isset($_GET['edit'])) { 
        $edit_id = $_GET['edit'];
        $edit_query = "SELECT * FROM user WHERE id = '$edit_id'"; 
        $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        while ($edit_row = mysqli_fetch_array($run_edit)) {
            $id = $edit_row['id'];
            $username = $edit_row['username'];
        
        
        }
    }   
    // อัพเดตข้อมูล
    if (isset($_POST['submit'])) {
        $update_id = $_GET['edit_form'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $passwordenc = md5($password);
        
        $update_query = "UPDATE user SET username = '$username', password = '$passwordenc' WHERE id = '$update_id'";

        $result = mysqli_query($conn, $update_query);
        if ($result) {
            echo "<script>alert('อัพเดตข้อมูลแล้ว');</script>";
            header("location: member_info.php");
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
                <h2>พนักงาน</h2>
                <h3>ยินดีต้อนรับคุณ : <?php echo $_SESSION['username']; ?></h3>
            </nav>
    </header>

        <div class="content">
            <div class="content_grid">
            
                <div class="side">
    
                    <ul>
                        <li><a href="member_page.php">หน้าแรก</a></li>
                        <li><a href="member_info.php">ข้อมูลส่วนตัว</a></li>
                        <li><a href="member_item.php">รายการอาหาร</a></li>
                        <li><a href="member_order.php">ออเดอร์</a></li>
                        <li> <a href="logout.php">ออกจากระบบ</a> </li>
                    </ul>
                     
                </div>

                <div class="section">
                    <h4>แก้ไขข้อมูล</h4>
                    <hr>

                    <div class="showinfo">

                <form action="member_edit_info.php?edit_form=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
                    
                    <div class="group">
                        <label >ชื่อผู้ใช้ : </label>
                        <input type="text" name="username" value="<?php echo $username; ?>" required>
                    </div>

                    <div class="group">
                        <label >รหัสผ่าน : </label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="group">
                        <input type="submit" name="submit" value="ยืนยัน">
                    </div>

                </form>

    
</body>
</html>
