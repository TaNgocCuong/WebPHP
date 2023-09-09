<?php include_once('../config/connect.php') ?>

<?php

    // cập nhật danh mục
    if(isset($_POST['danhmuc_name'])){
        echo print_r($_POST);
        $id = $_POST['id'];
        $danhmuc_name = $_POST['danhmuc_name'];
        $danhmuc_status = $_POST['danhmuc_status'];

        $update = "UPDATE danhmuc SET 
        danhmuc_name='$danhmuc_name',
        danhmuc_status='$danhmuc_status'
        where danhmuc_id= $id ";
        if ($conn->query($update) === TRUE) {
          header("Location: ../danhmuclist.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>