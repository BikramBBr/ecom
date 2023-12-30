
<?php
    include('header.php');
?>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    .bg-color {
        background-color:#9e4203;
    }
    .shop-cart .cart-items tbody tr td.product-quantity .quantity .add {
    border-right: 0;
    width: 30px !important;
    height: 2.375pc;
    }
    
     .shop-cart .cart-items tbody tr td.product-quantity .quantity .drop {
    border-right: 0;
    width: 30px !important;
    height: 2.375pc;
    }
    
</style>


			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Shopping Cart
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.php">Home</a><span class="delimiter"></span><a href="shop.php">Shop</a><span class="delimiter"></span>Shopping Cart
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="shop-cart">	
										<div class="row">
											
										
											<div class="col-xl-8 col-lg-12 col-md-12 col-12">
												<form class="cart-form" action="#" method="post">
													<div class="table-responsive">
														<table class="cart-items table" cellspacing="0">
															
															<thead>
																<tr>
																	<th class="product-thumbnail">Product</th>
																	<th class="product-price">Price</th>
																	<th class="product-quantity">Quantity</th>
																	<th class="product-subtotal">Subtotal</th>
																	<th class="product-remove">&nbsp;</th>
																</tr>
															</thead>
															
															<tbody>
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
											
																<tr class="cart-item">		
																	<td class="product-thumbnail">
																		<a href="shop-details.php?id=<?=$product['id']?>">
																			<img width="600" height="600" src="product/<?php echo $product['image']; ?>" class="product-image" alt="">
																		</a>				
																		<div class="product-name">
																			<a href="shop-details.php?id=<?=$product['id']?>"><?=$product['name']?></a>								
																		</div>
																	</td>
																	<td class="product-price">
																		<span class="price">$<?=$product['price']?></span>
																	</td>
																	<td class="product-quantity">
																	    <input type="hidden" id="pid" value="<?=$top['pid']?>" />
																		<div class="quantity">
																			<button type="button" class="minus" onclick="minus('<?=$top['pid']?>')">-</button>	
																			<input type="number" id="new_qty" class="qty" step="1" min="0" max="" name="quantity" title="Qty"  placeholder="" inputmode="numeric" value="<?=$top['qty']?>" >
																			<button type="button" class="plus" onclick="add('<?=$top['pid']?>')">+</button>
																		</div>
																	</td>
																		 
																		 <?php $total12211=$top['qty']*$product['price']?>
																		 
																	<td class="product-subtotal">
																		<span>$<?=$total12211?></span>
																	</td>
																	<td class="">
																		<a href="#" onclick="del()" class="remove">×</a>								
																	</td>
																</tr>
											
													<?php $total_price1211+=$total12211; } ?>
													
															</tbody>
													
														</table>
													</div>
												</form>
											</div>
											
										
											<div class="col-xl-4 col-lg-12 col-md-12 col-12">
												<div class="cart-totals">
													<h2>Cart totals</h2>
													<div>
														
														<div class="cart-subtotal">
															<div class="title">Subtotal</div>
															<div><span>$<?=$total_price1211?></span></div>
														</div>
														
														
														<div class="order-total">
															<div class="title">Total</div>
															<div><span>$<?=$total_price1211?></span></div>
														</div>
													</div>
											
											
											    <?php
											        if(!empty($_SESSION['userdata']['userid'])){
											    ?>
													
													
													<div class="proceed-to-checkout">		
														<a href="checkout.php" class="checkout-button button">
															Proceed to checkout
														</a>
													</div>
											
											    <?php }else{ ?>
											    
											    	<div class="proceed-to-checkout">		
														<a href="#" onclick="warn()" class="checkout-button button">
															Proceed to checkout
														</a>
													</div>
											    
											    <?php } ?>
											
											
											    <script>
											        function warn(){
											            alert("User neeed to login first");
											            window.location.href='login.php';
											        }
											    </script>
											
											
												</div>
											</div>
										
										</div>
									</div>
									<div class="shop-cart-empty">
										<div class="notices-wrapper">
											<p class="cart-empty">Your cart is currently empty.</p>
										</div>	
										<div class="return-to-shop">
											<a class="button" href="shop.php">
												Return to shop		
											</a>
										</div>
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

		     <script>
                
                
                 function add(id){
                // alert("adding re");
                  var nqty = document.getElementById("new_qty").value;
                  var ip = document.getElementById("ipaddress").value;
                  var pid = id; 
                  
                //   alert(pid);
                //   alert(ip);
                //   alert(nqty);
                //   die();
                  
                   $.ajax({
                    type:'POST',
                    url:'add.php',

                        data:{pid:pid,nqty:nqty,ip:ip},
                        success:function(data){
    
                        // alert(data);
    
                        swal("product quantity increase to cart", "", "success");
                 
                    // $('#thisdiv12').load(document.URL + ' #thisdiv12');
                    
                        window.location.href='cart.php';
                    
                    },
                    error:function(res)
                    {
                        alert("error");
                    }

                });
                
            }
            
           
           
           
                function minus(id){
                // alert("adding re");
                  var nqty = document.getElementById("new_qty").value;
                  var ip = document.getElementById("ipaddress").value;
                  var pid = id;  
                  
                  
                   $.ajax({
                    type:'POST',
                    url:'minus.php',

                        data:{pid:pid,nqty:nqty,ip:ip},
                        success:function(data){
    
                        // alert(data);
    
                        swal("product quantity decrease to cart", "", "success");
                 
                    // $('#thisdiv12').load(document.URL + ' #thisdiv12');
                    
                        window.location.href='cart.php';
                    
                    },
                    error:function(res)
                    {
                        alert("error");
                    }

                });
            }
           
           
           
           
                function del(){
              
                // alert("okk");
                
               
                  var ip = document.getElementById("ipaddress").value;
                   var pid = document.getElementById("pid").value;
                //   var pid = id;  
                  
                  
                //   alert(ip);
                //   alert(pid);

                   $.ajax({
                    type:'POST',
                    url:'del.php',

                        data:{pid:pid,ip:ip},
                        success:function(data){
    
                        // alert(data);
    
                        swal("product deleted from cart", "", "success");
                 
                    // $('#thisdiv12').load(document.URL + ' #thisdiv12');
                    
                        window.location.href='cart.php';
                    
                    },
                    error:function(res)
                    {
                        alert("error");
                    }

                });
            }
           
           
           
            
        </script>



        <script>


            var QtyInput = (function () {
    var $qtyInputs = $(".qty-input");

    if (!$qtyInputs.length) {
        return;
    }

    var $inputs = $qtyInputs.find(".product-qty");
    var $countBtn = $qtyInputs.find(".qty-count");
    var qtyMin = parseInt($inputs.attr("min"));
    var qtyMax = parseInt($inputs.attr("max"));

    $inputs.change(function () {
        var $this = $(this);
        var $minusBtn = $this.siblings(".qty-count--minus");
        var $addBtn = $this.siblings(".qty-count--add");
        var qty = parseInt($this.val());

        if (isNaN(qty) || qty <= qtyMin) {
            $this.val(qtyMin);
            $minusBtn.attr("disabled", true);
        } else {
            $minusBtn.attr("disabled", false);
            
            if(qty >= qtyMax){
                $this.val(qtyMax);
                $addBtn.attr('disabled', true);
            } else {
                $this.val(qty);
                $addBtn.attr('disabled', false);
            }
        }
    });

    $countBtn.click(function () {
        var operator = this.dataset.action;
        var $this = $(this);
        var $input = $this.siblings(".product-qty");
        var qty = parseInt($input.val());

        if (operator == "add") {
            qty += 1;
            if (qty >= qtyMin + 1) {
                $this.siblings(".qty-count--minus").attr("disabled", false);
            }

            if (qty >= qtyMax) {
                $this.attr("disabled", true);
            }
        } else {
            qty = qty <= qtyMin ? qtyMin : (qty -= 1);
            
            if (qty == qtyMin) {
                $this.attr("disabled", true);
            }

            if (qty < qtyMax) {
                $this.siblings(".qty-count--add").attr("disabled", false);
            }
        }

        $input.val(qty);
    });
})();




        </script>
        	
			
			