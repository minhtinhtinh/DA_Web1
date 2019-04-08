<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
    if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;
    if(!isset($_GET["search"])) header("Location: index.php");
    $key=$_GET["search"];
    $username=$_SESSION["plazadakid_user"];
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Kid plazada</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
      <!--headder-->
      <div class="header-outs" id="home">
      <div class="header-bar">
         <div class="info-top-grid">
            <div class="info-contact-agile">
               <ul>
                  <li>
                     <span class="fas fa-phone-volume"></span>
                     <p>+(000)123 4565 32</p>
                  </li>
                  <li>
                     <span class="fas fa-envelope"></span>
                     <p><a href="mailto:info@example.com">info@kidplazada.com</a></p>
                  </li>
                  <li>
                  </li>
               </ul>
            </div>
         </div>
         <div class="container-fluid">
            <div class="hedder-up row">
               <div class="col-lg-3 col-md-3 logo-head">
                  <h1><a class="navbar-brand" href="index.html">Kid plazada</a></h1>
               </div>
               <div class="col-lg-5 col-md-6 search-right">
                  <form class="form-inline my-lg-0" action="search.php" method="Get">
                     <input class="form-control mr-sm-2" type="search" placeholder="nhập từ khóa cần tìm" name="search" style="color:black">
                     <button class="btn" type="submit">Tìm kiếm</button>
                  </form>
               </div>
               <div class="col-lg-4 col-md-3 right-side-cart text-right">
                  <div class="cart-icons">
                        <ul>
                        <?php
                                 if ($_SESSION["plazadakid_dangnhap"]==1) echo "<li><a class='fa-text-width' href='../dashboard/dashboard.php'>Dashboard</a></li>";
                                 if ($_SESSION["plazadakid_dangnhap"]==2) echo "<li><b class='fa-text-width'>$username</b></li>";
                                 if ($_SESSION["plazadakid_dangnhap"]==-1){
                                    echo "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu!');</script>";
                                    $_SESSION["plazadakid_dangnhap"]=0;
                                 }
                            ?>
                            <li>
                                <?php
                                    if($_SESSION["plazadakid_dangnhap"]==0 || $_SESSION["plazadakid_dangnhap"]==-1)
                                        echo '<button type="button" data-toggle="modal" data-target="#loginForm">
                                                <span class="far fa-user"></span>
                                            </button>';
                                    else{
                                        echo "<a href='../logout.php?selfpage=homepage/template.php'><span class='fa fa-times'></span></a>";
                                    }
                                ?>
                           </li>
                           <li class="toyscart toyscart2 cart cart box_1">
                                 <a class="top_toys_cart" href="#">
                                 <span class="fas fa-cart-arrow-down"></span>
                                 </a>
                           </li>
                        </ul>
                     </div>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
               <ul class="navbar-nav ">
                  <li class="nav-item ">
                     <a class="nav-link" href="index.html">Trang chủ<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a href="about.html" class="nav-link">Về chúng tui</a>
                  </li>
                  <li class="nav-item">
                     <a href="service.html" class="nav-link">Dịch vụ</a>
                  </li>
                  <li class="nav-item">
                     <a href="shop.html" class="nav-link">Mua sắm</a>
                  </li>
                  <li class="nav-item">
                     <a href="contact.html" class="nav-link">Liên hệ</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
	  </div>
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <h3 style="color:white">Kết quả tìm kiếm</h3>
      </div>
      <!-- //short-->
      <!--//banner -->
      <!--Typography-->
      <section>
         <div><h2 style="color:blue;font-weight:bold;margin-top:30px">Từ khóa: <?= $key ?></h2></div>
         <?php
         	$table=mysqli_query($connect,"select * from product where name like binary '%$key%' or description like binary '%$key%'");
         	if(mysqli_num_rows($table)>0){
         ?>
         <div>
         <table width="100%" class="table table-striped table-bordered" id="dataTables-example" border=0>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><a href="#"><img src='<?= $row["image"] ?>' width="60px" height="60px"></a></td>
                                            <td><?= $row["name"] ?></td>
                                            <td><?= $row["description"] ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
         </div>
         <?php
         	}
         	else echo '<div>~~~ Không tìm thấy sản phẩm nào phù hợp!</div>'
         ?>
      </section>
      <section class="sub-below-address">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <p><b>Đồ chơi của chúng tui</b> là những loại đồ chơi tốt nhất,
            chúng được chọn lọc phù hợp với bé trai hay bé gái dưới 13 tuổi,
            giúp trẻ em phát triển tư duy sáng tạo hiệu quả.
            Ở đây chúng tôi có mọi thứ mà con em bạn cần và đừng lo lắng mọi đồ chơi của chúng tôi đều an toàn.
            Chúng tôi luôn làm hết sức minh vì tương lại của trẻ em, tương lai của chúng ta.
            </p>
            <div class="icons mt-4 text-right">
               <ul>
               		<li><font color="white">Mạng xã hội</font></li>
                  	<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                  	<li><a href="#"><span class="fas fa-envelope"></span></a></li>
                  	<li><a href="#"><span class="fas fa-rss"></span></a></li>
                  	<li><a href="#"><span class="fab fa-vk"></span></a></li>
               </ul>
            </div>
         </div>
      </section>
      <!--//subscribe-->
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p>
               © 2018 Toys-Shop. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>, HCMUS student
            </p>
         </div>
      </footer>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="../login.php" method="post">
                     <input type="hidden" name="selfpage" value="homepage/template.php">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="tài khoản" name="username" id="username">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="mật khẩu" name="password" id="password">
                           </div>
                           <div align="right">
                           <a class="btn subscrib-btnn" href="register.php?selfpage=template.php">Đăng ký</a>
                            <button type="submit" class="btn subscrib-btnn">Đăng nhập</button>
                            </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1-->
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
      <script src="js/minicart.js"></script>
      <script>
         toys.render();

         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;

         	if (this.subtotal() > 0) {
         		items = this.items();

         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!-- //cart-js -->
      <!-- start-smoth-scrolling -->
      <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->

      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>
