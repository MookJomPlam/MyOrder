<?php

    session_start();

    require_once "connection.php";

    if (!$_SESSION['userid']) {
        header("location: login.php");
    }

    
    if (isset($_POST['submit'])) {

        $p_name = $_POST['name'];
        $p_price = $_POST['price'];
        $p_image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "image/$p_image");

        $insert_query = "INSERT INTO tbl_product (p_name, p_price, p_image) VALUES ('$p_name', '$p_price', '$p_image')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('เพิ่มรายการสำเร็จ');</script>";
            header("location: item.php");
        
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด');</script>";
        }
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <link rel="stylesheet" href="CSS/add_edit.css">
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
                    <div class="side_bar">
                        <ul>
                            <li><a href="admin.php">หน้าแรก</a></li>
                            <li><a href="member.php">พนักงาน</a></li>
                            <li><a href="item.php">รายการอาหาร</a></li>
                            <li><a href="order.php">ออเดอร์</a></li>
                            <li> <a href="logout.php">ออกจากระบบ</a> </li>
                        </ul>
                            
                    </div>
                    </div>

            <div class="section">
                <h4>เพิ่มรายการ</h4>
                <hr>

                <div class="showinfo">

                <form action="add.php" method="post" enctype="multipart/form-data">


                    <div class="group">
                        <label for="username">ชื่ออาหาร :</label>
                        <input type="text" name="name" placeholder=" อาหาร " required>
                    </div>

                    <div class="group">
                        <label for="username">ราคา :</label>
                        <input type="text" name="price" placeholder=" ราคา" required>
                    </div>

                    <div class="group">
                        <lable>รูปภาพ :</lable>
                        <input type="file" name="image" alt=" ไม่พบรูปภาพ " required>
                    </div>

                    <div class="group">
                        <input type="submit" name="submit" value="ยืนยัน">
                    </div>
                    
                </from>

                </div>

            </div>

            </div>
        </div>
        </div>
    
</body>
</html>