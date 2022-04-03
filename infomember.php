<?php 

    require_once "connection.php";

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } 
    if(isset($_GET['edit'])) { 
        $edit_id = $_GET['edit'];
        $edit_query = "SELECT * FROM user WHERE id = '$edit_id'"; 
        $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        while ($edit_row = mysqli_fetch_array($run_edit)) {
            $id = $edit_row['id'];
            $username = $edit_row['username'];
            $password = $edit_row['password'];
            $firstname = $edit_row['firstname'];
            $lastname = $edit_row['lastname'];
            $image = $edit_row['image'];
            $userlevel = $edit_row['userlevel'];
            echo $edit_id;
        }
    }   

    if (isset($_POST['submit'])) {
        $update_id = $_GET['edit_form'];
        $username = $POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $userlevel = $_POST['userlevel'];

        move_uploaded_file($image_tmp, "image/$image");

        $update_query = "UPDATE user SET username = '$username', firstname = '$firstname', lastname = '$lastname', image = '$image', userlevel = '$userlevel' WHERE id = '$update_id'";

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
    <title>Admin Page</title>
    <link rel="stylesheet" href="CSS/add_editmember.css">
</head>
<body>

    <header>
        <div class="container">
            <nav class="navbar">
                <h2>Admin</h2>
                <h3>ยินดีต้อนรับคุณ : <?php echo $_SESSION['username']; ?> </h3>
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
                    </ul>
                        <div class="out">
                            <ul>
                                <li>
                                    <a href="logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                </div>

                <div class="section">
                    <h4>ข้อมูลพนักงาน</h4>
                    <hr>

                    <div class="showinfo">

                <form action="edit.php?edit_form=<?php echo $id; ?>" method="post" enctype="multipart/form-data"> 
                    
                <div class="group">
                        <label for="username">ชื่อผู้ใช้ : xxxxx</label>
                        <!-- <input type="text" name="username" value = "<?php echo $username; ?>"> -->
                    </div>

                    <!-- <div class="group">
                        <label for="password">รหัสผ่าน :</label>
                        <input type="password" name="password" placeholder=" รหัส">
                    </div> -->

                    <div class="group">
                        <label for="firstname">ชื่อจริง :xxxxxx </label>
                        <!-- <input type="text" name="firstname" value = "<?php echo $firstname; ?>"> -->
                    </div>
        
                    <div class="group">
                        <label for="lastname">นามสกุล : xxxxxx </label>
                        <!-- <input type="text" name="lastname" value = "<?php echo $lastname; ?>"> -->
                    </div>

                    <!-- <div class="group">
                        <lable>รูปภาพ :</lable>
                        <input type="file" name="image" alt="No have picture">
                    </div> -->

                    <div class="group">
                        <label>ตำแหน่ง  : m </label>
                        <!-- <select name="userlevel" required>
                            <option value="">เลือกสถานะ</option>
                            <option value="1">ผู้ดูแล</option>
                            <option value="2">พนักงาน</option>
                        </select> -->
                    </div>

                    <!-- <div class="group">
                        <input type="submit" name="submit" value="ยืนยัน">
                    </div> -->
                </form>

    
</body>
</html>
