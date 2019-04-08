
      <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
      <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<?php
   require("../lib.php");

   if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
   if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;
   if(!isset($_SESSION["viewcount"])) $_SESSION["viewcount"]=0;

   $username=$_SESSION["plazadakid_user"];
   //nhận id của sản phẩm cần xem chi tiết
   $id_single=$_REQUEST["id"];
      $table_detail=mysqli_query($connect,"select * from product where id= '".$id_single."'");
      while ($row=mysqli_fetch_array($table_detail))
      {
          $img=$row['image'];
          $name=$row['name'];
          $price=$row['price'];
          $views=$row['views'];
          $purchase=$row['buyCount'];
          $description=$row['description'];
          $nation=$row['nation'];

          // id producer
          $pro=$row['producer'];

          $table_produc=mysqli_query($connect,"select * from producer");  
          while ($row_produc=mysqli_fetch_array($table_produc))
          {
               if($row_produc['id']==$row['producer'])
               {
                  //tên nhà sản xuất
                  $produc=$row_produc['name'];
               }
          }
         $table_categ=mysqli_query($connect,"select * from category");  
          while ($row_categ=mysqli_fetch_array($table_categ))
          {
               if($row_categ['id']==$row['category'])
               {
                  //tên loại
                  $categ=$row_categ['name'];
                  $cateID=$row_categ['id'];
               }
          }
          //cập nhật số lượt xem
          $view_new=$views;
          if($_SESSION["viewcount"]==0){
          $view_new++;
          mysqli_query($connect,"update product set views = '".$view_new."' where id= '".$id_single."'");
          $_SESSION["viewcount"]=1;
          }
      }



      
      $bodypage="body/single.body.php";
	$selfpage="homepage/single.php";
	include("template.php");
      ?>  
      <script src="js/minicart.js"></script>
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
      <!-- script for responsive tabs -->
      <script src="js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- FlexSlider -->
      <script src="js/jquery.flexslider.js"></script>
      <script>
         // Can also be used with $(document).ready()
         $(window).load(function () {
         	$('.flexslider1').flexslider({
         		animation: "slide",
         		controlNav: "thumbnails"
         	});
         });
      </script>
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
      <script src="js/imagezoom.js"></script>