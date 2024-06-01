<?php
    $sql_lietke_dh = "select * from tbl_cart,tbl_dangky where tbl_cart.id_khachhang = tbl_dangky.id_dangky order by tbl_cart.id_cart desc";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>

<table class="ListTable"  border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Quản lí</th>
    </tr>

<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_dh))
    {  
        $i++;
?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_cart'] ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>
        <td>
            <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
        </td>
    </tr>  

<?php
    }
?>

</table>