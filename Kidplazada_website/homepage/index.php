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
    $bodypage="body/index.body.php";
    $selfpage="homepage/index.php";
    include("template.php");
?>
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
      <!--flexs slider-->
      <link href="css/JiSlider.css" rel="stylesheet">
      <!-- //cart-js -->
      <!--responsiveslides banner-->
      <script src="js/responsiveslides.min.js"></script>
      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
         	// Slideshow 4
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager:false,
         		nav:true ,
         		speed: 900,
         		namespace: "callbacks",
         		before: function () {
         			$('.events').append("<li>before event fired.</li>");
         		},
         		after: function () {
         			$('.events').append("<li>after event fired.</li>");
         		}
         	});

         });
      </script>
      <!--// responsiveslides banner-->
      <!--slider flexisel -->
      <script src="js/jquery.flexisel.js"></script>
      <script>
         $(window).load(function() {
         	$("#flexiselDemo1").flexisel({
         		visibleItems: 3,
         		animationSpeed: 3000,
         		autoPlay:true,
         		autoPlaySpeed: 2000,
         		pauseOnHover: true,
         		enableResponsiveBreakpoints: true,
         		responsiveBreakpoints: {
         			portrait: {
         				changePoint:480,
         				visibleItems: 1
         			},
         			landscape: {
         				changePoint:640,
         				visibleItems:2
         			},
         			tablet: {
         				changePoint:768,
         				visibleItems: 2
         			}
         		}
         	});

         });
      </script>
