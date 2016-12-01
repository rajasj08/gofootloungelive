<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
<div class="row">

<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>
<?php endif; ?> 

<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
	<div id="content">
		<?php echo $content_top; ?> 
		<h1><?php echo $heading_title; ?></h1>
		
		<table class="list">
			<thead>
				<tr>
					<td class="left" colspan="2"><?php echo $text_return_detail; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left new_return_td">
						<b><?php echo $text_return_id; ?></b> #<?php echo $return_id; ?><br />
						<b><?php echo $text_date_added; ?></b> <?php echo $date_added; ?>
					</td>
					<td class="left new_return_td">
						<b><?php echo $text_order_id; ?></b> #<?php echo $order_id; ?><br />
						<b><?php echo $text_date_ordered; ?></b> <?php echo $date_ordered; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<h2><?php echo $text_product; ?></h2>
		
		<table class="list">
			<thead>
				<tr>
					<td class="left new_returninfo_td"><?php echo $column_product; ?></td>
					<td class="left new_returninfo_td"><?php echo $column_model; ?></td>
					<td class="right new_returninfo_td"><?php echo $column_quantity; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left"><?php echo $product; ?></td>
					<td class="left"><?php echo $model; ?></td>
					<td class="right"><?php echo $quantity; ?></td>
				</tr>
			</tbody>
		</table>
		
		
		<table class="list">
			<thead>
				<tr>
					<td class="left new_returninfo_td"><?php echo $column_reason; ?></td>
					<td class="left new_returninfo_td"><?php echo $column_opened; ?></td>
					<td class="left new_returninfo_td"><?php echo $column_action; ?></td>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td class="left"><?php echo $reason; ?></td>
						<td class="left"><?php echo $opened; ?></td>
						<td class="left"><?php echo $action; ?></td>
					</tr>
			</tbody>
		</table>
  
  
  
		<?php if ($comment) { ?>
		<table class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $text_comment; ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="left"><?php echo $comment; ?></td>
				</tr>
			</tbody>
		</table>
		<?php } ?>
		
		
		<?php if ($histories) { ?>
			<h2><?php echo $text_history; ?></h2>
			<table class="list">
				<thead>
					<tr>
						<td class="left new_returninfo_td"><?php echo $column_date_added; ?></td>
						<td class="left new_returninfo_td"><?php echo $column_status; ?></td>
						<td class="left new_returninfo_td"><?php echo $column_comment; ?></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($histories as $history) { ?>
						<tr>
							<td class="left"><?php echo $history['date_added']; ?></td>
							<td class="left"><?php echo $history['status']; ?></td>
							<td class="left"><?php echo $history['comment']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?>
		
		
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
		</div>
		<?php echo $content_bottom; ?>
	</div>
 </section> 
 
 
<?php if( $SPAN[2] ): ?>
<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
	<?php echo $column_right; ?>
</aside>
<?php endif; ?>

</div></div>
    <script type="text/javascript"> 
var google_tag_params = { 
ecomm_prodid: "",
ecomm_pagetype: "<?php echo $heading_title; ?>",
ecomm_totalvalue:"", 
}; 
 
</script> 

<?php echo $footer; ?>