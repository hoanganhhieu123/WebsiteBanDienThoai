<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            overflow: hidden;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .cart-header {
            font-size: 24px;
            font-family: 'Georgia', serif;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .ListTable {
            width: 100%;
            border-collapse: collapse;
        }
        .ListTable th, .ListTable td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .ListTable th {
            background-color: #f2f2f2;
            color: #333;
            text-align: left;
        }
        .ListTable tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .ListTable tr:hover {
            background-color: #f2f2f2;
        }
        .ListTable a {
            text-decoration: none;
            color: #007bff;
        }
        .ListTable a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .checkout a {
            text-decoration: none;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .checkout a:hover {
            background-color: #e74c3c;
        }
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
            .ListTable th, .ListTable td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cart-header">Giỏ Hàng:</div>
        <?php
        if(isset($_SESSION['dangky'])){
            echo "<p>Xin chào, ".$_SESSION['dangky']."</p>";
        }
        ?>
        <table class="ListTable">
            <tr>
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Thành tiền</th>
                <th>Quản lý</th>
            </tr>
            <?php
            if(isset($_SESSION['cart'])){
                $i = 0;
                $tongtien = 0;
                foreach($_SESSION['cart'] as $cart_item){
                    $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
                    $tongtien+=$thanhtien;
                    $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $cart_item['masp'];?></td>
                <td><?php echo $cart_item['tensp'];?></td>
                <td><img src="admincp/modules/quanlisp/uploads/<?php echo $cart_item['hinhanh'];?>" alt="<?php echo $cart_item['tensp'];?>" width="100" height="100"></td>
                <td class="cart-actions">
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                    <?php echo $cart_item['soluong'];?>
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                </td>
                <td><?php echo number_format($cart_item['giasp'],0,',','.').' vnđ';?></td>
                <td><?php echo number_format($thanhtien,0,',','.').' vnđ'?></td>
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="8" class="total">
                    <p><strong>Tổng tiền:</strong> <?php echo number_format($tongtien,0,',','.').' vnđ'?></p>
                    <div class="empty-cart">
                        <p><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="checkout">
                    <?php
                    if(isset($_SESSION['dangky'])){
                    ?>
                    <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
                    <?php
                    } else {
                    ?>
                    <p><a href="index.php?quanli=dangky">Đăng ký đặt hàng</a></p>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
            } else {
            ?>
            <tr>
                <td colspan="8"><p>Giỏ hàng trống</p></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
