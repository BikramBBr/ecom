
<?php
 include('header.php');
?>


<?php
        if(empty($_SESSION['userdata'])){
      
            ?>
                    <script>
                        alert("User need to login first");
                        window.location.href='login.php';
                    </script>
            <?php      
            
        }
?>

<style>
    .bg-color {
        background-color:#9e4203;
    }
</style>


       <?php

    if(isset($_POST['submit'])){
        // print_r($_POST); die();

     $name = $_POST['name'];
     $address = $_POST['address'];
     $pincode  = $_POST['pincode'];
     $phone  = $_POST['phone'];
     $email  = $_POST['email'];
     $note  = $_POST['note'];
     
    //  if(!empty($_SESSION['userdata'])){
     
        $userid=$_SESSION['userdata']['userid'];
     
    //  }else{
         
    //      $userid="guest";
    //  }
     
     
     $userip=$_POST['userip'];
     
     $date = date( 'd.m.Y ' );
     
     $orderid="ORDER".rand(0000,9999);
   
   $sql="INSERT INTO  billing (orderid,name,phone,email,pincode,note,date,userid,userip,address)VALUES('$orderid','$name','$phone','$email','$pincode','$note','$date','$userid','$userip','$address')";
//   print_r($sql);die();

    $sql = mysqli_query($conn, "INSERT INTO  billing (orderid,name,phone,email,pincode,note,date,userid,userip,address)VALUES('$orderid','$name','$phone','$email','$pincode','$note','$date','$userid','$userip','$address')");
    
   

    if($sql)
    {
      echo '<script>window.location="billingdetails.php";</script>';
    }

   
 }

?>  


			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
					
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Checkout
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop.php">Shop</a><span class="delimiter"></span>Checkout
								</div>
							</div>
						</div>
						
						<?php
						    $sql=mysqli_query($conn,"select * from user where userid='".$_SESSION['userdata']['userid']."' ");
						    $user=mysqli_fetch_assoc($sql);
						?>    
						

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="shop-checkout">
									    
										<form method="POST" class="checkout" action="#" autocomplete="off">
										
										      <input type="hidden"  name="userip" value="<?=$ipaddress?>" >
										
											<div class="row">
												<div class="col-xl-8 col-lg-7 col-md-12 col-12">
													<div class="customer-details">
														<div class="billing-fields">
															<h3>Billing Details</h3>
															<div class="billing-fields-wrapper">
															
																<p class="form-row form-row-first validate-required">
																	<label>Full Name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="name" value="<?=$user['name']?>" required></span>
																</p>
																
																<p class="form-row form-row-first validate-required">
																	<label>Email <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="email" class="input-text" name="email" value="<?=$user['email']?>" required></span>
																</p>
																
																<p class="form-row form-row-first validate-required">
																	<label>Phone No <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="phone" value="<?=$user['phone']?>" required></span>
																</p>
															
																
																
																<p class="form-row form-row-wide">
																	<label>Address <span class="optional">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="address" required></span>
																</p>
																
																	<p class="form-row address-field validate-required validate-postcode form-row-wide">
																	<label>Postcode / ZIP <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="pincode" value="" required>
																	</span>
																</p>
																
																<p class="form-row form-row-wide">
																	<label>Order Note </label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="note" value=""></span>
																</p>
																
															
															
															
															</div>
														</div>
													
													</div>
											
												</div>
												<div class="col-xl-4 col-lg-5 col-md-12 col-12">
													<div class="checkout-review-order">
														<div class="checkout-review-order-table">
															<h3 class="review-order-title">Product</h3>
															
															
															<div class="cart-items">
														
														
														      <?php
                                                                    
                                                                    if(!empty($_SESSION['userdata'])){
                                                                    
                                                                    $sql=mysqli_query($conn,"select * from cart where (ip='$ipaddress' and userid='".$_SESSION['userdata']['userid']."') ");
                                                                    
                                                                    }else{
                                                                    
                                                                    $sql=mysqli_query($conn,"select * from cart where ip='$ipaddress' ");
                                                                    
                                                                    }
                                                                    
                                                                    while($top=mysqli_fetch_assoc($sql)){ 
                                                                ?>
                                                                    <?php
                                                                        $run=mysqli_query($conn,"select * from product where proid='".$top['pid']."' ");
                                                                        $product=mysqli_fetch_assoc($run);  
                                                                    ?>
														
														
														
																            <div class="cart-item">
																	<div class="info-product">
																		<div class="product-thumbnail">
																			<img width="600" height="600" src="product/<?php echo $product['image']; ?>" alt="">					
																		</div>
																		<div class="product-name">
																			<?=$product['name']?>
																			<strong class="product-quantity">QTY : <?=$top['qty']?></strong>											
																		</div>
																	</div>
																	
																	<?php $total3211=$top['qty']*$product['price']?>
																	
																	<div class="product-total">
																		<span>$<?=$total3211?></span>
																	</div>
																</div>
																
																
																
																<?php $total_price3211+=$total3211; } ?>
																
														
															</div>
															
															
															<div class="cart-subtotal">
																<h2>Subtotal</h2>
																<div class="subtotal-price">
																	<span>$<?=$total_price3211?></span>
																</div>
															</div>
															
															<div class="order-total">
																<h2>Total</h2>
																<div class="total-price">
																	<strong>
																		<span>$<?=$total_price3211?></span>
																	</strong> 
																</div>
															</div>
														</div>
														<div id="payment" class="checkout-payment">
															
															<div class="form-row place-order">
																
																<button type="submit" class="button alt" name="submit" value="Proceed">Proceed</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div><!-- #content -->
						
						
					</div><!-- #primary -->
				</div><!-- #main-content -->
			</div>

		
		
<?php
 include('footer.php');
?>
