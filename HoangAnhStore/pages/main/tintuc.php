<?php
    $sql_pro = "SELECT * FROM tbl_baiviet ORDER BY id DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .list_new {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 800px;
        }
        .list_new li {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .list_new li:hover {
            transform: translateY(-5px);
        }
        .list_new a {
            text-decoration: none;
            color: #333;
            display: block;
        }
        .list_new img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .tenbaiviet {
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
            color: #007BFF;
        }
        .tenbaiviet:hover {
            text-decoration: underline;
        }
        .tomtat {
            font-size: 1.1em;
            margin-bottom: 15px;
            color: #555;
        }
        .noidung {
            font-size: 1em;
            color: #777;
            display: none; /* Hidden by default, can be shown if needed */
        }
    </style>
</head>
<body>

    <ul class="list_new">
        <?php while($row_pro = mysqli_fetch_array($query_pro)): ?>
            <li>
                <a href="index.php?quanli=baiviet&id=<?php echo $row_pro['id'] ?>">
                    <p class="tenbaiviet"><?php echo $row_pro['tenbaiviet'] ?></p>
                    <img src="admincp/modules/quanlibaiviet/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="<?php echo $row_pro['hinhanh'] ?>">
                    <p class="tomtat"><?php echo $row_pro['tomtat'] ?></p>
                    <p class="noidung"><?php echo $row_pro['noidung'] ?></p>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>

</body>
</html>
