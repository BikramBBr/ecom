<?php include('header.php') ?>
<style>
    .bg-color {
        background-color:#9e4203;
    }
</style>


<?php

    if(!empty($_SESSION['userdata'])){

             ?>
                    <script>
                          window.location.href='index.php';
                    </script>
            <?php        
        
    }

?>



<?php
    if(isset($_POST['login'])){
      
      $email=$_POST['email'];
      $password=$_POST['password'];
        
        $sql=mysqli_query($conn,"select * from user where (email='$email' and password='$password')");
        $user=mysqli_fetch_assoc($sql);
        
        if(!empty($user)){
            
            $ipaddress = $_SERVER['REMOTE_ADDR'];
            
            $_SESSION['userdata']=$user;
            
            $sql=mysqli_query($conn,"update cart set userid='".$_SESSION['userdata']['userid']."' where ip='".$ipaddress."' ");
            
            ?>
                    <script>
                          swal("User Login Successfully Done , Please Log In", "", "success");
                          window.location.href='index.php';
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
                                        <h2>Login</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                
                                                
                                                <form method="POST" class="login">
                                                
                                                    <div class="username">
                                                        <label>Email address <span class="required">*</span></label>
                                                        <input type="email" class="input-text" name="email" id="username">
                                                    </div>
                                                    
                                                    <div class="password">
                                                        <label for="password">Password <span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="password">
                                                    </div>
                                                    
                                                    
                                                    <div class="rememberme-lost">
                                                        
                                                        <div class="lost-password">
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="login" value="Login"> 
                                                    </div>
                                                    
                                                    
                                                    <div class="top">
                                                        <a href="register.php">Create An Account | </a>
                                                         <a href="forgot-password.php" class="pass">Forgot password?</a> 
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