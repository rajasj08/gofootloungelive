<?php 
/******************************************************
 * @package Pav Opencart Theme Framework for Opencart 1.5.x
 * @version 1.1
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Augus 2013 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/


$themeConfig = $this->config->get( 'themecontrol' );
$LANGUAGE_ID = $this->config->get( 'config_language_id' ); 
$themeName =  $this->config->get('config_template');
require_once( DIR_TEMPLATE.$this->config->get('config_template')."/development/libs/framework.php" );
$helper = ThemeControlHelper::getInstance( $this->registry, $themeName );
$helper->setDirection( $direction );

/* Add scripts files */
$helper->addScript( 'catalog/view/javascript/jquery/jquery-1.7.1.min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/ui/external/jquery.cookie.js' );
$helper->addScript( 'catalog/view/javascript/common.js' );
$helper->addScript( 'catalog/view/theme/'.$themeName.'/javascript/common.js' );
$helper->addScript( 'catalog/view/javascript/jquery/bootstrap/bootstrap.min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js' );
$helper->addScript( 'catalog/view/javascript/jquery/jquery.cycle.js' );
$helper->addScriptList( $scripts );

$helper->addCss( 'catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css' );	


$helper->addCss( 'catalog/view/javascript/jquery/nivo-slider/nivo-slider.css' );
$helper->addCss( 'catalog/view/javascript/jquery/colorbox/colorbox.css' );	
$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/bootstrap.vertical-tabs.css'  );
$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/bootstrap.vertical-tabs.css'  );
if( isset($themeConfig['customize_theme']) 
	&& file_exists(DIR_TEMPLATE.$themeName.'/stylesheet/customize/'.$themeConfig['customize_theme'].'.css') ) {  
	$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/customize/'.$themeConfig['customize_theme'].'.css'  );
}

	$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/animation.css' );	
	$helper->addCss( 'catalog/view/theme/'.$themeName.'/stylesheet/font-awesome.min.css' );	
	$helper->addCssList( $styles );
	$layoutMode = $helper->getParam( 'layout' );
 	$logoType =isset($themeConfig['logo_type'])?$themeConfig['logo_type']:"logo-theme";
?>
<!DOCTYPE html>
<html dir="<?php echo $helper->getDirection(); ?>" class="<?php echo $helper->getDirection(); ?>" lang="<?php echo $lang; ?>">
<head>
 <link rel="stylesheet" type="text/css" href="catalog/view/javascript/webrupee_font.css" />
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<!-- Mobile viewport optimized: h5bp.com/viewport -->
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<meta name="viewport" content="width=device-width">
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>

