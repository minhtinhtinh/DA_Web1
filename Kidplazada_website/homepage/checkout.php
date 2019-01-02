<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <?php
   require("../lib.php");
    //import cart.inc
   require_once './cart.inc';

   if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
   if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;

   $username=$_SESSION["plazadakid_user"];
   
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
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
      <!--checkout-->
      <link rel="stylesheet" type="text/css" href="css/checkout.css">
      <!--//checkout-->
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
                        <p><a href="mailto:info@example.com">info@example1.com</a></p>
                     </li>
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="container-fluid">
            <div class="hedder-up row">
               <div class="col-lg-3 col-md-3 logo-head">
                  <h1><a class="navbar-brand" href="index.html">Kid Plazada</a></h1>
               </div>
               <div class="col-lg-5 col-md-6 search-right">
                  <form class="form-inline my-lg-0">
                     <input class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa cần tìm">
                     <button class="btn" type="submit">Tìm Kiếm</button>
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
                                        echo "<a href='../logout.php?selfpage=homepage/index.php'><span class='fa fa-times'></span></a>";
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
                     <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a href="about.php" class="nav-link">Về Chúng Tôi</a>
                  </li>
                  <li class="nav-item">
                     <a href="service.php" class="nav-link">Dịch Vụ</a>
                  </li>
                  <li class="nav-item active">
                     <a href="shop.php" class="nav-link">Mua Sắm</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nhà Sản Xuất
                     </a>
                     <!-- Tìm theo nhà sản xuất -->                     

                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php
                        $table_producer=mysqli_query($connect,"select * from producer");  
                        while ($row_producer=mysqli_fetch_array($table_producer))
                        {//begin while             
                     ?>             
                           <a class="nav-link" href="producer.php?id=<?=$row_producer['id'];?>">
                              <?=$row_producer['name'];?></a>                       
                     <?php
                        }//end while
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
                        <a class="nav-link" href="product.php?id=<?=$row_category['id'];?>"><?=$row_category['name'];?></a>
                     <?php
                        }//end while
                     ?>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a href="contact.html" class="nav-link">Liên Hệ</a>
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
         <!-- short -->
         <div class="using-border py-3">
      <div class="inner_breadcrumb  ml-4">
         <ul class="short_ls">
            <li>
               <a href="index.html">Trang Chủ</a>
               <span>/ /</span>
            </li>
            <li>Giỏ Hàng</li>
         </ul>
      </div>
   </div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Kiểm<span> Tra</span></h3>
                     <div class="checkout-right">
                        <h4>Giỏ hàng của bạn đang có: <span><?= get_total_items();?> Sản phẩm</span></h4>
                        <table class="timetable_sub">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Sản Phẩm</th>
                                 <th>Số Lượng</th>
                                 <th>Tên Sản Phẩm</th>
                                 <th>Giá</th>
                                 <th>Bỏ Chọn</th>
                              </tr>
                           </thead>

                           <!-- Bắt đầu phần giỏ hàng -->
                           <tbody>
                           <?php
                              $total = 0;
                              foreach ($_SESSION["cart"] as $proId => $q) :
                              $sql = "select * from product where id = $proId";
                              $row = mysqli_query($connect,$sql);
                              $row = $rs->fetch_assoc();
                              $amount = $q * $row["price"];
                              $total += $amount;
                           ?>
                              <tr class="rem1">
                                 <td class="invert">1</td> <!-- số thứ tự -->
                                 <td class="invert-image"><a href="single.php"><img src="<?=$row["image"];?>" alt=" " class="img-responsive"></a></td>
                                 <td class="invert">
                                    <div class="quantity">
                                       <div class="quantity-select">
                                          <div class="entry value-minus">&nbsp;</div>
                                          <div class="entry value"><span><?=$q;?></span></div> <!-- số lượng sản phẩm đã chọn -->
                                          <div class="entry value-plus active">&nbsp;</div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="invert"><?=$row["name"];?></td> <!-- tên sản phẩm -->
                                 <td class="invert"><?=$amount;?></td>  <!-- Giá tiền -->
                                 <td class="invert">
                                    <div class="rem">
                                       <div class="close1"> </div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                           <!-- kết thúc lặp  -->
                           <?php
                              endforeach;
                           ?>
                        </table>
                     </div>
                     <div class="checkout-left">
                        <div class="col-md-4 checkout-left-basket">
                           <h4>Continue to basket</h4>
                           <ul>
                              <li>Product1 <i>-</i> <span>$675.00 </span></li>
                              <li>Product2 <i>-</i> <span>$325.00 </span></li>
                              <li>Product3 <i>-</i> <span>$405.00 </span></li>
                              <li>Total Service Charges <i>-</i> <span>$55.00</span></li>
                              <li>Total <i>-</i> <span>$1405.00</span></li>
                           </ul>
                        </div>
                        <div class="col-md-8 address_form">
                           <h4>Add a new Details</h4>
                           <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Full name: </label>
                                          <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">Mobile number:</label>
                                                <input class="form-control" type="text" placeholder="Mobile number">
                                             </div>
                                          </div>
                                          <div class="card_number_grid_right">
                                             <div class="controls">
                                                <label class="control-label">Landmark: </label>
                                                <input class="form-control" type="text" placeholder="Landmark">
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Town/City: </label>
                                          <input class="form-control" type="text" placeholder="Town/City">
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Address type: </label>
                                          <select class="form-control option-w3ls">
                                             <option>Office</option>
                                             <option>Home</option>
                                             <option>Commercial</option>
                                          </select>
                                       </div>
                                    </div>
                                    <button class="submit check_out">Delivery to this Address</button>
                                 </div>
                              </section>
                           </form>
                           <div class="checkout-right-basket">
                              <a href="payment.html">Make a Payment </a>
                           </div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>
      <!--subscribe-address-->
      <section class="subscribe">
         <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6 col-md-6 map-info-right px-0">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
            </div>
            <div class="col-lg-6 col-md-6 address-w3l-right text-center">
               <div class="address-gried ">
                  <span class="far fa-map"></span>
                  <p>25478 Road St.121<br>USA New Hill
                  <p>
               </div>
               <div class="address-gried mt-3">
                  <span class="fas fa-phone-volume"></span>
                  <p> +(000)123 4565<br>+(010)123 4565</p>
               </div>
               <div class=" address-gried mt-3">
                  <span class="far fa-envelope"></span>
                  <p><a href="mailto:info@example.com">info@example1.com</a>
                     <br><a href="mailto:info@example.com">info@example2.com</a>
                  </p>
               </div>
            </div>
         </div>
		 </div>
      </section>
      <!--//subscribe-address-->
      <section class="sub-below-address py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Get In Touch Us</h3>
            <div class="icons mt-4 text-center">
               <ul>
                  <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                  <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                  <li><a href="#"><span class="fas fa-rss"></span></a></li>
                  <li><a href="#"><span class="fab fa-vk"></span></a></li>
               </ul>
               <p class="my-3">velit sagittis vehicula. Duis posuere 
                  ex in mollis iaculis. Suspendisse tincidunt
                  velit sagittis vehicula. Duis posuere 
                  velit sagittis vehicula. Duis posuere 
               </p>
            </div>
            <div class="email-sub-agile">
               <form action="#" method="post">
                  <div class="form-group sub-info-mail">
                     <input type="email" class="form-control email-sub-agile" placeholder="Email">
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn subscrib-btnn">Subscribe</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!--//subscribe-->
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p> 
               © 2018 Toys-Shop. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
            </p>
         </div>
      </footer>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="#" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Your Name" name="Your Name" required="">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="Your Email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      <!--// cart-js -->
      <!--quantity-->
      <script>
         $('.value-plus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) + 1;
         	divUpd.text(newVal);
         });
         
         $('.value-minus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) - 1;
         	if (newVal >= 1) divUpd.text(newVal);
         });
      </script>
      <!--quantity-->
      <!--closed-->
      <script>
         $(document).ready(function (c) {
         	$('.close1').on('click', function (c) {
         		$('.rem1').fadeOut('slow', function (c) {
         			$('.rem1').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close2').on('click', function (c) {
         		$('.rem2').fadeOut('slow', function (c) {
         			$('.rem2').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close3').on('click', function (c) {
         		$('.rem3').fadeOut('slow', function (c) {
         			$('.rem3').remove();
         		});
         	});
         });
      </script>
      <!--//closed-->
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
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html>