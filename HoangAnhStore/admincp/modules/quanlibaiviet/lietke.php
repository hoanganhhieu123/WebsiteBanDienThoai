<?php
    $sql_lietke_baiviet = "select * from tbl_baiviet,tbl_danhmucbaiviet where tbl_danhmucbaiviet.id_baiviet = tbl_baiviet.id_danhmuc order by tbl_baiviet.id desc";
    $query_lietke_baiviet = mysqli_query($mysqli,$sql_lietke_baiviet);
?>

<h4>Liệt kê danh mục bài viết</h4>
<table class="ListTable"  border="1" width="100%" style="border-collapse: collapse;">

    <tr>
        <th>ID</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th>Tóm tắt</th>
        <th>Tình trạng</th>
        <th>Quản lí</th>
    </tr>

<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_baiviet))
    {  
        $i++;
?>

    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tenbaiviet'] ?></td>
        <td><img src="modules/quanlibaiviet/uploads/<?php echo $row['hinhanh'] ?>" alt="" width=100px height = 100px></td>
        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if($row['tinhtrang']==1){
            echo 'Kich hoat';
        } else {
            echo 'An';
        }
        ?>
        
        </td>
        <td>
            <a href="modules/quanlibaiviet/xuli.php?idbaiviet=<?php echo $row['id'] ?>">Xóa</a> | <a  href="?action=quanlibaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a>
        </td>
    </tr>  

<?php
    }
?>

</table>