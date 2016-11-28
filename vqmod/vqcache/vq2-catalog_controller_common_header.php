<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		$requrl= $_SERVER['REQUEST_URI'];  
		$myroute=explode('/',$requrl);
		$find_string='other';
		for($i=0; $i<count($myroute);$i++)
		{
			if($myroute[$i]=='new-arrivals')
			{
				$find_string='new-arrivals';
			}
			if($myroute[$i]=='deals')
			{
				$find_string='deals';
			}		
		}

		$this->load->model('catalog/product'); //load product model
		//Header page top description
		$this->data['headerdata'] = $this->model_catalog_product->getheadertopdesc();
		

		if($find_string=='new-arrivals')
		{


		//new arrivals meta data
		$metadata = $this->model_catalog_product->getmetadataNewArrivals();
		
		$this->data['keywords']=$metadata['new_meta_keyword'];
		$this->data['description']=$metadata['new_meta_description'];
		$this->data['title']=$metadata['new_title'];
		}
		else if($find_string=='deals') 
		{
			$deal_metadata_details = $this->model_catalog_product->getmetadataDeals();//get deals metadata info
			$this->data['keywords']=$deal_metadata_details['deal_meta_keyword'];
			$this->data['description']=$deal_metadata_details['deal_meta_description']; 
			$this->data['title']=$deal_metadata_details['deal_title']; 
		} 
		else{
			$this->data['description'] = $this->document->getDescription();
		$this->data['keywords'] = $this->document->getKeywords();
		$this->data['title'] = $this->document->getTitle();

			$this->document->addScript('catalog/view/javascript/scroll-startstop.events.jquery.js');
			$this->document->addScript('catalog/view/javascript/up_down.js');	
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/up_down.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/up_down.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/up_down.css');
		}
		
		} 
		
		$this->data['base'] = $server;
		$this->data['links'] = $this->document->getLinks();	   
		$this->data['styles'] = $this->document->getStyles();
		$this->data['scripts'] = $this->document->getScripts();
		$this->data['lang'] = $this->language->get('code');
		$this->data['direction'] = $this->language->get('direction');
		
				if ($this->config->get('ecommerce_tracking_status') && isset($this->request->get['route']) && $this->request->get['route'] == 'checkout/success') {
					$this->data['google_analytics'] = '';
				} else {
					$this->data['google_analytics'] = html_entity_decode($this->config->get('config_google_analytics'), ENT_QUOTES, 'UTF-8');
				}
			
		$this->data['name'] = $this->config->get('config_name');
		
		if ($this->config->get('config_icon') && file_exists(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->data['icon'] = $server . 'image/' . $this->config->get('config_icon');
		} else {
			$this->data['icon'] = '';
		}
		
		if ($this->config->get('config_logo') && file_exists(DIR_IMAGE . $this->config->get('config_logo'))) {
			$this->data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$this->data['logo'] = '';
		}		
		
		$this->language->load('common/header');
		
		$this->data['text_home'] = $this->language->get('text_home');
		$this->data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		$this->data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
    	$this->data['text_search'] = $this->language->get('text_search');
		$this->data['text_welcome'] = sprintf($this->language->get('text_welcome'), $this->url->link('account/login', '', 'SSL'), $this->url->link('account/register', '', 'SSL'));
		$this->data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->url->link('account/logout', '', 'SSL'));
		$this->data['text_account'] = $this->language->get('text_account');
    	$this->data['text_checkout'] = $this->language->get('text_checkout');
    	$this->data['text_logout'] = $this->language->get('text_logout');
		$this->data['text_contact'] = $this->language->get('text_contact');		
		$this->data['home'] = $this->url->link('common/home');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['logged'] = $this->customer->isLogged();
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');

						
						$this->language->load('account/ajax_login_register');
						
						$this->data['text_new_welcome'] = $this->language->get('text_new_welcome');
						$this->data['tab_login'] = $this->language->get('tab_login');
						$this->data['tab_signup'] = $this->language->get('tab_signup');
						$this->data['text_email'] = $this->language->get('text_email');
						$this->data['text_password'] = $this->language->get('text_password');
						$this->data['text_forgot'] = $this->language->get('text_forgot');
						$this->data['text_forgot_desc'] = $this->language->get('text_forgot_desc');
						$this->data['text_repeat'] = $this->language->get('text_repeat');
						$this->data['text_sign_with'] = $this->language->get('text_sign_with');
						$this->data['text_fb_title'] = $this->language->get('text_fb_title');
						$this->data['text_google_title'] = $this->language->get('text_google_title');
						$this->data['button_login'] = $this->language->get('button_login');
						$this->data['button_send'] = $this->language->get('button_send');
						$this->data['button_signup'] = $this->language->get('button_signup');
						
						
                        $this->data['forgot_password'] = $this->url->link('account/forgotten', '', 'SSL');
						
						require_once(DIR_SYSTEM . 'social-login/facebook-sdk/facebook.php');
						require_once DIR_SYSTEM.'social-login/google/src/apiClient.php';
						require_once DIR_SYSTEM.'social-login/google/src/contrib/apiOauth2Service.php';
						
						// Google login
						
						$loc= urlencode ("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
						$this->session->data['ajaxfblogin_loc'] = $loc;
						$client = new apiClient();
						$client->setApplicationName("Google+ PHP Starter Application");
						// Visit https://code.google.com/apis/console to generate your
						// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
						 $client->setClientId($this->config->get('ajaxfbgoogle_googleapikey'));
						 $client->setClientSecret($this->config->get('ajaxfbgoogle_googleapisecret'));
						 $client->setRedirectUri($this->url->link('account/ajax_login_register/glogin', '', 'SSL'));
						 $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile'));
						 $client->setDeveloperKey('');
						$plus = new apiOauth2Service($client);
						
						$this->data['g_login'] = $client->createAuthUrl();
						
						// End Google Login
						
						// Facebook Login
						$myfbconnect = new Facebook(array(
								'appId'  => $this->config->get('ajaxfbgoogle_apikey'),
								'secret' => $this->config->get('ajaxfbgoogle_apisecret'),
						));
						
						$this->data['fb_login'] = $myfbconnect->getLoginUrl(
								array(
										'scope' => 'email,user_birthday,user_location,user_hometown',
										'redirect_uri'  => $this->url->link('account/ajax_login_register/fblogin', '', 'SSL')
								)
						);
						
						// End Facebook Login
                        
		$this->data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$this->data['shopping_cart'] = $this->url->link('checkout/cart');
		$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		
                if (isset($this->request->get['product_id'])) {
                $product_id = (int)$this->request->get['product_id'];
                } else {
                $product_id = 0;
                }

                //open graph meta tag for facebook

                $this->load->model('catalog/product');
                $product_info = $this->model_catalog_product->getProduct($product_id);

                      
                $this->data['product_info'] = $product_info;

                //product image 
                if ($product_info['image']) {
                $this->data['mthumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
                } else {
                $this->data['mthumb'] = '';
                }   
                
               // product  title
               if ($product_info['name']) {
                $this->data['mname'] = $product_info['name'];
                } else {
                $this->data['mname'] = '';
                }

               // product url
                if ($product_id) {

                $productseourl = $this->model_catalog_product->getProductseourl($product_id);
                
                $actual_link = "http://$_SERVER[HTTP_HOST]/".trim($productseourl);
                $this->data['murl'] = $actual_link;
                } else {
                $this->data['murl'] = '';
                }
              //meta_description
              if ($product_info['meta_description']) {
                 $this->data['mmeta_description'] = $product_info['meta_description'];
                } else {
                $this->data['mmeta_description'] = '';
                }
              // product price

              if ($product_info['price'] || $product_info['special']) {
                  if(!$product_info['special']){  
                 $this->data['mprice'] = round($product_info['price']);}
                 else {$this->data['mprice'] = round($product_info['special']);}
                } else {
                $this->data['mprice'] = '';
                }              
                

		// Daniel's robot detector
		$status = true;
		
		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", trim($this->config->get('config_robots')));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}
		
		// A dirty hack to try to set a cookie for the multi-store feature
		$this->load->model('setting/store');
		
		$this->data['stores'] = array();
		
		if ($this->config->get('config_shared') && $status) {
			$this->data['stores'][] = $server . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			
			$stores = $this->model_setting_store->getStores();
					
			foreach ($stores as $store) {
				$this->data['stores'][] = $store['url'] . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			}
		}
				
		// Search		
		if (isset($this->request->get['search'])) {
			$this->data['search'] = $this->request->get['search'];
		} else {
			$this->data['search'] = '';
		}
		
		// Menu
		$this->load->model('catalog/category');
		
		
		
		$this->data['categories'] = array();
					
		$categories = $this->model_catalog_category->getCategories(0);
		
		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();
				
				$children = $this->model_catalog_category->getCategories($category['category_id']);
				
				foreach ($children as $child) {
					$data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);
					
					$product_total = $this->model_catalog_product->getTotalProducts($data);
									
					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);						
				}
				
				// Level 1
				$this->data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}
		
		$this->children = array(
			'module/language',
			'module/currency',
			'module/cart'
		);
			$this->language->load('module/skype');

      	$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['code'] = html_entity_decode($this->config->get('skype_code'));	
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		

				if(isset($this->data['categories'])){
					$this->data['categories'][] = array(
						'name'     => $this->language->get("text_blogs"),
						'children' => array(),
						'column'   => 1,
						'href'     => $this->url->link('pavblog/blogs', '')
					);
				}
				
    	$this->render();
	} 	
}
?>
