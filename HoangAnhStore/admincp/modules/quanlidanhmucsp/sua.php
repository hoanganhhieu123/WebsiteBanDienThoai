<?php
    $sql_sua_danhmucsp = "select * from tbl_danhmuc where id_danhmuc = '$_GET[iddanhmuc]' limit 1";
    $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>

<p>Sửa danh mục sản phẩm</p>
<table class="ListTable" border="1" width="50%" style="border-collapse: collapse;">
  <form method="POST" action="modules/quanlidanhmucsp/xuli.php?iddanhmuc=<?php echo $_GET['iddanhmuc']  ?>">
    <?php
        while($row = mysqli_fetch_array($query_sua_danhmucsp))
        {
    ?>

    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc" id="" value="<?php echo $row['tendanhmuc'] ?>"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu" value="<?php echo $row['thutu'] ?>"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
    </tr>

    <?php
    }
    ?>
  </form>
</table>