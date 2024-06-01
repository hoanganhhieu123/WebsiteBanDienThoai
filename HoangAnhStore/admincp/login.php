<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['username'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);

        if($taikhoan == null && $matkhau == null) {
            echo '<script>alert("Vui lòng điền đầy đủ tên tài khoản và mật khẩu.")</script>';
        }elseif($count >0){
            $_SESSION['dangnhap'] = $taikhoan;  
            header("Location:index.php");
        }else{ 
            echo '<script>alert("Tài khoản hoặc mật khẩu sai")</script>';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admincp</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .wrapper {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
        }
        table input[type="text"],
        table input[type="password"],
        table input[type="submit"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        table input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
        table input[type="submit"]:hover {
            background-color: #45a049;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: #337ab7;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    
    <div class="wrapper">
        <form action="" method="POST" autocomplete="off">
            <table border="0">
                <tr>
                    <td colspan="2"><h3>Đăng nhập</h3></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                </tr>
                <tr>
                    <td colspan="2" class="signup-link">Chưa có tài khoản? <a href="signup.php">Đăng ký ngay</a></td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>

