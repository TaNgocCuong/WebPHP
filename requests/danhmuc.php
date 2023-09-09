<?php include_once('../config/connect.php') ?>
<?php
    // Thêm mới danh mục
    if(isset($_POST['danhmuc_name'])){
        $danhmuc_name = $_POST['danhmuc_name'];
        $danhmuc_status = $_POST['danhmuc_status'];
        $insert = "INSERT INTO danhmuc (danhmuc_name, danhmuc_status) VALUES ('$danhmuc_name', '$danhmuc_status')";
        if ($conn->query($insert) === TRUE) {
            echo "Đã thêm thành công";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
  

?>