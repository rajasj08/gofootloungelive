<?php
			/*$sum_total1=0;
			if($product['special'])
			{
				$scda= $product['orgprice'];
				$scda = preg_replace('/\D/', '', $scda);
				$scda1 = $product['special'];
				$scda1 = preg_replace('/\D/', '', $scda1);
				$sum_total1 =   round((($scda  - $scda1)/$scda)*100, 0); 
			} 
			
			if($product['orgprice'])
			{
			$scd= $product['orgprice'];
			$scd = preg_replace('/\D/', '', $scd);
			$scd1 = $product['price'];
			$scd1 = preg_replace('/\D/', '', $scd1);
			$sum_total =   round((($scd  - $scd1)/$scd)*100, 0);
			if($sum_total1 > $sum_total){$sum_total=$sum_total1-$sum_total;}
			else {$sum_total=$sum_total-$sum_total1;}
			
			}  */
			
			$sum_total1=0;
			if($product['special'])
			{
				$scda= $product['orgprice'];
				$scda = preg_replace('/\D/', '', $scda);
				$scda1 = $product['special'];
				$scda1 = preg_replace('/\D/', '', $scda1);
				$sum_total1 =   round((($scda  - $scda1)/$scda)*100, 0); 
				
				$scd= $product['special'];
				$scd = preg_replace('/\D/', '', $scd);
				$scd1 = $product['price'];
				$scd1 = preg_replace('/\D/', '', $scd1);
				$sum_total =   round((($scd  - $scd1)/$scd)*100, 0);
				$sum_total_temp =$sum_total ;
				if($sum_total1 > $sum_total){$sum_total=$sum_total1-$sum_total;}
				else {$sum_total=$sum_total-$sum_total1;}
			} 
			else {
                       
			if($product['orgprice'])    
			{
			$scd= $product['orgprice'];
			$scd = preg_replace('/\D/', '', $scd);
			$scd1 = $product['price'];
			$scd1 = preg_replace('/\D/', '', $scd1);
			$sum_total =   round((($scd  - $scd1)/$scd)*100, 0);
                        
			if($sum_total1 > $sum_total){$sum_total=$sum_total1-$sum_total;}
			else {$sum_total=$sum_total-$sum_total1;}
			$sum_total_temp =$sum_total ;
                        $sum_total_temp =$sum_total ;
			}  }
			//if(($product['countval'] % 3) == 0)
		?>
<div class="product_newpopup pro<?php echo $product['countval']; ?>">  
<div class="product-thumb transition"> 
	<div class="product-info">
		<div class="col-lg-4 col-md-4 col-sm-4 col-sm-6 margincls">
		<div class="product-block">
		<div class="left">
		<?php //if( $product['is_newarrival'] &&  $product['is_newarrival']  != 0) {   ?>	
								<span class="product-label product-label-special popupdis">
									<span><?php if($product['special']) { ?> + <?php } ?> Extra <?php echo $sum_total_temp; ?>%</span>  								
								</span>							
							<?php //} ?>

			<?php  if( $product['special'] )  { ?>          
							<span class="product-label product-label-special normaldis"><span><?php echo $sum_total1; ?>%</span></span>
						<?php } ?>
						<?php if($product['thumb']){$product['thumb']=str_replace(' ', '%20', $product['thumb']);} ?>
			<div class="image">
				<!--<a href="<?= $product['href'] ?>"> -->
				<a onclick="checkupsellproduct1('<?php echo $product['product_id'];?>','<?php echo $product['upsell_id']; ?>','<?php echo $product['upsellproduct_price']; ?>','<?php echo $product['upsellproduct_special']; ?>','<?php echo $product['main_productid']; ?>');">
				<img src="<?= $product['thumb'] ?>" alt="<?= $product['name'] ?>" title="<?= $product['name'] ?>" class="img-responsive" /></a>
			</div>
		</div>



		<div class="right">
