<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Offences</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>
                
                <?php

                    $offence_name = "";
                    $fine = "";

                    if($offences){

                        foreach($offences as $offence){

                            $offence_name = $offence['offence'];
                            $fine = $offence['fine'];
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
                                        <label for="offence_name">offence:</label>
                                        <input type="text" class="form-control" id="offence_name" name="offence_name" value="<?php echo $offence_name; ?>">
                                        <?php echo form_error('offence_name');?>
                                      </div>
                                      <div class="form-group">
                                        <label for="fine">Fine:</label>
                                        <input type="text" class="form-control" id="fine" name="fine" value="<?php echo $fine; ?>">
                                        <?php echo form_error('fine');?>
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