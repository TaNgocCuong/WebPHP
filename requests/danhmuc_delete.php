<?php include_once('../config/connect.php') ?>
<?php
    //xóa danh muc
    $get_id = $_GET['id'];

        if(isset($get_id)){
            $delete = "DELETE FROM danhmuc where danhmuc_id=$get_id ";
            $danhmuc = mysqli_query($conn, $delete);
            header('Location: ../danhmuclist.php');
        }

?>