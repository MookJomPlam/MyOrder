<?php 

    require_once "connection.php";

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
    <title>view Page</title>
    <link rel="stylesheet" href="CSS/view.css">
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
                <strong>ออเดอร์อาหาร โต๊ะที่ :03 </strong> 
                <strong> สถานะ : ทานที่ร้าน</strong>
                <hr>

                    <div class="table_viet">
                        <table>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                
                            </tr>
                                
                            <tr>
                                <td>01</td>
                                <td>ข้าวกระเพราหมูสับ</td>
                                <td>1</td>
                            </tr>

                            <tr>
                                <td>01</td>
                                <td>ข้าวกระเพราหมูสับ</td>
                                <td>1</td>
                            </tr>

                            
                        </table>

                        <div class="ok">
                            <label><a href="edit.php">ยืนยัน</a></label>
                        </div>
                    
                    </div>
            </div>
     
            </div>
        </div>
    
</body>
</html>
<?php } ?>