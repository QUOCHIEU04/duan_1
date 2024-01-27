<?php
    include "../model/pdo.php";
    include "header.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    //controller
    if (isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra xem người dùng có click vào không
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    $sql="insert into danhmuc(name) values('$tenloai')";
                    pdo_execute($sql);
                    insert_danhmuc($tenloai);
                    $thongbao="thêm thành công";
                }
                
                include "danhmuc/add.php";
                break;

            case 'lisdm':
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'suadm':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $dm=loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;

            case 'updatedm':
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao="cập nhật thành công thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            
            /* controller sản phẩm */
            case 'addsp':
                // kiểm tra xem người dùng có click vào không
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    // $sql="insert into sanpham(name) values('$tenloai')";
                    // pdo_execute($sql);
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "the file" . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "has been uploaded";
                        
                    }else {
                        // echo "sorry, there was an error uploading your file";
                    
                    }
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao="thêm thành công";
                }
                $listdanhmuc=loadall_danhmuc();
                // var_dump($listdanhmuc);
                include "sanpham/add.php";
                break;

            case 'listsp':
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;

            case 'xoasp':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;

            case 'suasp':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $dm=loadone_sanpham($_GET['id']);
                }
                include "sanpham/update.php";
                break;

            case 'updatesp':
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_sanpham($id, $tenloai);
                    $thongbao="cập nhật thành công thành công";
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;
            
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    


    

    include "footer.php";