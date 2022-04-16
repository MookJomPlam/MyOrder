<?php 

    require_once "connection.php";

    session_start();

    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    }

    $u_id = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="CSS/member_m.css">
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
                <div class="side_bar">
                    <ul>
                        <li><a href="member_page.php">หน้าแรก</a></li>
                        <li><a href="member_info.php">ข้อมูลส่วนตัว</a></li>
                        <li><a href="member_item.php">รายการอาหาร</a></li>
                        <li><a href="member_order.php">ออเดอร์</a></li>
                        <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>

                </div>
                </div>

                <div class="section">
                <h4>ข้อมูลส่วนตัว</h4>
                <hr>

                    <div class="add">
                    <!-- member_edit_info.php?edit=  -->
                        <a href="member_edit_info.php?edit=<?php echo $u_id; ?>"> แก้ไขข้อมูล</a></li>
                    </div>
                    <br>

                        <div class="section">

                    <?php   
                        //u_id บรรทัด8
                        $select_user = "SELECT * FROM user WHERE id =$u_id";
                        
                        $query_user = mysqli_query($conn, $select_user);

                        while ($row = mysqli_fetch_array($query_user)) {
                            $username = $row['username'];
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $userlevel = $row['userlevel'];

                    ?>

                        <div class="group">

                                <label name="username">ชื่อผู้ใช้ : <?php echo $username; ?></label>
                            </div>

                            <div class="group">
                                <label name="firstname">ชื่อจริง : <?php echo $firstname; ?> </label>
                            </div>

                            <div class="group">
                                <label name="lastname">นามสกุล : <?php echo $lastname; ?> </label>
                            </div>

                            <div class="group">
                                <label name="userlevel">ตำแหน่ง  : <?php echo $userlevel; ?> </label>
                            </div>

                <?php } ?>

                        </div>
                        

        </div>
        </div>
    
</body>
</html>

