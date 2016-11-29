<?php 
$span = 12/$cols; 
$active = 'latest';
$id = rand(1,9)+substr(md5($heading_title),0,3);

$themeConfig 			= $this->config->get('themecontrol');
$categoryConfig 		= array( 		
	'category_pzoom' 	=> 1,
	'show_swap_image' 	=> 0,
	'quickview' 		=> 0,
); 
$categoryConfig 		= array_merge($categoryConfig, $themeConfig );
$categoryPzoom 	    	= $categoryConfig['category_pzoom'];
$quickview 				= $categoryConfig['quickview'];
$swapimg 				= ($categoryConfig['show_swap_image'])?'swap':'';
?>


<div class="<?php echo $prefix;?> box productcarousel no-box">
	<div class="box-products slide" id="productcarousel<?php echo $id;?>">	
		<div class="box-heading">
			<span><?php echo $heading_title; ?></span>
			<em class="shapes right"></em>  
			<em class="line"></em>
		</div>
		<div class="box-content">
				
			<?php if( trim($message) ) { ?>
			<div class="module-desc wrapper"><?php echo $message;?></div>
			<?php } ?>
			
			<?php if( count($products) > $itemsperpage ) { ?>
			<div class="carousel-controls">
				<a class="carousel-control left" href="#productcarousel<?php echo $id;?>" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control right" href="#productcarousel<?php echo $id;?>" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
			<?php } ?>
			
			<div class="carousel-inner">		
				<?php
				$pages = array_chunk( $products, $itemsperpage);
				?>	
				<?php foreach ($pages as  $k => $tproducts ) {   ?>
				<div class="item <?php if($k==0) {?>active<?php } ?>">
					<?php 
					//print_r('<pre>'); print_r($tproducts); die;
					foreach( $tproducts as $i => $product ) {  $i=$i+1;?>

					<?php  	 
						$scd= $product['price'];
						$scd = preg_replace('/\D/', '', $scd);
						$scd1 = $product['special'];
						$scd1 = preg_replace('/\D/', '', $scd1);
						$sum_total =   round((($scd  - $scd1)/$scd)*100, 0);
					?>
					<?php if( $i%$cols == 1 ) { ?>
					<div class="row">
						<?php } ?>
						<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-4 col-xs-12 product-cols">
							<div class="product-block">
								<?php if ($product['thumb']) { ?>									
									<?php $product_images = $this->model_catalog_product->getProductImages( $product['product_id'] ); ?>
									<div class="image <?php echo isset($product_images[0])?$swapimg:''; ?>">

										<!-- Swap image -->
										

										<div class="flip">
										<?php if($product['quantity']<=0) { ?>
										<a href="javascript:void(0);"><span class="stockOutBg">&nbsp;</span><span class="stockOutText">Out Of Stock</span></a> 
										<?php } 
										?>

											<a href="<?php echo $product['href']; ?>" class="swap-image">
												<img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" class="front" />
												<?php 
												if( $categoryConfig['show_swap_image'] ){
													$product_images = $this->model_catalog_product->getProductImages( $product['product_id'] );
													if(isset($product_images) && !empty($product_images)) {
														$thumb2 = $this->model_tool_image->resize($product_images[0]['image'],  $this->config->get('config_image_product_width'),  $this->config->get('config_image_product_height') );
													?>	
													<img src="<?php echo $thumb2; ?>" alt="<?php echo $product['name']; ?>" class="back" />
												<?php } } ?>								
											</a>
										</div>

										<div class="product-cont">
											<?php if( $product['special'] ) {   ?>	
												<span class="product-label product-label-special">
													<span><?php echo $sum_total; ?>%</span>  								
												</span>							
											<?php } ?>
											<a href="<?php echo $product['href']; ?>"><span class="product-cont-overlay">
												&nbsp;
											</span></a>
<div class="top-contact">
											<div class="action">
												<div class="action-cont">
													<div class="cart">									
														<a title="Add to Cart" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart">
															<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md">&nbsp;</span>
															<span><?php echo $button_cart; ?></span>
														</a>										
													</div>
													<div class="quick-view">
														<?php if ($quickview) { ?>
															<a class="pav-colorbox btn btn-theme-default" href="<?php echo $this->url->link("themecontrol/product",'product_id='.$product['product_id'] );?>"><em class="fa fa-plus"></em><span><?php echo $this->language->get('quick_view'); ?></span></a>
														<?php } ?>
													</div>
													<div class="button-group">
														<div class="wishlist"> 
															<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" class="fa fa-heart product-icon">
																<?php //echo $this->language->get("button_wishlist"); ?>
															</a>
														</div>
														<div class="compare">
															<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" class="fa fa-refresh product-icon">
																<?php //echo $this->language->get("button_compare"); ?>
															</a>
														</div>
													</div>
													<div class="clrBoth">&nbsp;</div>
												</div>
												
											</div>
											</div>
										</div>	

										<?php //#2 Start fix quickview in fw?>
											

									</div>
								<?php } ?>

								<div class="product-meta">	
									<div class="left">
										<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
										<?php if ($product['price']) { ?>
										<div class="price">
											<?php if (!$product['special']) { ?>
											<?php echo $product['price']; ?>
											<?php } else { ?>
											<span class="price-old"><?php echo $product['price']; ?></span> 
											<span class="price-new"><?php echo $product['special']; ?></span>
											<?php } ?>
										</div>
										<?php } ?>
									</div>
																																					
								</div>									
							</div>
						</div>

						<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
					</div>
					<?php } ?>

					<?php } //endforeach; ?>
				</div>
				<?php } ?>
			</div>  
		</div>
	</div> 
</div>

<script type="text/javascript">
$('#productcarousel<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
</script>