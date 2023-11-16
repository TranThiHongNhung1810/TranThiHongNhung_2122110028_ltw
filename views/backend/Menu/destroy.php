<?php

use App\Libraries\MyClass;
use App\Models\Menu;
$id=$_REQUEST['id'];
$menu=Menu::find($id);
if($menu==null)
{
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=menu&cat=trash");
}
$menu->delete();//xóa khỏi CSDL
MyClass::set_flash('message',['msg'=>'Xóa CSDL thành công','type'=>'success']);
header("location:index.php?option=menu&cat=trash");