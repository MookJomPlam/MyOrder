<?php 

    require_once "connection.php";

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Page</title>
    <link rel="stylesheet" href="CSS/view.css">
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
            <?php 
                        $url = $_GET['id']; //member_order 111
                        $select_location2 = "SELECT * FROM tbl_user WHERE id='$url'";


                        $query_location2 = mysqli_query($conn, $select_location2);
                        $ran = 0;

                        
                        while ($lol = mysqli_fetch_array($query_location2)) {
                            $info = $lol['id'];
                            $info1 = $lol['name'];
                            $info2 = $lol['cartstatus'];
                            $info3 = $lol['location'];

                        ?>
                        <strong>ออเดอร์อาหาร โต๊ะที่ :<?php echo $url;?> </strong> 
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

                <!-- // ราคารวม -->
                    <?php $url_id = $_GET['id'];
        
                        //มีการจอย จาก cart       sumสร้างตัวเเปร sumprice=product_id
                        $select_post = "SELECT *,sum(t.p_price) as sumprice,count(c.product_id) as num FROM loginadminuser.cart c right join loginadminuser.tbl_product t on c.product_id=t.p_id where c.userid=$url_id;";

                        $query_post = mysqli_query($conn, $select_post);

                        while ($row = mysqli_fetch_array($query_post)) {
                        $p_price = $row['sumprice'];

                        ?>

                        <h3>ราคารวม : <?php echo $p_price; ?> บาท </h3> 

                    <?php } ?>    
                <!-- //  -->
                        
                        <div class="ok">
                            <label><a href="updatestatus3.php?id=<?php echo $url;?>">สำเร็จ</a></label>
                        </div>
                        
                        
                    </div>
                    <?php } ?>    
            </div>
     
            </div>
        </div>
    
</body>
</html>