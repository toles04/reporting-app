<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Zones</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>
                
                <?php

                    $zone_name = "";
                    $location = "";
                    $oca = "";
                    $agm = "";
                    $rank = "";
                    $telephone = "";

                    if($zones){

                        foreach($zones as $zone){

                            $zone_name = $zone['zone'];
                            $location = $zone['location'];
                            $oca = $zone['operation_coverage_area'];
                            $agm = $zone['agm_designate'];
                            $rank = $zone['rank'];
                            $telephone = $zone['phone_no'];

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
                                        <label for="zone_name">Zone:</label>
                                        <input type="text" class="form-control" id="zone_name" name="zone_name" value="<?php echo $zone_name; ?>">
                                        <?php echo form_error('zone_name');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="location">Location:</label>
                                        <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>">
                                        <?php echo form_error('location');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="oca">Operational/Coverage Area:</label>
                                        <input type="text" class="form-control" id="oca" name="oca" value="<?php echo $oca; ?>">
                                        <?php echo form_error('oca');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="agm">AGM:</label>
                                        <input type="text" class="form-control" id="agm" name="agm" value="<?php echo $agm; ?>">
                                        <?php echo form_error('agm');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="rank">Rank:</label>
                                        <input type="text" class="form-control" id="rank" name="rank" value="<?php echo $rank; ?>">
                                        <?php echo form_error('rank');?>
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