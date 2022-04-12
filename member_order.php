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

                    <div class="table_viet">
                        <table>
                            <tr>
                                <th>ลำดับ</th>
                                <th>เวลา</th>
                                <th>โต๊ะที่</th>
                                <th>สถานะ</th>
                                <th>รายการ</th>
                                <th>เคลียร์</th>


                            </tr>
                                
                            <?php 
                                //มีการจอย 
                                $select_order = "SELECT o.updateAt,u.name,u.cartstatus,u.id FROM loginadminuser.orders o 
                                left join loginadminuser.tbl_product t on o.product_id=t.p_id 
                                left join loginadminuser.tbl_user u on o.user_id=u.id
                                group by o.user_id
                                order by o.updateAt;";
                            
                            $query_order = mysqli_query($conn, $select_order);
                             $ran = 0;
                            
                            while ($row = mysqli_fetch_array($query_order)) {
                                    $id = $row['id'];                     
                                    $ran +=1;
                                    $updateAt = $row['updateAt'];
                                    $date = date_create($updateAt);
                                    $name = $row['name'];
                                    $cartstatus = $row['cartstatus'];

                                    ?>

                                    <?= console_log($row); ?>
                            <tr>
                                    <?php switch ($cartstatus) {
                                        case 2: 
                                        ?>
                                            <td><?php echo $ran; ?></td>
                                            <td><?php echo date_format($date,"H:i:s"); ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo "ดำเนินการ"; ?></td>
                                            <td> 
                                                <div class="view">
                                                    <label><a href="member_view.php?id=<?php echo $id; ?>">ดูรายการ</a></label>
                                                </div>
                                            </td>
                                            
                                            <?php break; ?>

                                            <?php  case 3: 
                                                ?>
                                                <td><?php echo $ran; ?></td>
                                                <td><?php echo date_format($date,"H:i:s"); ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo "สำเร็จ"; ?></td>
                                                <td> 
                                                    <div class="view">
                                                        <label><a href="member_view.php?id=<?php echo $id; ?>">ดูรายการ</a></label>
                                                    </div>
                                                </td>

                                                <td><div class='del'>
                                                <div class='delete'>
                                                    <!-- _GET id จาก clear.php บรรทัด 8 -->
                                                    <a href="clear.php?id=<?php echo $id; ?>"onclick="return confirm('คุณต้องการเคลียร์โต๊ะที่เลือก')">เคลียร์</a>
                                                </div>
                                                </div>
                                                </td>
                                                
                                                <?php break; ?>
                                          <?php
                                        default:
                                            # code...
                                            break;
                                            ?>
                                   <?php } ?>
                                    
                                
                           
                            <?php } ?>
                        </div>

                                   
                    </div>
                </div>

                
            </div>
        </div>
    
</body>
</html>
<?php } ?>