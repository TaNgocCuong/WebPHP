 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>
 <?php
        $select_danhmuc = 'SELECT * FROM danhmuc ORDER BY "danhmuc_id" DESC' ;
        $danhmuc = mysqli_query($conn, $select_danhmuc);

       
?>
 <!-- Danh sách danh mục -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Danh mục</h1>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <a href="danhmucadd.php">
                             <button class="btn btn-sm btn-primary">
                                 Thêm mới danh mục
                             </button>
                         </a>
                     </div>
                     <div class="panel-body">
                         <div class="table-responsive">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Tên danh mục</th>
                                         <th>Trạng thái</th>
                                         <th>Chỉnh sửa</th>
                                         <th>Xóa</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php 
                                     $i = 1;
                                        while($return = mysqli_fetch_assoc($danhmuc)){ ?>
                                     <tr class="odd gradeX">
                                         <td><?php echo $i++ ?></td>
                                         <td><?php echo $return['danhmuc_name'] ?></td>
                                         <td><?php 
                                         if($return['danhmuc_status'] == 0){
                                            echo 'Hiện';
                                         }else{

                                             echo 'Ẩn';
                                         }
                                         ?>

                                         </td>
                                         <td class="center">
                                             <a href="danhmucedit.php?id=<?php echo $return['danhmuc_id'] ?>" class='btn
                                                 btn-sm btn-success'>Chỉnh sửa</a>
                                         </td>
                                         <td class="center">
                                             <a onclick="return checkDelete('<?php echo $return['danhmuc_name'] ?>')"
                                                 href="requests/danhmuc_delete.php?id=<?php echo $return['danhmuc_id'] ?>"
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