<?php 

    require_once "connection.php";

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="CSS/item.css">
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
                        <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                       
                </div>
                </div>
                

                    <div class="section">
                    <h4>รายการอาหาร</h4>
                    <hr>

                        <div class="add">
                            <a href="add.php"> + เพิ่มรายการอาหาร</a></li>
                        </div>
                        <br>


                        <div class="grid-container">
                        <?php

                            $select_post = "SELECT * FROM tbl_product";

                            $query_post = mysqli_query($conn, $select_post);
                            
                                /* fetch associative array */
                            while ($row = mysqli_fetch_array($query_post)) {
                                $p_id = $row['p_id'];
                                $p_name = $row['p_name'];
                                $p_price = $row['p_price'];
                                $p_image = $row['p_image'];
                            
                        ?>
                            <div class="grid-item">
                                <p>รหัสสินค้า : <?php echo $p_id; ?></p>
                                <img src="image/<?php echo $p_image; ?>" alt="ไม่พบรูปภาพ">
                                <p><?php echo $p_name; ?></p>
                                <p >ราคา : <?php echo $p_price ?></p>
                                <div class="edit_del">
                                    <div class="edit">
                                        <label><a href="edit.php?edit=<?php echo $p_id; ?>"> แก้ไขเมนู</a></label>
                                    </div>
                                    <div class="del">
                                    <div class="delete">
                                        <label><a href="delete_item.php?del=<?php echo $p_id; ?>"onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')">ลบ</a></label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        
                    </div>
        </div>
    
</body>
</html>