<div class="product-meta">
			<div class="text-center">
				<h3 class="name"><a onclick="checkupsellproduct1('<?php echo $product['product_id'];?>','<?php echo $product['upsell_id']; ?>','<?php echo $product['upsellproduct_price']; ?>','<?php echo $product['upsellproduct_special']; ?>','<?php echo $product['main_productid']; ?>');"><?php echo $product['name']; ?></a></h3>	  
	    	<?php if ($product['price']) { ?>
			  	<div class="price <?php if($product['special']) { } else { echo "mynewspaceprice"; } ?>"><? //$text_price ?>
				   	<?php //if (!$product['special']) { ?>
				    	<?php //$product['price'] ?>
				    <?php //} else { ?>
				    	<span class="borderupsellcls"><!--<span class="price-old">MRP:&nbsp;<?= $product['orgprice'] ?></span> -->&nbsp;&nbsp;<?php if($product['special']) { ?><span class="popupsecialspan">Regular Price: &nbsp;<?= $product['special'] ?></span>&nbsp;<?php } else { ?><span class="popupsecialspan">Regular Price: &nbsp;<? if($product['orgprice']) echo $product['orgprice']; ?></span>&nbsp;<?php }  echo "</span> <br/>"?>

				    	 <span class="price-new pricenewspace">You Pay:&nbsp;<?= $product['price'] ?></span>
				    <?php //} ?>
				    <br />
				   
				    <?php if ($product['points']) { ?>
				    	<span class="reward"><small><?= $text_points.'&nbsp;'.$product['points'] ?></small></span><br />
				    <?php } ?>
				    <?php if ($product['discounts']) { ?>
				    <br /> 
				    <div class="discount">
				      <?php foreach ($product['discounts'] as $discount) { ?>
				      	<?php sprintf($text_discount, $discount['quantity'], $discount['price']) ?><br />
				      <?php } ?>
				    </div>
				    <?php } ?>
			  	</div>
			<?php } ?>
			
			</div>

			<!----------display option value for the product starts here-------->
			<div class="options" >

