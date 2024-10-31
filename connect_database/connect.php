<?php
$host = 'localhost:3307';
$db = 'studentmanagement'; // Thay thế bằng tên database của bạn
$user = 'root'; // Thay thế bằng username của bạn
$pass = 'giang'; // Thay thế bằng password của bạn
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO($dsn, $user, $pass, $options);
    // Ghi log khi kết nối thành công
    error_log("Kết nối cơ sở dữ liệu thành công!", 0);
} catch (\PDOException $e) {
    // Ghi log khi kết nối thất bại
    error_log("Kết nối thất bại: " . $e->getMessage(), 0);
    die("Kết nối thất bại!"); // Dừng chương trình và hiển thị thông báo lỗi
}
?>