<?php
    $sql_lietke_danhmucbaiviet = "select * from tbl_danhmucbaiviet order by thutu desc";
    $query_lietke_danhmucbaiviet = mysqli_query($mysqli,$sql_lietke_danhmucbaiviet);
?>

<h4>Liệt kê danh mục bài viết</h4>
<table class="ListTable" border="1" width="100%" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Tên danh mục bài viết</th>
        <th>Quản lí</th>
    </tr>

<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucbaiviet))
    {  
        $i++;
?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
        <td>
            <a href="modules/quanlidanhmucbaiviet/xuli.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xóa</a> | <a  href="?action=quanlidanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
        </td>
    </tr>  

<?php
    }
?>

</table>