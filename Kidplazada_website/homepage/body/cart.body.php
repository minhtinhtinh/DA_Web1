<div class="using-border py-3">
	<h3 style="color:white">GIỎ HÀNG</h3>
</div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <div>
                        <a href="shop.php" class="btn btn-link">Tiếp tục mua sắm</a>
                     </div>
                     <div class="checkout-right">
                        <h4>Giỏ hàng của bạn đang có: <span><?= get_total_items();?> Sản phẩm</span></h4>
                        <table class="timetable_sub">
                           <thead>
                              <tr>
                                 <th>STT</th>
                                 <th>Hình</th>
                                 <th>Sản Phẩm</th>
                                 <th>Giá</th>
                                 <th style="width: 120px">Số Lượng</th>
                                 <th>Xóa</th>
                              </tr>
                           </thead>

                           <!-- Bắt đầu phần giỏ hàng -->
                           <tbody>
                           <?php
                              $total = 0;
                              $STT = 0;
                              foreach ($_SESSION["cart"] as $proId => $q){
                              $STT ++;
                              $table = mysqli_query($connect,"select * from product where id = '$proId'");
                              $row = mysqli_fetch_array($table);
                              $total += $q*$row["price"];
                           ?>
                              <tr class="rem1">
                                 <td class="invert"><?= $STT ?></td> <!-- số thứ tự -->
                                 <td class="invert-image"><a href="single.php"><img src="<?=$row["image"];?>"style="width:70px"></a></td>
                                 <td class="invert"><?= $row["name"] ?></td> <!-- tên sản phẩm -->
                                 <td class="invert"><?= $row["price"] ?></td>  <!-- Giá tiền -->
                                 <td class="invert">
                                    <form action="CartProcess.php" method="post">
                                       <input type="hidden" value="<?= $proId ?>" name="id">
                                       <input class="form-control" type="text" value="<?= $q ?>" name="quantity" style="width: 60px; float:left">
                                       <button class="btn btn-info" type="submit" name="changecart" style="float: left; margin-top:3px;margin-left:5px"><span class="fa fa-save"></span></button>
                                    </form>
                                 </td>
                                 <td class="invert">
                                    <form action="CartProcess.php" method="post">
                                       <input type="hidden" name="id" value="<?= $proId ?>">
                                       <button type="submit" class="btn btn-danger" name="delcart"><span class="fa fa-trash"></span></button>
                                    </form>
                                 </td>
                              </tr>
                           </tbody>
                           <!-- kết thúc lặp  -->
                           <?php
                              }
                           ?>
                        </table>
                        <br>
                        <b style="float: left">Tổng cộng: <?= $total ?> đ</b>
                        <form action="" method="post">
                              <input type="hidden" value="<?= $total ?>" name="total">
                           <?php if($STT!=0) echo '<button type="submit" name="buy" class="btn btn-primary" style="float: right">Thanh toán</button>' ?>
                        </form>
                        
                     </div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>