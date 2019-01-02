<?php
	if((isset($_GET["page"]) && $_GET["page"]=="setting") || !isset($_GET["page"])) $bodypage="body/profile.body.setting.php";
	if(isset($_GET["page"]) && $_GET["page"]=="orders") $bodypage="body/profile.body.orders.php";

	if(isset($_POST["upload"]) && isset($_FILES["nimage"]) && $_FILES["nimage"]["error"] == 0){
        move_uploaded_file($_FILES["nimage"]["tmp_name"],"images/user/".$_FILES["nimage"]["name"]);
        if($image!="images/default-user.png" && $image!="images/user/".$_FILES["nimage"]["name"]) unlink($image);
        $image="images/user/".$_FILES["nimage"]["name"];
        mysqli_query($connect,"update user set image='$image' where username='$username'");
        //header("Location: profile.php");
    }
    else{ if(isset($_POST["upload"])) echo "<script>alert('Tải lên thất bại, vui lòng thử lại sau!')</script>";}
?>
<div class="using-border py-3">
	<h3 style="color:white">TRANG CÁ NHÂN</h3>
</div>
<style>
.mybg{
	background: url('images/profilebg.jpg');
	background-size:100% 100%;
	margin: 0px 0px 0px 0px;
}
</style>
<section class="mybg">
<div class="container">
	<div class="row">
		<div class="col-md-3 bg-light" style="height: 400px;margin-top:100px;margin-bottom:100px;">
				<!-- SIDEBAR USERPIC -->
				<center>
					<img src="<?= $image ?>" class="img-responsive" width="150px" height="150px" style="margin-top: 30px;">
					<br>
					<a href="" data-toggle="modal" data-target="#addimage">Tải ảnh lên</a>
					<br>
						<?= $username ?>
						<br>
						Customer
				</center>
				<br>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="">
					<ul class="navbar-nav">
						<li class="page-item <?php if($bodypage=="body/profile.body.setting.php") echo 'active'; ?>">
							<a href="?page=setting" class="page-link">
							<i class="fa fa-cog"></i>
							Cài đặt tài khoản</a>
						</li>
						<li class="page-item <?php if($bodypage=="body/profile.body.orders.php") echo 'active'; ?>" style="margin-bottom: 30px;">
							<a href="?page=orders"  class="page-link">
							<i class="fa fa-shopping-cart"></i>
							Theo dõi đơn hàng</a>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-1"></div>
		<?php include($bodypage) ?>
		</div>
</div>
</section>
<div class="modal fade" id="addimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 380px">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 15px">Upload image</b>
                </div>
                <div class="modal-body" style="height: 70px">
                    <form action="profile.php" method="post" enctype="multipart/form-data">
                        <div>
                        <input class="file-input" type="file" name="nimage" style="float: left; width: 250px">
                        <input class="btn btn-success" type="submit" name="upload" value="Tải lên" style="float:left; margin-left:10px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
