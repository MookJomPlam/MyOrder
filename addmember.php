<?php 

    session_start();

    require_once "connection.php";

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }
       
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $userlevel = $_POST['userlevel'];

        move_uploaded_file($image_tmp, "image/$image");
        
        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);
        
        if ($user['username'] === $username) {
            echo "<script>alert('มีชื่อผู้ใช้อยู่แล้ว');</script>";
        } else {
            $passwordenc = md5($password);
            
            $query = "INSERT INTO user (username, password, firstname, lastname, image, userlevel) 
            VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '0001.jpg', '$userlevel')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "สมัครบัญชีผู้ใช้สำเเร็จ";
                header("Location: member.php");
            } else {
                $_SESSION['error'] = "เกิดบางอย่างผิดพลาด";
                header("Location: addmember.php");
            }
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
    <link rel="stylesheet" href="CSS/add_editmember_m.css">
</head>
<body>

    <header>
        <div class="container">
            <nav class="navbar">
                <h2>Admin</h2>
                <h3>ยินดีต้อนรับคุณ : <?php echo $_SESSION['username']; ?></h3>
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
                        <li> <a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                        
                </div>

                <div class="section">
                    <h4>เพิ่มพนักงาน</h4>
                    <hr>

                    <div class="showinfo">

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="group">
                        <label for="username">ชื่อผู้ใช้ :</label>
                        <input type="text" name="username" placeholder=" ชื่อผู้ใช้" required>
                    </div>

                    <div class="group">
                        <label for="password">รหัสผ่าน :</label>
                        <input type="password" name="password" placeholder=" รหัส" required>
                    </div>

                    <div class="group">
                        <label for="firstname">ชื่อจริง :</label>
                        <input type="text" name="firstname" placeholder=" ชื่อ" required>
                    </div>
        
                    <div class="group">
                        <label for="lastname">นามสกุล :</label>
                        <input type="text" name="lastname" placeholder=" สกุล" required>
                    </div>

                    <!-- <div class="group">
                        <lable>รูปภาพ :</lable>
                        <input type="file" name="image" alt="No have picture">
                    </div> -->

                    <div class="group">
                        <label>ตำแหน่ง  :</label>
                        <select name="userlevel" required>
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