<?php

use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);
if($product==null){
    header("location:index.php?option=product&cat=trash");
}
$product->delete();// xóa vv
header("location:index.php?option=product&cat=trash");