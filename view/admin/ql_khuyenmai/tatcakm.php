
<link rel="stylesheet" href="ql_khuyenmai/khuyenmai.css">
<div class="main">
    <h2 class="title"> Tất cả tin tức khuyến mãi </h2>
<div class="tablekhuyenmai">
<table>
    <tr>
        <th> STT</th> 
        <th> Tên khuyến mãi</th>
        <th> Miêu tả</th> 
        <th> Hình ảnh</th> 
        <th></th>
</tr> 
<?php 
//var_dump($kq);
 //check trong mảng đã có dữ liệu chưa
if (isset($discount)&&(count($discount)>0))
{
    $i =1;
    foreach ($discount as $dis)
    {
        echo '<tr>
            <td>'.$i.' </td> 
            <td>'.$dis['discount_name'].' </td>
            <td> '.$dis['description'].'</td> 
            <td> <img src="'.$dis['img'].'" width="200px" </td>
             <td><a href="tranghienthi.php?quanly=updatediscountnews&id='.$dis['id'].'"> Sửa</a> | <a href="tranghienthi.php?quanly=deldiscountnews&id='.$dis['id'].'"> Xóa</a>  </td> 
                </tr> ';
        $i++;
    }
}
?>

<tr>
    <th colspan="5">
<form action="tranghienthi.php?quanly=themkmnews" method="POST"class="tablekhuyenmai">
        <input type="submit" name="themkmnews" value="Thêm mới">
    </form>
</th>
</tr>
</table>

<!-- table mã khuyến mãi -->
<div class="tablemakhuyenmai">
<table>
    <tr>
        <th> STT</th> 
        <th> Mã khuyến mãi</th>
        <th> Giá trị áp dụng</th>  
        <th></th>
</tr> 
<?php 
//var_dump($kq);
 //check trong mảng đã có dữ liệu chưa
if (isset($codedis)&&(count($codedis)>0))
{
    $i =1;
    foreach ($codedis as $code)
    {
        echo '<tr>
           
            <td>'.$code['id'].' </td>
            <td> '.$code['code_dis'].'</td> 
            <td>'.$code['qtt_of_dis'].' </td> 
             <td><a href="tranghienthi.php?quanly=updatecodediscount&id='.$code['code_dis'].'"> Sửa</a> | <a href="tranghienthi.php?quanly=delcodediscount&id='.$code['code_dis'].'"> Xóa</a>  </td> 
                </tr> ';
        $i++;
    }
}
?>

<tr><th colspan="5">
<form action="tranghienthi.php?quanly=themcodedis" method="POST"class="tablemakhuyenmai">
        <input type="submit" name="themcodedis" value="Thêm mới">
    </form>
</th>
</tr>
</table>
</div>