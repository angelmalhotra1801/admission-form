
<script>
    $(function() {
       $(".hide").hide(5000);

    });
</script>

            <div class="form-holder" >
                <div class="form-content" style="margin-top:20px!important;">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        
                        <?php if($this->session->flashdata('unnotmatch')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-danger alert-dismissible hide"  id="danger-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Failed!</strong> <?php echo $this->session->flashdata('unnotmatch'); ?>
                              </div>
                          </div>
                          <?php } ?> 
                           <?php if($this->session->flashdata('updatepass')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-success alert-dismissible hide"  id="danger-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('updatepass'); ?>
                              </div>
                          </div>
                          <?php } ?> 
                          
                   <form action="<?php echo base_url();?>login_user" method="post" id="Mylogin">
			<form action="#" method="post" id="Mylogin">
                            <input class="form-control" type="text" name="email" placeholder="Enter email id" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                            <!-- <button  class="ibtn">Login</button> -->
			<!-- <button id="submit" type="submit" class="ibtn">Login</button> -->

              <!-- <a href="<?php echo base_url();?>forget">Forgot password?</a> -->
   <!--                         </div>-->
   <!--                     </form>-->
                     
                        <div class="page-links" style="margin-top:10px;">
                           <!-- <a href="<?php echo base_url();?>register">Register new account</a> -->
                        </div>
                         <div class="page-links" style="margin-top: 18px;margin-bottom: 20px;">
                         <a href="<?php echo base_url();?>register" style="font-weight: 900;font-size:24px;color: #931c14;"> <img src="assets/click-here.gif" width="80px;">Register new account</a>
                        </div>
                        <div>
                          <!-- <span style="color:red"> For Any Technical Query</span>&nbsp; <i class="fa fa-phone"></i> +91-9876543210 -->
                        </div>
                         <!-- <div>FessClub Helpline No:8580205490 (09 AM - 06 PM)</div> -->
                        <!-- <div>FessClub <c style='color:green'>Whatsapp No</c>:7209524047</div> -->
                         <div class="text-center" style="margin-bottom:-30px"><a href="#" style="font-size:12px;text-decoration:none;">Design & Developed By <c style="color:#eca806">Mildtrix Business Solutions Pvt. Ltd.</c></a></div> 
                    </div>
                </div>
            </div>
        <script>

        $('#Myregister').validate({
            rules: {
                contact: {
                    required: true,                    
                },
                password: {
                    required: true,
                    
                }
            }

        })
    </script> 