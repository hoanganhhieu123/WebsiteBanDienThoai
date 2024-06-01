<?php
    $sql_sua_sanpham = "select * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]' limit 1";
    $query_sua_sanpham = mysqli_query($mysqli,$sql_sua_sanpham);
?>

<p>Sửa sản phẩm</p>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">
<?php
        while($row = mysqli_fetch_array($query_sua_sanpham))
        {
    ?>
  <form method="POST" action="modules/quanlisp/xuli.php?idsanpham=<?php echo $row['id_sanpham']  ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" name="tensp" id="" value="<?php echo $row['tensp'] ?>"></td>
    </tr>
    <tr>
        <td>Mã sản phẩm</td>
        <td><input type="text" name="masp" value="<?php echo $row['masp'] ?>"></td>
    </tr>
    <tr>
        <td>Giá sản phẩm</td>
        <td><input type="text" name="giasp" id="" value="<?php echo $row['giasp'] ?>"></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" name="soluong" id="" value="<?php echo $row['soluong'] ?>"></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
            <input type="file" name="hinhanh" id="">
            <img src="modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width=100px height = 100px>
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
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc" id="">
            <?php
            $sql_danhmuc = "select * from tbl_danhmuc order by id_danhmuc desc";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"> <?php echo $row_danhmuc['tendanhmuc'] ?> </option>
            <?php
                }else{ 
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"> <?php echo $row_danhmuc['tendanhmuc'] ?> </option>
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
        <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
    </tr>
    <?php
    }
    ?>
  </form>

</table>
