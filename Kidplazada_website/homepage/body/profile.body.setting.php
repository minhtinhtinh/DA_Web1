<?php
    if(isset($_POST["savepass"]) && $_POST["opass"]!="" && $_POST["npass"]!="" && $_POST["npass2"]!=""){
        if(md5($_POST["opass"])==$pass){
            if($_POST["npass"]==$_POST["npass2"]){
                $pass=md5($_POST["npass"]);
                mysqli_query($connect,"update user set password='$pass' where username='$username'");
                //header("Location: profile.php");
            }
            else echo "<script>alert('Mật khẩu không khớp!')</script>";
        }
        else echo "<script>alert('Sai mật khẩu!')</script>";
    }
    else{ if(isset($_POST["savepass"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";}

    if(isset($_POST["save"]) && $_POST["name"]!="" && $_POST["phone"]!="" && $_POST["address"]!=""){
        $address=$_POST["address"];
        $r = mysqli_query($connect,"select * from user where username='".$_POST["name"]."'");
        if(($r!=false && mysqli_num_rows($r)==0) || $_POST["name"]==$username){
            $r = mysqli_query($connect,"select * from user where phone='".$_POST["phone"]."'");
            if(($r!=false && mysqli_num_rows($r)==0) || $_POST["phone"]==$phone){
                mysqli_query($connect,"update user set username='".$_POST["name"]."', phone='".$_POST["phone"]."', address='".$_POST["address"]."' where username='$username'");
                //header("Location: profile.php");
            }
            else echo "<script>alert('Số điện thoại đã tồn tại!')</script>";
        }
        else echo "<script>alert('Tài khoản đã tồn tại!')</script>";
    }
    else{ if(isset($_POST["save"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";}
?>
		<div class="col-md-5" style="margin-top:100px;">
			   <form action="profile.php" method="post">
			   		<b>Tên tài khoản:</b>
				   <input class="form-control" name="name" type="text" value="<?= $username ?>" <?php if(!isset($_GET["mode"])) echo "disabled" ?>><br>
				   <b>Số điện thoại:</b>
				   <input class="form-control" name="phone" type="text" value="<?= $phone ?>" <?php if(!isset($_GET["mode"])) echo "disabled" ?>><br>
				   <b>Địa chỉ:</b>
				   <input class="form-control" name="address" type="text" value="<?= $address ?>" <?php if(!isset($_GET["mode"])) echo "disabled" ?>><br>
				   <a href="" data-toggle="modal" data-target="#changepass">Thay đổi mật khẩu</a>
				   <?php
						   if(isset($_GET["mode"])) echo '<input type="submit" name="save" class="btn btn-success" value="Lưu" style="float: right">';
						   else echo '<a href="?mode=1" class="btn btn-default" style="float: right"><i class="fa fa-pencil-alt"></i></a>';
				   ?>
			   </form>
		</div>
	<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 300px">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 15px">Thay đổi mật khẩu</b>
                </div>
                <div class="modal-body">
                    <form action="profile.php" method="post">
                        <div>
                        <input class="form-control" type="password" name="opass" placeholder="mật khẩu củ"><br>
						<input class="form-control" type="password" name="npass" placeholder="mật khẩu mới"><br>
						<input class="form-control" type="password" name="npass2" placeholder="nhập lại mật khẩu"><br>
                        <input class="btn btn-success" type="submit" name="savepass" value="Thay đổi" style="float: right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>