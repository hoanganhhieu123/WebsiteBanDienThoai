
<?php
    $sql_danhmuc = "select * from tbl_danhmuc order by id_danhmuc desc";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<div class="menu">
    <ul class="list_menu">
        <li><a href="index.php">Trang chủ</a></li>          
        <li><a href="index.php?quanli=tintuc">Tin tức</a></li>
        <li><a href="index.php?quanli=lienhe">Liên hệ</a></li>
        <li><a href="index.php?quanli=giohang">Giỏ hàng</a></li>

        
        <?php if(isset($_SESSION['dangky'])) { ?>
            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
        <?php } else { ?>
            <li><a href="index.php?quanli=dangky">Đăng ký</a></li>
        <?php } ?>
    </ul>

    <form action="index.php?quanli=timkiem" method="POST" class="search-form">
        <input type="text" placeholder="Tìm kiếm sản phẩm ..." name= "tukhoa">
        <button type="submit" value="Tìm kiếm" name="timkiem">Tìm kiếm</button>
    </form>            
</div>
