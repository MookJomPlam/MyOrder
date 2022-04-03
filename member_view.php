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
    <title>view Page</title>
    <link rel="stylesheet" href="CSS/view.css">
</head>
<body>

    <header>
        <div class="container">
            <nav class="navbar">
                <h2>พนักงาน</h2>
                <h3>ยินดีต้อนรับคุณ : </h3>
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
                        <div class="sum"></div>

                            <div class="status">
                                <select name="userlevel" required>
                                    <option value="">เลือกสถานะ</option>
                                    <option value="1">กำลังนำเสริฟ</option>
                                    <option value="2">สำเร็จ</option>
                                </select>

                            </div>

                            <div class="ok">
                                <label><a href="edit.php">ยืนยัน</a></label>
                            </div>

                        </div>
                    
                    </div>
            </div>
     
            </div>
        </div>
    
</body>
</html>