<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($helper->getCssLinks() as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>



	<?php if( isset($themeConfig['theme_width']) && $themeConfig['theme_width'] &&  $themeConfig['theme_width'] != 'auto' ) { ?>
			<style> #page-container .container{max-width:<?php echo $themeConfig['theme_width'];?>; width:auto}</style>
	<?php } ?>
	
	<?php if( isset($themeConfig['use_custombg']) && $themeConfig['use_custombg'] ) {	?>
	<style> 
		body{
			background:url( "image/<?php echo $themeConfig['bg_image'];?>") <?php echo $themeConfig['bg_repeat'];?>  <?php echo $themeConfig['bg_position'];?> !important;
		}</style>
	<?php } ?>
<?php 
	if( isset($themeConfig['enable_customfont']) && $themeConfig['enable_customfont'] ){
	$css=array();
	$link = array();
	for( $i=1; $i<=3; $i++ ){
		if( trim($themeConfig['google_url'.$i]) && $themeConfig['type_fonts'.$i] == 'google' ){
			$link[] = '<link rel="stylesheet" type="text/css" href="'.trim($themeConfig['google_url'.$i]) .'"/>';
			$themeConfig['normal_fonts'.$i] = $themeConfig['google_family'.$i];
		}
		if( trim($themeConfig['body_selector'.$i]) && trim($themeConfig['normal_fonts'.$i]) ){
			$css[]= trim($themeConfig['body_selector'.$i])." {font-family:".str_replace("'",'"',htmlspecialchars_decode(trim($themeConfig['normal_fonts'.$i])))."}\r\n"	;
		}
	}
	echo implode( "\r\n",$link );
?>
<style>
	<?php echo implode("\r\n",$css);?>
</style>
<?php } else { ?>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>	
<?php } ?>
<?php foreach( $helper->getScriptFiles() as $script )  { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>


<?php if( isset($themeConfig['custom_javascript'])  && !empty($themeConfig['custom_javascript']) ){ ?>
	<script type="text/javascript"><!--
		$(document).ready(function() {
			<?php echo html_entity_decode(trim( $themeConfig['custom_javascript']) ); ?>
		});
//--></script>
<?php }	?>


<script>
jQuery(function($) {
  function fixDiv() {
    var $cache = $('.logo1.inner1');
    if ($(window).scrollTop() > 100)
      $cache.css({
        'position': 'fixed',
        'top': '0px',
        'left':'0px'
      });
    else
      $cache.css({
        'position': 'relative',
        'top': 'auto'
      });
  }
  $(window).scroll(fixDiv);
  fixDiv();
});
</script>



<script type="text/javascript" src="catalog/view/javascript/common.js"></script>

<!-- Autofill search -->
<link rel="stylesheet" type="text/css" href="catalog/view/theme/lexus_nextstore/stylesheet/livesearch.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/lexus_nextstore/stylesheet/latest/latest.css" />
<script src="catalog/view/javascript/jquery/livesearch.js"></script>
<script src="catalog/view/javascript/jquery/faqdrop.js"></script>
<!-- Autofill search END-->


<!--[if lt IE 9]>
<?php if( isset($themeConfig['load_live_html5'])  && $themeConfig['load_live_html5'] ) { ?>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<?php } else { ?>
<script src="catalog/view/javascript/html5.js"></script>
<?php } ?>
<script src="catalog/view/javascript/respond.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/ie8.css" />
<![endif]-->
<?php if( isset($themeConfig['enable_paneltool']) && $themeConfig['enable_paneltool'] ){  ?>
<link  href="catalog/view/theme/<?php echo $themeName;?>/stylesheet/paneltool.css" rel="stylesheet"/>
<script type="text/javascript" src="catalog/view/javascript/jquery/colorpicker/js/colorpicker.js"></script>
<link  href="catalog/view/javascript/jquery/colorpicker/css/colorpicker.css" rel="stylesheet" />
<?php } ?>

<?php if ( isset($stores) && $stores ) { ?>
<script type="text/javascript"><!--
$(document).ready(function() {
<?php foreach ($stores as $store) { ?>
$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
<?php } ?>
});
//--></script>
<?php } ?>
<?php echo $google_analytics; ?>
<script type="text/javascript">
function valids()
{

var searches = document.getElementById('category_id').value;
var sval = document.getElementById('searchs').value; 

window.location.href ="http://new-env.ap-south-1.elasticbeanstalk.com/index.php?route=product/search&search=" + sval + "&category_id=" +searches;
}

</script>
<!-- Contenedor -->



</head>
<?php if ((!isset($this->request->get['route'])) || ($this->request->get['route'] == 'common/home')) { ?>
<body id="offcanvas-container" onLoad="load_popup();" class="offcanvas-container layout-<?php echo $layoutMode; ?> fs<?php echo $themeConfig['fontsize'];?> <?php echo $helper->getPageClass();?> <?php echo $helper->getParam('body_pattern','');?>">
<?php }  else{ ?>
<body id="offcanvas-container" class="offcanvas-container layout-<?php echo $layoutMode; ?> fs<?php echo $themeConfig['fontsize'];?> <?php echo $helper->getPageClass();?> <?php echo $helper->getParam('body_pattern','');?>">
<?php }  ?>
	<section id="page" class="offcanvas-pusher" role="main">
		<header id="header">
			<div id="topbar">
				<div class="container">	
					<div class="show-desktop ">
						<div class="quick-access pull-left">
							<ul class="links">								
								<li><a href="<?php echo $wishlist; ?>" id="wishlist-total"><i class="fa fa-list-alt"></i><?php echo $text_wishlist; ?></a></li>
								<li><a href="<?php echo $account; ?>"><i class="fa fa-user"></i><?php echo $text_account; ?></a></li>
								<!--<li><a href="<?php echo $shopping_cart; ?>"><i class="fa fa-bookmark"></i><?php echo $text_shopping_cart; ?></a></li>-->
								<li><a class="last" href="https://www.bluedart.com/maintracking.html" target="_blank"><i class="fa fa-share"></i><?php echo 'Track Order'; ?></a></li>

<li><a class="last" href="<?php echo $checkout; ?>"><i class="fa fa-share"></i><?php echo $text_checkout; ?></a></li>
	
                            </ul>
						</div>
						<div class="quick-top-link pull-right">
							<div class="top-contact1">
								<i class="fa fa-phone"></i><?php echo $text_contact; ?>
							</div>
						</div>
					</div>	

					<div class="show-mobile hidden-lg hidden-md">

						<div class="dropdown pull-left" style="text-align: left;">
							<a class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user"></i>
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo $wishlist; ?>"><i class="fa fa-user"></i><?php echo $text_wishlist; ?></a></li>
								<li><a href="<?php echo $account; ?>"><i class="fa fa-list"></i><?php echo $text_account; ?></a></li>
								<!--<li><a href="<?php echo $shopping_cart; ?>"><i class="fa fa-shopping-cart "></i><?php echo $text_shopping_cart; ?></a></li>-->
								<li><a class="last" href="<?php echo $checkout; ?>"><i class="fa fa-archive"></i><?php echo $text_checkout; ?></a></li>
								<?php if ($logged) { ?>
							<li>			 
     <a href="<?php echo $logout; ?>"><i class="glyphicon glyphicon-log-out"></i><?php echo "logout"; ?></a>
    
      </li>
			<?php
		}
			?>	
							</ul>
						</div>											
					</div>

					


				</div>
			</div>

			<div id="header-main">		
				<div class="container">
					<div class="left-cont">
						<div class="logo inner">
							<?php if( $logoType=='logo-theme'){ ?>
							<div id="logo" class="logo-store"><a href="<?php echo $base; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
							<?php } elseif ($logo) { ?>
							<div id="logo" class="logo-store"><a href="<?php echo $base; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
							<?php } ?> 
						</div>
<div class="logo1 inner1">
							<?php if( $logoType=='logo-theme'){ ?>
							<div id="logo1" class="logo-store"><a href="<?php echo $base; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
							<?php } elseif ($logo) { ?>
							<div id="logo" class="logo-store"><a href="<?php echo $base; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
							<?php } ?> 
						</div>
						<div class="hidden-xs hidden-sm">
							<div class="pull-left customer-service inner">
								<div class="support">			
									<?php if( isset($themeConfig['support_data'][$LANGUAGE_ID]) ) { ?>
									<?php echo html_entity_decode( $themeConfig['support_data'][$LANGUAGE_ID], ENT_QUOTES, 'UTF-8' ); ?>
									<?php } ?>
								</div>
							</div>	
						</div>	
					</div>	 
				 
	 					

					<div class="right-cont">
						<div class="cart-mini-right">
							<div class="shopping-cart">
								<div class="cart-top">
									<?php echo $cart; ?>
								</div>
							</div>
						</div>
						<div class="search-left">
							<div class="login-register">
								<div class="pull-left">
									<i class="icon-sign-in fa fa-sign-in"></i>
									<em class="shapes left"></em>
								</div>
								<div class="lr-text">
									<a href="login" title="Login">Login</a> or <br/ > <a href="register" title="Login">Register</a>
								</div>
							</div>
							<div id="search">
								<form name="test" method="post" action="#">

								<div class="search_wrap">
									<div class="sw_inp">
										<input type="text" name="search" autocomplete="off" id="searchs" placeholder="Search Product" class="input-search form-control" />
									</div>
									<!--<div class="category sw_cat_select">

										<select name="category_id" id="category_id">
											<option  value="<?php echo $href_default;?>"><?php echo 'All Category';?></option>

											<?php  $categories = $this->model_catalog_category->getCategories(0); 
											foreach ($categories as $category_1) { ?>

											<?php if ((isset($category_1['category_id']) && isset($category_i)) && @$category_1['category_id'] == @$category_id) { ?>
											<option value="<?php echo @$category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
											<?php } else { ?>
											<option value="<?php echo @$category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
											<?php } ?>

											<?php $category_1['children'] = $this->model_catalog_category->getCategories(@$category_1['category_id']);
											foreach ($category_1['children'] as $category_2) { ?>

											<?php if (isset($category_2['child_id']) && @$category_2['child_id'] == $category_id) { ?>
											<option value="<?php echo @$category_2['category_id']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
											<?php } else { ?>
											<option value="<?php echo @$category_2['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
											<?php } ?>

											<?php if (isset($category_2['children'])) { ?>

											<?php $categories_2['children'] = $this->model_catalog_category->getCategories(@$category_2['category_id']);
											foreach ($category_2['children'] as $category_3) { ?>

											<?php if (@$category_3['child_id'] == @$category_id) { ?>
											<option value="<?php echo @$category_3['category_id']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
											<?php } else { ?>
											<option value="<?php echo @$category_3['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
											<?php } ?>
											<?php } //endforeach categories_2?>
											<?php } //endif endforeach categories_2?>

											<?php } //endforeach categories_1?>
											<?php } //endforeach categories_0?>
										</select>
									</div>-->
									<div class="sw_sub">
										<button id="button-searchd" class="button btn btn-theme-default"  onClick="return valids()"><i class="fa fa-search"></i>
										</button>
	
									</div>

								</div>
									<div class="quickaccess-toggle hidden-lg hidden-md">
										
									</div>
								</form>						

							</div>
						</div>
						
						<div class="clrBoth">&nbsp;</div>
					</div>	

					
				</div>
			</div>						
		</header>
		
		<div class="custom-menu">
		<div id="pav-mainnav">			
			<div class="container">
			<?php 

			/**
			* Main Menu modules: as default if do not put megamenu, the theme will use categories menu for main menu
			*/

			$modules = $helper->getModulesByPosition( 'mainmenu' ); 
			if( count($modules) && !empty($modules) ){ 

				?>

				<?php foreach ($modules as $module) { ?>
				<?php echo $module; ?>
				<?php } ?>

				<?php } elseif ($categories) {  ?>

				<div class="navbar navbar-inverse"> 
					<nav id="mainmenutop" class="pav-megamenu" role="navigation"> 
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="fa fa-bars"></span>
							</button>
						</div>

						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo $home; ?>" title="<?php echo $this->language->get('text_home');?>"><?php echo $this->language->get('text_home');?></a></li>
								<?php foreach ($categories as $category) { ?>

								<?php if ($category['children']) { ?>			
								<li class="parent dropdown deeper ">
									<a href="<?php echo $category['href'];?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?>
										<b class="fa fa-angle-down"></b>
										<span class="triangles"></span>
									</a>
									<?php } else { ?>
									<li>
										<a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
										<?php } ?>
										<?php if ($category['children']) { ?>
										<ul class="dropdown-menu">
											<?php for ($i = 0; $i < count($category['children']);) { ?>
											<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
											<?php for (; $i < $j; $i++) { ?>
											<?php if (isset($category['children'][$i])) { ?>
											<li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
											<?php } ?>
											<?php } ?>
											<?php } ?>
										</ul>
										<?php } ?>
									</li>
									<?php } ?>
								</ul>
							</div>	
						</nav>
					</div>   
					<?php } ?>
				</div>					
			</div>
			</div>


<?php
/**
 * Slideshow modules
 */
$modules = $helper->getModulesByPosition( 'slideshow' ); 
if( $modules ){
?>
<section id="pav-slideshow" class="pav-slideshow">
	<div class="container">
		<?php foreach ($modules as $module) { ?>
		<?php echo $module; ?>
		<?php } ?>
	</div>
</section>
<?php } ?>


<?php
/**
 * Showcase modules
 * $ospans allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
 */
$modules = $helper->getModulesByPosition( 'showcase' ); 
$ospans = array();

if( count($modules) ){
$cols = isset($config['block_showcase'])&& $config['block_showcase']?(int)$config['block_showcase']:count($modules);	
$class = $helper->calculateSpans( $ospans, $cols );
?>
<section class="pav-showcase" id="pavo-showcase">
	<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {  ?>
		<?php if(  $i++%$cols == 0 || count($modules)==1  ){  $j=1;?><div class="row"><?php } ?>	
		<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
		<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
		<?php  $j++;  } ?>	
	</div>
</section>
<?php } ?>





<?php /*
<?php
/**
* Promotion modules
* $ospans allow overrides width of columns base on thiers indexs. format array( 1=> 3 )[value from 1->12]


$modules = $helper->getModulesByPosition( 'promotion' ); 
$ospans = array( 1=>9,2=>3);

if( count($modules) ){
$cols = isset($config['block_promotion'])&& $config['block_promotion']?(int)$config['block_promotion']:count($modules);	
$class = $helper->calculateSpans( $ospans, $cols );
?>
<section class="pav-promotion" id="pav-promotion">
	<div class="container">
		<?php $j=1;foreach ($modules as $i =>  $module) {?>
		<?php if( $i++%$cols == 0 || count($modules)==1 ){  $j=1;?><div class="row"><?php } ?>	
		<div class="<?php echo $class[$j];?>"><?php echo $module; ?></div>
		<?php if( $i%$cols == 0 || $i==count($modules) ){ ?></div><?php } ?>	
		<?php  $j++;  } ?>
	</div>	
</section>

<?php } ?>

*/ ?>






<section id="sys-notification">
	<div class="container">
		<div id="notification"></div>
	</div>
</section>



<?php if( isset($themeConfig['enable_offsidebars']) && $themeConfig['enable_offsidebars'] ) { ?>
<section id="columns" class="offcanvas-siderbars">
<div class="row visible-xs"><div class="container"> 
	<div class="offcanvas-sidebars-buttons">
		<button type="button" data-for="column-left" class="pull-left btn btn-danger btn-theme-default"><i class="fa fa-sort-amount-asc"></i> <?php echo $this->language->get('text_sidebar_left'); ?></button>
		
		<button type="button" data-for="column-right" class="pull-right btn btn-danger btn-theme-default"><?php echo $this->language->get('text_sidebar_right'); ?> <i class="fa fa-sort-amount-desc"></i></button>
	</div>
</div></div>
<?php }else { ?>
<section id="columns">
<?php } ?>	