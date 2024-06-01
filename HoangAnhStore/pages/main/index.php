<?php
    $sql_pro = "select * from tbl_sanpham, tbl_danhmuc where tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc order by tbl_sanpham.id_sanpham desc limit 20";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>Sản phẩm mới nhất</h3>
                <ul class="list_product">
                <?php
                while($row = mysqli_fetch_array($query_pro)){
                ?>
                    <li>
                        <a href="index.php?quanli=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <img class="img_product" src="admincp/modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>">
                            <p class="title_product">Tên sản phẩm: <?php echo $row['tensp'] ?></p>
                            <p class="price_product">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
                            <p class="cate_product"> <?php echo $row['tendanhmuc'] ?> </p>
                        </a>                       
                    </li>
                    
                <?php
                }
                ?>   
                </ul>