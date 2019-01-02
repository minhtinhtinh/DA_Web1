<?php if(!isset($bodypage)) header(("Location: ../order.php")) ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <!-- orders -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div>Orders Accepted</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Detail</th>
                                        <th>Delivery date</th>
                                        <th>Delivery address</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $status1=0;
                                        $limit1=5;
                                        if (isset($_GET["pageOA"])) $status1=($_GET["pageOA"]-1)*$limit1;
                                        $table=mysqli_query($connect,"select * from `order` where status!='chờ duyệt' limit $status1, $limit1");
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row["username"] ?></td>
                                        <td>
                                        <table>
                                        <?php
                                                $detail=$row["id"];
                                                $table2=mysqli_query($connect,"select product.name ,orderdetail.count from orderdetail, product where orderdetail.orderID=$detail and orderdetail.product=product.id");
                                                while ($row2 = mysqli_fetch_array($table2))
                                                {
                                                    ?>
                                                    <?= $row2["name"] ?>, SL<b>:</b> <?= $row2["count"] ?><br>
                                                <?php
                                                }
                                            ?>
                                            </table>
                                        </td>
                                        <td>
                                            <?php
                                                if($row["deliveryDays"]!=""){
                                                    $date=date_create($row["orderTime"]);
                                                    $day=$row["deliveryDays"];
                                                    date_modify($date,"+$day days");
                                                    echo date_format($date,"Y-m-d");
                                                }
                                            ?>
                                        </td>
                                        <td><?= $row["deliveryAddress"] ?></td>
                                        <td><?= $row["total"] ?></td>
                                        <td>
                                        <?php
                                            $a=$row["status"];
                                            switch($a){
                                                case "chưa giao":
                                                    echo "<font color='red'>$a</font>";
                                                    break;
                                                case "đang giao":
                                                    echo "<font color='blue'>$a</font>";
                                                    break; 
                                                case "đã giao":
                                                    echo "<font color='green'>$a</font>";
                                                    break;
                                            }
                                        ?>
                                        </td>
                                        <td width="50px">
			                            	<a class="btn btn-default" data-toggle="modal" data-target="#<?= $row["id"] ?>"><em class="fa fa-pencil"></em></a>
                            			</td>
                                    </tr>
                                    <div class="modal fade" id="<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="width: 200px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <b style="font-size: 15px">Edit order <?= $row["id"] ?></b>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <input class="form-check" type="radio" name="cstatus" value="chưa giao" <?php if($row["status"]=="chưa giao") echo "checked='checked'" ?>> chưa giao<br>
                                                        <input class="form-check" type="radio" name="cstatus" value="đang giao" <?php if($row["status"]=="đang giao") echo "checked='checked'" ?>> đang giao<br>
                                                        <input class="form-check" type="radio" name="cstatus" value="đã giao" <?php if($row["status"]=="đã giao") echo "checked='checked'" ?>> đã giao<br>
                                                        <div align="right">
                                                            <input type="submit" value="Save" class="btn btn-primary" align="right">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <ul class="pagination pull-right">
                              <?php
                                $curPage1 = $status1/$limit1 + 1;
                                if($curPage1!=1) {
                              ?>
                              <li><a href="?pageOA=<?= $curPage1-1 ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                              <?php 
                                    }
                                    $SL_SP1=mysqli_num_rows(mysqli_query($connect,"select * from `order` where status!='chờ duyệt'"));
                                    if($SL_SP1/$limit1>1){
                                    for ($i=1;$i<=ceil($SL_SP1/$limit1);$i++) {
                               ?>
                              <li <?php if($i==$curPage1) echo 'class="active"' ?>><a href="?pageOA=<?= $i ?>"><?= $i ?></a></li>
                              <?php
                                    }
                                }
                                if($curPage1!=ceil($SL_SP1/$limit1 && ceil($SL_SP1/$limit1)!=0)) {
                              ?>
                              <li><a href="?pageOA=<?= $curPage1+1 ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                              <?php
                                }
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
