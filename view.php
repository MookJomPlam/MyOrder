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
    <title>view Page</title>
    <link rel="stylesheet" href="CSS/view_v.css">
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
                        <li> <a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                        
                </div>

            <div class="section">  
            <?php 
                        $url = $_GET['id'];
                        $select_location2 = "SELECT * FROM tbl_user WHERE id='$url'";


                        $query_location2 = mysqli_query($conn, $select_location2);
                        $ran = 0;

                        
                        while ($lol = mysqli_fetch_array($query_location2)) {
                            $info = $lol['id'];
                            $info1 = $lol['name'];
                            $info2 = $lol['cartstatus'];
                            $info3 = $lol['status'];

                        ?>
                        <strong>ออเดอร์โต๊ะที่ :<?php echo $url;?> </strong> 
                        <strong> สถานะ : <?php switch ($info3) {
                                        case 1:   ?>
                                            <?php echo "ร้าน"; ?>
                                            <?php break; ?>
                                            
                                            <?php  case 2: ?>
                                                <?php echo "กลับบ้าน"; ?>

                                                <?php break; ?>

                                                <?php
                                        default:
                                            # code...
                                            break;
                                            ?>
                                   <?php } ?>
                                   </strong>

                <hr>

                    <div class="table_viet">
                        <table>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                
                            </tr>

                            <?php 

                            $select_view = "SELECT *,sum(t.p_price) as sumprice,count(o.product_id) as num FROM loginadminuser.orders o
                            right join loginadminuser.tbl_product t on o.product_id=t.p_id where o.user_id=$url group by o.product_id";
                                     
                            $query_view = mysqli_query($conn, $select_view);
                            $ran = 0;

                            while ($row = mysqli_fetch_array($query_view)) {
                            $ran +=1;
                              $name = $row['p_name'];
                              $num = $row['num'];
                        
                        ?>
                                
                            <tr>
                                <td><?php echo $ran; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $num; ?></td>
                            </tr>
                            
                            
                            <?php } ?>   
                        </table>
                        
                        <div class="ok">
                            <label><a href="updatestatus2.php?id=<?php echo $url;?>">ยืนยัน</a></label>
                        </div>
                        
                        
                    </div>
                    <?php } ?>    
            </div>
     
            </div>
        </div>
    
</body>
</html>