<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel = "stylesheet" href = "sidebar_ad.css">
    <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
    <script src="sidebar.js"></script>
</head>
<body>
    <div id="sidebar_menu">
        <a href="#">Đơn hàng</a>
        <div class="submenu">
            <a href="#">Tất cả</a>
            <a href="#">Cài đặt vận chuyển</a>
        </div>
        <hr> 
        <a href="#">Quản lý món ăn</a>
        <div class="submenu">
            <a href="#">Tất cả</a>
            <a href="#">Thêm món ăn</a>
            <a href="#">Sửa món ăn</a>
            <a href="#">Xóa món ăn</a>
        </div>
        <hr>
        <a href="#">Quản lý danh mục sản phẩm</a>
        <div class="submenu">
            <a href="tranghienthi.php?quanly=tatca">Tất cả</a>
            <a href="tranghienthi.php?quanly=themdanhmuc">Thêm danh mục</a>
            <!-- <a href="tranghienthi.php?quanly=sua">Sửa danh mục</a> -->
            <!-- <a href="tranghienthi.php?quanly=xoa">Xóa danh mục</a> -->
        </div>
        <hr>
        <a href="#">Khuyến mãi</a>
        <div class="submenu">
            <a href="#">Tất cả</a>
            <a href="#">Tạo Deal</a>
            <a href="#">Quản lý mã giảm</a>
        </div>
        <hr>
    </div>
</body>
</html>