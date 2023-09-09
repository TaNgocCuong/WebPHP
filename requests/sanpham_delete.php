<?php include_once('../config/connect.php') ?>
<?php
    //xóa sản phẩm
    $get_id = $_GET['id'];
        
    if(isset($get_id)){
        $delete = "DELETE FROM sanpham where sanpham_id=$get_id ";
        $sanpham = mysqli_query($conn, $delete);
        header('Location: ../sanphamlist.php');
    }

?>