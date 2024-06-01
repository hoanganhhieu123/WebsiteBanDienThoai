<h4>Thêm bài viết</h4>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">

  <form method="POST" action="modules/quanlibaiviet/xuli.php" enctype="multipart/form-data">
    <tr>
        <td>Tên bài viết</td>
        <td><input type="text" name="tenbaiviet" id=""></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea name="tomtat" id="" cols="30" rows="10" style="resize: none"></textarea></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung" id="" cols="30" rows="10" style="resize: none"></textarea></td>
    </tr>
    <tr>
        <td>Danh mục bài viết</td>
        <td>
          <select name="danhmuc" id="">
            <?php
            $sql_danhmuc = "select * from tbl_danhmucbaiviet order by id_baiviet desc";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"> <?php echo $row_danhmuc['tendanhmuc_baiviet'] ?> </option>
            <?php
            } 
            ?>
          </select>
        </td>
    </tr>
    <tr>
        <td>Tình trạng</td>
        <td>
          <select name="tinhtrang" id="">
            <option value="1">Kích hoạt</option>
            <option value="0">Ẩn</option>
          </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="thembaiviet" value="Thêm bài viết"></td>
    </tr>
  </form>

</table>
