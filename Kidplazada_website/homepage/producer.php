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

$username=$_SESSION["plazadakid_user"];

//nhận id của category hoặc producer
   $id_request=$_REQUEST["id"];
?>

<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Kid Plazada</title>
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
               <!-- link phân trang -->
   <link href="css/paging.css" rel="stylesheet" type="text/css" media="all">
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
      <!--price range-->
      <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
      <!--//price range-->
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
         <<nav class="navbar navbar-expand-lg navbar-light">
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
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.html">Home</a>
                  <span>/ /</span>
               </li>
               <li>Nhà sản xuất</li>
               <span>/ /</span>
               <li>
                  <?php
                  $table_producer1=mysqli_query($connect,"select * from producer");  
                  while($rowlink=mysqli_fetch_array($table_producer1))
                  {
                     if($rowlink['id'] == $id_request)
                     {
                        echo $rowlink['name'];
                     }
                  }
                  ?>  
               </li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--show Now-->  
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Cửa Hàng Đồ Chơi Trẻ Em</h3>
            <div class="row">
               <div class="side-bar col-lg-3">
               <!-- //reviews -->
               <!-- deals -->
               <div class="deal-leftmk left-side">
                  <h3 class="agileits-sear-head">Nhà Sản Xuất</h3>

                  <div class="row special-sec1">
                     <div class="col-xs-8 img-deal1">
                        <!-- link đến nhà sản xuất -->
                        <?php
                        $table_producer=mysqli_query($connect,"select * from producer");  
                        while ($row_producer=mysqli_fetch_array($table_producer))
                        {//begin while             
                           ?>
                           <div class="customer-rev left-side">      
                              <ul>
                                 <li>
                                    <a class="nav-link" href="producer.php?id=<?=$row_producer['id'];?>">
                                       <i class="fas fa-star"></i>
                                       <?=$row_producer['name'];?>                                 
                                    </a>
                                 </li>
                              </ul>                      
                           </div>         
                           <?php
                        }//end while
                        ?>
                     </div>                        
                     <div class="clearfix"></div>
                  </div>
                  <br>
                  <br>
                  <hr>
                  <!-- link Loại sản phẩm -->
                  <h3 class="agileits-sear-head">Loại Sản Phẩm</h3>
                  <div class="row special-sec1">
                     <div class="col-xs-8 img-deal1">
                        <!-- link đến nhà sản xuất -->
                        <?php
                        $table_category=mysqli_query($connect,"select * from category");  
                        while ($row_category=mysqli_fetch_array($table_category))
                        {//begin while             
                           ?>
                           <div class="customer-rev left-side">      
                              <ul>
                                 <li>
                                    <a class="nav-link" href="product.php?id=<?=$row_category['id'];?>">
                                       <i class="fas fa-star"></i>
                                       <?=$row_category['name'];?>                                 
                                    </a>
                                 </li>
                              </ul>                      
                           </div>         
                           <?php
                        }//end while
                        ?>
                     </div>                        
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
               <!-- Danh sách tất cả các sản phẩm -->
               
               <!-- hiển thị phân trang -->
                  <div class="left-ads-display col-lg-9">
               <div class="row">
                  <!-- bắt đầu từng sản phẩm -->
                  <?php
                  //bắt đầu phân trang
                     $limit = 9;

                     $current_page = 1;
                     if (isset($_GET["page"])) {
                        $current_page = $_GET["page"];
                     }

                     $next_page = $current_page + 1;
                     $prev_page = $current_page - 1;

                     $c_sql = mysqli_query($connect,"select count(*) as num_rows from product where producer = ".$id_request);//đếm số lượng số sản phẩm trong database
                     
                     $c_row = $c_sql->fetch_assoc();
                     $num_rows = $c_row["num_rows"];
                     $num_pages = ceil($num_rows / $limit);

                     if ($current_page < 1 || $current_page > $num_pages) {
                        $current_page = 1;
                     }

                     // $offset = 0;
                     $offset = ($current_page - 1) * $limit;


                    $table=mysqli_query($connect,"select * from product where producer = '".$id_request."' limit $offset, $limit ");                     
                     while($row = mysqli_fetch_array($table))
                     {
                  ?>
                     <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="<?=$row['image'];?>" class="img-thumbnail img-fluid" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="single.php?id=<?=$row['id'];?>" class="link-product-add-cart">Chi tiết</a>
                                    </div>
                                 </div>
                                 <span class="product-new-top">Mới</span>
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="#"><?=$row['name'];?></a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money "><?=$row['price'];?>đ</span>
                                          </div>
                                       </div>                            
                                    </div>
                                    <div class="toys single-item hvr-outline-out">
                                       <!-- kí hiệu giỏ hàng -->
                                       <form action="#" method="post">
                                          <input type="hidden" name="cmd" value="_cart">
                                          <input type="hidden" name="add" value="1">
                                          <input type="hidden" name="toys_item" value="<?=$row['name'];?>">
                                          <input type="hidden" name="amount" value="<?=$row['price'];?>">
                                          <button type="submit" class="toys-cart ptoys-cart">
                                             <i class="fas fa-cart-plus"></i>
                                          </button>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
                  <!-- Kết thúc các sản phẩm -->                  
               </div>
            </div>
            <!-- hiển thị các phân trang -->
            <table align="center">
               <tr>
                  <td><br></td>                    
               </tr>
               <tr>
                  <td><br></td>                    
               </tr>
               <tr>
                  <!-- nút preview -->
                  <td colspan="4" class="text-center">
                     <?php if ($prev_page > 0) : ?>
                        <a class="btn btn-primary" href="?page=<?= $prev_page ?>&id=<?=$id_request?>" role="button">
                           <span class="glyphicon glyphicon-arrow-left"></span>
                           Prev
                        </a>
                     <?php endif; ?>
                  </td>                
                  <!-- Số trang -->
                  
                  <?php for ($i = 1; $i <= $num_pages; $i++) : ?>
                     <td colspan="10" class="text-center">
                        <ul class="paging modal-4">
                           <li>
                              <a href="?page=<?= $i ?>&id=<?=$id_request?>" class="<?php if($i == $current_page) echo 'active' ?>" ><?= $i ?></a>
                           </li>
                        </ul>
                     </td>
                  <?php endfor; ?>
                                       
                  <!-- nút next -->
                  <td>
                     <?php if ($next_page <= $num_pages) : ?>
                        <a class="btn btn-primary" href="?page=<?= $next_page ?>&id=<?=$id_request?>" role="button">
                           <span class="glyphicon glyphicon-arrow-right"></span>
                           Next
                        </a>
                     <?php endif; ?>   
                  </td>                               
               </tr>                
            </table>
            </div>
         </div>
      </section>
      <!-- //show Now-->
      <!--subscribe-address-->
      <!--//subscribe-address-->
      <section class="sub-below-address">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <p><b>Đồ chơi của chúng tôi</b> là những loại đồ chơi tốt nhất,
            chúng được chọn lọc phù hợp với bé trai hay bé gái dưới 13 tuổi,
            giúp trẻ em phát triển tư duy sáng tạo hiệu quả.
            Ở đây chúng tôi có mọi thứ mà con em bạn cần và đừng lo lắng mọi đồ chơi của chúng tôi đều an toàn.
            Chúng tôi luôn làm hết sức minh vì tương lai của trẻ em, tương lai của chúng ta.
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
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="js/jquery-ui.js"></script>
      <script>
         //<![CDATA[ 
         $(window).load(function () {
            $("#slider-range").slider({
               range: true,
               min: 0,
               max: 9000,
               values: [50, 6000],
               slide: function (event, ui) {
                  $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
               }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
         
         }); //]]>
      </script>
      <!-- //price range (top products) -->
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
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>
