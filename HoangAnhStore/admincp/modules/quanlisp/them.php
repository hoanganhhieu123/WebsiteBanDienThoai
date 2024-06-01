<h4>Thêm sản phẩm</h4>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">

  <form method="POST" action="modules/quanlisp/xuli.php" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensp" id=""></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp"></td>
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" name="giasp" id=""></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" id=""></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td><input type="file" name="hinhanh" id=""></td>
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
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc" id="">
            <?php
            $sql_danhmuc = "select * from tbl_danhmuc order by id_danhmuc desc";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"> <?php echo $row_danhmuc['tendanhmuc'] ?> </option>
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
        <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
    </tr>
  </form>

</table>
