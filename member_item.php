<?php 

    require_once "connection.php";

    session_start();

    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="CSS/item_t.css">
</head>
<body>

<header>
    <div class="container">
        <nav class="navbar">
            <h2>พนักงาน</h2>
            <h3>ยินดีต้อนรับคุณ : <?php echo $_SESSION['username']; ?> </h3>
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
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
            </div>
        

            <div class="section">
            <h4>รายการอาหาร</h4>
            <hr>

                <!-- <div class="add">
                    <a href="member_add.php"> + เพิ่มรายการอาหาร</a></li>
                </div> -->
                <br>


                <div class="grid-container">
                <?php

                    $select_post = "SELECT * FROM tbl_product order by p_status";

                    $query_post = mysqli_query($conn, $select_post);

                    while ($row = mysqli_fetch_array($query_post)) {
                        $p_id = $row['p_id'];
                        $p_name = $row['p_name'];
                        $p_price = $row['p_price'];
                        $p_image = $row['p_image'];
                        $p_status = $row['p_status'];

                    ?>
                    <div class="grid-item">
                        <p>รหัสสินค้า : <?php echo $p_id; ?></p>
                        <img src="image/<?php echo $p_image; ?>" alt="ไม่พบรูปภาพ">
                        <p><?php echo $p_name; ?></p>
                    <div class="edit_del">

                        <p>ราคา : <?php echo $p_price; ?></p>
                        <p><?php switch ($p_status) {
                        case 1:
                            ?>
                        <p style="color:green"><?php echo "พร้อม"; ?></p>
                            <?php break; ?> 
                            
                            <?php  case 2: ?>
                                <p style="color:red"> <?php echo "ไม่พร้อม"; ?></p>

                                <?php break; ?>
                    <?php } ?></p>
                </div>

                </div>
                <?php } ?>


                
            </div>
    </div>
    </div>
</div>

</body>
</html>
