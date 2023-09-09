 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>
 <?php
    $select_sanpham = "SELECT * FROM sanpham INNER JOIN danhmuc ON danhmuc.danhmuc_id = sanpham.danhmuc_id ";
    $sanpham = mysqli_query($conn, $select_sanpham);
?>

 <!-- Danh sách danh mục  -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Danh sách tất cả các sản phẩm</h1>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="truyen_list">
                     <?php 
                     $i = 1;
                        while($row = mysqli_fetch_assoc($sanpham)){?>
                     <div class='grid_app'>
                         <img src="img/<?php echo $row['image']?>" alt="">
                         <div class='app_container'>
                             <div class='d-flex'>
                                 <span><?php echo $row['sanpham_price']?> đ</span>
                                 <span><?php echo $row['danhmuc_name']?></span>
                             </div>
                             <h4><?php echo $row['sanpham_name']?></h4>
                         </div>
                     </div>
                     <?php }?>


                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>
 </div>
 <!-- footer -->
 <?php include('./pages/footer.php') ?>