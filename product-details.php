<?php
	include("db.php");
	
	$prodID = $_GET['prodid'];

	if(!empty($prodID)){
		$sqlSelectSpecProd = mysql_query("select * from products where id = '$prodID'") or die(mysql_error());
		$getProdInfo = mysql_fetch_array($sqlSelectSpecProd);
		$productId= $getProdInfo["ID"];
		$prodname= $getProdInfo["Product"];
		$prodcat = $getProdInfo["Category"];
		$prodBrand = $getProdInfo["brand"];
		$prodprice = $getProdInfo["Price"];
		$proddesc = $getProdInfo["Description"];
		$prodimage = $getProdInfo["imgUrl"];
		$maxQty = $getProdInfo["qty"];

				}
?>
<?php include('include/home/header.php'); ?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php include('include/home/sidebar.php'); ?>
				
                
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                            
						
							<img src="reservation/img/products/<?php echo $prodimage; ?>" />	
                                
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
							<h2 class="product"><?php echo $prodname; ?></h2>
                            <input type="hidden" class="maxQty" id="maxQty" value="<?php echo $maxQty; ?>">
                            <input type="hidden" class="productId" id="productId" value="<?php echo $productId; ?>">
                            <input type="hidden" class="productBrand" id="productBrand" value="<?php echo $prodBrand; ?>">
                            <input type="hidden" class="productCategory" id="productCategory" value="<?php echo $prodcat; ?>">
								<p>Category: <?php echo $prodcat; ?></p>
                                <?php if ($prodBrand != ''){ ?>
								<p>Brand: <?php echo $prodBrand; ?></p>
				                <?php } ?>
								<p>Price: <span class="price"><?php echo $prodprice; ?></span></p>
								<p>Available : <span><?php if ($maxQty <= 0){ ?><h5 style="color: red"> 0 Pcs </h5><?php }else{  echo $maxQty.' Pcs'; } ?> </span></p>


                                <br>
                                
                                <a class="btn btn-default add-to-cart" id="add-to-cart" <?php if ($maxQty <= 0){ ?>disabled <?php } ?>><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                <p class="info hidethis" style="color:red;"><strong>Product Added to Cart!</strong></p>
								<p><b>Description: </b><?php echo $proddesc; ?></p>
								<p><b>Contact Info:</b> +8801620418419</p>
								<p><b>Email:</b> email@domain.com</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
		</div>
	</section>
	
	<?php include('include/home/footer.php'); ?>