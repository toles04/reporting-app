<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">users</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active"><a href="<?php echo base_url('admin/users_create/'); ?>"><span class="fa fa-plus-circle"></span> Add User</a></li>
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
                            <h3 class="box-title">All users</h3>
                            <form action="<?php echo base_url('admin/users'); ?>" method="post">
                                <label for="search">Search</label>
                                <input type="text" name="search">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name='filter' >
                                <option value="" selected>All</option>
                                <option value="email">Email</option>
                                <option value="first_name">First Name</option>
                                <option value="last_name">Last Name</option>
                              </select>
                              <button type="submit">GO</button>
                            </form>
                            <?php echo $this->session->flashdata('msgdelete'); ?>
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>#</th>
                                            <th colspan="2">Full Name</th>
                                            <th>Email Address</th>
                                            <th>Telephone NO</th>
                                            <th>Zone</th>
                                            <th>Area</th>
                                            <th>Status</th>
                                            <th>Admin Level</th>
                                            
                                            <th colspan="2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php if ($rowz > 0)
                                                {
                                                    echo $users_table;
                                                }
                                                else
                                                {
                                                 ?>
                                                <tr>
                                                    <td colspan="7"><center>No user(s) to display</center></td>
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