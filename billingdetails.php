
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
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop.php">Shop</a><span class="delimiter"></span>Payment
								</div>
							</div>
						</div>
						
						<?php
						    $sql=mysqli_query($conn,"select * from user where userid='".$_SESSION['userdata']['userid']."' ");
						    $user=mysqli_fetch_assoc($sql);
						?>    
						
						
						         
                           <?php
           
                                  if(!empty($_SESSION['userdata']['userid'])){
                              
                                    $sql= mysqli_query($conn,"SELECT * FROM `billing` WHERE (userid = '".$_SESSION['userdata']['userid']."' and userip='".$ipaddress."') ORDER BY id DESC LIMIT 1");
                                    
                                  }else{
                              
                                    $sql= mysqli_query($conn,"SELECT * FROM `billing` WHERE (userid = 'guest' and userip='".$ipaddress."') ORDER BY id DESC LIMIT 1");
                                    
                                  }
                              
                                      $total=mysqli_fetch_assoc($sql);
                                      
                                    //   print_r($total);
                                      
                                      $order=$total['orderid'];
                              
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
																	<span class="input-wrapper"><input type="text" class="input-text" name="name" value="<?=$total['name']?>" required></span>
																</p>
																
																<p class="form-row form-row-first validate-required">
																	<label>Email <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="email" class="input-text" name="email" value="<?=$total['email']?>" required></span>
																</p>
																
																<p class="form-row form-row-first validate-required">
																	<label>Phone No <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="phone" value="<?=$total['phone']?>" required></span>
																</p>
															
																
																
																<p class="form-row form-row-wide">
																	<label>Address <span class="optional">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="address" value="<?=$total['address']?>" required></span>
																</p>
																
																	<p class="form-row address-field validate-required validate-postcode form-row-wide">
																	<label>Postcode / ZIP <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="pincode" value="<?=$total['pincode']?>" required>
																	</span>
																</p>
																
																<p class="form-row form-row-wide">
																	<label>Order Note </label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="note" value="<?=$total['note']?>"></span>
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
																
																<!--<button type="submit" class="button alt" name="submit" value="Proceed">Proceed</button>-->
																
																   
																
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										
										
										  <div id="paypal-button-container"></div>
										
										
									</div>
								</div>
							</div>
						</div><!-- #content -->
						
						
						
						     
                                      
                <script src="https://www.paypal.com/sdk/js?client-id=AYopHOTDUFl66XA9TRDd7zCjNPF3-oyEaKU7LLhVJYAqLWJ3sMKxgjyzEhg7Z2hKAGHR6eGLgolpcnAH&currency=USD"></script>
                              
                   
                 
                                                        

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Call your server to set up the transaction
            
             createOrder: (data, actions) => {
                                                  return actions.order.create({
                                                    purchase_units: [{
                                                      amount: {
                                                        value: '<?=$total_price3211?>' // Can also reference a variable or function
                                                      }
                                                    }]
                                                  });
                                                },

            // Call your server to finalize the transaction
            
            // onApprove: function(data, actions) {
            //     return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
            //         method: 'post'
            //     }).then(function(res) {
            //         return res.json();
            //     }).then(function(orderData) {
            //         // Three cases to handle:
            //         //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
            //         //   (2) Other non-recoverable errors -> Show a failure message
            //         //   (3) Successful transaction -> Show confirmation or thank you

            //         // This example reads a v2/checkout/orders capture response, propagated from the server
            //         // You could use a different API or structure for your 'orderData'
            //         var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

            //         if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
            //             return actions.restart(); // Recoverable state, per:
            //             // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
            //         }

            //         if (errorDetail) {
            //             var msg = 'Sorry, your transaction could not be processed.';
            //             if (errorDetail.description) msg += '\n\n' + errorDetail.description;
            //             if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
            //             return alert(msg); // Show a failure message (try to avoid alerts in production environments)
            //         }

            //         // Successful capture! For demo purposes:
            //         console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            //         var transaction = orderData.purchase_units[0].payments.captures[0];
            //         alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');


            //           var transaction_id= transaction.id;
                                                    
            //                                         // alert(transaction_id);
                                                    
            //         //  window.location.href="https://jetwebsolution.com/art-work-development/order.php?tran="+transaction_id+"&orderid=123456";
                                                    
                                                    


            //         // Replace the above to show a success message within this page, e.g.
            //         // const element = document.getElementById('paypal-button-container');
            //         // element.innerHTML = '';
            //         // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            //         // Or go to another URL:  actions.redirect('thank_you.html');
            //     });
            // }
            
            
            
             onApprove: (data, actions) => {
                                                  return actions.order.capture().then(function(orderData) {
                                                    // Successful capture! For dev/demo purposes:
                                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                                    
                                                    var transaction_id= transaction.id;
                                                    
                                                    // alert(transaction_id);
                                                    
                                                    window.location.href="https://jetwebsolution.com/jewellery2/order-success.php?tran="+transaction_id+"&orderid=<?=$order?>";
                                                    
                                                    
                                                    
                                                    // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                                    
                                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                                    // const element = document.getElementById('paypal-button-container');
                                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                                  });
                                                }
            
            

        }).render('#paypal-button-container');
    </script>
                   
                 
                 
						
						
						
						
					</div><!-- #primary -->
				</div><!-- #main-content -->
			</div>

		
		
<?php
 include('footer.php');
?>
