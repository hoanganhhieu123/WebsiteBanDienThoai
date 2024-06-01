<?php
    $mysqli = new mysqli("localhost","root","","hoanganh");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "kết nối bị lỗi: " . $mysqli->connect_error;
        exit();
    }
?>