<?php

include('../../config/config.php');

$tenloaibaiviet = $_POST['tendanhmuc_baiviet'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmucbaiviet'])){
    // them danh muc bai viet
    $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet,thutu) VALUE('".$tenloaibaiviet."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlidanhmucbaiviet&query=them');
}elseif(isset($_POST['suadanhmucbaiviet'])){
    // sua danh muc bai viet
    $sql_sua = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='".$tenloaibaiviet."', thutu='".$thutu."' WHERE id_baiviet = '$_GET[idbaiviet]'";
    mysqli_query($mysqli,$sql_sua);
    header('Location:../../index.php?action=quanlidanhmucbaiviet&query=them');
}else{
    //xoa danh muc bai viet
    $id = $_GET['idbaiviet'];
    $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_baiviet = '".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlidanhmucbaiviet&query=them');
}

?>