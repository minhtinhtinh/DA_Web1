<?php if(!isset($bodypage)) header(("Location: ../category.php")) ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category<a data-toggle="modal" data-target="#addForm" class="btn btn-primary" style="float: right">Add category</a></h1>
                    
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $status=0;
                                        $limit=5;
                                        if (isset($_GET["page"])) $status=($_GET["page"]-1)*$limit;
                                        $table=mysqli_query($connect,"select * from category limit $status, $limit");
                                        while($row = mysqli_fetch_array($table))
                                        {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["description"] ?></td>
                                        <td width="100px">
			                            	<a class="btn btn-default" data-toggle="modal" data-target="#<?= $row["id"] ?>"><em class="fa fa-pencil"></em></a>
			                            	<a class="btn btn-danger" href="process.php?cmd=delete from category where id='<?= $row["id"] ?>'&selfpage=category.php"><em class="fa fa-trash"></em></a>
                            			</td>
                                    </tr>
                                    <div class="modal fade" id="<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="width: 400px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <b style="font-size: 15px">Edit category <?= $row["name"] ?></b>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <div><input class="form-control" type="text" name="cname" value="<?= $row["name"] ?>"></div><br>
                                                        <div><textarea class="form-control" name="cdescription" rows="5"><?= $row["description"] ?></textarea></div><br>
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
                                $curPage = $status/$limit + 1;
                                if($curPage!=1) {
                              ?>
                              <li><a href="?page=<?= $curPage-1 ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                              <?php 
                                    }
                                    $SL_SP=mysqli_num_rows(mysqli_query($connect,"select * from category"));
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
    <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 400px">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 15px">Add category</b>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div><input class="form-control" type="text" name="nname" placeholder="new category"></div><br>
                        <div><textarea class="form-control" name="ndescription" rows="5" placeholder="description"></textarea></div><br>
                        <div align="right">
                            <input type="submit" value="Add" class="btn btn-primary" align="right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>