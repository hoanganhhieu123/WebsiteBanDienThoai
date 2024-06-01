<?php
    $sql_lietke_danhmucsp = "select * from tbl_danhmuc order by thutu desc";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>

<h4>Liệt kê danh mục sản phẩm</h4>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Tùy chọn</th>
    </tr>

<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp))
    {  
        $i++;
?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
            <a href="modules/quanlidanhmucsp/xuli.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | <a name = "suadanhmuc" href="?action=quanlidanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
        </td>
    </tr>  

<?php
    }
?>

</table>