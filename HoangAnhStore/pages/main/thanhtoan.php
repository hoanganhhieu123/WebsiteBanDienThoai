<?php
session_start();
include('../../admincp/config/config.php');

// Lấy thông tin khách hàng từ phiên làm việc
$id_khachhang = $_SESSION['id_khachhang'];

// Tạo mã đơn hàng ngẫu nhiên
$code_order = rand(0,9999);

// Thêm đơn hàng mới vào cơ sở dữ liệu
$insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) VALUES ('$id_khachhang', '$code_order', 1)";
$cart_query = mysqli_query($mysqli, $insert_cart);

if ($cart_query) {
    // Lặp qua các mặt hàng trong giỏ hàng và thêm chi tiết đơn hàng vào cơ sở dữ liệu
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        
        // Thêm chi tiết đơn hàng vào cơ sở dữ liệu
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluongmua) VALUES ('$id_sanpham', '$code_order', '$soluong')";
        mysqli_query($mysqli, $insert_order_details);
    }
    
    // Xóa giỏ hàng sau khi đã thanh toán
    unset($_SESSION['cart']);
    
    // Chuyển hướng người dùng đến trang cảm ơn
    header('Location: ../../index.php?quanli=camon');
} else {
    // Xử lý lỗi nếu không thể thêm đơn hàng vào cơ sở dữ liệu
    echo "Đã xảy ra lỗi khi xử lý đơn hàng.";
}
?>
