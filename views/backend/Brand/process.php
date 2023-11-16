<?php

use App\Models\Brand;
use App\Libraries\MyClass;


if(isset($_POST['THEM'])){
    $brand= new Brand();
    //lấy từ form
    $brand->name= $_POST ['name'];
    $brand->slug= (strlen($_POST['slug'])>0)? $_POST['slug']:MyClass :: str_slug($_POST['name']);
    $brand->description= $_POST ['description'];
    $brand->status= $_POST ['status'];
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=menu");
    }else{
        MyClass::set_flash('message',['msg'=>'Chưa chọn trang đơn','type'=>'danger']);
        header("location:index.php?option=menu");
    }


//xử lý upload file
if(strlen($_FILES['image']['name'])>0)
{
    $target_dir ="../public/images/brand/";
    $target_file =$target_dir . basename($_FILES["image"]["name"]);
    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['jpg','jpeg','png','gif','webp'])){
        $filename= $brand->slug .'.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
        $brand->image=$filename;
        MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=menu");
    }else{
        MyClass::set_flash('message',['msg'=>'Chưa chọn trang đơn','type'=>'danger']);
        header("location:index.php?option=menu");
    }
}
    

//tự sinh ra
    $brand->created_at= date('Y-m-d H:i:s');
    $brand->created_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    var_dump($brand);
    //lưu vào csdl
    //insert into brand ...
    $brand->save();
    //chuyên hướng về index
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=brand");


if(isset($_POST['CAPNHAT'])){
    $id=$_POST ['id'];
    $brand= Brand::find($id);
    if($brand==null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'denger']);
        header("location:index.php?option=brand");
        MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=menu");
    }else{
        MyClass::set_flash('message',['msg'=>'Chưa chọn trang đơn','type'=>'danger']);
        header("location:index.php?option=menu");
    }
}
    
    //lấy từ form
    $brand->name= $_POST ['name'];
    $brand->slug= (strlen($_POST['slug'])>0)? $_POST['slug']:MyClass :: str_slug($_POST['name']);
    $brand->description= $_POST ['description'];
    $brand->status= $_POST ['status'];

//xử lý upload file
if(strlen($_FILES['image']['name'])>0)
{
    //xóa hình cũ


    //thêm hình mới
    $target_dir ="../public/images/brand/";
    $target_file =$target_dir . basename($_FILES["image"]["name"]);
    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['jpg','jpeg','png','gif','webp'])){
        $filename= $brand->slug .'.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
        $brand->image=$filename;
        MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("location:index.php?option=menu");
    }else{
        MyClass::set_flash('message',['msg'=>'Chưa chọn trang đơn','type'=>'danger']);
        header("location:index.php?option=menu");
    }
}
    

//tự sinh ra
    $brand->updated_at= date('Y-m-d H:i:s');
    $brand->updated_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    var_dump($brand);
    //lưu vào csdl
    //insert into brand ...
    $brand->save();
    //chuyên hướng về index
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    
    header("location:index.php?option=brand");
