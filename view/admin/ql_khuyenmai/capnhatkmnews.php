<link rel="stylesheet" href="ql_khuyenmai/khuyenmai.css">
<h2> Cập nhật tin tức khuyến mãi </h2>
<div class="tablekhuyenmai" >
    <table>
    <form action="tranghienthi.php?quanly=capnhatkmnews" method="post" enctype="multipart/form-data">
                <th>Tên khuyến mãi </th>
                <th><input type="text" name="namediscountnews" id="" value="<?=$kmnews1[0]['discount_name']?>"></th>
            </tr>
            <tr>
                <th>Mô tả </th>
                <th> <textarea type="text" name="description" id=""></textarea></th>
            </tr>
            <tr>
                <th>Hình ảnh </th>
                <th>  <input type="file" name="img" id=""></th>
            </tr>
            
            <tr>
                <th colspan="2"><input type="submit" name="themkmnews1" value="Thêm khuyến mãi"></th>
            </tr>
        </form>
    </table>
</div>

   