 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>
 <?php 
    $id = $_GET['id'];
    $query = "SELECT * FROM danhmuc where danhmuc_id=$id ";
    $get_danhmuc = mysqli_query($conn, $query);
    $fetch_danhmuc = mysqli_fetch_assoc($get_danhmuc);
    
   
 ?>

 <!-- Chỉnh sửa danh mục -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Chỉnh sửa danh mục</h1>
             </div>

         </div>
         <div class="row">
             <div class="col-lg-6">
                 <div class="panel panel-default ">
                     <form role="form" class="form-setting" method="POST" id='danhmuc_form'>
                         <div class="form-group">
                             <label>Tên danh mục</label>
                             <input type="text" class="form-control" id='danhmuc_name'
                                 value="<?php echo $fetch_danhmuc['danhmuc_name']; ?>" placeholder="Nhập tên danh mục">
                         </div>
                         <div class="form-group">
                             <label>Trạng thái</label>
                             <select class="form-control" id='danhmuc_status'
                                 value="<?php echo $fetch_danhmuc['danhmuc_status']; ?>">
                                 <option value="0">Hiện</option>
                                 <option value="1">Ẩn</option>
                             </select>
                         </div>
                         <button class="btn btn-primary" name='update_danhmuc_btn' type="submit" id='update_danhmuc_btn'
                             data-id="<?php echo $fetch_danhmuc['danhmuc_id'];?>">Lưu
                             lại</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- footer -->

 <?php include('./pages/footer.php') ?>

 <script>
$(document).ready(function() {
    $(document).on('click', '#update_danhmuc_btn', function(e) {
        e.preventDefault();
        var danhmuc_name = $('#danhmuc_name').val();
        var danhmuc_status = $('#danhmuc_status').val();
        var id = $(this).data('id');
        if (danhmuc_name == '' || danhmuc_status == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Có lỗi',
                text: 'Vui lòng không được để trống!',
            })
        } else {
            $.ajax({
                url: './requests/danhmucedit.php',
                method: 'POST',
                data: {
                    id: id,
                    danhmuc_name: danhmuc_name,
                    danhmuc_status: danhmuc_status
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: 'Chỉnh sửa danh mục thành công!',
                    });
                }
            })
        }

    })

})
 </script>