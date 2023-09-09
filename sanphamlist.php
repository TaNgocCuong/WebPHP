 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>
 <?php
    $select_sanpham = "SELECT * FROM sanpham INNER JOIN danhmuc ON danhmuc.danhmuc_id = sanpham.danhmuc_id ";
    $sanpham = mysqli_query($conn, $select_sanpham);
?>

 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Sản phẩm</h1>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <a href="sanphamadd.php">
                             <button class="btn btn-sm btn-primary">
                                 Thêm mới sản phẩm
                             </button>
                         </a>
                     </div>
                     <div class="panel-body">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Tên sản phẩm</th>
                                         <th>Danh mục</th>
                                         <th>Ảnh</th>
                                         <th>Giá</th>
                                         <th>Trạng thái</th>
                                         <th>Chỉnh sửa</th>
                                         <th>Xóa</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                     $i = 1;
                                        while($return = mysqli_fetch_assoc($sanpham)){ ?>
                                     <tr class="odd gradeX">
                                         <td><?php echo $i++ ?></td>
                                         <td><?php echo $return['sanpham_name'] ?></td>
                                         <td><?php echo $return['danhmuc_name'] ?></td>
                                         <td>
                                             <img src='img/<?php echo $return['image'] ?>' style="max-width:100px" />
                                         </td>
                                         <td><?php echo $return['sanpham_price'] ?></td>
                                         <td><?php 
                                         if($return['sanpham_status'] == 0){
                                            echo 'Hiện';
                                         }else{

                                             echo 'Ẩn';
                                         }
                                         ?>

                                         </td>
                                         <td class="center">
                                             <a href="sanphamedit.php?id=<?php echo $return['sanpham_id'] ?>" class='btn
                                                 btn-sm btn-success'>Chỉnh sửa</a>
                                         </td>
                                         <td class="center">
                                             <a onclick="return checkDelete('<?php echo $return['sanpham_name'] ?>')"
                                                 href="requests/sanpham_delete.php?id=<?php echo $return['sanpham_id'] ?>"
                                                 class='btn btn-sm btn-danger'>Xóa</a>
                                         </td>
                                     </tr>
                                     <?php  } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- footer -->
 <?php include('./pages/footer.php') ?>

 <script>
function checkDelete(name) {
    return confirm('Bạn có chắc muốn xóa' + name);

}
 </script>