<?php 

						
						foreach ($options as $option) { ?> <!--start foreach-->


						<?php if($option['name']=='Size')
							{
								$sizecount1=count($option['option_value']);

							}  }?>
						<?php if($sizecount1 >0 ){?>
						<!---<label class="col-sm-4 control-label txttransform">Avilable Options  <label><span class="mand_field">*</span><?php //echo $text_option; ?></label> --> 
						<input type="hidden" id="nselectsize" name="nselectsize" value="0">        
						<?php } else {?>
<input type="hidden" id="nselectsize" name="nselectsize" value="-1"> 
						<?php }?>
						<?php 

						$sizecount=0;
						
						//print_r('<pre>'); print_r($this->data['options']); die;
						
						
						foreach ($options as $option) { ?> <!--start foreach-->


						<?php if($option['name']=='Size')
							{
								$sizecount=count($option['option_value']);

							}  ?>

							<?php if ($option['type'] == 'select') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>									
							<select name="option[<?php echo $option['product_option_id']; ?>]">
								<option value=""><?php echo $text_select; ?></option>
								<?php foreach ($option['option_value'] as $option_value) { ?>
								<option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
								<?php if ($option_value['price']) { ?>
								(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
								<?php } ?>
								</option>
								<?php } ?>
							</select>							
						</div>        
						<?php } ?>

						<?php if ($option['type'] == 'radio') { ?>
<?php if( $option['name'] == 'Size'){?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>						
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<div class="radio">
								<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>">
									<input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />	
									<?php echo $option_value['name']; ?>
									<?php if ($option_value['price']) { ?>
									(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
									<?php } ?>
								</label>							
							</div>
							<?php } ?>
						</div>					
						<?php }} ?>

		
		
						<?php if ($option['type'] == 'checkbox') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>						
							<?php foreach ($option['option_value'] as $option_value) { ?>
							<div class="checkbox">
								<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
									<input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
									<?php if ($option_value['price']) { ?>
									(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
									<?php } ?>
								</label>	
							</div>						
							<?php } ?>
						</div>					
						<?php }
						 ?>
			<?php if ($option['type'] == 'image') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" >

						<?php if( $product['special'] ) {   ?>	
								<!--<span class="product-label product-label-special normaldis">
									<span><?php echo $sum_total1; ?>%&nbsp;</span>  								
								</span>	-->						
							<?php } ?>	
							
							<div class="option-image">
								<span style="margin-right: 5px;">
								<?php if ($option['required']) { ?>
								<span class="required"></span>
								<?php } ?>
								<b><?php echo $option['name']; ?>:<span class="mand_field">*</span></b></span>
								<input type="hidden" id="nproductoptionid<?php echo $product['product_id']; ?>">
								<input type="hidden" id="nproductoptionvalueid<?php echo $product['product_id']; ?>">

								<select name="optionvalueinfo<?php echo $product['product_id']; ?>" id="optionvalueinfo<?php echo $product['product_id']; ?>" class="optionvalueinfo" onchange="get_radio_value1()">
								<option value="">--Select--</option>

								<?php foreach ($option['option_value'] as $option_value) {
$ps = split("<span class='WebRupee'>Rs</span>", $option_value['price']);
if($option_value['quantity'] >0 ){

 ?>
 										<option optionid="option[<?php echo $option['product_option_id']; ?>]" optionvalueid="<?php echo $option_value['product_option_value_id']; ?>" optionvaluename="<?php echo $option_value['name']; ?>" value="<?php echo $option_value['product_option_value_id']; ?>">
									<?php echo $option_value['name']; ?>
									<?php if ($option_value['price']) { ?>
									(<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
									<?php } ?>
								</option>
								<?php } ?>
								 
									<!--<span style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]"  value="<?php echo $option_value['product_option_value_id']; ?>" class="selected" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" style="position: absolute;margin-left: 27px;margin-top: 25px;opacity: 0.9; visibility: hidden;" /></span>

									<span><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>">
<div class="small-images">
<img id="test<?php echo $option_value['product_option_value_id']; ?>"  width="30" height="30" src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" class="chstyle" onclick="get_radio_value('<?php echo @$ps[1]; ?>','<?php echo $option_value['product_option_value_id']; ?>','<?php echo $option_value['name']; ?>')"/> 
</div>
</label></span>
									<span>
										<label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php //echo $option_value['name']; ?>
											<?php if ($option_value['price']) { ?>
											
											<?php } ?> 
										</label>
									</span> -->
								 
									<?php } ?> 
								</select><span class="caret caretcls" ></span>
								<span id="rid"></span>
								
							<!---	<span class="product-indv-know-your-size-cont">
									<button  class="btn btn-shopping-cart btn-cart-detail" onclick="getproperview();" data-toggle="modal" title="Know Your Foot Size">			 
				 						<span>Know Your Size</span>
									</button>
								</span> ------>

						
							<!--- <span class="screndisp">
                                <span class="product-indv-know-your-size-cont">
									<a class="btn btn-shopping-cart btn-cart-detail" href="<?php //echo $this->url->link('know-your-size-i7');?>" title="know-your-size">		
				 						<span>Know Your Size</span>
									</a>
								</span>
	</span> --> 
							</div>
						</div>
						<?php } ?>

						<?php if ($option['type'] == 'textarea') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5" class="form-control"><?php echo $option['option_value']; ?></textarea>
						</div>        
						<?php } ?>
		
		
						<?php if ($option['type'] == 'file') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none"> 
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button btn btn-theme-default">
							<input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
						</div>		
						<?php } ?>
		
						<?php if ($option['type'] == 'date') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
						</div>		
						<?php } ?>		
		
						<?php if ($option['type'] == 'datetime') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" style="display:none">
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
						</div>        
						<?php } ?>		
		
						<?php if ($option['type'] == 'time') { ?>
						<div id="option-<?php echo $option['product_option_id']; ?>" class="option form-group" >
							<?php if ($option['required']) { ?>
							<p><span class="required">*</span>
							<?php } ?>
							<b><?php echo $option['name']; ?>:</b></p>
							<input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
						</div>        
						<?php } ?>		
	 
						
					
						<?php } ?><!--end foreach-->
						<?php if($sizecount1 == 0)
						{ ?>
							<div class="option form-group stdsizecls">
						<span style="margin-right: 5px;"> <span class="required"></span> <b>Size:</b></span>
						<label>Standard Size</label>
						</div>
							<?php }?> 
						
						
  

