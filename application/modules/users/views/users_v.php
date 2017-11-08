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
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="box-title">All users</h3>
                                    <form action="<?php echo base_url('admin/users'); ?>" method="post" >
                                        
                                        <span class="">
                                            <label  for="inlineFormCustomSelect">By &nbsp;</label>
                                              <select id="inlineFormCustomSelect" name='filter' >  
                                                <option value="first_name" selected>First Name</option>
                                                <option value="last_name">Last Name</option>
                                                <option value="email">Email</option>
                                                <option value="zone">Zone</option>
                                              </select>
                                        </span>

                                        <span class="pull-right">
                                            <label for="search">Search
                                                <input type="text" name="search" >
                                            </label>
                                            <button type="submit" class="btn btn-success btn-sm">GO</button>
                                        </span>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12"><?php echo $this->session->flashdata('msgdelete'); ?></div>
                            </div>

                            <div class="table-responsive">
                                <table class="table-bordered table-striped table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>#</th>
                                            <th colspan="2">Full Name</th>
                                            <th>Email Address</th>
                                            <th>Telephone NO</th>
                                            <th>Zone Group</th>
                                            <th>Area</th>
                                            <th>Activation Status</th>
                                            <th>Roles/Permissions </th>
                                            
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
                                                    <td colspan="10"><center>No user(s) to display</center></td>
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