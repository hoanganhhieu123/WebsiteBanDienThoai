<?php
    $sql_lietke_sanpham = "select * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc order by id_sanpham desc";
    $query_lietke_sanpham = mysqli_query($mysqli,$sql_lietke_sanpham);
?>

<h4>Liệt kê danh mục sản phẩm</h4>
<table class="ListTable"  border="1" width="100%" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Tình trạng</th>
        <th>Quản lí</th>
    </tr>

<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sanpham))
    {  
        $i++;
?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensp'] ?></td>
        <td><img src="modules/quanlisp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width=100px height = 100px></td>
        <td><?php echo $row['giasp'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['masp'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if($row['tinhtrang']==1){
            echo 'Kich hoat';
        } else {
            echo 'An';
        }
        ?>
        
        </td>
        <td>
            <a href="modules/quanlisp/xuli.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a  href="?action=quanlisanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
        </td>
    </tr>  

<?php
    }
?>

</table>