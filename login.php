<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าล็อกอิน</title>

    <link rel="stylesheet" href="CSS/loginn.css">

</head>
<body>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>

    <div class="box">
    <form action="login_file.php" method="post">
        
        <div class="group">
        <label for="username">ชื่อผู้ใช้</label>
        <input type="text" name="username" placeholder="Username" required>
        </div>

        <br>

        <div class="group">
        <label for="password">รหัสผ่าน</label>
        <input type="password" name="password" placeholder="Password" required>
        </div>

        <br>

        <div class="group">
        <input type="submit" name="login" value="เข้าสู่ระบบ">
        </div>

        <br>

        <!-- <div class="group">
        <a href="register.php">สมัครบัญชีผู้ใช้</a>
        </div> -->


    </form>
    </div>

</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>