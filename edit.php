<?php 

    require_once "connection.php";

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } 
    if(isset($_GET['edit'])) { 
        $edit_id = $_GET['edit'];
        $edit_query = "SELECT * FROM tbl_product WHERE p_id = '$edit_id'"; 
        $run_edit = mysqli_query($conn, $edit_query);
        //วนลูป เก็บข้อมูลเก่า 
        while ($edit_row = mysqli_fetch_array($run_edit)) {
            $p_id = $edit_row['p_id'];
            $p_name = $edit_row['p_name'];
            $p_price = $edit_row['p_price'];
            $p_image = $edit_row['p_image'];
            echo $edit_id;
        }
    }

    if (isset($_POST['submit'])) {
        $update_id = $_GET['edit_form'];
        $p_name = $_POST['name'];
        $p_price = $_POST['price'];
        $p_image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "image/$p_image");

        $update_query = "UPDATE tbl_product SET p_name = '$p_name', p_price = '$p_price', p_image = '$p_image' WHERE p_id = '$update_id'";

        $result = mysqli_query($conn, $update_query);
        if ($result) {
            echo "<script>alert('อัพเดตข้อมูลแล้ว');</script>";
            header("location: item.php");
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
    <title>Edit Page</title>
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
                    <h4>แก้ไขรายการ</h4>
                    <hr>

                    <div class="showinfo">
                <form action="edit.php?edit_form=<?php echo $p_id; ?>" method="post" enctype="multipart/form-data">  <!-- ไปที่ $_GET (34) -->
                
                    <div class="group">
                        <label for="username">ชื่ออาหาร : </label>
                        <input type="text" name="name" value = "<?php echo $p_name; ?>">
                    </div>

                    <div class="group">
                        <label for="price">ราคา :</label>
                        <input type="text" name="price" value = "<?php echo $p_price; ?>">
                    </div>

                    <div class="group">
                        <lable>รูปภาพ :</lable>
                        <input type="file" name="image" value = "<?php echo $p_image; ?>">
                    </div>

                    <!-- <div class="group">
                        <label>สถานะ  :</label>
                        <select name="status" required>
                            <option value="">เลือกสถานะ</option>
                            <option value="1">พร้อม</option>
                            <option value="2">ไม่พร้อม</option>
                        </select>
                    </div> -->

                    <div class="group">
                        <input type="submit" name="submit" value="ยืนยัน">
                    </div>
                </form>
                </div>

            </div>

            </div>
        </div>
        </div>
    
</body>
</html>
