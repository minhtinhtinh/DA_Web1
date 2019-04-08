      <div class="using-border py-3">
      <h3 style="color:white">CHI TIẾT SẢN PHẨM</h3>
      </div>
      <!-- //short-->
      <!--//Chi tiết sản phẩm -->
      <section class="banner-bottom py-lg-5 py-3">
         <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
               <div class="row">
                  <!-- hình sản phẩm -->
                  <div class="col-lg-4 single-right-left ">
                     <div class="grid images_3_of_2">
                        <div class="flexslider1">                           
                           <ul class="slides">
                              <!-- chi tiết hình ảnh thông tin san phẩm -->        
                              <li data-thumb="">
                                 <div class="thumb-image">                                   
                                    <img 
                                    src="<?=$img;?>" data-imagezoom="true" class="img-fluid" alt=" "/> 
                                 </div>
                              </li>                            
                           </ul>                             
                           <div class="clearfix"></div>   

                           <!-- lượt xem và lượt mua -->
                           <div class="responsive_tabs" align="center">
                              <div class="colr" style="color: blue;">
                                 <span>Lượt xem: </span>  <?=$view_new;?>
                              </div>
                              <div style="color: blue;">
                                 <span >Lượt mua: </span>  <?=$purchase;?>
                              </div>    
                           </div>

                     </div>
                  </div>
               </div>
                  <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                     <h3><?=$name;?></h3>                    
                     <div class="responsive_tabs">
                        <h4>Giá: 
                        <span class="item_price"><?=$price?> đ</span>
                        </h4>
                     </div>
                     <!-- Loại và nhà sản xuất -->
                     <div class="responsive_tabs">
                        <div class="colr" style="color: blue;">
                           <span>Thương hiệu: </span>  <?=$produc;?>
                        </div>
                        <div style="color: blue;">
                           <span >Mặc hàng: </span>  <?=$categ;?>  
                        </div>    
                     </div>
                     <div class="responsive_tabs">
                        <h5>Xuất xứ: 
                           <span class="item_price"><?=$nation;?></span>
                        </h5>
                     </div>
                     <div class="responsive_tabs"></div>                     
                     <div class="occasion-cart">
                        <div class="toys single-item singlepage">
                           <form action="CartProcess.php" method="post">
                              <input type="hidden" name="id" value="<?=$id_single;?>">
                              <input type="text" name="amount" value="1" class="form-control" style="width: 60px; float: left; margin-top:7px">
                              <button type="submit" class="btn toys-cart ptoys-cart add" name="addcart" style="float: left; margin-left:10px">
                              Add To Cart
                              </button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"> </div>
                  <!--/tabs-->
                  <div class="responsive_tabs">
                     <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                           <li>Mô Tả</li>
                           <li>Đánh Giá</li>                            
                        </ul>
                        <div class="resp-tabs-container">
                           <!--/tab_one-->
                           <div class="tab1">
                              <div class="single_page">
                                 <h6><?=$name;?></h6>
                                 <p>
                                    <?= $description;?>
                                 </p>
                                 <p class="para"><b>KID PLAZADA</b> tập hợp những loại đồ chơi tốt nhất,
                                    chúng được chọn lọc phù hợp với bé trai hay bé gái dưới 13 tuổi,
                                    giúp trẻ em phát triển tư duy sáng tạo hiệu quả.Ở đây chúng tôi có mọi thứ mà con em bạn cần và đừng lo lắng. Mọi đồ chơi của chúng tôi đều có chứng nhận an toàn.
                                    Chúng tôi luôn làm hết sức minh vì tương lai của trẻ em, tương lai của chúng ta.
                                 </p>
                              </div>
                           </div>
                           <!--//tab_one-->
                           <div class="tab2">
                              <div class="single_page">
                                 <div class="bootstrap-tab-text-grids">
                                    <div class="bootstrap-tab-text-grid">
                                       <div class="bootstrap-tab-text-grid-left">
                                          <img 
                                          src="<?=$img;?>" data-imagezoom="true" class="img-fluid" alt=" "/> 
                                       </div>
                                       <div class="bootstrap-tab-text-grid-right">
                                          <ul>
                                             <li><a href="#"><?=$name;?></a></li>                                             
                                          </ul>
                                          <p>
                                             Sản phẩm đã được bộ y tế kiểm định. An toàn tuyệt đối cho trẻ em.                                             
                                          </p>
                                          <p>
                                             Giá cả phù hợp, với nhiều đợt khuyến mãi hấp dẫn.
                                             Sự lựa chọn tốt nhất của các bậc phụ huynh.
                                          </p>
                                       </div>
                                       <div class="clearfix"> </div>
                                    </div>                                    
                                 </div>
                              </div>
                           </div>                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>               
      </section>
      <!-- 5 sảm phẩm cùng giá tiền -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3 bg-light" id="about">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <div class="row banner-below-w3l">
               <div class="col-lg-2"><h2>Sản Phẩm Tương Tự</h2></div>
               <?php
               $table=mysqli_query($connect,"select * from product where category='$cateID' and id!='$id_single' limit 5");
               //$i = 0;
               while($row = mysqli_fetch_array($table))
               {
                  ?>
                  <div class="col-lg-2 col-md-6 col-sm-6 text-center banner-agile-flowers">
                     <a href="single.php?id=<?=$row['id'];?>">
                        <img src="<?=$row['image'] ?>" class="img-thumbnail">
                        <div class="banner-right-icon">
                           <h3 class="agileits-sear-head"><?=$row['name'];?></h3>
                        </div>
                     </a>
                  </div>
               <?php                  
               }
               ?>
            </div>
         </div>
      </section>

      <!-- 5 sảm phẩm cùng nhà sản xuất -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <div class="row banner-below-w3l">
            <div class="col-lg-2"><h2>Cùng Nhà Sản Xuất</h2></div>
               <?php
               $table=mysqli_query($connect,"select * from product where producer='".$pro."' and id != '".$id_single."' limit 5");
               //$i = 0;
               while($row = mysqli_fetch_array($table))
               {
                  ?>
                  <div class="col-lg-2 col-md-6 col-sm-6 text-center banner-agile-flowers">
                     <a href="single.php?id=<?=$row['id'];?>">
                        <img src="<?=$row['image'] ?>" class="img-thumbnail">
                        <div class="banner-right-icon">
                           <h3 class="agileits-sear-head"><?=$row['name'];?></h3>
                        </div>
                     </a>
                  </div>
               <?php                  
               }
               ?>
            </div>
         </div>
      </section>