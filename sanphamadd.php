 <!-- header -->
 <?php include('./pages/header.php') ?>
 <!-- Menu -->
 <?php include('./pages/navBar.php') ?>

 <?php 
        $get_danhmuc = "SELECT * FROM danhmuc where danhmuc_status = 0 ORDER BY danhmuc_id DESC";
        $return = mysqli_query($conn, $get_danhmuc);
 ?>
 <?php 

//Thêm sản phẩm
if(isset($_POST['add_sanpham_btn'])){
    $extension = explode(".", $_FILES['image']['name']);
    $file_extension = end($extension);

    $sanpham_name = $_POST['sanpham_name'];
    $danhmuc_id = $_POST['danhmuc_id'];

    $name = rand().'.'.$file_extension;
    $upload = $_FILES['image']['tmp_name'];
    $sanpham_price = $_POST['sanpham_price'];
    $sanpham_status = $_POST['sanpham_status'];

    if($sanpham_name =='' || $sanpham_price == '' || $name == ''){
        $message_err = 'Dữ liệu của bạn bị trống';    
    }else{
        $insert = "INSERT INTO sanpham (sanpham_name,danhmuc_id,image,sanpham_price,sanpham_status) 
        VALUES ('$sanpham_name','$danhmuc_id','$name','$sanpham_price','$sanpham_status')";
        if ($conn->query($insert) === TRUE) {
            move_uploaded_file($upload, 'img/'.$name);
            header('Location: sanphamlist.php');
            echo 'thanh công';
            } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
            }
    }
  
}

?>
 <!-- Thêm mới truyện đọc -->
 <div id="page-wrapper">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Thêm sản phẩm</h1>
             </div>
             <span class='text_error'>
                 <?php 
                    if(isset($message_err)){
                        echo $message_err;
                    }else{
                        echo '';
                    }
                ?>
             </span>
         </div>
         <div class="row">
             <div class="col-lg-6">
                 <div class="panel panel-default ">
                     <form class="form-setting" method='post' action="" enctype="multipart/form-data">
                         <div class="form-group">
                             <label>Tên sản phẩm</label>
                             <input type="text" class="form-control" name='sanpham_name'
                                 placeholder="Nhập Tên sản phẩm ">
                         </div>
                         <div class="form-group">
                             <label>Hình ảnh</label>
                             <input type="file" class="form-control" name='image'
                                 accept='image/png,image/jpeg,image/jpg,image/svg'>
                         </div>
                         <div class="form-group">
                             <label>Danh mục</label>
                             <select class="form-control" name='danhmuc_id'>
                                 <?php 
                                    while($row = mysqli_fetch_assoc($return)){?>
                                 <option value="<?php echo $row['danhmuc_id'] ?>"><?php echo $row['danhmuc_name']; ?>
                                 </option>

                                 <?php } ?>
                             </select>
                         </div>

                         <div class="form-group">
                             <label>Giá</label>
                             <input type="text" class="form-control" maxLeng='20' name='sanpham_price'
                                 placeholder="Nhập giá">
                         </div>

                         <div class="form-group">
                             <label>Trạng thái</label>
                             <select class="form-control" name='sanpham_status'>
                                 <option value="0">Hiện</option>
                                 <option value="1">Ẩn</option>
                             </select>
                         </div>
                         <button class="btn btn-primary" name='add_sanpham_btn' type="submit">Lưu
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