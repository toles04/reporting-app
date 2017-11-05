<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Offences</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active"><a href="<?php echo base_url('admin/offences_create/'); ?>"><span class="fa fa-plus-circle"></span> Add Offence</a></li>
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
                            <h3 class="box-title">All Offences</h3>
                            <?php echo $this->session->flashdata('msgdelete'); ?>
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>#</th>
                                            <th>Offence</th>
                                            <th>Fine</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if ($rowz > 0)
                                                {
                                                    echo $offences_table;
                                                }
                                                else
                                                {
                                                 ?>
                                                <tr>
                                                    <td colspan="7"><center>No Offence(s) to display</center></td>
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