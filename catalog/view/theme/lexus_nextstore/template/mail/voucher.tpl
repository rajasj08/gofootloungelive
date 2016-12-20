<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $title; ?></title>
	</head>
	<body class="new_voucher_font">
		<div new_order_fontoo>
			<div class="new_voucher_margin"><a href="<?php echo $store_url; ?>" title="<?php echo $store_name; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $store_name; ?>" class="new_voucher_newstyles" /></a></div>
			<div>
				<p class="new_order_marbot"><?php echo $text_greeting; ?></p>
				<p class="new_order_marbot"><?php echo $text_from; ?></p>
				<?php if ($message) { ?>
				<p class="new_order_marbot"><?php echo $text_message; ?></p>
				<p class="new_order_marbot"><?php echo $message; ?></p>
				<?php } ?>
				<p class="new_order_marbot"><?php echo $text_redeem; ?></p>
				<p class="new_order_marbot"><a href="<?php echo $store_url; ?>" title="<?php echo $store_name; ?>"><?php echo $store_url; ?></a></p>
				<p class="new_order_marbot"><?php echo $text_footer; ?></p>
			</div>
		</div>
	</body>
</html>
