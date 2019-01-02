      <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3" style="margin-top:750px">Đồ chơi mới nhất</h3>
            <div class="slid-img">
               <ul id="flexiselDemo1">
                  <?php
                     $table=mysqli_query($connect,"select * from product order by add_date desc limit 10");
                     while($row = mysqli_fetch_array($table))
                     {
                  ?>
                  <li>
                     <div class="agileinfo_port_grid text-center">
                        <a href="single.php?id=<?= $row['id'] ?>">
                           <img src="<?=$row['image'] ?>" class="img-fluid" >
                           <div class="banner-right-icon">
                              <h4 class="pt-3"><?=$row['name'] ?></h4>
                           </div>
                        </a>
                     </div>
                  </li>
                  <?php
                     }
                  ?>
               </ul>
            </div>
         </div>
      </section>
      <!--//about -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3 bg-light" id="about">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <h3 class="title text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">Đồ chơi bán chạy</h3>
            <div class="row banner-below-w3l">
               <div class="col-lg-1"></div>
               <?php
                  $table=mysqli_query($connect,"select * from product order by buyCount desc limit 10");
                  $i = 0;
                  while($row = mysqli_fetch_array($table))
                  {
               ?>
               <div class="col-lg-2 col-md-6 col-sm-6 text-center banner-agile-flowers">
                  <a href="single.php?id=<?= $row['id'] ?>">
                     <img src="<?=$row['image'] ?>" class="img-thumbnail">
                     <div class="banner-right-icon">
                        <h4 class="pt-3"><?=$row['name'] ?></h4>
                     </div>
                  </a>
               </div>
               <?php
                  $i++;
                  if($i==5) echo'<div class="col-lg-1"></div><div class="col-lg-1"></div>';
                  }
               ?>
            </div>
         </div>
      </section>
      <!-- //about -->
      <section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <h3 class="title text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">Xem nhiều nhất</h3>
            <div class="row banner-below-w3l">
            	<div class="col-lg-1"></div>
               <?php
                  $table=mysqli_query($connect,"select * from product order by views desc limit 10");
                  $i = 0;
                  while($row = mysqli_fetch_array($table))
                  {
               ?>
               <div class="col-lg-2 col-md-6 col-sm-6 text-center banner-agile-flowers">
                  <a href="single.php?id=<?= $row['id'] ?>">
                     <img src="<?=$row['image'] ?>" class="img-thumbnail">
                     <div class="banner-right-icon">
                        <h4 class="pt-3"><?=$row['name'] ?></h4>
                     </div>
                  </a>
               </div>
               <?php
                  $i++;
                  if($i==5) echo'<div class="col-lg-1"></div><div class="col-lg-1"></div>';
                  }
               ?>
            </div>
         </div>
      </section>