 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>


 <!-- Thêm danh mục -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Danh mục sản phẩm</h1>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-6">
                 <div class="panel panel-default ">
                     <form role="form" class="form-setting" id='danhmuc_form' method='post'>
                         <div class="form-group">
                             <label>Tên danh mục</label>
                             <input type="text" class="form-control" name='danhmuc_name' id='danhmuc_name'
                                 placeholder="Nhập tên danh mục">
                         </div>
                         <div class="form-group">
                             <label>Trạng thái</label>
                             <select class="form-control" name='danhmuc_status' id='danhmuc_status'>
                                 <option value="0">Hiện</option>
                                 <option value="1">Ẩn</option>
                             </select>
                         </div>
                         <button class="btn btn-primary" name='danhmuc_btn' type="submit" id='danhmuc_btn'>Lưu
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
    $(document).on('submit', '#danhmuc_form', function(e) {
        e.preventDefault();
        var danhmuc_name = $('#danhmuc_name').val();
        var danhmuc_status = $('#danhmuc_status').val();
        if (danhmuc_name == '' || danhmuc_status == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Có lỗi',
                text: 'Vui lòng không được để trống!',
            })
        } else {
            $.ajax({
                url: './requests/danhmuc.php',
                method: 'POST',
                data: {
                    danhmuc_name: danhmuc_name,
                    danhmuc_status: danhmuc_status
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: 'Đã thêm danh mục thành công!',
                    });
                    $('#danhmuc_form')[0].reset();
                }
            })
        }

    })

})
 </script>