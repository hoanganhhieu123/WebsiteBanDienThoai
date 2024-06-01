<h2>Chi tiết sản phẩm</h2>
<?php
    $sql_chitiet = "select * from tbl_sanpham, tbl_danhmuc where tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc and tbl_sanpham.id_sanpham = '$_GET[id]' order by tbl_sanpham.id_sanpham desc limit 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="img_chitiet">
        <img src="admincp/modules/quanlisp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
        <div class="sanpham_chitiet">
            <h3 class="ten_chitiet">Tên sản phẩm: <?php echo $row_chitiet['tensp'] ?></h3>
            <p class="ma_chitiet">Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p class="gia_chitiet">Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ' ?></p>
            <p class="soluong_chitiet">Số lượng sản phẩm: <?php echo $row_chitiet['soluong'] ?></p>
            <p class="tendm_chitiet">Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
        </div>
    </form>
    
</div>

<?php
}
?>