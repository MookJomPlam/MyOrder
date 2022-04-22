<?php 

  session_start();

  require_once "connection.php"; 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon ตะกร้า -->
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  </head>
  
  <body>

    <!-- header  -->
    <header>
      <div class = "container">
        <!-- navbar -->
        <nav class = "navbar">
          <h1 class = "navbar-brand">ร้านอาหารต้นไทร</h1>

          <div class = "cart">
            <button class="click">
            <i class = "fas fa-shopping-cart"></i>
            </button>
        </div>

        

        <div class="list-order">
            <div class="cart_in">
              <h2>รายการที่เลือก</h2>

            <div class="group">


                  <div class="group-location">
                  <label>ทานที่  :</label>
                  <select form="updateorder" name="location" required>
                      <option value="">สถานที่</option>
                      <option value="1">ร้าน</option>
                      <option value="2">กลับบ้าน</option>
                  </select>
                  </div>

                  <div class="status">
                    <?php
                    $get_id_from_url = $_GET['id'];
                    
                    $selectTBLUser = "SELECT * FROM tbl_user where id=$get_id_from_url";
                        
                    $query_tbl_user = mysqli_query($conn, $selectTBLUser);

                    while ($row = mysqli_fetch_array($query_tbl_user)) {
                    $tbl_user_cartstatus = $row['cartstatus']
                    ?>  
                    <label>สถานะอาหาร : <?php switch ($tbl_user_cartstatus) {
                      case 1:
                        echo "รอการยืนยัน";
                        break;
                        case 2:
                          echo "ดำเนินการ";
                          break;
                          case 3:
                            echo "สำเร็จ";
                            break;
                      default:
                        # code...
                        break;
                    } ?></label> 
                    <?php }?>
                  </div>

                  </div>
                 

                  

                    <div class="table_viet">
                      <table>
                          <tr>
                              <th>รายการ</th>
                              <th>จำนวน</th>
                              <th>ราคา</th>
                              <th>ลบ</th>
                          </tr>
                          
                      <?php 
                            $url_idd = $_GET['id']; //dele_cart บรรทัด 5

                              //มีการจอย จาก cart ไป tbl_product หา c.product_id=t.p_id ที่  c.userid
                            $select_post = "SELECT *,sum(t.p_price) as sumprice,count(c.product_id) as num FROM loginadminuser.cart c right join loginadminuser.tbl_product t on c.product_id=t.p_id where c.userid=$url_idd group by c.product_id;";
                        
                            $query_post = mysqli_query($conn, $select_post);

                            while ($row = mysqli_fetch_array($query_post)) {
                              $id = $row['id'];
                              $userid = $row['userid'];
                              $product_id = $row['product_id'];
                              $p_id = $row['p_id'];
                              $p_name = $row['p_name'];
                              $p_price = $row['sumprice'];
                              $num = $row['num'];
                            
                        ?>
                        

                          <tr>
                            <td><?php echo $p_name; ?></td>
                            <td><?php echo $num; ?></td> 
                            <td><?php echo $p_price; ?></td>
                            <td><div class="del">

                              <?php
                                $delete_cart = $_GET['id']; // delete_cart 5

                                $delete_cart2 = "SELECT * from tbl_user WHERE id=$delete_cart";
                                $delete_cart3 = mysqli_query($conn,$delete_cart2);

                                while ($row = mysqli_fetch_array($delete_cart3)) {
                                      $delete_cart4 = $row['cartstatus'];

                                      if($delete_cart4 == 0){

                                      ?>
                                        <a href="delete_cart.php?id=<?php echo $id; ?>&userid=<?php echo $userid; ?>">ลบ</a>
                                        
                                        <?php } else if($delete_cart4 == 1){?>

                                        <?php }
                                      }?>

                                </div>
                            </td>
                              
                          </tr>

                      <?php } ?>   

                      
                    </div>

                </table>
                

                    <?php $url_id = $_GET['id']; //dele_cart บรรทัด 5

                      //มีการจอย จาก cart       sumสร้างตัวเเปร sumprice=product_id
                      $select_post = "SELECT *,sum(t.p_price) as sumprice,count(c.product_id) as num FROM loginadminuser.cart c right join loginadminuser.tbl_product t on c.product_id=t.p_id where c.userid=$url_id;";

                      $query_post = mysqli_query($conn, $select_post);

                      while ($row = mysqli_fetch_array($query_post)) {
                      $id = $row['id'];
                      $userid = $row['userid'];
                      $product_id = $row['product_id'];
                      $p_id = $row['p_id'];
                      $p_name = $row['p_name'];
                      $p_price = $row['sumprice'];
                      $num = $row['num'];
            
                      ?>
                    <div class="cart-total">
                        <div class="cart-span">

                            <h3>ราคา : </h3> 
                            <h3><?php echo $p_price; ?></h3> 
                            <h3> บาท</h3>
                          
                      
                          </div>
                          <?php
                          $getid=$_GET['id'];
                          $tbl_user="SELECT * from tbl_user WHERE id=$getid";
                          $querytbl_user = mysqli_query($conn, $tbl_user);

                      while ($row = mysqli_fetch_array($querytbl_user)) {
                        $querytbluser = $row['cartstatus'];
                      
                          ?>
                            <?php
                              if ($querytbluser==0){?>
                            <form id="updateorder" action="updateorder.php" method="post" enctype="multipart/form-data" >
                            <input name="id" value="<?php echo $getid ?>" style ="display:none">
                            <button class="cart_ok" type = "submit" name="submit">ยืนยัน </button>
                          </from>

                          <?php }else if($querytbluser==1) {?>
                            <form id="cancel_order" action="cancel_order.php" method="post" enctype="multipart/form-data" >
                            <input name="id" value="<?php echo $getid ?>" style ="display:none">

                            <button class="cart_ok" type = "submit" name="submit">ยกเลิก </button>
                          </from>

                          <?php } ?>  

                          <?php } ?>

                            
                    </div>

                <?php } ?>

          </div>
        </nav>
       

        <!-- banner -->
        <div class = "banner">
          <div class = "banner-content">
            <h1>ร้านต้นไทร</h1>
            <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eveniet, quis nisi recusandae assumenda ea sequi obcaecati accusantium in provident dolore debitis autem neque vel commodi atque voluptates incidunt aliquam delectus veritatis? Exercitationem, fugit sed!</p>
          </div>

        </div>

      </div>
    </header>
   

    <!-- products section  -->
    <section class = "products">
      <div class = "container">
        <h2>เมนู</h2>

        <div class = "product-list">
    <?php 

            $id = $_GET['id']; //จาก add_cart 9

            $select_tbl = "SELECT * FROM tbl_product";

            $run_tbl = mysqli_query($conn, $select_tbl);

            //วนลูป
            while ($row = mysqli_fetch_array($run_tbl)) {
            $p_id = $row['p_id'];
            $p_name = $row['p_name'];
            $p_price = $row['p_price'];
            $p_image = $row['p_image'];
            
        ?>
            <div class = "product-item">
                <div class = "product-img">
                  <img src = "image/<?php echo $p_image; ?>" alt = "ไม่พบรูปภาพ">
                </div>
            
                <div class = "product-content">
                  <h3 class = "product-name"><?php echo $p_name; ?></h3>
                  <p class = "product-price"><?php echo $p_price; ?> บาท</p>

                    <!-- _GET จาก add_cart.php  -->
                    <a href="add_cart.php?id=<?php echo $id; ?>&p_id=<?php echo $p_id; ?>">
                    สั่งซื้อ
                    </a>

                </div>
              </div>
              <?php } ?>
  
        </div>
      </div>
    </section>
    

    <!-- footer -->
    <footer>
      <div class = "footer-banner">
        <div class = "container">
          <h2> ติดต่อ </h2>
            <p class = "text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores est quod maxime 
              nisi possimus corporis qui aliquid molestias sit iusto itaque, cum delectus tempore, 
              distinctio velit. Repellat reiciendis suscipit quidem aliquid ipsam, nemo minus repudiandae 
              quas eligendi natus voluptate nostrum? 
              <br>
              โทร : 099-8765432
            </p>
        </div>
      </div>

      <div class = "container">
        <div class = "social-icons">
          <a href = "#">
            <i class = "fab fa-facebook-f"></i>
          </a>
          <a href = "#">
            <i class = "fab fa-twitter"></i>
          </a>
          <a href = "#">
            <i class = "fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </footer>
    <!-- end of footer -->

    <script>

        let click = document.querySelector('.click');

        let list = document.querySelector('.list-order');

        click.addEventListener("click",()=>{

            list.classList.toggle('newlist');

        });

    </script>
    
  </body>
</html>