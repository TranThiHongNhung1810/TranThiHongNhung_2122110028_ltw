<?php

use App\Models\Brand;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$brand =  Brand::find($id);
if($brand==null){
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'denger']);
    header("location:index.php?option=brand");
}
//
$brand->delete();// xóa vv
MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']); 
header("location:index.php?option=brand&cat=trash");