</div>    	

			<!----------display option value for the product ends here---------->
			<input type="hidden" id="popupprodin<?php echo $product['product_id'];?>" value="<?php echo $product['product_discount_in']; ?>">
			<input type="hidden" id="popupprodval<?php echo $product['product_id'];?>" value="<?php echo $product['product_discount_value']; ?>">
			<input type="hidden" id="popupid<?php echo $product['product_id'];?>" value="<?php echo $product['upsell_id']; ?>">
			<a id="popupbutton-cart" class="button btn btn-theme-default" onclick="checkupsellproduct('<?php echo $product['product_id'];?>','<?php echo $product['upsell_id']; ?>','<?php echo $product['upsellproduct_price']; ?>','<?php echo $product['upsellproduct_special']; ?>','<?php echo $product['main_productid']; ?>');">Add To Cart</a>
			<!-- onclick="checkupsellproduct();"-->
			
    
			</div>   
		</div>
		</div>


	</div>
		<!-------show more button------------>
<?php
$testval=(int)(($product['counttotval']) / 3);
$testreval=(int)(($product['counttotval']) % 3);
if($product['counttotval'] >3) {
if(($product['countval']%3) == 0) 
{ 

	if($product['countval'] == $product['counttotval']) {
	?>
	<button type="button" class="morebtn aa" onclick="shownextdiscount1(1,'<?php echo $product['counttotval']; ?>');">&nbsp;Next &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></button>

       <button type="button" class="morebtn" onclick="shownextdiscount1('<?php if($testval >2){ echo (($testval-2)*3); } else echo 1; ?>','<?php echo $product['counttotval']; ?>');"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;Previous</button>    
	<?php } else {?>

	<button type="button" class="morebtn aa1" onclick="shownextdiscount1('<?php echo $product['countval']; ?>','<?php echo $product['counttotval']; ?>');">
&nbsp; Next &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></button>

          <button type="button" class="morebtn" onclick="shownextdiscount1('<?php if(($product['countval']%3) ==0) {  $showval=$product['countval'] - 3; if($showval==0) { if($testreval ==0 ) echo (($testval-1) * 3); else echo (($testval) * 3);} else { if($showval == 3) echo 1;  else { echo ($showval -3); } } /* if(($testval * 3)==$product['counttotval']){ echo (($testval-1) * 3); } else echo ($testval * 3); */ }  else { echo 1; } ?>','<?php echo $product['counttotval']; ?>');"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;Previous</button>    
 
<?php } ?>
<?php }  
else { 

if($product['countval'] == $product['counttotval'])
{
	$showval=$product['counttotval'] % 3;
	?>
	<button type="button" class="morebtn morepopuptop aa2" onclick="shownextdiscount1(1,'<?php echo $product['counttotval']; ?>');">&nbsp;Next &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></button>

          <button type="button" class="morebtn morepopuptop" onclick="shownextdiscount1('<?php if($testval>1){ echo (($testval-1)*3); } else echo 1; ?>','<?php echo $product['counttotval']; ?>');"><i class="fa fa-chevron-left" aria-hidden="true"></i> &nbsp;Previous</button>      
    
<?php }
}
}

?>
	</div>
</div>


</div>