<div class="sidebar">
            <ul class="list_sidebar">
            <?php
                $sql_danhmuc = "select * from tbl_danhmuc order by id_danhmuc desc";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while($row = mysqli_fetch_array($query_danhmuc)){
            ?>
            <li><a href="index.php?quanli=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"> <?php echo $row['tendanhmuc'] ?> </a></li>
            <?php 
            } 
            ?>  
            </ul>
            </div>