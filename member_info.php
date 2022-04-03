<?php 

    require_once "connection.php";

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="CSS/member.css">
</head>
<body>

    <header>
        <div class="container">
            <nav class="navbar">
                <h2>พนักงาน</h2>
                <h3>ยินดีต้อนรับคุณ :  </h3>
            </nav>
    </header>

        <div class="content">
            <div class="content_grid">
            
                <div class="side">
                <div class="side_bar">
                    <ul>
                        <li><a href="member_page.php">หน้าแรก</a></li>
                        <li><a href="member_info.php">ข้อมูลส่วนตัว</a></li>
                        <li><a href="member_item.php">รายการอาหาร</a></li>
                        <li><a href="member_order.php">ออเดอร์</a></li>
                    </ul>
                        <div class="out">
                            <ul>
                                <li>
                                    <a href="logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </div>
                </div>
                </div>

                <div class="section">
                <h4>ข้อมูลส่วนตัว</h4>
                <hr>

                    <div class="add">
                        <a href="member_edit_info.php"> แก้ไขข้อมูล</a></li>
                    </div>
                    <br>


                        <div class="section">

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
                        </div>
                        

        </div>
        </div>
    
</body>
</html>
