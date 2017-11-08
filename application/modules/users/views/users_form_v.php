<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">users</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>
                
                <?php

                    $first_name = "";
                    $last_name = "";
                    $email = "";
                    $telephone = "";
                    $password = "";
                    $confirm_password = "";
                    $zone = "";

                    if($users){

                        foreach($users as $user){

                            $first_name = $user['first_name'];
                            $first_name = $user['last_name'];
                            $email = $user['email'];
                            $telepnone = $user['telephone'];
                            $zone = $user['zone_id'];
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
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="location">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="tel">Telephone NO:</label>
                                        <input type="tel" class="form-control" id="tel" name="telephone" value="<?php echo $telephone; ?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label for="tel">Password:</label>
                                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $telephone; ?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label for="tel">Confirm Password:</label>
                                        <input type="text" class="form-control" id="confifrm_password" name="confirm_password" value="<?php echo $telephone; ?>">
                                        
                                      </div>
                                      <div class="form-group">
                                        <label for="zone">Zone</label>
                                        <input type="text" class="form-control" id="zone" name="zone" value="<?php echo $zone; ?>">
                                        
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