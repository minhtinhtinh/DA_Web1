<?php if(!isset($bodypage)) header("Location: ../error.html"); include("cart.inc");?>
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
                  <h1><a class="navbar-brand" href="index.php">Kid plazada</a></h1>
               </div>
               <div class="col-lg-5 col-md-6 search-right">
                  <form class="form-inline my-lg-0" action="shop.php" method="Get">
                     <input class="form-control mr-sm-2" type="search" placeholder="nhập từ khóa cần tìm" name="search" style="color:black">
                     <button class="btn" type="submit">Tìm kiếm</button>
                  </form>
               </div>
               <div class="col-lg-4 col-md-3 right-side-cart text-right">
                  <div class="cart-icons">
                        <ul>
                        <?php
                                 if ($_SESSION["plazadakid_dangnhap"]>0) echo "<li><a class='' href='profile.php' style='margin-right:7px'><b>$username</b></a></li>";
                                 if ($_SESSION["plazadakid_dangnhap"]==-1){
                                    echo "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu!');</script>";
                                    $_SESSION["plazadakid_dangnhap"]=0;
                                 }
                                 if ($_SESSION["plazadakid_dangnhap"]==1) echo "<li><a href='../dashboard/dashboard.php'><span class='fa fa-star'></span></a></li>";
                        ?>
                            <li>
                                <?php
                                    if($_SESSION["plazadakid_dangnhap"]==0 || $_SESSION["plazadakid_dangnhap"]==-1)
                                        echo '<button type="button" data-toggle="modal" data-target="#loginForm">
                                                <span class="far fa-user"></span>
                                            </button>';
                                    else{
                                        echo "<a href='../logout.php?selfpage=$selfpage'><span class='fa fa-times'></span></a>";
                                    }
                                ?>
                           </li>
                           <li class="toyscart toyscart2 cart cart box_1">
                                 <a class="top_toys_cart" href="cart.php">
                                 <?php
                                    $SoSanPham = get_total_items();
                                    $SoChuSo = 1;
                                    while((int)($SoSanPham/10)>0){
                                       $SoChuSo++;
                                       $SoSanPham=(int)($SoSanPham/10);
                                    }
                                    $SoSanPham = get_total_items();
                                 ?>
                                 <span class="fas fa-cart-arrow-down" style="width: <?php if($SoSanPham>=10) echo $SoChuSo*5+35; ?>px"> <?php if($SoSanPham>0) echo $SoSanPham;?></span>
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
                     <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a href="about.php" class="nav-link">Về chúng tui</a>
                  </li>
                  <li class="nav-item">
                     <a href="shop.php" class="nav-link">Mua sắm</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nhà Sản Xuất
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php
                        $table_producer=mysqli_query($connect,"select * from producer");  
                        while ($row_producer=mysqli_fetch_array($table_producer))
                        {
                        echo "<a class='nav-link' href='shop.php?producerID=".$row_producer['id']."'>".$row_producer['name']."</a>";
                        }
                     ?>
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Loại Sản Phẩm
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php
                        $table_category=mysqli_query($connect,"select * from category");  
                        while ($row_category=mysqli_fetch_array($table_category))
                        {//begin while             
                     ?>    
                        <a class="nav-link" href="shop.php?categoryID=<?=$row_category['id'];?>"><?=$row_category['name'];?></a>
                     <?php
                        }//end while
                     ?>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
	  </div>
      <!--//headder-->
      <!-- banner -->
      <?php
         if($bodypage!="body/index.body.php") echo'<div class="inner_page-banner one-img">';
         else echo'<div class="slider text-center">
         <div class="callbacks_container">
            <ul class="rslides" id="slider4">
               <li>
                  <div class="slider-img one-img">
                     <div class="container">
                        <div class="slider-info ">
                           <h5>Những món đồ chơi tốt nhất <br>cho trẻ em</h5>
                           <div class="bottom-info">
                              <p style="color: yellow;font-weight: bold">xe điều kiển, xe trớn cho bé trai - gấu bông, búp bê cho bé gái</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="slider-img two-img">
                     <div class="container">
                        <div class="slider-info ">
                           <h5>Những món đồ chơi bền, tốt, rực rỡ<br>cho trẻ em</h5>
                           <div class="bottom-info">
                              <p style="color: yellow;font-weight: bold">xe điêu kiển siêu bền của Đức - gấu bông mềm, rực rỡ màu sắc của Mỹ</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="slider-img three-img">
                     <div class="container">
                        <div class="slider-info">
                           <h5>Những món đồ chơi an toàn <br> cho trẻ em</h5>
                           <div class="bottom-info">
                              <p style="color: yellow;font-weight: bold">đa số các loại đồ chơi được làm từ nhựa tổng hợp hay bông vải tổng hợp rất an toàn cho trẻ em</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>';
      ?>
      </div>
      <?php include("$bodypage"); ?>
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
                     <input type="hidden" name="selfpage" value="<?= $selfpage ?>">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="tài khoản" name="username" id="username">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="mật khẩu" name="password" id="password">
                           </div>
                           <div align="right">
                           <?php if($bodypage!="body/register.body.php") echo'<a class="btn subscrib-btnn" href="register.php">Đăng ký</a>'; ?>
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
   </body>
</html>