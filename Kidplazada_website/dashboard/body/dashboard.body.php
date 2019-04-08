<?php if(!isset($bodypage)) header(("Location: ../dashboard.php")) ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div>New Orders</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Detail</th>
                                        <th>Delivery address</th>
                                        <th style="width: 100px">Time order</th>
                                        <th>Delivery time</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $status=0;
                                        $limit=5;
                                        if (isset($_GET["pageNO"])) $status=($_GET["pageNO"]-1)*$limit;
                                        $table=mysqli_query($connect,"select * from `order` where status='chờ duyệt' limit $status, $limit");
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row["username"] ?></td>
                                        <td>
                                            <?php
                                                $detail=$row["id"];
                                                $table2=mysqli_query($connect,"select product.name ,orderdetail.count, product.count as proCount from orderdetail, product where orderID=$detail and orderdetail.product=product.id");
                                                while ($row2 = mysqli_fetch_array($table2))
                                                {
                                            ?>
                                                <?= $row2["name"] ?>, SL<b>:</b> <?= $row2["count"] ?>, Tồn: <?= $row2["proCount"] ?><br>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?= $row["deliveryAddress"] ?></td>
                                        <td><?= $row["orderTime"] ?></td>
                                        <td><?= $row["deliveryDays"] ?></td>
                                        <td width="150px">
                                            <a class="btn btn-default" data-toggle="modal" data-target="#<?= $row["id"] ?>"><em class="fa fa-pencil"></em></a>
			                            	<a class="btn btn-success" href="process.php?update=<?= $row["id"] ?>&cmd=update `order` set status='chưa giao' where id=<?= $row["id"] ?>&selfpage=dashboard.php"><em class="fa fa-check"></em></a>
			                            	<a class="btn btn-danger" href="process.php?cmd=delete from `order` where id='<?= $row["id"] ?>';delete from orderdetail where orderID='<?= $row["id"] ?>'&selfpage=dashboard.php"><em class="fa fa-trash"></em></a>
                            			</td>
                                    </tr>
                                    <div class="modal fade" id="<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="width: 150px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <b style="font-size: 15px">Delivery day</b>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <input class="form-control" type="text" name="cday" value="<?= $row["deliveryDays"] ?>"><br>
                                                        <div align="right">
                                                            <input type="submit" value="Save" class="btn btn-primary" align="right" name="save">
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
                                $curPage = $status/$limit + 1;
                                if($curPage!=1) {
                              ?>
                              <li><a href="?pageNO=<?= $curPage-1 ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                              <?php 
                                    }
                                    $SL_SP=mysqli_num_rows(mysqli_query($connect,"select * from `order` where status='chờ duyệt'"));
                                    if($SL_SP/$limit>1){
                                    for ($i=1;$i<=ceil($SL_SP/$limit);$i++) {
                               ?>
                              <li <?php if($i==$curPage) echo 'class="active"' ?>><a href="?pageNO=<?= $i ?>"><?= $i ?></a></li>
                              <?php
                                    }
                                }
                                if($curPage!=ceil($SL_SP/$limit) && ceil($SL_SP/$limit)!=0) {
                              ?>
                              <li><a href="?pageNO=<?= $curPage+1 ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                              <?php
                                }
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>