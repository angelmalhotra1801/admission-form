            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register new account</h3> 
                        <?php if($this->session->flashdata('register')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-success alert-dismissible"  id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('register'); ?>
                              </div>
                          </div>
                          <?php } ?>                      
                        <form action="<?php echo base_url();?>user_register" method="post" id="Myregister">
                             
                            <input class="form-control alpha" type="text" name="name" placeholder="Full Name" style="text-transform:uppercase;font-size:13px;">
                            <input class="form-control" type="email" name="email" id="email" placeholder="E-MAIL ADDRESS" required onchange ="chkemail()" style="font-size:13px;">
                               <span id="notfound" style="color:red;display:none">EMAIL ID ALREADY REGISTERED </span>
                            <input class="form-control" type="text" name="contact" placeholder="ENTER CONTACT NUMBER" required style="font-size:13px;">
                            
                         
                            <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD" required style="font-size:13px;">
                            <input class="form-control" type="password" name="cnfpassword" placeholder="CONFIRM PASSWORD" required style="font-size:13px;">
                           <div class="form-button">
                                <button id="submit" type="submit" class="ibtn"  onclick="validfun()">Register</button>
                             <a class="btn btn-success" id="ss" style="margin: 18px 20px 20px 20px;display:none;background-color:#57d38c;color:#fff">Register</a>
                            </div>
                        </form>
                     
                        <div class="page-links" style="margin-top:5px;">
                            <a href="<?php echo base_url();?>login">Login to account</a>
                        </div>
                    </div>
                </div>
            </div>
      <script>



     function chkemail()
        {
            var email=$('#email').val();  
            $.ajax({
                type:'POST',
                data:{email:email},
                url:'<?php echo base_url();?>chkemail',
                success:function(data)
                {
                    console.log(data);
                    if(data==1)
                    { 
                          $('#submit').prop('disabled', true);
                          $('#notfound').show();
                        
                    }else {                       
                        $('#submit').prop('disabled', false);
                        $('#submit').css('pointer-events','');
                        $('#notfound').hide();
                    }
                }
            });
        }
        $('#Myregister').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                email: {
                    required: true,
                    email:true,
                },
                contact: {
                    required: true,                   
                    number: true,
                    minlength:10,
                    maxlength:10,
                },              
                password: {
                  required: true,
                  minlength : 5,
                },
                cnfpassword : {
                    minlength : 5,
                    equalTo : "#password"
                },
            },

        });
        $(".alpha").change(function(){
     var a= $(this).val();
     var alpha = /^[a-z A-Z]+$/;
     if(!alpha.test(a)){
        $(this).focus();
         $("<span style='color:red;'>Only alphabate are allowed</span>").insertAfter(this);
         // $(this).append("");
     }

     
});
    $(".num").change(function(){
        var a= $(this).val();
     var num = /^[0-9]*$/;
     if(!num.test(a)){
        $(this).focus();
         $("<span style='color:red;'>Only number are allowed</span>").insertAfter(this);
   }

     
});
    </script> 