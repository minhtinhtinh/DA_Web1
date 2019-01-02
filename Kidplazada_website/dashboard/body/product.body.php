<?php if(!isset($bodypage)) header(("Location: ../product.php")) ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <a data-toggle="modal" data-target="#addForm" class="btn btn-primary" style="float: right">Add product</a>
                        <a data-toggle="modal" data-target="#addimage" class="btn btn-success" style="float: right;margin-right:10px">Upload image</a>
                        <?php
                            if(isset($_SESSION["upimage"])){
                                $img=$_SESSION["upimage"];
                                echo "<img src='../homepage/$img' height='40px' width='40px' style='float: right;margin-right:10px'>";
                            }
                        ?>
                    </h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div>Setting</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Producer</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Nation</th>
                                        <th>Count</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $status=0;
                                        $limit=5;
                                        if (isset($_GET["page"])) $status=($_GET["page"]-1)*$limit;
                                        $table=mysqli_query($connect,"select * from product limit $status, $limit");
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row["id"] ?></td>
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["category"] ?></td>
                                        <td><?= $row["producer"] ?></td>
                                        <td><?= $row["description"] ?></td>
                                        <td><img src="../homepage/<?= $row["image"] ?>" width="50px" height="50px"></td>
                                        <td><?= $row["price"] ?></td>
                                        <td><?= $row["nation"] ?></td>
                                        <td><?= $row["count"] ?></td>
                                        <td width="100px">
			                            	<a class="btn btn-default" data-toggle="modal" data-target="#<?= $row["id"] ?>"><em class="fa fa-pencil"></em></a>
			                            	<a class="btn btn-danger" href="process.php?cmd=delete from product where id='<?= $row["id"] ?>'&selfpage=product.php&delimage=<?= $row["image"] ?>"><em class="fa fa-trash"></em></a>
                            			</td>
                                    </tr>
                                    <div class="modal fade" id="<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="width: 400px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <b style="font-size: 15px">Edit Product <?= $row["id"] ?></b>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <div><input class="form-control" type="text" name="cid" value="<?= $row["id"] ?>"></div><br>
                                                        <div><input class="form-control" type="text" name="cname" value="<?= $row["name"] ?>"></div><br>
                                                        <div><input class="form-control" type="text" name="ccategory" value="<?= $row["category"] ?>" style="float: left;width: 60px">
                                                        <input class="form-control" type="text" name="cproducer" value="<?= $row["producer"] ?>" style="margin-left:20px;float: left;width: 60px">
                                                        <input class="form-control" type="text" name="ccount" value="<?= $row["count"] ?>" style="margin-left:20px;float: left;width: 60px">
                                                        <input class="form-control" type="text" name="cprice" value="<?= $row["price"] ?>" style="float: right;width: 130px"></div><br><br>
                                                        <div><textarea class="form-control" name="cdescription" rows="5"><?= $row["description"] ?></textarea></div><br>
                                                        <div>
                                                            <input class="form-check" type="radio" name="cimage" value="<?= $row["image"] ?>" checked="checked"> origin image
                                                            <input class="form-check" type="radio" name="cimage" value="1" style="margin-left:10px"> upload image
                                                        </div><br>
                                                        <div><input class="form-control" type="text" name="cnation" value="<?= $row["nation"] ?>"></div><br>
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
                              <li><a href="?page=<?= $curPage-1 ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                              <?php 
                                    }
                                    $SL_SP=mysqli_num_rows(mysqli_query($connect,"select * from product"));
                                    if($SL_SP/$limit>1){
                                    for ($i=1;$i<=ceil($SL_SP/$limit);$i++) {
                               ?>
                              <li <?php if($i==$curPage) echo 'class="active"' ?>><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                              <?php
                                    }
                                }
                                if($curPage!=ceil($SL_SP/$limit) && ceil($SL_SP/$limit)!=0) {
                              ?>
                              <li><a href="?page=<?= $curPage+1 ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
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
<div class="modal fade" id="addimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 400px">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 15px">Upload image</b>
                </div>
                <div class="modal-body" style="height: 70px">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                        <input class="custom-file-input" type="file" name="nimage" style="float: left">
                        <input class="btn btn-success" type="submit" name="upload" value="Tải lên" style="float:left; margin-left:10px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 400px">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 15px">Add product</b>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div><input class="form-control" type="text" name="nid" placeholder="new product id"></div><br>
                        <div><input class="form-control" type="text" name="nname" placeholder="name"></div><br>
                        <div><input class="form-control" type="text" name="ncategory" placeholder="category" style="float: left;width: 100px">
                        <input class="form-control" type="text" name="nproducer" placeholder="producer" style="margin-left:10px;float: left;width: 100px">
                        <input class="form-control" type="text" name="ncount" placeholder="count" style="float: right;width: 150px"></div><br><br>
                        <div><textarea class="form-control" name="ndescription" rows="5" placeholder="description..."></textarea></div><br>
                        <div><input class="form-control" type="text" name="nnation" placeholder="nation" style="float: left;width: 230px">
                        <input class="form-control" type="text" name="nprice" placeholder="price" style="float: right;width: 130px"></div><br><br>
                        <div align="right">
                            <input type="submit" value="Add" class="btn btn-primary" align="right" name="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>