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
    <title>Item Page</title>
    <link rel="stylesheet" href="CSS/member.css">
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
                <h4>พนักงาน</h4>
                <hr>

                    <div class="add">
                        <a href="addmember.php"> + เพิ่มพนักงาน</a></li>
                    </div>
                    <br>


                        <div class="grid-container">
                    <?php 
                        
                        $select_user = "SELECT * FROM user ORDER BY 1 DESC";
                        //ประมวลผล query
                        $query_user = mysqli_query($conn, $select_user);
                        
                        while ($row = mysqli_fetch_array($query_user)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $image = $row['image'];
                                $userlevel = $row['userlevel'];

                    ?>
                        <div class="grid-item">
                            <img src="image/<?php echo $image; ?>" alt="ไม่พบรูปภาพ">
                            <p>ชื่อผู้ใช้ : <?php echo $username; ?> </p>
                            <p >ตำแหน่ง : <?php echo $userlevel; ?></p>
                            
                            <div class="edit_del">
                                <div class="edit">
                                    <label><a href="infomember.php">ดูข้อมูล</a></label>
                                </div>

                                <div class="del">
                                    <div class="delete">
                                        <label><a href="deleteuser.php?del=<?php echo $id; ?>"onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')">ลบ</a></label>
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
<?php } ?>