<?php
// session_start();
// $username=$_SESSION['user'];
// unset($_SESSION['role']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="../view/cus/header/header.css">
    
    <link rel="stylesheet" href="../view/cus/menu/hienthi_menu.css">
    <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

    <style>
        body{
            width: 100%;
            margin : 0;
            /* background-image : url(../view/cus/img/nenToanBo.jpg); */
            background-image: linear-gradient(to right, #202020 ,#444444);
        }
        .header{
            font-family: 'Lalezar';
        }
    </style>
</head>
<body>
    <nav class="header">
        <!-- <div id="img"><img src="..view/cus/img/logocus.png" style="height: 86.61px; width: 100px;"></div> -->
        
        <div class="menu_header">
            <a href="tranghienthi.php?quanly=trangchu&id=1" id="header"><img src="../view/cus/img/logocus.png" style="height: 50px; width: 120px;"></a>
            <a href="tranghienthi.php?quanly=thucdon" id="header">THỰC ĐƠN</a>
            <a href="tranghienthi.php?quanly=khuyenmai" id="header">KHUYẾN MÃI</a>
            <a href="tranghienthi.php?quanly=dichvu" id="header">DỊCH VỤ</a>
            <a href="tranghienthi.php?quanly=tintuc" id="header">TIN TỨC</a>
            <a href="tranghienthi.php?quanly=lienhe" id="header">LIÊN HỆ</a>
            <a href="tranghienthi.php?quanly=vechungtoi" id="header">VỀ CHÚNG TÔI</a>
            <a href="tranghienthi.php?quanly=giohang" id="header"><i class="fas fa-shopping-cart"></i></a>

            <div class="user_dropdown" > 
            
                    <?php
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                            // Nếu $_SESSION['role'] == 0, hiển thị nút và dropdown menu
                            $username = $_SESSION['user'];
                            
                    ?>
                
                    <button id="name_user" style="background-color:#252525; font-size: 18px;font-family: 'Lalezar'">
                        <?php echo "Chào, " . $username; ?>
                    </button>
                    <div class="dropdown_content" style="right: 0;">
                        <a href="tranghienthi.php?quanly=quanlytaikhoan">Quản lý tài khoản</a>
                        <a href="tranghienthi.php?quanly=dangxuat">Đăng xuất</a>
                    </div>
                

                    <?php
                    } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                        // Nếu $_SESSION['role'] == 1, chuyển hướng sang trang admin/tranghienthi.php
                        unset($_SESSION['user']);
                        unset($_SESSION['role']);
                        header("Location: tranghienthi.php?quanly=dangnhapadmin");
                        
                        exit();
                    } 
                    
                    
                    else {
                        // Nếu $_SESSION['role'] == 2, hiển thị nút "Đăng nhập"
                        ?>
                        <button class="bt_dangnhap" style="height: 40px;font-family: 'Lalezar'">
                            <a href="tranghienthi.php?quanly=dangnhap">Đăng nhập</a>
                        </button>
                        
                    <?php
                    }?>
            </div>
        </div>

        

        
    </nav>
    
