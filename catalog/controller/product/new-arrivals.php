<?php 
class ControllerProductNewArrivals extends Controller { 


	public function index() { 

		$this->language->load('product/new-arrivals'); 

      	$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['button_cart'] = $this->language->get('button_cart');
		
		$this->load->model('catalog/product'); 
		
		$this->load->model('tool/image');

		$this->data['products'] = array();



    	$this->language->load('product/new-arrivals');

		
		$this->load->model('catalog/product');


		$this->load->model('tool/image');
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.special';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';  
		}
			 
  		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = 12;
		}
				    	
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
      		'separator' => false
   		);

		$url = '';
		
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}	

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
				
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}	
		
		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}
					
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('product/new-arrivals', $url),
      		'separator' => $this->language->get('text_separator')
   		);
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
   
		$this->data['text_empty'] = $this->language->get('text_empty');
		$this->data['text_quantity'] = $this->language->get('text_quantity');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_model'] = $this->language->get('text_model');
		$this->data['text_price'] = $this->language->get('text_price');
		$this->data['text_tax'] = $this->language->get('text_tax');
		$this->data['text_points'] = $this->language->get('text_points');
		$this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
		$this->data['text_display'] = $this->language->get('text_display');
		$this->data['text_list'] = $this->language->get('text_list');
		$this->data['text_grid'] = $this->language->get('text_grid');		
		$this->data['text_sort'] = $this->language->get('text_sort');
		$this->data['text_limit'] = $this->language->get('text_limit');

		$this->data['button_cart'] = $this->language->get('button_cart');	
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		$this->data['button_compare'] = $this->language->get('button_compare');
				$this->data['sendmail_text']=$this->language->get('sendmail_text');
		
		$this->data['compare'] = $this->url->link('product/compare');
		
		$this->data['products'] = array();

		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $limit,
			'limit' => $limit
		);
		

		$productIDS = explode(',', $this->config->get('featured_product'));

		

		/*echo '<pre>';
		//asort($this->data['products']); 
		print_r($this->data['products']);
		echo '</pre>';
		die;*/
		
		

		$results = $this->model_catalog_product->getProductNewArrivals($productIDS, $data);

		

		$product_total = $this->model_catalog_product->getTotalProductNewArrivals($productIDS);
		
		$count=0;
		$testaray=array();

		$newarrivalProductIDS = explode(',', $this->config->get('featured_product'));

		foreach ($results as $result) {

			$currProductID = $result['product_id'];
				$isNewArrivalKEY = in_array($currProductID, $newarrivalProductIDS);

				$productNewArrival = 0;

				if($isNewArrivalKEY)
				{
					$productNewArrival = 1;
				}

				
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
			} else {
				$image = false;
			}
			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				/*$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));*/
                               $price = $this->currency->format($this->tax->calculate($result['price'], 0, $this->config->get('config_tax')));  
			} else {
				$price = false;
			}
			
			if ((float)$result['newarrival']) {
				/*$newarrival = $this->currency->format($this->tax->calculate($result['newarrival'], $result['tax_class_id'], $this->config->get('config_tax')));*/
                                $newarrival = $this->currency->format($this->tax->calculate($result['newarrival'], 0, $this->config->get('config_tax')));
			} else {
				$newarrival = false;
			}	
			
			if ($this->config->get('config_tax')) {
				$tax = $this->currency->format((float)$result['newarrival'] ? $result['newarrival'] : $result['price']);
			} else {
				$tax = false;
			}				
			
			if ($this->config->get('config_review_status')) {
				$rating = (int)$result['rating'];
			} else {
				$rating = false;
			}

			//my code for new arrival page **Elakkiya**

			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {

				/*$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
				$special=$this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));*/
                                $price = $this->currency->format($this->tax->calculate($result['price'],0, $this->config->get('config_tax')));
				$special=$this->currency->format($this->tax->calculate($result['special'], 0, $this->config->get('config_tax')));
				$scd = preg_replace('/\D/', '', $price);
				$scd1 = preg_replace('/\D/', '', $special);
				$discountval =   round((($scd  - $scd1)/$scd)*100, 0);

				//echo $discountval;
				//die();

			} else {
				$discountval = false;
			}
			//my code for new arrival page **Elakkiya**
			$productarray=array();		

			foreach ($this->model_catalog_product->getProductOptions($result['product_id']) as $option) { 
				if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox' || $option['type'] == 'image') { 
					$option_value_data = array();
					
					foreach ($option['option_value'] as $option_value) {
						if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
							if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
								/*$priceval = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));*/
                                                                $priceval = $this->currency->format($this->tax->calculate($option_value['price'], 0, $this->config->get('config_tax')));
							} else {
								$priceval = false;
							}
							
							$option_value_data[] = array(
								'product_option_value_id' => $option_value['product_option_value_id'],
								'option_value_id'         => $option_value['option_value_id'],
								'name'                    => $option_value['name'],
								'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
								'price'                   => $priceval,
								'price_prefix'            => $option_value['price_prefix']
							);
						}
					}
					
					$this->data['options'][] = array(
						'product_option_id' => $option['product_option_id'],
						'option_id'         => $option['option_id'],
						'name'              => $option['name'],
						'type'              => $option['type'],
						'option_value'      => $option_value_data,
						'required'          => $option['required']
					);					
				} elseif ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
					$this->data['options'][] = array(
						'product_option_id' => $option['product_option_id'],
						'option_id'         => $option['option_id'],
						'name'              => $option['name'],
						'type'              => $option['type'],
						'option_value'      => $option['option_value'],
						'required'          => $option['required']
					);						
				}
			}
			
			$sizecount='';
			
			//print_r('<pre>'); print_r($this->data['options']); die;
			foreach($this->data['options'] as $productoptions){
				$optionname=$productoptions[name];
				if($productoptions[name]=='Size')
				{
					$sizecount=count($productoptions[option_value]);

				} 
			}	
			$this->data['products'][] = array(
			//$productarray= array(
				'product_id'  => $result['product_id'],
				'thumb'       => $image,
				'name'        => $result['name'],
				'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
				'price'       => $price,
				'is_newarrival'     => $productNewArrival,
				'newarrival'     => $newarrival,
				'tax'         => $tax,
				'rating'      => $result['rating'],
				/*'special'      => $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax'))),*/
                                'special'      => $this->currency->format($this->tax->calculate($result['special'], 0, $this->config->get('config_tax'))), 
				'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'] . $url),
				'discountval' => $discountval,
				'quantity' =>$result['quantity'],
				'options'	=>$sizecount,

			);



			array_push($testaray,$this->data['products'][$count]['discountval']);

			$count++;
			//print_r($testaray);
			//die();

			//print_r($productarray);
			//die();
			/*$price=array();
		foreach ($productarray as $key => $row)
		{
		    $price[$key] = $row['discountval'];
		}
		//print_r($productarray);
		//die();
		array_multisort($price, SORT_DESC, $productarray);

		print_r($price);
		die();*/


		}
		

		/* Multidimentional array sort working sample
		usort($this->data['products'],function($a,$b){
    	$c = $b['discountval'] - $a['discountval'];
  
    	return $c;
		}); */



		/*echo '<pre>'; //$this->model_catalog_product->getProductNewArrivals($productIDS, $data);
		//usort($this->data['products'],  "".$this->model_catalog_product->cmp().""); 
		//echo $this->model_catalog_product->cmp(); 
		print_r($this->data['products']);
		echo '</pre>';
		die;

		echo '<pre>';
		asort($this->data['products']); 
		print_r($this->data['products']);
		echo '</pre>';
		die;

		//$list[]=array();
		$this->data['products']= array_sort($this->data['products'], 'discountval', SORT_DESC);
		echo '<pre>';
		print_r($this->data['products'][0]);
		echo '</pre>';
		die;*/

	/*	$testarrayval=array();
		$testarrayval=$this->data['products'];

		//sort code
		foreach ($this->data['products'] as $key => $row) {
		    $product_id[$key]  = $row['product_id'];
		    $thumb[$key] = $row['thumb'];
		     $name[$key] = $row['name'];
		      $description[$key] = $row['description'];
		       $price[$key] = $row['price'];
		        $newarrival[$key] = $row['newarrival'];
		         $tax[$key] = $row['tax'];
		          $rating[$key] = $row['rating'];
		           $special[$key] = $row['special'];
		            $reviews[$key] = $row['reviews'];
		             $href[$key] = $row['href'];
		              $discountval[$key] = $row['discountval'];
		}

		// Sort the data with volume descending, edition ascending
		// Add $data as the last parameter, to sort by the common key
		
		//array_multisort($discountval, SORT_DESC, $product_id, SORT_ASC, $thumb, SORT_ASC,
		// $name, SORT_ASC,$description, SORT_ASC,$price, SORT_ASC,$newarrival, SORT_ASC,$tax, SORT_ASC,
		// $rating, SORT_ASC,$special, SORT_ASC,$reviews, SORT_ASC,$href, SORT_ASC,
		// $testarrayval);

		array_multisort($discountval, SORT_ASC, $testarrayval);
		echo '<pre>';
		print_r($testarrayval);

	echo '</pre>';
		die;

		echo '<pre>';
		print_r($this->data['products']);
		echo '</pre>';
		die;
*/
		/*usort($this->data['products'], function($a, $b) {
    return $a['order'] - $b['order'];
});*/
		//print_r($testaray);
		rsort($testaray);
		//print_r($testaray);
		$this->data['discountinfoval']=$testaray;


		//die;

		
		$url = '';

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}
			
		$this->data['sorts'] = array();
		
		/*$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_default'),
			'value' => 'p.sort_order-ASC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=p.sort_order&order=ASC' . $url)
		);*/
		
		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_name_asc'),
			'value' => 'pd.name-ASC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=pd.name&order=ASC' . $url)
		); 

		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_name_desc'),
			'value' => 'pd.name-DESC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=pd.name&order=DESC' . $url)
		);  

		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_special_asc'),
			'value' => 'p.special-ASC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=p.special&order=ASC' . $url)
		);

		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_special_desc'),
			'value' => 'p.special-DESC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=p.special&order=DESC' . $url)
		);

		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_price_asc'),
			'value' => 'p.price-ASC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=p.price&order=ASC' . $url)
		); 

		$this->data['sorts'][] = array(
			'text'  => $this->language->get('text_price_desc'),
			'value' => 'p.price-DESC',
			'href'  => $this->url->link('product/new-arrivals', 'sort=p.price&order=DESC' . $url)
		); 
		
		
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}	

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
									
		$this->data['limits'] = array();

		$limits = array_unique(array(12, 25, 50, 75, 100));
		
		sort($limits);

		foreach($limits as $limit){
			$this->data['limits'][] = array(
				'text'  => $limit,
				'value' => $limit,
				'href'  => $this->url->link('product/new-arrivals', $url . '&limit=' . $limit)
			);
		}
			
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}	

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		
		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}
						
		$pagination = new Pagination();
		$pagination->total = $product_total;
		$pagination->page = $page;
		$pagination->limit = 12;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('product/new-arrivals', $url . '&page={page}');
			
		$this->data['pagination'] = $pagination->render();
			
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;
		$this->data['limit'] = $limit;


		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/new-arrivals.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/new-arrivals.tpl';
		} else {
			$this->template = 'default/template/product/new-arrivals.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);
	
		$this->response->setOutput($this->render());				
  	}

  
}
?>