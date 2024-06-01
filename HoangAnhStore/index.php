<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoangAnhStore</title>
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="wrapper">
        <?php 
            session_start();
            include("admincp/config/config.php");
            include("pages/header.php");
            include("pages/menu.php");
            include("pages/main.php");
            include("pages/footer.php");
        ?>
    </div>
</body>
</html>