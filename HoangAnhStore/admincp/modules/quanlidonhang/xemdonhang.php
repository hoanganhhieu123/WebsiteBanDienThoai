<p>123</p>
<?php
    $code = $_GET['code'];
    $sql_lietke_dh = "select * from tbl_cart_details,tbl_sanpham where tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham and tbl_cart_details.code_cart = '".$code."' order by tbl_cart_details.id_cart_details desc";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>

<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
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
        <td><?php echo $row['tensp'] ?></td>
        <td><?php echo $row['soluongmua'] ?></td>
        <td><?php echo number_format($row['giasp'],0,',','.').'vnd'  ?></td>
        <td><?php echo number_format($row['giasp']*$row['soluongmua'],0,',','.').'vnd' ?></td>
        <td>

        </td>
    </tr>  

<?php
    }
?>

</table>