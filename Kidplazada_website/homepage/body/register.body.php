<?php if(!isset($bodypage)) header(("Location: ../register.php")) ?>
<style>
      .help-block {
         color: yellow;
         font-style:italic;
         font-weight: bold;
         font-size: 12px;
      }
   </style>
   <script src='https://www.google.com/recaptcha/api.js'></script>
 <div class="using-border py-3">
      <h3 style="color:white">ĐĂNG KÝ</h3>
   </div>
   <!-- //short-->
   <!--Typography-->
   <section style="background: url('images/reBG.jpg');background-size:100% 100%">
      <div class="row">
         <div class="col-md-3" style="border: 2px solid yellow;margin-left:100px;margin-top:50px;margin-bottom:50px;color:white">
            <form class="form-horizontal" action="register.php" method="post">
               <!-- Text input-->
               <div class="form-group" style="padding-top:15px">
                  <label class="control-label" for="textinput">Tên đăng nhập</label>
                  <div class="">
                     <input id="re_name" name="re_name" placeholder="tên đăng nhập" class="form-control input-md"
                        type="text">
                     <span class="help-block">
                        <?php
                           if($re_name=="_saidulieu") echo "tên đăng ký đã tồn tại";
                        ?>
                     </span>
                  </div>
               </div>

               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="textinput">Số điện thoại</label>
                  <div class="">
                     <input id="phone" name="phone" placeholder="số điện thoại" class="form-control input-md" type="text">
                     <span class="help-block">
                        <?php
                           if($re_phone=="_saidulieu") echo "số điện thoại đã được sử dụng!";
                        ?>
                     </span>
                  </div>
               </div>

               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="textinput">Địa chỉ</label>
                  <div class="">
                     <input id="address" name="address" placeholder="địa chỉ" class="form-control input-md" type="text">
                  </div>
               </div>

               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="textinput">Mật khẩu</label>
                  <div class="">
                     <input id="re_pass" name="re_pass" placeholder="mật khẩu" class="form-control input-md" type="password">
                  </div>
               </div>

               <!-- Text input-->
               <div class="form-group">
                  <label class="control-label" for="textinput">Nhập lại mật khẩu</label>
                  <div class="">
                     <input id="pass2" name="pass2" placeholder="mật khẩu" class="form-control input-md" type="password">
                     <span class="help-block">
                        <?php
                           if($re_pass=="_saidulieu") echo "mật khẩu không khớp!";
                        ?>
                     </span>
                  </div>
               </div>
               <div class="g-recaptcha" data-sitekey="6Le9YnsUAAAAAK9bqm5FXblTEmUYNX3Uz-ctMkr0"></div>
               <!-- Button -->
               <div><hr color="yellow"></div>
               <div class="form-group">
                  <div align="right">
                     <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Tạo tài khoản"/>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-6">
            <div style="margin-top:50px;margin-bottom:50px;margin-left:100px;color:white">
               Nếu bạn tạo tài khoản đồng nghĩa bạn<br>
               đã chấp nhận điều khoản của chúng tôi:<br><br>
               <ol>
                  <li>Mọi thông tin của bạn sẽ được chúng tôi bảo mật.</li>
                  <li>Thông tin của bạn sẽ được dùng cho việc đánh giá,<br>
                     phân tích của chúng tôi.</li>
                  <li>Bạn phải chấp hành các quy định về dịch vụ mua bán<br>
                     trực tuyến của chúng tôi.</li>
               </ol>
            </div>
         </div>
      </div>
   </section>