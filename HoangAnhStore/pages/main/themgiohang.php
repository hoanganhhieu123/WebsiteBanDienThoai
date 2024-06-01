<?php
    session_start();
    include('../../admincp/config/config.php');

    //Thêm số lượng
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('tensp'=>$row['tensp'], 'id'=>$id, 'soluong'=>$cart_item['$soluong'], 'giasp'=>$row['giasp'], 'hinhanh'=>$row['hinhanh'], 'masp'=>$row['masp']);
                $_SESSION['cart'] = $product;
            }
            else{
                if($cart_item['soluong'] <= 10){
                    $tangsoluong = $cart_item['soluong'] + 1;
                    $product[] = array('tensp'=>$cart_item['tensp'], 'id'=>$cart_item['id'], 'soluong'=>$tangsoluong, 'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }else{
                    $product[] = array('tensp'=>$cart_item['tensp'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            } 
        }
        header('Location:../../index.php?quanli=giohang');
    }
    //Trừ số lượng
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('tensp'=>$row['tensp'], 'id'=>$id, 'soluong'=>$cart_item['$soluong'], 'giasp'=>$row['giasp'], 'hinhanh'=>$row['hinhanh'], 'masp'=>$row['masp']);
                $_SESSION['cart'] = $product;
            }
            else{
                if($cart_item['soluong'] > 1){
                    $giamsoluong = $cart_item['soluong'] - 1;
                    $product[] = array('tensp'=>$cart_item['tensp'], 'id'=>$cart_item['id'], 'soluong'=>$giamsoluong, 'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }else{
                    $product[] = array('tensp'=>$cart_item['tensp'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            } 
        }
        header('Location:../../index.php?quanli=giohang');
    }
    //Xóa
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array('tensp'=>$cart_item['tensp'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'], 'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
            }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanli=giohang');  
        }
    }

    //Xóa hết
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanli=giohang');
    }
    //Thêm vào giỏ hàng
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1; // Quantity always set to 1
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);

        if($row){
            $new_product = array('tensp'=>$row['tensp'], 'id'=>$id, 'soluong'=>$soluong, 'giasp'=>$row['giasp'], 'hinhanh'=>$row['hinhanh'], 'masp'=>$row['masp']);

            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as &$cart_item){ // Use reference to update original array
                    if($cart_item['id'] == $id){
                        $cart_item['soluong'] += $soluong; // Increase quantity
                        $found = true;
                        break; // Exit loop once found
                    }
                }
                if(!$found){ // If product not found, add it to cart
                    $_SESSION['cart'][] = $new_product;
                }
            } else {
                $_SESSION['cart'] = array($new_product); // Initialize cart if it doesn't exist
            }
        }
        header('Location:../../index.php?quanli=giohang');
    }
?>
