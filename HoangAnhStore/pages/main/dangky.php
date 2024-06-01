<?php

    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUES ('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color:green"> Đăng ký thành công</p>';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header('Location:index.php?quanli=giohang');
        }
    }
?>

<style>
    /* Your CSS styles here */
    .dangky {
        margin: 10px auto; /* Center the form */
        background-color: #f9f9f9; /* Set background color */
        border: 1px solid #ddd; /* Add border */
        border-radius: 5px; /* Add border radius */
        padding: 20px; /* Add padding */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    /* Styles for table cells */
    .dangky td {
        padding: 10px; /* Add padding */
    }

    /* Styles for input fields */
    .dangky input[type="text"],
    .dangky input[type="password"] {
        width: calc(100% - 20px); /* Make input fields take up most of the space */
        padding: 8px; /* Add padding */
        border: 1px solid #ccc; /* Add border */
        border-radius: 4px; /* Add border radius */
    }

    /* Styles for submit button */
    .dangky input[type="submit"] {
        width: 100%; /* Make button full width */
        padding: 10px; /* Add padding */
        background-color: #007bff; /* Set background color */
        color: #fff; /* Set text color */
        border: none; /* Remove border */
        border-radius: 4px; /* Add border radius */
        cursor: pointer; /* Set cursor to pointer */
    }

    /* Styles for login link */
    .dangky a {
        display: block; /* Make the link fill the entire cell */
        text-decoration: none; /* Remove underline */
        color: #007bff; /* Set link color */
        text-align: center; /* Center align the text */
        margin-top: 10px; /* Add margin to separate from submit button */
    }

    /* Hover effect for login link */
    .dangky a:hover {
        text-decoration: underline; /* Add underline on hover */
    }
</style>


<p>Đăng ký thành viên</p>
<form action="" method="POST" autocomplete="off">
    <table border="1" class="dangky" width="50%" style="border-collapse: collapse">
        <tr>
            <td >Họ và tên</td>
            <td colspan="2"><input type="text" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="dangky" value="Đăng ký">
                <a href="index.php?quanli=dangnhap">Đăng nhập nếu có tài khoản</a>
            </td>
            
        </tr>
    </table>
</form>