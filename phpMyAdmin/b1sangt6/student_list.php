<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['sinhVienList'])) {
    $_SESSION['sinhVienList'] = [
        ['id' => 1, 'fullname' => 'Nguyen Van A', 'taikhoan' => 'nvana', 'action' => ''],
        ['id' => 2, 'fullname' => 'Tran Thi B', 'taikhoan' => 'ttb', 'action' => ''],
        ['id' => 3, 'fullname' => 'Le Van C', 'taikhoan' => 'lvc', 'action' => ''],
    ];
}

$sinhVienList = $_SESSION['sinhVienList'];
?>
