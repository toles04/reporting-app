<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">users</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>
                
                <?php

                    $user_name = "";
                    $location = "";
                    $oca = "";
                    $agm = "";
                    $rank = "";
                    $telephone = "";

                    if($users){

                        foreach($users as $user){

                            $user_name = $user['user'];
                            $location = $user['location'];
                            $oca = $user['operation_coverage_area'];
                            $agm = $user['agm_designate'];
                            $rank = $user['rank'];
                            $telephone = $user['phone_no'];

                        }

                    }


                ?>
            
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo $form_title; ?></h3>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <?php echo form_open($action);?>

                                      <div class="form-group">
                                        <label for="user_name">First Name:</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name; ?>">
                                        <?php echo form_error('user_name');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="user_name">Last Name:</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name; ?>">
                                        <?php echo form_error('user_name');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="location">Email:</label>
                                        <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>">
                                        <?php echo form_error('location');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="tel">Telephone NO:</label>
                                        <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $telephone; ?>">
                                        <?php echo form_error('tel');?>
                                      </div>
                                      
                                      <button type="submit" class="btn btn-success">Submit</button>

                                      

          
                                        
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                   
                    <!-- /.col -->
                </div>
            </div>