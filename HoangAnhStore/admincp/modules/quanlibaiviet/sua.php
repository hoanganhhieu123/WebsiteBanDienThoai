<?php
    $sql_sua_baiviet = "select * from tbl_baiviet where id = '$_GET[idbaiviet]' limit 1";
    $query_sua_baiviet = mysqli_query($mysqli,$sql_sua_baiviet);
?>

<p>Sửa sản phẩm</p>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">
<?php
        while($row = mysqli_fetch_array($query_sua_baiviet))
        {
    ?>
  <form method="POST" action="modules/quanlibaiviet/xuli.php?idbaiviet=<?php echo $row['id']  ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên bài viết</td>
        <td><input type="text" name="tenbaiviet" id="" value="<?php echo $row['tenbaiviet'] ?>"></td>
    </tr>

    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh" id="">
            <img src="modules/quanlibaiviet/uploads/<?php echo $row['hinhanh'] ?>" alt="" width=100px height = 100px>
        </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea name="tomtat" id="" rows="10" style="resize: none" ><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung" id="" rows="10" style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục bài viết</td>
        <td>
          <select name="danhmuc" id="">
            <?php
            $sql_danhmuc = "select * from tbl_danhmucbaiviet order by id_baiviet desc";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_baiviet'] == $row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"> <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?> </option>
            <?php
                }else{ 
            ?>
            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"> <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?> </option>
            <?php
                }
            }
            ?>
          </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
          <select name="tinhtrang" id="">
            <?php 
                if($row['tinhtrang']==1){
            ?>
            <option value="1" selected>Kích hoạt</option>
            <option value="0">Ẩn</option>
            <?php 
            }else{
            ?>
            <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
            <?php 
            }
            ?>
          </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suabaiviet" value="Sửa bài viết"></td>
    </tr>
    <?php
    }
    ?>
  </form>

</table>
