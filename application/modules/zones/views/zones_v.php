<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Zones</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active"><a href="<?php echo base_url('admin/zones_create/'); ?>"><span class="fa fa-plus-circle"></span> Add Zone</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                
                <!--row -->
                <!-- /.row -->
                
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">All Zones</h3>
                            <?php echo $this->session->flashdata('msgdelete'); ?>
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>ZONE</th>
                                            <th>LOCATION</th>
                                            <th>OCA</th>
                                            <th>AGM</th>
                                            <th>RANK</th>
                                            <th>TELEPHONE</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if ($rowz > 0)
                                                {
                                                    echo $zones_table;
                                                }
                                                else
                                                {
                                                 ?>
                                                <tr>
                                                    <td colspan="7"><center>No Zone(s) to display</center></td>
                                                </tr>
                                         <?php } ?>
                                    </tbody>
                                       
                                </table>
                            </div>
                            <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">

                    <?php 
                    foreach ($links as $link)
                     {
                        echo "<li>". $link."</li>";
                     } 
                    ?>
                  </ul>
                </div>
                        </div>
                    </div>
                </div>
                
                   
                    <!-- /.col -->
                </div>
            </div>