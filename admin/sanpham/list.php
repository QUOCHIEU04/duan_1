<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN sản phẩm</th>
                <th>hình</th>
                <th>giá</th>
                <th>lượt xem</th>
                <th></th>
            </tr>

            <?php
                foreach ($listsanpham as $sanpham) { 
                    extract($sanpham);
                    $suasp="index.php?act=suasp&id=".$id;
                    $xoasp="index.php?act=xoasp&id=".$id;
                    echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$img.'</td>
                        <td>'.$price.'</td>
                        <td>'.$luotxem.'</td>
                        <td> <a href='.$xoasp.'> <input type="button" value="xóa"> </a>   
                             <a href='.$suasp.'> <input type="button" value="sửa"> </a> </td>
                        </tr>';
                }
            ?>

            
            
           
            
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
        <input class="mr20" type="button" value="xóa các mục đã chọn" >
        <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>