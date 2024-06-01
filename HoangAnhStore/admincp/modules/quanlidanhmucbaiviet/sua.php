<?php
    $sql_sua_danhmucbaiviet = "select * from tbl_danhmucbaiviet where id_baiviet = '$_GET[idbaiviet]' limit 1";
    $query_sua_danhmucbaiviet = mysqli_query($mysqli,$sql_sua_danhmucbaiviet);
?>

<p>Sửa danh mục bài viết</p>
<table class="ListTable" border="1" width="50%" style="border-collapse: collapse;">
  <form method="POST" action="modules/quanlidanhmucbaiviet/xuli.php?idbaiviet=<?php echo $_GET['idbaiviet']  ?>">
    <?php
        while($row = mysqli_fetch_array($query_sua_danhmucbaiviet))
        {
    ?>

    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc_baiviet" id="" value="<?php echo $row['tendanhmuc_baiviet'] ?>"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu" value="<?php echo $row['thutu'] ?>"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"></td>
    </tr>

    <?php
    }
    ?>
  </form>
</table>