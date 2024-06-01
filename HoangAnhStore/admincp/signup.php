<?php
    session_start();
    include('config/config.php');

    if(isset($_POST['register'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);

        // Perform basic validation
        if(empty($taikhoan) || empty($matkhau)) {
            echo '<script>alert("Vui lòng điền đầy đủ tên tài khoản và mật khẩu.")</script>';
        } else {
            // Check if username already exists
            $check_username = mysqli_query($mysqli,"SELECT * FROM tbl_admin WHERE username='$taikhoan'");
            if(mysqli_num_rows($check_username) > 0) {
                echo '<script>alert("Tên tài khoản đã tồn tại.")</script>';
            } else {
                // Insert new user into database
                $insert_user = mysqli_query($mysqli, "INSERT INTO tbl_admin (username, password) VALUES ('$taikhoan', '$matkhau')");
                if($insert_user) {
                    echo '<script>alert("Đăng ký thành công. Vui lòng đăng nhập.")</script>';
                } else {
                    echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại sau.")</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .login-link {
            text-align: center;
            margin-top: 10px;
        }
        .login-link a {
            color: #337ab7;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="" method="POST" autocomplete="off">
            <table border="0">
                <tr>
                    <td colspan="2"><h3>Đăng ký tài khoản</h3></td>
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
                    <td colspan="2"><input type="submit" name="register" value="Đăng ký"></td>
                </tr>
                <tr>
                    <td colspan="2" class="login-link">Đã có tài khoản? <a href="login.php">Đăng nhập</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>


