<?php
    $sql_pro = "select * from tbl_sanpham where tbl_sanpham.id_danhmuc = '$_GET[id]' order by tbl_sanpham.id_sanpham desc";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    // lay ten danh muc
    $sql_cate = "select * from tbl_danhmuc where tbl_danhmuc.id_danhmuc = '$_GET[id]' limit 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h3>
                <ul class="list_product">
                    <?php
                    while($row_pro = mysqli_fetch_array($query_pro)){
                    ?>
                    <li>
                        <a href="index.php?quanli=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                            <img src="admincp/modules/quanlisp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                            <p class="title_product">Tên sản phẩm: <?php echo $row_pro['tensp'] ?></p>
                            <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'],0,',','.').'vnđ' ?></p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>