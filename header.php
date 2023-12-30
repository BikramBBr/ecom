<?php include("connection.php"); ?>

<?php  $ipaddress = $_SERVER['REMOTE_ADDR']; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<input type="hidden" value="<?=$ipaddress?>" id="ipaddress" />


<style>
    .bg-color {
        background-color:#9e4203;
    }
</style>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		
	
		
		<!-- Dependency Styles -->
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="libs/feather-font/css/iconfont.css" type="text/css">
		<link rel="stylesheet" href="libs/icomoon-font/css/icomoon.css" type="text/css">
		<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="libs/wpbingofont/css/wpbingofont.css" type="text/css">
		<link rel="stylesheet" href="libs/elegant-icons/css/elegant.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick-theme.css" type="text/css">
		<link rel="stylesheet" href="libs/mmenu/css/mmenu.min.css" type="text/css">
        <link rel="stylesheet" href="libs/slick/css/slick.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick-theme.css" type="text/css">
		<link rel="stylesheet" href="libs/mmenu/css/mmenu.min.css" type="text/css">
		<link rel="stylesheet" href="libs/slider/css/jslider.css">
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		
		<!-- Google Web Fonts -->
		<link href="../../../fonts.googleapis.com/css2eb94.css?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<link href="../../../fonts.googleapis.com/css2ed52.css?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet">
		
		<style>
		    .search-box .dropdown .dropdown-menu {
		            right: 0;
                    left: -12rem!important;
                    width: 392px;
		    }
		   .search-box .dropdown .btn {
            background-color: transparent;
            color: #fff;
            font-size: 20px;
            padding: 0;

		    }
		    #hide-menu {
		        display:none;
		    }
		    @media only screen and (max-width: 768px) {
		         .search-box .dropdown .dropdown-menu {
		            right: 0;
                    left: -7.5rem!important;
                    width: 260px;
		    }
		    #hide-menu {
		        display:block;
		    }
		    }
		</style>
	</head>
	
	<body class="home">
		<div id="page" class="hfeed page-wrapper">
			<header id="site-header" class="site-header header-v1 color-white bg-color">
				<div class="header-mobile">
					<div class="section-padding">
						<div class="section-container">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
									<div class="navbar-header">
										<button type="button" id="show-megamenu" data-bs-toggle="collapse" data-bs-target="#menu-main-menu" class="navbar-toggle"></button>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
									<div class="site-logo">
										<a href="index.php">
										    
										    <?php
										        $sql=mysqli_query($conn,"select * from information where id=1");
										        $data=mysqli_fetch_assoc($sql);
											?>
											
											<img src="images/<?=$data['data']?>" />
											
											<!--<h1 class="text-white">LOGO</h1>-->
										</a>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
								    <div class="search-box">
												<div class="dropdown">
													<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
													<i class="fa-solid fa-magnifying-glass"></i>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">
														    
															<form method="GET" action="shop.php">
																<div class="input-group mb-3">
																	<input type="text" name="search" class="form-control" placeholder="search here" aria-label="Recipient's username" aria-describedby="button-addon2">
																	
																</div>
															</form>
															
														</a>
													
													</div>
												</div>
											</div>
									<div class="mojuri-topcart dropdown">
										<div class="dropdown mini-cart top-cart">
											<div class="remove-cart-shadow"></div>
											<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    
											     <?php

                        
                                                         if(!empty($_SESSION['userdata']['userid'])){
                                                                        
                                                            $sql=mysqli_query($conn,"select * from cart where userid='".$_SESSION['userdata']['userid']."' ");
                                                                
                                                        }else{
                                                                        
                                                            $sql=mysqli_query($conn,"select * from cart where ip='$ipaddress' ");
                                                                
                                                        }
                                                   
                                                   $cart=mysqli_num_rows($sql);
                                                   
                                                ?>   
											    
												<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count"><?=$cart?></span></div>
											</a>
											<div class="dropdown-menu cart-popup">
												<div class="cart-empty-wrap">
													<ul class="cart-list">
														<li class="empty">
															<span>No products in the cart.</span>
															<a class="go-shop" href="javascript:void(0); ">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
														</li>
													</ul>
												</div>
												<div class="cart-list-wrap">
													<ul class="cart-list ">
													 
													 
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
													 
													    
														<li class="mini-cart-item">
															<!--<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>-->
															<a href="shop-details.php?id=<?=$product['id']?>" class="product-image">
															    <img width="600" height="600" src="product/<?php echo $product['image']; ?>" alt="">
															</a>
															<a href="shop-details.php?id=<?=$product['id']?>" class="product-name"><?php echo $product['name']; ?></a>		
															<div class="quantity">Qty: <?=$top['qty']?></div>
															
															<?php $total98=$top['qty']*$product['price']?>
															
															<div class="price">$<?=$total98?></div>
														</li>
													
													
													    	<?php $total_price98+=$total98; } ?>
													
													
													</ul>
													<div class="total-cart">
														<div class="title-total">Total: </div>
														<div class="total-price"><span>$<?=$total_price98?></span></div>
													</div>
												
												
													<!--<div class="free-ship">-->
													<!--	<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>-->
													<!--	<div class="total-percent"><div class="percent" style="width:20%"></div></div>-->
													<!--</div>-->
													
													
													<div class="buttons">
														<a href="cart.php" class="button btn view-cart btn-primary">View cart</a>
														
														<?php
														    if(!empty($_SESSION['userdata'])){
														?>
														
														<a href="checkout.php" class="button btn checkout btn-default">Check out</a>
														
														<?php }else{ ?>
														
															<a href="login.php" class="button btn checkout btn-default">Check out</a>
														
														<?php } ?>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					
					
				</div>

				<div class="header-desktop">
					<div class="header-wrapper">
						<div class="section-padding">
							<div class="section-container large p-l-r">
								<div class="row">
									<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-left">
										<div class="site-logo">
											<a href="index.php">
												<!--<h1 class="text-white" style="margin-top: 16px;">LOGO</h1>-->
												
													    <?php
										        $sql=mysqli_query($conn,"select * from information where id=1");
										        $data=mysqli_fetch_assoc($sql);
											?>
											
											<img src="images/<?=$data['data']?>" />
												
											</a>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
										<div class="site-navigation">
											<nav id="main-navigation">
												<ul id="menu-main-menu" class="menu">
													<li class="level-0 menu-item">
														<a href="index.php"><span class="menu-item-text">Home</span></a>
														
													</li>
													<li class="level-0 menu-item">
														<a href="about.php"><span class="menu-item-text">About Us</span></a>
													
													</li>
													
													
													
													<!--<li class="level-0 menu-item">-->
													<!--	<a href="shop.php"><span class="menu-item-text">shop</span></a>-->
													
													<!--</li>-->
													
													
												
													
													
													
													
													<li class="level-0 menu-item menu-item-has-children">
														<a href="shop.php"><span class="menu-item-text">Shop</span></a>
														<ul class="sub-menu">

															<?php 
																$sql1=mysqli_query($conn,"select * from product_category");
																while($result1=mysqli_fetch_assoc($sql1)){
															?>
															<li class="level-1 menu-item menu-item-has-children">



																<a href="shop.php?cat=<?=$result1['id']?>"><span class="menu-item-text"><?php echo $result1['category_name']; ?></span></a>
																<?php 
																	$idc=$result1['id'];
																$sql2=mysqli_query($conn,"select * from sub_category where catid='$idc'");
																$result2=mysqli_fetch_assoc($sql2);
															?>
															<?php if(!empty($result2)){ ?>



																<ul class="sub-menu">
																	<?php 
																	$idc=$result1['id'];
																$sql2=mysqli_query($conn,"select * from sub_category where catid='$idc'");
																while($result2=mysqli_fetch_assoc($sql2)){
															?>

																	<li>
																		<a href="shop.php?subcat=<?=$result2['id']?>"><span class="menu-item-text"><?php echo $result2['name']; ?></span></a>
																	</li>

																	<?php } ?>
															
																	
																</ul>
															<?php } ?>
																
															</li>
														<?php } ?>
															
															
															<!-- <li>
																<a href="#"><span class="menu-item-text">Necklaces</span></a>
															</li>
															
															
															<li>
																<a href="#"><span class="menu-item-text">Womens</span></a>
															</li>
															
																	
															<li>
																<a href="#"><span class="menu-item-text">Pink (breast cancer awareness)</span></a>
															</li>
															<li class="level-1 menu-item menu-item-has-children">
																<a href="#"><span class="menu-item-text">Earings </span></a>
																<ul class="sub-menu">
							
																		<li>
																		<a href="#"><span class="menu-item-text">Wire </span></a>
																	    </li>
																	
																		<li>
																		<a href="#"><span class="menu-item-text">Beaded</span></a>
																	</li>
																	
																	
																</ul>
															</li> -->
														
														</ul>
													</li>
													
													
													
													
													
													
													
													
													<li class="level-0 menu-item">
														<a href="blog.php"><span class="menu-item-text">Blog</span></a>
													
													</li>
													<li class="level-0 menu-item">
														<a href="contact.php"><span class="menu-item-text">Contact</span></a>
													</li>
													
													<?php
													    if(!empty($_SESSION['userdata']['userid'])){
													 ?>
													 
													 <li class="level-0 menu-item" id="hide-menu">
														<a href="my-account.php"><span class="menu-item-text">My Account</span></a>
													</li>
													
													<li class="level-0 menu-item" id="hide-menu">
														<a href="logout.php"><span class="menu-item-text">Logout</span></a>
													</li>
													 
													 <?php }else{ ?>
													
													
													<li class="level-0 menu-item" id="hide-menu">
														<a href="login.php"><span class="menu-item-text">Login</span></a>
													</li>
													
													<?php } ?>
													
													
												</ul>
											</nav>
										</div>
									</div>

									<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 header-right">
										<div class="header-page-link">
											<!-- Search -->
											<div class="search-box">
												<div class="dropdown">
													<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
													<i class="fa-solid fa-magnifying-glass"></i>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">
														    
															<form method="GET" action="shop.php">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="search here" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
																	
																</div>
															</form>
														
														</a>
													
													</div>
												</div>
											</div>

											<!-- Login -->
											<div class="login-header icon">
											
											    <?php
												    if(!empty($_SESSION['userdata'])){
												?>
											
											    <a class="" href="my-account.php"><i class="icon-user"></i></a>
											
											    <?php }else{ ?>
											
												<a class="" href="login.php"><i class="icon-user"></i></a>
											
											    <?php } ?>
											
												<!-- <div class="form-login-register">
													<div class="box-form-login">
														<div class="active-login"></div>
														<div class="box-content">
															<div class="form-login active">
																<form id="login_ajax" method="post" class="login">
																	<h2>Sign in</h2>
																	<p class="status"></p>
																	<div class="content">
																		<div class="username">
																			<input type="text" required="required" class="input-text" name="username" id="username" placeholder="Your name"/>
																		</div>
																		<div class="password">
																			<input class="input-text" required="required" type="password" name="password" id="password" placeholder="Password"/>
																		</div>
																		<div class="rememberme-lost">
																			
																			<div class="lost_password">
																				<a href="forgot-password.html">Lost your password?</a>
																			</div>
																		</div>
																		<div class="button-login">
																			<input type="submit" class="button" name="login" value="Login"/>
																		</div>
																		<div class="button-next-reregister">Create An Account</div>
																	</div>						
																</form>
															</div>
															<div class="form-register">
																<form method="post" class="register">
																	<h2>REGISTER</h2>
																	<div class="content">
																		<div class="email">
																			<input type="email" class="input-text" placeholder="Email" name="email" id="reg_email" value=""/>
																		</div>
																		<div class="password">
																			<input type="password" class="input-text" placeholder="Password" name="password" id="reg_password"/>
																		</div>															
																		<div class="button-register">
																			<input type="submit" class="button" name="register" value="Register"/>
																		</div>
																		<div class="button-next-login">Already has an account</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<!--<div class="login-header icon">-->
											<!--    <a href="login.php">login</a>-->
											<!--</div>-->

											<!-- Wishlist -->
											
											
											<!-- Cart -->
											<div class="mojuri-topcart dropdown light">
												<div class="dropdown mini-cart top-cart">
													<div class="remove-cart-shadow"></div>
													<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													
													  <?php

                        
                                                             if(!empty($_SESSION['userdata']['userid'])){
                                                                            
                                                                $sql=mysqli_query($conn,"select * from cart where userid='".$_SESSION['userdata']['userid']."' ");
                                                                    
                                                            }else{
                                                                            
                                                                $sql=mysqli_query($conn,"select * from cart where ip='$ipaddress' ");
                                                                    
                                                            }
                                                       
                                                       $cart=mysqli_num_rows($sql);
                                                       
                                                    ?>
													
														<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count"><?=$cart?></span></div>
													</a>
													
													<div class="dropdown-menu cart-popup">
														
														<div class="cart-list-wrap">
															
															<ul class="cart-list ">
															
															<?php
                                                                    
                                                                    if(!empty($_SESSION['userdata'])){
                                                                    
                                                                    $sql=mysqli_query($conn,"select * from cart where ip='$ipaddress' and userid='".$_SESSION['userdata']['userid']."' ");
                                                                    
                                                                    }else{
                                                                    
                                                                    $sql=mysqli_query($conn,"select * from cart where ip='$ipaddress' ");
                                                                    
                                                                    }
                                                                    
                                                                    while($top=mysqli_fetch_assoc($sql)){ 
                                                                ?>
                                                                    <?php
                                                                        $run=mysqli_query($conn,"select * from product where proid='".$top['pid']."' ");
                                                                        $product=mysqli_fetch_assoc($run);  
                                                                    ?>
															
																<li class="mini-cart-item">
																	
																	<!--<a href="#" onclick="delete()"  class="remove" title="Remove this item"><i class="icon_close"></i></a>-->
																    
																     <!--<input type="hidden" id="pid" value="<?=$top['pid']?>" />-->
																	<a href="javascript:void(0); " class="product-image"><img width="600" height="600" src="product/<?=$product['image']?>" alt=""></a>
																	<a href="javascript:void(0); " class="product-name"><?=$product['name']?></a>		
																	<div class="quantity">Qty: <?=$top['qty']?></div>
																	<div class="price">$<?=$product['price']?></div>
																	
																	 <?php $total122=$top['qty']*$product['price']?>
																	
																</li>
															
															    <?php $total_price12+=$total122;  } ?>
															
															
															</ul>
															
															<div class="total-cart">
																<div class="title-total">Total: </div>
																<div class="total-price"><span>$<?=$total_price12?></span></div>
															</div>
															
															
															<div class="free-ship">
																
																
															</div>
															<div class="buttons">
															    
																<a href="cart.php" class="button btn view-cart btn-primary">View cart</a>
														
														<?php
														    if(!empty($_SESSION['userdata'])){
														?>
														
														<a href="checkout.php" class="button btn checkout btn-default">Check out</a>
														
														<?php }else{ ?>
														
															<a href="login.php" class="button btn checkout btn-default">Check out</a>
														
														<?php } ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>