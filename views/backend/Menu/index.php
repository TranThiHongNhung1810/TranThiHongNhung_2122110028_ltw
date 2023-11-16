<?php
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

$list = Menu::where('status','!=','0')->orderBy('Created_at','DESC')->get();
$list_category = Category::where('status','!=','0')->get();
$list_brand = Brand::where('status','!=','0')->get();
$list_topic = Topic::where('status','!=','0')->get();
$list_page = Post::where([['status','!=','0'],['type','=','page']])->get();
?>
<?php require_once "../views/backend/header.php";?>
      <!-- CONTENT -->
      <form action ="index.php?option=menu&cat=process" method="post" >
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả menu</h1>
               
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
            <div div class="col-md-6">
                     <a href="index.php?option=menu" class="btn btn-sm btn-primary">Tất cả</a>
                     <a href="index.php?option=menu&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php";?>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="accordion" id="accordionExample">
                           <div class="card mb-0 p-3">
                              <select name="position" class="form-control">
                                 <option value="mainmenu">Main Menu</option>
                                 <option value="footermenu">Footer Menu</option>
                              </select>
                           </div>
                           <!-- end cart position -->
                           <div class="card mb-0">
                              <div class="card-header" id="headingCategory">
                                 <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true"
                                    aria-controls="collapseCategory">
                                    Danh mục sản phẩm
                                 </strong>
                              </div>
                              <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <?php foreach($list_category as $category):?>
                                    <div class="form-check">
                                       <input name="categoryId[]" class="form-check-input" type="checkbox" value="<?=$category->id;?>"
                                          id="categoryCheck<?=$category->id;?>">
                                       <label class="form-check-label" for="categoryCheck<?=$category->id;?>">
                                          <?=$category->name;?>
                                       </label>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="my-3">
                                       <button name="ADDCATEGORY" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <form action ="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
                           <!-- end cart category -->
                           <div class="card mb-0">
                              <div class="card-header" id="headingBrand">
                                 <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true"
                                    aria-controls="collapseBrand">
                                    Thương hiệu
                                 </strong>
                              </div>
                              <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                 <?php foreach($list_brand as $brand):?>
                                    <div class="form-check">
                                       <input name="brandId[]" class="form-check-input" type="checkbox" value="<?=$brand->id;?>"
                                          id="brandCheck<?=$brand->id;?>">
                                       <label class="form-check-label" for="brandCheck<?=$brand->id;?>">
                                          <?=$brand->name;?>
                                       </label>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="my-3">
                                 
                                       <button name="ADDBRAND" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </form>
                           <!-- end card brand -->
                           <div class="card mb-0">
                              <div class="card-header" id="headingTopic">
                                 <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true"
                                    aria-controls="collapseTopic">
                                    Chủ đề bài viết
                                 </strong>
                              </div>
                              <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                 <?php foreach($list_topic as $topic):?>
                                    <div class="form-check">
                                       <input name="topicId[]" class="form-check-input" type="checkbox" value="<?=$topic->id;?>"
                                          id="topicCheck<?=$topic->id;?>">
                                       <label class="form-check-label" for="topicCheck<?=$topic->id;?>">
                                          <?=$topic->name;?>
                                       </label>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="my-3">
                                       <button name="ADDTOPIC" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end card topic -->
                           <div class="card mb-0">
                              <div class="card-header" id="headingPage">
                                 <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                                    aria-controls="collapsePage">
                                   Trang đơn
                                 </strong>
                              </div>
                              <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                 <?php foreach($list_page as $page):?>
                                    <div class="form-check">
                                       <input name="pageId[]" class="form-check-input" type="checkbox" value="<?=$page->id;?>"
                                          id="pageCheck<?=$page->id;?>">
                                       <label class="form-check-label" for="pageCheck<?=$page->id;?>">
                                          <?=$page->title;?>
                                       </label>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="my-3">
                                       <button name="ADDPAGE" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end card page -->
                           <div class="card mb-0">
                              <div class="card-header" id="headingCustom">
                                 <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true"
                                    aria-controls="collapseCustom">
                                    Tuỳ liên kết
                                 </strong>
                              </div>
                              <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="mb-3">
                                       <label>Tên menu</label>
                                       <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                       <label>Liên kết</label>
                                       <input type="text" name="link" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                       <button name="ADDCUSTOM" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end cart custom -->
                        </div>
                     </div>
                     <div class="col-md-9">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th>Tên menu</th>
                                 <th>Liên kết</th>
                                 <th>Vị trí</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(count($list) > 0) : ?>
                              <?php foreach($list as $item  ):?>
                              <tr class="datarow">  
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <div class="name">
                                      <?= $item->name ; ?> 
                                    </div>
                                    <div class="function_style">
                                       <?php if($item->status==1):?>
                                       <a href="index.php?option=menu&cat=status&id=<?= $item->id; ?>" class="btn btn-success btn-xs">
                                       <i class="fas fa-toggle-on"></i> Hiện</a>
                                       <?php else:?>
                                          <a href="index.php?option=menu&cat=status&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i>Ẩn</a>
                                          <?php endif;?>
                                       <a href="index.php?option=menu&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                    </a>
                                       <a href="index.php?option=menu&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                    </a>
                                       <a href="index.php?option=menu&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i>Xoá
                                    </a>
                                    </div>
                                 </td>
                                 <td><?= $item->link?></td>
                                 <td><?= $item->position?></td>
                              </tr>
                              <?php endforeach;?>
                              <?php endif;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php";?>