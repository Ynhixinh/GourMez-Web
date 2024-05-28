<?php
    function connectdb()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "gourmez_web";
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        }
        return $conn;
    }
?>
<?php
    function get_random_food($conn, $limit = 2) {
        $sql_random = "SELECT * FROM food ORDER BY RAND() LIMIT $limit";
        $query_random = mysqli_query($conn, $sql_random);
        $foods = array();
        while ($row_random = mysqli_fetch_array($query_random)) {
            $foods[] = $row_random;
        }
        return $foods;
    }
    ?>
<?php
    $conn = connectdb();
    if (isset($_POST['update'])) {
        $foodId = $_POST['food_id'];
        $quantity = $_POST['quantity'];

        $updateQuantityQuery = "UPDATE cart SET quantity = $quantity WHERE food_id = $foodId";
        mysqli_query($conn, $updateQuantityQuery);
    }

    if (isset($_POST['delete'])) {
        $foodId = $_POST['food_id'];

        $deleteQuery = "DELETE FROM cart WHERE food_id = $foodId";
        mysqli_query($conn, $deleteQuery);
    }

    $sql_cart = "SELECT * FROM cart INNER JOIN food ON cart.food_id = food.food_id";
    $query_cart = mysqli_query($conn, $sql_cart);
?>
</head>
<body>
<link rel="stylesheet" href="../view/cus/giohang/giohang.css">
<?php
$totalPrice = 0;
$cartItems = "";
while ($row_cart = mysqli_fetch_array($query_cart)) {
    $hinh_anh_san_pham = $row_cart['img'];
    $productPrice = $row_cart['selling_price'];
    $quantity = $row_cart['quantity'];
    $subtotal = $productPrice * $quantity;
    $totalPrice += $subtotal;

    $cartItems .= '<tr>';
    $cartItems .= '<td> <img src="../view/admin/ql_sanpham/uploads/' . $hinh_anh_san_pham . '" style="width: 120px;height: 120px; border-radius:5px"></td>';
    $cartItems .= '<td>';
    $cartItems .= '<span style="color: #E26A2C; font-weight: bold">' . $row_cart['food_name'] . '</span><br>';
    $cartItems .= '<form method="POST" action="">';
    $cartItems .= '<input type="hidden" name="food_id" value="' . $row_cart['food_id'] . '">';
    $cartItems .= '<div class="quantity-update" style="padding-top:5px; padding-bottom:5px">';
    $cartItems .= '<span style="padding-right: 5px">Số lượng:</span> <input type="number" style="width:30px;text-align:center" name="quantity" value="' . $quantity . '">';
    $cartItems .= '<button type="submit" name="update" class="btn_update">Sửa</button>';
    $cartItems .= '</div>';
    $cartItems .= '</form>';
    $cartItems .= "Giá bán: " . number_format($productPrice, 0, '.', '.') . " đ<br>";
    $cartItems .= '<span style="display: inline-block; padding-top: 5px;"> Tổng: ' . number_format($subtotal, 0, '.', '.') . ' đ</span><br>';
    $cartItems .= '<form method="POST" action="" style="display: flex; justify-content: center; padding-top: 5px">';
    $cartItems .= '<input type="hidden" name="food_id" value="' . $row_cart['food_id'] . '">';
    $cartItems .= '<button type="submit" name="delete" class="btn_delete">Xóa món ăn</button>';
    $cartItems .= '</form>';
    $cartItems .= '</td>';
    $cartItems .= '</tr>';
    $cartItems .= '<tr>';
    $cartItems .= '<td colspan="2"><hr style="width:350px"></td>';
    $cartItems .= '</tr>';
}
?>
<div class="giohang_content">
<div class="noidung">
    <?php
        echo '<p style="color:black; font-family: Lalezar; font-size: 30px;"><i class="fas fa-shopping-cart" style="color:#E26A2C"></i> Giỏ hàng của bạn</p>';
        echo '<table class="tb_noidung" style="font-size: 16px">';
        echo $cartItems;
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center; font-weight:bold">Thành tiền: ' . number_format($totalPrice, 0, '.', '.') . ' đ</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center;"> <button class="btn_thanhtoan" style="margin-top: 5px;"> <a href="tranghienthi.php?quanly=thanhtoan" style="text-decoration: none; color: #ffff;">Thanh toán</a>
        </button> </td>';
        echo '</tr>';
        echo '</table>';
    ?>
</div>
<div class="monan_qc">
<?php
    echo '<p style="color:black; font-family: Lalezar; font-size: 30px"><i class="fas fa-drumstick-bite" style="color:#E26A2C"></i> Món ăn phải thử</p>';
    echo '<table class="tb_monan" style="font-size: 16px">';
    echo '<tr>';
    echo '<td colspan="4">Món ăn nên thử</td>'; // colspan to span across all columns
    echo '</tr>';
    echo '<tr>';
    $random_foods = get_random_food($conn); // Assuming you already defined this function
    foreach ($random_foods as $row) {
        echo '<td>'; // Start a new table cell for each food item
        echo '<li class="Thucdon_mon">';
        echo '<img src="../view/admin/ql_sanpham/uploads/' . $row['img'] . '" style="width: 150px; height: 150px;">';
        echo '<p class="Ten_mon">' . $row['food_name'] . '</p>';
        echo '<p>';
        echo '<span class="label">Giá bán:</span>';
        echo '<span class="price">' . number_format($row['selling_price'], 0, ',', '.') . 'vnđ</span>';
        echo '</p>';
        echo '<button class="btn_xemchitiet">';
        echo '<a href="hienthi_menu.php?quanly=chitiet_sp&id=' . $row['food_id'] . '" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>';
        echo '</button>';
        echo '</li>';
        echo '</td>'; // End the table cell
    }
    echo '</tr>';
    echo '</table>';
?>
</div>
</div>
</body>
</html>