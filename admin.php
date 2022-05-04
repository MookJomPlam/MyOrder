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
    <title>Admin Page</title>
    <link rel="stylesheet" href="CSS/admin_a.css">
</head>
<body>

<header>
    <div class="container">
        <nav class="navbar">
            <h2>Admin</h2>
            <h3>ยินดีต้อนรับคุณ : <?php echo $_SESSION['username']; ?></h3>
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
                        <li> <a href="logout.php">ออกจากระบบ</a> </li>
                    </ul>
                </div>
                
                <div class="showinfo">
                    <h4>ยินดีต้อนรับสู่หน้า Admin</h4>
                    <img width="640" height="360" src="image/admin.jpg"  alt="No have picture">
                </div>

            </div>
        </div>

    </div>
    
</body>
</html>
