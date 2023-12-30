<?php include('header.php') ?>
<style>
    .bg-color {
        background-color:#9e4203;
    }
</style>





<?php
    if(isset($_POST['check'])){
      
      $email=$_POST['email'];
      
      $url="https://". $_SERVER['HTTP_HOST'];    
        
      $new_url=$url.'/jewellery2/recover-password.php?email='.$email;    

        
        $sql=mysqli_query($conn,"select * from user where (email='$email')");
        $user=mysqli_fetch_assoc($sql);
        
        $name=$user['name'];
        
        if(!empty($user)){
            
            $otp=rand(0000,9999);
            $sql=mysqli_query($conn,"update user set otp='".$otp."' where email='".$email."' ");
            
            
            $to = $email;
            $subject = "Passowrd Recovery";
            
            $message = "
                Hello , $name <br>
                
                Your OTP: $otp <br>
                
                Your password reset link is : $new_url <br>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";
            
            mail($to,$subject,$message,$headers);
        
            
            
            ?>
                    <script>
                          swal("Check your email for OTP and recovery link", "", "success");
                          window.location.href='index.php';
                    </script>
            <?php
            
            
            
        }else{
            
                   
            ?>
                    <script>
                          swal("No email found , please check your email", "", "error");
                        //   window.location.href='index.php';
                    </script>
            <?php
            
        }
        
    }
?>







<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
      

            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="page-login-register">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-8 col-md-8 col-sm-12 sm-m-b-50">
                                    <div class="box-form-login">
                                        <h2>Recover Password</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                
                                                
                                                <form method="POST" class="login">
                                                
                                                    <div class="username">
                                                        <label>Enter Your Email Address <span class="required">*</span></label>
                                                        <input type="email" class="input-text" name="email" id="username">
                                                    </div>
                                                    
                                                
                                      
                                                    
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="check" value="check"> 
                                                    </div>
                                                    
                                                  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>

<?php include('footer.php') ?>