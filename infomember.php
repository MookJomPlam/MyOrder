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
    <title>Admin Page</title>
    <link rel="stylesheet" href="CSS/add_editmember.css">
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
                    <h4>ข้อมูลพนักงาน</h4>
                    <hr>

                    <div class="showinfo">

                 <?php   
                //  ไป member.php ?id= บรรทัด 84 ดูขอ้มูล
                    if(isset($_GET['id'])) {
                    $select_id = $_GET['id'];

                    $select_user = "SELECT * FROM user WHERE id = '$select_id'";

                    $query_user = mysqli_query($conn, $select_user);

                    while ($row = mysqli_fetch_array($query_user)) {
                        $username = $row['username'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $userlevel = $row['userlevel'];

                ?>

                    <div class="group">
                        <label>ชื่อผู้ใช้ : <?php echo $username; ?></label>
                    </div>

                    <div class="group">
                        <label >ชื่อจริง : <?php echo $firstname; ?> </label>
                    </div>
        
                    <div class="group">
                        <label >นามสกุล : <?php echo $lastname; ?> </label>
                    </div>

                    <!-- <div class="group">
                        <lable>รูปภาพ :</lable>
                        <input type="file" name="image" alt="No have picture">
                    </div> -->

                    <div class="group">
                        <label>ตำแหน่ง  : <?php echo $userlevel; ?> </label>
                    </div>

                    
                    <?php } ?>
                    <?php } ?>

    
</body>
</html>
<?php } ?>

