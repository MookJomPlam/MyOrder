<?php 

    require_once "connection.php";
    require_once "console_log.php";

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order Page</title>
    <link rel="stylesheet" href="CSS/order.css">
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
                <h4>ออเดอร์อาหาร</h4>
                <!-- SELECT o.updateAt,u.name,u.cartstatus FROM loginadminuser.orders o  -->
                <!-- left join loginadminuser.tbl_product t on o.product_id=t.p_id  -->
                <!-- left join loginadminuser.tbl_user u on o.user_id=u.id -->
                <!-- group by o.user_id; -->

                    <div class="table_viet">
                        <table>
                            <tr>
                                <th>ลำดับ</th>
                                <th>เวลา</th>
                                <th>โต๊ะที่</th>
                                <th>สถานะ</th>
                                <th>รายการ</th>
                                <th>ลบรายการ</th>
                            </tr>
                                
                            <?php 
                                //มีการจอย 
                                $select_order = "SELECT o.updateAt,u.name,u.cartstatus FROM loginadminuser.orders o 
                                left join loginadminuser.tbl_product t on o.product_id=t.p_id 
                                left join loginadminuser.tbl_user u on o.user_id=u.id
                                group by o.user_id;";
                            
                            $query_order = mysqli_query($conn, $select_order);
                             $ran = 0;
                            
                            while ($row = mysqli_fetch_array($query_order)) {                                 
                                    $ran +=1;
                                    $updateAt = $row['updateAt'];
                                    $date = date_create($updateAt);
                                    $name = $row['name'];
                                    $cartstatus = $row['cartstatus'];
                                    
                                
                            ?>
                                    <?= console_log($row); ?>
                            <tr>
                                    <td><?php echo $ran; ?></td>
                                    <td><?php echo date_format($date,"H:i:s"); ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $cartstatus; ?></td>
                                    <td> <div class="view">
                                        <label><a href="view.php">ดูรายการ</a></label>
                                    </div>
                                    </td>

<h1>werfgb </h1>

                                <td><div class="del">
                                    <a href="edit.php" class="delete">ลบ</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </div>

                        

                        

                                   
                    </div>
                </div>

                
            </div>
        </div>
    
</body>
</html>
<?php } ?>