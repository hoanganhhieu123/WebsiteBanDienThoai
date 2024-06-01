<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro = "select * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc and tbl_sanpham.tensp like '%".$tukhoa."%' ";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>Từ khóa tìm kiếm: <?php $_POST['tukhoa'] ?></h3>
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