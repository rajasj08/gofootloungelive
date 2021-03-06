<div class="product-list"> 
	<div class="products-block">
		<?php
		$cols = 4 ;
		$SPAN_BESTSELLERS = floor(12/$cols);
		$small = floor(12/$MAX_ITEM_ROW_SMALL);
		$mini = floor(12/$MAX_ITEM_ROW_MINI);

		//***Code did by Elakkiya start
		/*$price=array();
		foreach ($inventory as $key => $row)
		{
		    $price[$key] = $row['price'];
		}
		array_multisort($price, SORT_DESC, $inventory);*/

		//***Code did by Elakkiya end
		//print_r($discountinfoval);
		 
		$count=0;
		foreach ($products as $i => $product) { ?>

		<?php if( $i++%$cols == 0 ) {

			//if($discountinfoval==$product['discountval'])
				//{
		 ?>



		<div class="row product-items">

		<?php } ?>


		<?php  	 
			$scd= $product['price'];
			$scd = preg_replace('/\D/', '', $scd);
			$scd1 = $product['special'];
			$scd1 = preg_replace('/\D/', '', $scd1);
			$sum_total =   round((($scd  - $scd1)/$scd)*100, 0);
		?>

		<div class="col-lg-<?php echo $SPAN_BESTSELLERS;?> col-md-<?php echo $SPAN_BESTSELLERS;?> col-sm-<?php echo $SPAN_BESTSELLERS;?> col-xs-<?php echo $mini;?> product-cols">			
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
							<?php if( $product['is_newarrival'] &&  $product['is_newarrival']  != 0) {   ?>	
								<span class="product-label product-label-newarrival">
									<span>&nbsp;</span>  								
								</span>							
							<?php } ?>
							<?php if( $product['special'] ) {   ?>	
								<span class="product-label product-label-special">
									<span><?php echo $sum_total; ?>%</span>  								
								</span>							
							<?php } ?>	
							<?php if($product['quantity']<=0) { ?>
								
							<?php } else { ?>
								<a href="<?php echo $product['href']; ?>"><span class="product-cont-overlay">
									&nbsp;
								</span></a>
							<?php } ?>
								

								

							<div class="action">
								<div class="action-cont <?php if($product['quantity'] <= 0) { ?>out-of-stock<?php } ?>">
								<?php if($product['quantity'] <= 0) {  } else { ?>
									<div class="cart">									
										<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart" title="Add to Cart">
											<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md">&nbsp;</span>
											<span><?php echo $button_cart; ?></span>
										</a>										
									</div>
									<?php } ?>
									<div class="quick-view">
										<?php if ($quickview) { ?>
											<a class="pav-colorbox btn btn-theme-default" href="<?php echo $this->url->link("themecontrol/product",'product_id='.$product['product_id'] );?>"><em class="fa fa-plus"></em><span><?php echo $this->language->get('quick_view'); ?></span></a>
										<?php } ?>
									</div>
									<?php if($product['quantity'] <= 0) {  } else { ?>
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
									<?php } ?>

								</div>
								<?php if($product['quantity']<=0) { ?>
									<!--<div class="quick-view mailview" id="smailview" style=""> 
										
											<a class="btn btn-theme-default" onclick="javascript:;notifyemail('<?php echo $product['name']; ?>','<?php echo $product['href']; ?>','<?php echo $product['product_id']; ?>');" id="mainbtn" style="" title="Notify Me when In Stock"><em class="fa fa-envelope"></em><span>&nbsp;&nbsp;<?php //echo $sendmail_text; ?></span></a>
										 						 	
									</div> -->
								<?php } if($product['quantity']<=0) { ?>

								<div class="notifycls"> 
								<a onclick="javascript:;notifyemail('<?php echo $product['name']; ?>','<?php echo $product['href']; ?>','<?php echo $product['product_id']; ?>');">Notify When In Stock</a>
								</div>

								<?php } ?> 
							</div>
						</div>

					</div>
				<?php } ?>
								 
				<div class="product-meta">		  
					<div class="left">
						
						<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
								
						<?php if ($product['price']) { ?>
						<div class="price">
							<?php if (!$product['special']) { ?>
								<span class="special-price"><?php echo $product['price']; ?></span>
							<?php } else { ?>
								<span class="price-old"><?php echo $product['price']; ?></span> 
								<span class="price-new"><?php echo $product['special']; ?></span>
								<!-- <span style=" font-size:12px; font-weight: 800;color:#e55e5e">[<?php echo $sum_total; ?>% <?php echo 'OFF'; ?>]</span> -->
							<?php } ?>
							<?php if ($product['tax']) { ?>	        
								<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
							<?php } ?>
						</div>
						<?php } ?>	
					</div> 
				</div>	

				<div class="clrBoth">&nbsp;</div>		 
			</div>
		</div>
		
		<?php if( $i%$cols == 0 || $i==count($products) ) { ?>
		</div>
		<?php } ?>				
		<?php } ?>
	</div>
</div>
<div class="pagination paging clearfix"><?php echo $pagination; ?></div>