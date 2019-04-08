
		<div class="col-md-8" style="margin-top:100px;">
			<table class="table table-hover" id="dataTables-example" style="color: white;">
                                <thead>
                                    <tr>
                                        <th style="border-top: 0">Mã đơn hàng</th>
                                        <th style="border-top: 0">Chi tiết đơn hàng</th>
                                        <th style="border-top: 0">Ngày giao</th>
                                        <th style="border-top: 0">Tổng tiền</th>
                                        <th style="border-top: 0">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $status1=0;
                                        $limit1=5;
                                        if (isset($_GET["pageOA"])) $status1=($_GET["pageOA"]-1)*$limit1;
                                        $table=mysqli_query($connect,"select * from `order` where username='$username' limit $status1, $limit1");
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row["id"] ?></td>
                                        <td>
                                        <?php
                                                $detail=$row["id"];
                                                $table2=mysqli_query($connect,"select product.name ,orderdetail.count from orderdetail, product where orderdetail.orderID=$detail and orderdetail.product=product.id");
                                                while ($row2 = mysqli_fetch_array($table2))
                                                {
                                            ?>
                                                <?= $row2["name"].", SL: ".$row2["count"] ?><br>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($row["deliveryDays"]!="" && $row["status"]!="chờ duyệt"){
                                                    $date=date_create($row["orderTime"]);
                                                    $day=$row["deliveryDays"];
                                                    date_modify($date,"+$day days");
                                                    echo date_format($date,"Y-m-d");
                                                }
                                            ?>
                                        </td>
                                        <td><?= $row["total"] ?></td>
                                        <td><?= $row["status"]; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <ul style="float: right" class="navbar">
                              <?php
                                $curPage1 = $status1/$limit1 + 1;
                                    $SL_SP1=mysqli_num_rows(mysqli_query($connect,"select * from `order` where username='$username'"));
                                    if($SL_SP1/$limit1>1){
                                    for ($i=1;$i<=ceil($SL_SP1/$limit1);$i++) {
                               ?>
                              <li class="page-item <?php if($i==$curPage1) echo 'active' ?>"><a class="page-link" href="?page=orders&pageOA=<?= $i ?>"><?= $i ?></a></li>
                              <?php
                                    }
                                }
                              ?>
                            </ul>
			</div>