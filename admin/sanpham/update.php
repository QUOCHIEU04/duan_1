<?php
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    $hinhpath="../upload/".$img;
      if (is_file($hinhpath)) {
          $hinh="<img src='.$hinhpath.' height='80'>";
       } else{
          $hinh="no photo ";
      }
?>
<div class="row2">
         <div class="row2 font_title">
          <h1>cập nhật LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
         <select name="iddm">
                    <!-- <option value="1" selected>TẤT CẢ</option> -->
                    <?php 
                        foreach ($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            if($iddm==$id) $s="selected"; else $s="";
                            echo "<option value='.$id.' '.$s.'>$name</option>";
                        }
                    ?>
          </select>
          <div class="row2 mb10 form_content_container">

           </div>
            
           <div class="row2 mb10">
            <label>tên sản phẩm </label> <br>
            <input type="text" name="tensp"  value="<?=$name?>">
           </div>

           <div class="row2 mb10">
            <label>giá </label> <br>
            <input type="text" name="giasp"  value="<?=$price?>">
           </div>

           <div class="row2 mb10">
            <label>hình </label> <br>
            <input type="file" name="hinh">
            <?=$hinh?>
           </div>

           <div class="row2 mb10">
            <label>mô tả </label> <br>
            <textarea name="mota"  cols="30" rows="10"><?=$mota?></textarea>
           </div>

           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" type="submit" name="capnhat" value="Cập Nhật">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
           <?php
                if(isset($thongbao)&&($thongbao="")) echo $thongbao;
            ?>
          </form>
         </div>
        </div>