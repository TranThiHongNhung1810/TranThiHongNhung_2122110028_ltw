<?php
use App\Models\Contact;
use App\Models\Customer;
use App\Models\User;
$customer=User::where([['status','=',1],['id','=',$_SESSION['user_id']]])->first();
if(isset($_POST['XATNHAN'])) {
   $contact= new contact();
   $contact->id=$_SESSION['user_id'];
   $contact->name=$customer->name;
   $contact->phone=$customer->phone;
   $contact->email=$customer->email;
   $contact->title=$_POST['title'];
   $contact->content=$_POST['content'];
   $contact->created_at=date('Y-m-d H:i:s');
   $contact->status=1;
   if($contact->save()) {
      header("location:index.php");
   }
}
?>
<?php require_once "views/frontend/header.php" ?>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <iframe
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s"
               width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
               referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
         <div class="col-md-6">
            <div class="mb-3">
               <label for="name" class="text-main">Họ tên</label>
               <input type="text" value="<?= $customer->name;?>" name="name" id="name" class="form-control" placeholder="Nhập họ tên">
            </div>
            <div class="mb-3">
               <label for="phone" class="text-main">Điện thoại</label>
               <input type="text" value="<?= $customer->phone;?>" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại">
            </div>
            <div class="mb-3">
               <label for="email" class="text-main">Email</label>
               <input type="text" value="<?= $customer->email;?>"name="email" id="email" class="form-control" placeholder="Nhập email">
            </div>
            <div class="mb-3">
               <label for="title" class="text-main">Tiêu đề</label>
               <input type="text" value="<?= $customer->title;?>" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
            </div>
            <div class="mb-3">
               <label for="detail" class="text-main">Nội dung</label>
               <textarea value="<?= $customer->detail;?>" name="detail" id="detail" class="form-control" placeholder="Nhập nội dung liên hệ"></textarea>
            </div>
            <div class="mb-3">
               <button type="submit" name="XATNHAN" class="btn btn-main px-4">GỬI LIÊN HỆ</button>
               </div>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php" ?>