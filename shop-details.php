<?php include('header.php') ?>

<style>
    .bg-color {
        background-color:#9e4203;
    }
</style>

<?php 
    $sqlp=mysqli_query($conn,"select * from product where id='".$_GET['id']."'");
    $resultp=mysqli_fetch_assoc($sqlp);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container bg-top">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                           <?php echo $resultp['name']; ?>
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.php">Home</a><span class="delimiter"></span><a href="shop.php">Shop</a><span class="delimiter"></span><?php echo $resultp['name']; ?>
                    </div>
                </div>
            </div>

            <div id="content" class="site-content" role="main">
                <div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">	
                    <div class="product-top-info">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="row">
                                    <div class="product-images col-lg-7 col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="content-thumbnail-scroll">
                                                    <div class="image-thumbnail slick-carousel slick-vertical" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="5" data-columns3="4" data-columns2="4" data-columns1="4" data-columns="4" data-nav="true" data-vertical="&quot;true&quot;" data-verticalswiping="&quot;true&quot;">
                                                        
                                                        <?php 
                                                            $sql1=mysqli_query($conn,"select * from product_image where pid='".$_GET['id']."'");
                                                            while($result1=mysqli_fetch_assoc($sql1)){
                                                        ?>
                                                        <div class="img-item slick-slide">
                                                            <span class="img-thumbnail-scroll">
                                                                <img width="600" height="600" src="product/<?php echo $result1['image']; ?>" alt="">
                                                            </span>
                                                        </div>
                                                    <?php } ?>
                                                        <!-- <div class="img-item slick-slide">
                                                            <span class="img-thumbnail-scroll">
                                                                <img width="600" height="600" src="media/product/1-2.jpg" alt="">
                                                            </span>
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <span class="img-thumbnail-scroll">
                                                                <img width="600" height="600" src="media/product/2.jpg" alt="">
                                                            </span>
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <span class="img-thumbnail-scroll">
                                                                <img width="600" height="600" src="media/product/2-2.jpg" alt="">
                                                            </span>
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <span class="img-thumbnail-scroll">
                                                                <img width="600" height="600" src="media/product/3.jpg" alt="">
                                                            </span>
                                                        </div> -->


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="scroll-image main-image">
                                                    <div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
                                                        <?php 
                                                            $sql2=mysqli_query($conn,"select * from product_image where pid='".$_GET['id']."'");
                                                            while($result2=mysqli_fetch_assoc($sql2)){
                                                        ?>

                                                        <div class="img-item slick-slide">
                                                            <img width="900" height="900" src="product/<?php echo $result2['image']; ?>" alt="" title="">
                                                        </div>
                                                    <?php } ?>


                                                        <!-- <div class="img-item slick-slide">
                                                            <img width="900" height="900" src="media/product/1-2.jpg" alt="" title="">
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <img width="900" height="900" src="media/product/2.jpg" alt="" title="">
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <img width="900" height="900" src="media/product/2-2.jpg" alt="" title="">
                                                        </div>
                                                        <div class="img-item slick-slide">
                                                            <img width="900" height="900" src="media/product/3.jpg" alt="" title="">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-info col-lg-5 col-md-12 col-12 ">
                                        <h1 class="title"><?php echo $resultp['name']; ?></h1>
                                        <span class="price">
                                       
                                            <ins><span>$<?php echo $resultp['price']; ?></span></ins>
                                        </span>
                                     
                                        <div class="description">
                                            <?php echo $resultp['description']; ?>
                                        </div>
                                     
                                        <div class="buttons">
                                            <div class="add-to-cart-wrap">
                                                <div class="quantity">
                                                    <button type="button" class="plus">+</button>
                                                    <input type="number" id="qty" class="qty" step="1" min="0" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                    <button type="button" class="minus">-</button>
                                                    <input type="hidden" id="price" value="<?php echo $resultp['price']; ?>" >
                                                    <input type="hidden" id="pid" value="<?php echo $resultp['proid']; ?>" >
                                                    
                                                    <?php
                                                        if(!empty($_SESSION['userdata']['userid'])){
                                                    ?>
                                                    <input type="hidden" id="userid" value="<?php echo $_SESSION['userdata']['userid']; ?>" >
                                                    
                                                    <?php }else{?>   
                                                    
                                                    <input type="hidden" id="userid" value="guest" >
                                                    
                                                    <?php } ?>
                                                    
                                                </div>
                                                <button class="btn btn-primary add-to-cart" type="button" onclick="add_cart();" >Add to cart</button>
                                                <!--<div class="btn-add-to-cart">-->
                                                <!--    <a href="#" tabindex="0" onclick="add_to_cart()">Add to cart</a>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                        <div class="product-meta">
                                            <!--<span class="sku-wrapper">SKU: <span class="sku">D2300-3-2-2</span></span>-->
                                            
                                            <?php
                                                $sql1=mysqli_query($conn,"select * from product_category where id='".$resultp['catid']."' ");
                                                $cat=mysqli_fetch_assoc($sql1);
                                            ?>    
                                            
                                            <span class="posted-in">Category: <a href="shop.php?cat=<?=$cat['id']?>" rel="tag"><?=$cat['category_name']?></a></span>
                                           
                                        </div>
                                        <!-- <div class="social-share">
                                            <a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="fa fa-facebook"></i>Facebook</a>
                                            <a href="#" title="Twitter" class="share-twitter"><i class="fa fa-twitter"></i>Twitter</a>
                                            <a href="#" title="Pinterest" class="share-pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="product-tabs-wrap">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#additional-information" role="tab">Additional information</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                                            <?php echo $resultp['long_description']; ?>
                                        </div>
                                        <div class="tab-pane fade" id="additional-information" role="tabpanel">
                                        <?php echo $resultp['additional_info']; ?>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-related">
                        <div class="section-padding">
                            <div class="section-container p-l-r">
                                <div class="block block-products slider">
                                    <div class="block-title"><h2>Recent Products</h2></div>
                                    <div class="block-content">
                                        <div class="content-product-list slick-wrap">
                                            <div class="slick-sliders products-list grid" data-slidestoscroll="true" data-dots="false" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="3" data-columns1="3" data-columns1440="4" data-columns="4">
                                                

                                                <?php 
                                                            $sql4=mysqli_query($conn,"select * from product");
                                                            while($result4=mysqli_fetch_assoc($sql4)){
                                                        ?>

                                                <div class="item-product slick-slide">
                                                    <div class="items">
                                                        <div class="products-entry clearfix product-wapper">
                                                            <div class="products-thumb">

                                                                <div class="product-thumb-hover">
                                                                    <a href="shop-details.php?id=<?php echo $result4['id']; ?>">
                                                                        <img width="600" height="600" src="product/<?php echo $result4['image']; ?>" class="post-image" alt="">
                                                                        <img width="600" height="600" src="product/<?php echo $result4['image']; ?>" class="hover-image back" alt="">
                                                                    </a>
                                                                </div>		
                                                                
                                                            </div>
                                                            <div class="products-content">
                                                                <div class="contents text-center">
                                                                    <h3 class="product-title"><a href="shop-details.php?id=<?php echo $result4['id']; ?>">Medium Flat Hoops</a></h3>
                                                                    
                                                                    <span class="price">$<?php echo $result4['price']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>

                                                
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
 <script type="text/javascript">
        
        function add_cart(){
            
        //   alert("ok");
            var price = document.getElementById("price").value;
            var pid = document.getElementById("pid").value;
            var qty = document.getElementById("qty").value;
            var ip = document.getElementById("ipaddress").value;
            var userid = document.getElementById("userid").value;

            // alert(userid);
            // alert(pid);
            // alert(qty);
            // alert(ip);
            // die();

            $.ajax({
                    type:'POST',
                    url:'cartid.php',

                    data:{pid:pid,qty:qty,ip:ip,price:price,userid:userid},
                    success:function(data){

                     // alert(data);
                       

                    swal("Your item has been added to the cart", "", "success");
                    
                    // $('#thisdiv').load(document.URL + ' #thisdiv');
                    // $('#thisdiv12').load(document.URL + ' #thisdiv12');
                    
                    window.location.href='cart.php';
                    
                    },
                    error:function(res)
                    {
                        alert("error");
                    }

                });

        }
        
        
        
        //     function add_cart1(){
            
           
        //         var price = document.getElementById("price").value;
        //         var pid = document.getElementById("pid").value;
        //         var qty = document.getElementById("qty").value;
        //         var ip = document.getElementById("userip").value;
        //         var userid = document.getElementById("userid").value;

        //     alert(pid);
        //     alert(qty);
        //     alert(ip); die();

        //     $.ajax({
        //             type:'POST',
        //             url:'cartid1.php',

        //             data:{pid:pid,qty:qty,ip:ip,price:price,userid:userid},
        //             success:function(data){

        //              // alert(data);
                       

        //             swal("Your item has been added to the cart", "", "success");
                    
        //             // $('#thisdiv').load(document.URL + ' #thisdiv');
        //             // $('#thisdiv12').load(document.URL + ' #thisdiv12');
                    
        //             window.location.href='cart.php';
                    
        //             },
        //             error:function(res)
        //             {
        //                 alert("error");
        //             }

        //         });

        // }

    </script>