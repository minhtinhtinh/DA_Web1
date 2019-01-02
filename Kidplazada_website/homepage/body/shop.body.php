<style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4CAF50;
    cursor: pointer;
}
</style>
	<div class="using-border py-3">
	<h3 style="color:white">MUA SẮM</h3>
	</div>
	<!-- //short-->
	<!--show Now-->  
	<!--show Now--> 
	
	<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
	
		<div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
			<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Cửa Hàng Đồ Chơi Trẻ Em</h3>
			
			<div class="row">
				<div class="side-bar col-lg-3">
				<form action="" method="get"> 
				<div class="search-hotel">
                     <h3 class="agileits-sear-head">Bộ lọc</h3>
                        <input type="search" name="search" style="color: black" placeholder="từ khóa cần tìm" <?php if(isset($_GET["search"])) { $abc=$_GET["search"];echo "value='$abc'";}?>>
                        <button type="submit" class="btn btn-dark fa fa-search" name="subsearch" value="subsearch"></button>
                     
                  </div>
							<!-- price range -->
							<div class="range">
								<h3 class="agileits-sear-head">Mức giá</h3>
								<ul class="dropdown-menu6">
									<li>
										<div class="slidecontainer">
										<input type="range" min="50000" max="500000" value="<?php if(isset($_GET["range"])) echo $_GET["range"]; else echo "500000";?>" class="slider" id="myRange" name="range">
										<br>
										Từ 50000 đến <span id="demo"></span> đ
										</div>
									</li>
								</ul>
							</div>
							<br>
							<br>
							<!-- //price range -->
					<div class="deal-leftmk left-side">
						<h3 class="agileits-sear-head" style="text-align: center">Nhà Sản Xuất</h3>
						<input type="radio" class="checkbox" name="producerID" value="all" checked="checked"> Tất cả<br>
										<?php
								$table_producer=mysqli_query($connect,"select * from producer");	
								while ($row_producer=mysqli_fetch_array($table_producer))
								{//begin while					
									?>
										<input type="radio" class="checkbox" name="producerID" value="<?=$row_producer['id'];?>" <?php if(isset($_GET["producerID"]) && $_GET["producerID"]==$row_producer['id']) echo'checked="checked"' ?>> <?=$row_producer['name'];?>	<br>
									<?php
								}//end while
								?>					
							<div class="clearfix"></div>
						<br>
						<hr>
						<!-- link Loại sản phẩm -->
						<h3 class="agileits-sear-head" style="text-align: center">Loại Sản Phẩm</h3>
								<!-- link đến nhà sản xuất -->
									<input type="radio" class="checkbox" name="categoryID" value="all" checked="checked"> Tất cả<br>
										<?php
								$table_category=mysqli_query($connect,"select * from category");	
								while ($row_category=mysqli_fetch_array($table_category))
								{//begin while					
									?>
										<input type="radio" class="checkbox" name="categoryID" value="<?=$row_category['id'];?>" <?php if(isset($_GET["categoryID"]) && $_GET["categoryID"]==$row_category['id']) echo'checked="checked"' ?>> <?=$row_category['name'];?>	<br>	
									<?php
								}//end while
								?>				
							<div class="clearfix"></div>
					</div>
					</form>
				</div>
				
				
				<!-- //deals -->
				<!-- Danh sách tất cả các sản phẩm -->
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

							$c_sql = mysqli_query($connect,"select count(*) as num_rows from product where $condition");//đếm số lượng số sản phẩm trong database
							
							$c_row = $c_sql->fetch_assoc();
							$num_rows = $c_row["num_rows"];
							$num_pages = ceil($num_rows / $limit);

							if ($current_page < 1 || $current_page > $num_pages) {
								$current_page = 1;
							}

							// $offset = 0;
							$offset = ($current_page - 1) * $limit;


							$table=mysqli_query($connect,"select * from product where $condition order by price desc limit $offset, $limit");
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
										</div>
										<div class="item-info-product">
											<div class="info-product-price">
												<div class="grid_meta">
													<div class="product_price">
														<h4>
															<a href="single.php?id=<?=$row['id'];?>"><?=$row['name'];?></a>
														</h4>
														<div class="grid-price mt-2">
															<span class="money "><?=$row['price'];?> đ</span>
														</div>
													</div>                            
												</div>
												<div class="toys single-item hvr-outline-out">
													<!-- kí hiệu giỏ hàng -->
													<form action="CartProcess.php" method="post">
														<input type="hidden" name="id" value="<?=$row['id'];?>">
														<input type="hidden" name="amount" value="1">
														<button type="submit" class="btn toys-cart ptoys-cart" name="addcart">
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
				<!-- kết thúc các phân trang -->									
			</div>
			<!-- hiển thị các phân trang -->
			<div style="float: right">
			<nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
				  	 <?php if ($prev_page > 0) : ?>
                     <li class="page-item">
                        <a class="page-link" href="?page=<?= $prev_page.$string ?>" tabindex="-1">
						<span class="fa fa-angle-double-left"></span>
						</a>
                     </li>
					 <?php endif; ?>
					 <?php for ($i = 1; $i <= $num_pages; $i++) : ?>
                     <li class="page-item <?php if($i==$current_page) echo 'active' ?>">
                        <a class="page-link" href="?page=<?= $i.$string ?>"><?= $i ?></a>
                     </li>
					 <?php endfor; ?>
					 <?php if ($next_page <= $num_pages) : ?>
                     <li class="page-item">
                        <a class="page-link" href="?page=<?= $next_page.$string ?>">
							<span class="fa fa-angle-double-right"></span>
						</a>
                     </li>
					 <?php endif; ?>	
                  </ul>
               </nav>
			
			</div>
		</div>		
	</div>
	</section>
	<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>