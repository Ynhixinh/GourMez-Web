<?php

function tongdonhang()
    {
        $tong = 0;
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang'])))
        {
            if(sizeof($_SESSION['giohang'])>0)
            {
          
            for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
            {
                $tt =(int) $_SESSION['giohang'][$i][2]*(int)$_SESSION['giohang'][$i][3];
                $tong+= $tt;
            
            }
        }
    }
    return $tong;
}

function taodonhang($id,$name, $phone, $email, $booking_date, $address, $total_price, $note)
{
    $conn = connectdb();
    $sql = "INSERT INTO bigdeal_service(id_bill,name, phone, email, booking_date, address, total_price, note)
                VALUES ('$id','$name','$phone','$email','$booking_date','$address', '$total_price', '$note')";
    mysqli_query($conn,$sql);

    $last_id = mysqli_insert_id($conn);
    echo $last_id;
    mysqli_close($conn);
    return $last_id;

}

function taogiohang($tenmon,$dongia,$soluong,$thanhtien,$idbill)
{
    $conn = connectdb();
    $sql = "INSERT INTO bigdeal_order_item(id_bill,tenmon,soluong,dongia,thanhtien)
                VALUES ('$idbill','$tenmon','$soluong','$dongia','$thanhtien')";

    mysqli_query($conn,$sql);
    mysqli_close($conn);


}
?>