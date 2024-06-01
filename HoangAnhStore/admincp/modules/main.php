<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
        }
        if($tam=='quanlidanhmucsanpham' && $query=='them'){
            include("modules/quanlidanhmucsp/them.php");
            include("modules/quanlidanhmucsp/lietke.php");

        }elseif($tam=='quanlidanhmucsanpham' && $query=='sua'){
            include("modules/quanlidanhmucsp/sua.php");

        }elseif($tam=='quanlisanpham' && $query=='them'){
            include("modules/quanlisp/them.php");
            include("modules/quanlisp/lietke.php");

        }elseif($tam=='quanlisanpham' && $query=='sua'){
            include("modules/quanlisp/sua.php");

        }elseif($tam=='quanlidonhang' && $query=='lietke'){           
            include("modules/quanlidonhang/lietke.php");

        }elseif($tam=='donhang' && $query=='xemdonhang'){
            include("modules/quanlidonhang/xemdonhang.php");

        }elseif($tam=='quanlidanhmucbaiviet' && $query=='them'){
            include("modules/quanlidanhmucbaiviet/them.php");
            include("modules/quanlidanhmucbaiviet/lietke.php");

        }elseif($tam=='quanlidanhmucbaiviet' && $query=='sua'){
            include("modules/quanlidanhmucbaiviet/sua.php");

        }elseif($tam=='quanlibaiviet' && $query=='them'){
            include("modules/quanlibaiviet/them.php");
            include("modules/quanlibaiviet/lietke.php");

        }elseif($tam=='quanlibaiviet' && $query=='sua'){
            include("modules/quanlibaiviet/sua.php");

        }else{
            include("modules/dashboard.php");       
        }
    ?>
</div>