<?php
class ControllerCommonSeoUrl extends Controller {


	private $url_list = array (
        'common/home'       => '',
        'checkout/cart'     => 'cart',
        'account/register'  => 'register',
        'account/voucher'	=> 'voucher',
        'account/wishlist'  => 'wishlist',
        'checkout/checkout' => 'checkout',
        'account/login'     => 'login',
        'product/special'   => 'online-shopping-offers',
        'affiliate/account' => 'affiliate',
        'checkout/voucher'  => 'voucher',
        'product/manufacturer' => 'brands',
        'account/newsletter'   => 'newsletter',
        'account/order'        => 'order',
        'account/account'      => 'account',
        'information/contact'  => 'contact',
        'account/return/insert' => 'return',
        'information/sitemap'   => 'sitemap',
		'product/new-arrivals' 	=> 'new-arrivals',
		'product/bestseller' 	=> 'bestseller',
		'pavdeals/deals' 	=> 'deals', 
		'product/search'    => 'search'     
    ); 

	public function index() {  
		// Add rewrite to url class
		
		$this->load->model('catalog/category');

		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);
		}
			
		// Decode URL
		if (isset($this->request->get['_route_'])) {

            
            $productmainroutearr=array('american-tourister-travel-bags-online/at-buzz-14-brn/yel-brown-back-pack','men/adidas-base-mid-dd-white-tee','women/adidas-ten-wb-l-2-multi-color---wristband','men/accessories/adidas-clmlt-6p-3soff-pink-cap','women/clothing/track-pants/reebok-wor-pp-grey-tights','men/reebok-os-kn-dark-grey-trackster','men/shoes/sports/basketball-shoes/adidas-cross-em3-grey-basketball-shoes','MEN/ADIDAS/Adidas-Ace-16-4-Fxg-p1103c151','reebok-shoes-online/reebok-os-grph-multi-color-1shortb','men/clothing/shorts/reebok-os-grph-multi-color-1shortb','men/shoes/running-shoes/nike-relentless-4-msl-grey-running-shoes','men/shoes/running-shoes/nike-revolve-gry-running-shoes','MEN/ADIDAS/Adidas-Andorian-Navy-Blue-Outdoor-Shoes-p1131c151','men/reebok-zquick-dash-city-navy-blue-training-shoes','MEN/ADIDAS/Adidas-Andorian-Navy-Blue-Outdoor-Shoes-p1131c151','MEN/ADIDAS/Adidas-X-15-4-FXG-Green-Football-Shoes-p765c151','adidas-madoru-2-m-grey-running-shoes','reebok-quick-win-black-running-shoes','reebok-sublite-authentic-2.0-red-running-shoes','adidas-ermis-m-grey-running-shoes','adidas-energy-bounce-m-grey-running-shoes','reebok-quick-tempo-flex-black-running-shoes','reebok-electrify-speed-black-running-shoes','adidas-galaxy-2-m-silver-running-shoes','adidas-galaxy-2-m-blue-running-shoes','adidas-galaxy-2-blue-running-shoes','adidas-ryzo-2.0-m-dark-grey-running-shoes','adidas-ryzo-3.0-m-blue-running-shoes','adidas-ryzo-3.0-m-brown-running-shoes','adidas-duramo-7-m-black-running-shoes','reebok-sublite-authentic-2.0-mtm-grey-running-shoes','reebok-one-cushion-3.0-nite-black-running-shoes','reebok-electrify-speed-blue-running-shoes','adidas-mana-bounce-blue-running-shoes','adidas-madoru-11-m-running-shoes','adidas-madoru-11-m-grey-running-shoes','adidas-lite-pacer-3-m-red-running-shoes','adidas-kray-3.0-m-navy-blue-running-shoe','adidas-kray-3.0-m--grey-running-shoe','adidas-hachi-1.0-navy-blue-running-shoes','adidas-hachi-1.0-m-silver-running-shoes','adidas-hachi-1.0-grey-running-shoes','/adidas-galaxy-2-m-black-running-shoes','adidas-galactic-elite-m-grey-running-shoes','adidas-falcon-elite-5-m-grey-running-shoes','adidas-alcor-syn-10-m-black-running-shoes','adidas-yking-m-navy-blue-running-shoes','reebok-sublite-authentic-2.0-grey-running-shoes','reebok-exhilarun-black-running-shos','reebok-electro-run-red-running-shoes','adidas-ryzo-3.0-m-navy-blue-running-shoes','adidas-madoru-2-black-running-shoes','adidas-galaxy-elite-m-navy-blue-running-shoes','adidas-galaxy-elite-m-grey-running-shoes','adidas-galactic-elite-black-running-shoes','adidas-falcon-elite-5-greyblu-running-shoes','adidas-ezar-1.0-m-multi-color-running-shoes','adidas-ezar-1.0-m-grey-color-running-shoes','adidas-duramo-elite-m-blue-running-shoes','adidas-duramo-elite-m-black-running-shoes','adidas-duramo-77-navy-blue-running-shoes','adidas-duramo-77-grey-running-shoes','adidas-duramo--elite-m-multi-color-running-shoes','reebok-sublite-authentic-2.0-mtm-black-running-shoes','reebok-jet-dashride-2.0-navy-blue-running-shoes','reebok-jet-dashride-2.0-black-running-shoes','adidas-element-refresh-m-orange-running-shoes','adidas-madoru-m-grey-running-shoes','reebok-zjet-burst-black-running-shoes','reebok-twisform-gr-grey-running-shoes','reebok-twisform-city-black-running-shoes','reebok-tempo-speedster-black-running-shoes','reebok-sublite-super-duo-navy-blue-running-shoe','reebok-sublite-super-duo-green-running-shoe','reebok-sublite-super-duo-gr-olive-running-shoe','reebok-sublite-super-duo-gr-black-running-shoes','adidas-mana-bounce-grey-running-shoes','adidas-galaxy-2-wide-navy-blue-running-shoes','adidas-falcon-elite-5-m-running-shoes','adidas-falcon-elite-5-m-multi-color-running-shoes','adidas-duramo-77-black-running-shoes','adidas-duramo-7.1-multi-color-running-shoes-for-men','adidas-duramo-7.1-multi-color-running-shoes','adidas-duramo-7-m-white-running-shoes','adidas-duramo-7-m-grey-running-shoes','adidas-run-black-tee-m','adidas-response-bermuda-white-shorts','men/clothing/adidas-ess-3s-wv-navy-blue-pant','reebok-elsft-ply-shrt-grey-running-shorts','reebok-elsft-ply-shrt-navy-blue-crossfit-shorts','reebok-elsft-ply-shrt-black-sports-shorts','adidas-calo-5-gr-m-blue-flip-flop','adidas-calo-5-gr-m-grey-flip-flop','reebok-one-distance-grey-running-shoes','adidas-ezar-2.0-black-running-shoes','adidas-trace-rocker-black-outdoor-shoes','adidas-ax2-navy-blue-outdoor-shoes','adidas-storm-raiser-2-blue-outdoor-shoes','adidas-ax2--blue-outdoor-shoes','adidas-wind-chaser-black-outdoor-shoes','adidas-glimph-navy-blue-outdoor-shoes','adidas-storm-raiser-1.0-black-outdoor-shoes','adidas-glimph-navy-blue-outdoor-shoes','adidas-storm-raiser-1.0-black-outdoor-shoes','adidas-ess-the-frost-green-tee','adidas-run-blue-tshirt','reebok-se-pp-tight-black-track-pants','adidas-barricade-practice-blue-tshirt','adidas-barricade-practice-green-tshirt','adidas-m-clima-navy-blue-polo','adidas-m-clima-white-polo','adidas-m-green-polo','reebok-el-woven-grey-short','adidas-response-trend-white-tee','reebok-re-3-inch-yellow-shorts','reebok-re-5-inch-black-shorts','reebok-os-wv-dark-grey-trackster','reebok-os-adv-wvn-black-track-pant','reebok-os-pw3r-ls-comp-green-tshirts','reebok-se-core-knit-navy-blue-track-pant','reebok-wor-grph-supremium-black-tees','reebok-wor-grph-supremium-blue-tees','reebok-wor-grph-supremium-red-tees','reebok-workout-ready-green-tech-t-shirts','adidas-ryzo-2.0-w-black-running-shoes','adidas-ryzo-3.0-w-grey-running-shoes','adidas-galaxy-elite-w-grey-running-shoes','adidas-duramo-7-w-grey-running-shoes','reebok-electrify-speed-grey-running-shoes9','reebok-electrify-speed-blue-running-shoes1','reebok-twisform-city-womens-black-running-shoes','reebok-sublite-super-duo-2.0-black-womens-running-shoes','reebok-duo-runner-blue-running-shoe','reebok-electrify-speed-grey-running-shoes','reebok-sublite-authentic-2.0-black-running-shoes','reebok-sublite-dual-dash-pink-running-shoes','reebok-cardio-ultra-green-cardio-shoes','reebok-cardio-low-grey-shoes','reebok-cardio-low-black-shoes','reebok-adventure-serpant-black-sandal','adidas-madoru-w-black-running-shoes','women/shoes/adidas-duramo-7-w-red-running-shoes','adidas-durama-w-navy-blue-running-shoes-for-women','adidas-calo-5-gr-w-multi-color-flip-flop','adidas-brizo-3.0-w-blue-flip-flop','adidas-aron-navy-blue-sandal','adidas-elevate-black-sandal','adidas-kerio-leather-20-black-sandals','reebok-adventure-chrome-navy-blue-sandals','adidas-kerio-syn-3.0-m-black-sandals','adidas-kerio-syn-3.0-m-navy-blue-sandals','adidas-brizo-4.0-black-flip-flop','reebok-advent-ii-lp-black-flip-flops','adidas-calo-5-m-grey-flip-flop','adidas-beach-print-m-black-flip-flops-','adidas-brizo-4-m-multi-color-flip-flops','adidas-brizo-3.0-black-flip-flop','reebok-advent-ii-black-flip-flops','reebok-gradient-flip-ii-lp-blue-flip-flop','adidas-messi-fb-black-slide-m-','adidas-brizo-4.0--navy-blue-flip-flop','adidas-brizo-4-m-black-flip-flops-for-men','adidas-duramo-slide-multi-color-flip-flop','adidas-x-15.4-fxg-orange-football-shoes','adidas-messi-15.4--fxg-blue-football-shoes','men/shoes/sports/football-shoes/adidas-x-15.4-fxg-green-football-shoes','adidas-messi-15-3-fg-ag','adidas-torus-in-black-tennis-shoes','adidas-merrick-in-blue-indoor-shoes','adidas-acosta-in-white-indoor-shoes','adidas-isolation-2-navy-blue-basketball-shoe','adidas-isolation-2-grey-basketball-shoe','adidas-torus-dark-grey-tennis-shoes','/adidas-resp-approach-str-bluetennis-shoes','adidas-22-yds-trainer-white-cricket-shoes','adidas-22-yds-trainer-ii-white-cricket-shoes','adidas-duramo-7-m-grey-running-shoes','adidas-duramo-7-m-white-running-shoes'); 
                  if(in_array($this->request->get['_route_'], $productmainroutearr) )
                { 
                    $this->request->get['route']='common/home/page410';
                    return $this->forward($this->request->get['route']);
                }  
 


			$parts = explode('/', $this->request->get['_route_']);


			//print_r($parts); die;
			$categoryArray = array();
			foreach ($parts as $partKey => $part) {
				if($part != "")
				{
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE keyword = '" . $this->db->escape($part) . "'");
					
					if ($query->num_rows) {

						$url = explode('=', $query->row['query']);
						
						if ($url[0] == 'product_id') {
							$this->request->get['product_id'] = $url[1];
						}
						
						if ($url[0] == 'manufacturer_id') {
							$this->request->get['manufacturer_id'] = $url[1];
						}
						
						if ($url[0] == 'information_id') {
							$this->request->get['information_id'] = $url[1];
						}

						if ($url[0] == 'category_id') {
							if($query->num_rows > 1)
							{
								foreach($query->rows as $catSingle)
								{
									$urlNew = explode('=', $catSingle['query']);
									if ($urlNew[0] == 'category_id') {
										$currCatId = $urlNew[1];
										if($partKey == 0)
										{
											$getCategoryInfo			= $this->model_catalog_category->getCategory($currCatId);
											if($getCategoryInfo['parent_id'] == 0)
											{
												$this->request->get['path'] = $currCatId;
												$categoryArray[] = $currCatId;
												break;
											}

											
										}    
										else
										{
											$getCategories 			= array();
											$getCategoriesIDS 		= array();
											$getCategories 			= $this->model_catalog_category->getCategories($categoryArray[$partKey-1]);
											foreach($getCategories as $categoryInd)
											{
												$getCategoriesIDS[] = $categoryInd['category_id'];
											}
											if(in_array($currCatId, $getCategoriesIDS))
											{
												$this->request->get['path'] .= '_' . $currCatId;
												$categoryArray[] = $currCatId;
												break;
											}
										}
									}
								}
							}
							else
							{
								if (!isset($this->request->get['path'])) {
									$this->request->get['path'] = $url[1];
								} else {
									$this->request->get['path'] .= '_' . $url[1];
								}
								$categoryArray[] = $url[1];
							}
						}			
						
							
					} else {
						//echo "sdfdfsdfds"; die;
						$this->request->get['route'] = 'common/home/page404';	
					}
				} 

			}

			if ( $_s = $this->setURL($this->request->get['_route_']) ) {
                $this->request->get['route'] = $_s;
            }
			
			
			if (isset($this->request->get['product_id'])) {
				$this->request->get['route'] = 'product/product';
			} elseif (isset($this->request->get['path'])) {
				$this->request->get['route'] = 'product/category';
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$this->request->get['route'] = 'product/manufacturer/info';
			} elseif (isset($this->request->get['information_id'])) {
				$this->request->get['route'] = 'information/information';
			}

            $produnavailarr = array(903,316,261,1133,393,415,710,968,879,818,417,893,814,951,779,1061,868,1361,855,1289,553,1148,61,809,406,1203,866,823,308,1031,770,819,928,1036,838,1014,671,229,109,904,238,952,801,466,907,227,728,462,619,675,843,685,736,557,573,225,216,438,668,570,630,217,756,640,821,263,167, 664,626,446,687,730,233,524,173,483,305,585,593,698,401,693,362,93,580,564,637,57,276,325,1001,73,35,711,744,727,702,677,44,442,936,80,692,954,655,380,906,373,508,749,955,41,543,447,480,745,754,769,645,206,683,454,58,259,274,377,207,676,441,213,228,684,469,94,84,509,395,542,243,278,194,390,471,144,729,345,156,236,198,646,586,178,865,962,1006,958,600,359,929,416,298,789,807,1288,599,825,608,761,867,842,398,817,820,365,787,896,837,959,1135,613,912,870,391,835,764,647,1276,1156,1097,498,300,513,419,905,468,302,260,841,780,864,816,877,812,1360,925,1029,635,697,923,922,622,627,464,601,562,464,576,642,349,461,219,483,327,793,775,120,449,554,998,822,622,601,361,538,461,464,908,240,89,162,775,116,219,1106,1194,1046,1013,1098,1196,993,939,938,1243,1092,1305,1287,937,1255,1161,983,1241,1184,1185,1291,1054,1053,1122,813,1257,1030,1063,1286,1109,1115,1068,1045,982,1099,1242,1055,1056,966,1483,1028,1026,1027,1015,1120,1246,439,1254,1134,1107,1179,762,1256,992,953,1018,1050,1048,1052,1051,1240,1244,1128,1260,1121,1247,1113,763,1032,766,436,941,942,940,972,1057,1138,1022,839,765,1025,1023,1117,1176,1044,810,1005,1348,945,1177,397,1105,815,1041,1144,1143,1350,1489,768,1485,776,967,1178,840,774,980,1293,1292,1017,1252,1069,984,988,1190,806,1347,1346,946,1093,1139,947,1155,1171,1170,1359,1169,1167,1166,699,884,892,957,977,874,875,873,1212,1211,800,1202,876,949,1180,1302,824,1303,1119,1259,1127,1162,943,944,1163,1164,1165,556,956,718);
                    
            $catunavail=array('61','45','70','101','151_89_171','152_179_189','151_105_25_70');
         
            if(in_array($this->request->get['product_id'], $produnavailarr) )
                {
                    $this->request->get['route']='common/home/page410';
                }  
            if(in_array($this->request->get['path'], $catunavail) )
                { 
                    $this->request->get['route']='common/home/page410';
                }  

              
            if(isset($this->request->get['term'])){ if($this->request->get['term']=='R53043006') {$this->request->get['route']='common/home/page410'; }
            }

              if(isset($parts[0])){   
                     if($parts[0]=='adidas-yago-m-black-running-shoes' || $parts[0]=='adidas-hellion-m-black-running-shoe' || $parts[0]=='reebok-os-el-green-back-pack' || $parts[0]=='at-code-14-grey-back-pack' || $parts[0]=='at-citi-pro-13-pur-purple-back-pack' || $parts[0]=='adidas-w-ap-blue-tee' || $parts[0]=='adidas-response-black-tee' || $parts[0] == 'reebok-zig-squared-rush-black-running-shoes' || $parts[0] == 'reebok-zcut-tr-black-running-shoes' || $parts[0] =='adidas-ess-standford-b-black-track-pant' || $parts[0]=='adidas-ess-standford-b-navy-blue-track-pant' || $parts[0] =='fila-smash-lite-black-running-shoes'|| $parts[0]=='adidas-poly-solar-gold-bottle-0.7-' || $parts[0]=='adidas-poly-black-bottle-0.7-' || $parts[0]=='adidas-poly-pink-bottle-0.7-' || $parts[0]=='adidas-ten-black-headband' || $parts[0]=='adidas-lin-per-royal-blue-wallet' || $parts[0]=='adidas-3s-per-navy-blue-wallet' || $parts[0]=='adidas-3s-ess-black-wallet' || $parts[0]=='reebok-rcf-triblend-1-olive-tees' || $parts[0] == 'reebok-rcf-triblend-1-pink-tees' || $parts[0]=='reebok-os-ss-comp-a-blue-jersey' || $parts[0]=='reebok-se-core-knit-navy-blue-track-pants' || $parts[0]=='reebok-se-pp-fit-bt-black-track-pant' || $parts[0]=='adidas-sq-cc-run-black-short-m' || $parts[0]=='adidas-ess-chelsea-white-shorts' || $parts[0]=='adidas-lite-pacer-3-m-green-running-shoe' || $parts[0]=='adidas-sonic-rally-white-tennis-shoes' || $parts[0]=='adidas-argo-w-navy-blue-sandal' || $parts[0]=='adidas-tf-base-ss-white-tee' || $parts[0]=='adidas-resp-trad-black-polo' ||$parts[0]=='reebok-os-knit-black-tee' || $parts[0]=='reebok-wor-95-yellow-tee' || $parts[0]=='reebok-wor-95-green-tee' || $parts[0]=='reebok-os-knit-dark-grey-trkstr' || $parts[0]=='reebok-wor-knit-navy-blue-track-pant' || $parts[0]=='adidas-adwen-multi-color-sandal' || $parts[0]=='adidas-eezay-gr-grey-flip-flop' || $parts[0]=='puma-woody-dp-navy-blue-sandal' || $parts[0]=='adidas-eezay-gr-blue-flip-flop' || $parts[0]=='reebok-zquick-tr-4.0-grey-training-shoes' || $parts[0]=='adidas-ess-yd-black-polo' ||  $parts[0]=='adidas-base-wv-black-short' || $parts[0]=='adidas-base-wv-navy-blue-short' || $parts[0]=='adidas-ess-3s-wv-navy-blue-pant' || $parts[0]=='adidas-ess-3s-wv-grey-pant' || $parts[0]=='puma-atom-fashion-dp-black-running-shoe' || $parts[0]=='adidas-resp-trad-red-polo' || $parts[0]=='reebok-re-ss-solar-yellow-tees' || $parts[0]=='reebok-re-ss-black-tees' || $parts[0]=='reebok-train-conquer-white-tee' || $parts[0]=='reebok-train-conquer-black-tee' || $parts[0]=='reebok-re-ss-black-tees' || $parts[0]=='reebok-se-pp-fit-bt-royal-orchid-track-pant' || $parts[0]=='reebok-se-pd-core-dark-pink-tee' || $parts[0]=='reebok-se-pd-core-black-tee' || $parts[0]=='reebok-se-pd-core-vital-green-tee' || $parts[0]=='reebok-wor-knit-black-track-pant' || $parts[0]=='reebok-os-gr-knit-black-shorts' || $parts[0]=='reebok-os-knit-black-trkstr' || $parts[0]=='reebok-os-adv-wvn-indigo-track-pant-' || $parts[0]=='reebok-wor-camo-b-olive-short' || $parts[0]=='reebok-wor-camo-b-blue-short' || $parts[0]=='adidas-lite-runner-m-black-running-shoe' || $parts[0]=='adidas-lite-runner-m-oliver-running-shoe' || $parts[0]=='adidas-sq-cc-run-black-short-m' || $parts[0]=='adidas-aron-1.0-navy-blue-sandal' || $parts[0]=='reebok-electrify-speed-black-running-shoes' || $parts[0]=='reebok-cf-ls-midwt-com-brown-tee' || $parts[0]=='reebok-el-woven-oh-navy-blue-track-pant' || $parts[0]=='reebok-el-woven-oh-grphite-track-pant' || $parts[0]=='reebok-el-woven-oh-blacktrack-pant' || $parts[0]=='reebok-ms-cor-black-jacket' || $parts[0]=='reebok-ms-cor-yellow-jacket' || $parts[0]=='adidas-aril-dark-blue-flip-flop' || $parts[0]=='adidas-aril-red-flip-flop' || $parts[0]=='reebok-fury-road-black-running-shos' || $parts[0]=='adidas-m-clima-purple-polo' || $parts[0]=='adidas-m-clima-black-polo' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='Adidas-Storm-Raiser-1-0' || $parts[0]=='adidas-ais-prime-pink-tee' || $parts[0]=='adidas-x-15.4-fxg-green-football-shoes'){$this->request->get['route']='common/home/page410';} } 
			       
			             if($this->request->get['idcat'] == '151_153')
                        {
                           $this->request->get['route']='common/home/page410';
                        }  

                      

			             if (isset($this->request->get['route'])) {
				          //echo $this->request->get['route']; die;
				          return $this->forward($this->request->get['route']); 
			             }

			            
		}

                    $produnavailarr = array(903,316,261,1133,393,415,710,968,879,818,417,893,814,951,779,1061,868,1361,855,1289,553,1148,61,809,406,1203,866,823,308,1031,770,819,928,1036,838,1014,671,229,109,904,238,952,801,466,907,227,728,462,619,675,843,685,736,557,573,225,216,438,668,570,630,217,756,640,821,263,167, 664,626,446,687,730,233,524,173,483,305,585,593,698,401,693,362,93,580,564,637,57,276,325,1001,73,35,711,744,727,702,677,44,442,936,80,692,954,655,380,906,373,508,749,955,41,543,447,480,745,754,769,645,206,683,454,58,259,274,377,207,676,441,213,228,684,469,94,84,509,395,542,243,278,194,390,471,144,729,345,156,236,198,646,586,178,865,962,1006,958,600,359,929,416,298,789,807,1288,599,825,608,761,867,842,398,817,820,365,787,896,837,959,1135,613,912,870,391,835,764,647,1276,1156,1097,498,300,513,419,905,468,302,260,841,780,864,816,877,812,1360,925,1029,635,697,923,922,622,627,464,601,562,464,576,642,349,461,219,483,327,793,775,120,449,554,998,822,622,601,361,538,461,464,908,240,89,162,775,116,219,1106,1194,1046,1013,1098,1196,993,939,938,1243,1092,1305,1287,937,1255,1161,983,1241,1184,1185,1291,1054,1053,1122,813,1257,1030,1063,1286,1109,1115,1068,1045,982,1099,1242,1055,1056,966,1483,1028,1026,1027,1015,1120,1246,439,1254,1134,1107,1179,762,1256,992,953,1018,1050,1048,1052,1051,1240,1244,1128,1260,1121,1247,1113,763,1032,766,436,941,942,940,972,1057,1138,1022,839,765,1025,1023,1117,1176,1044,810,1005,1348,945,1177,397,1105,815,1041,1144,1143,1350,1489,768,1485,776,967,1178,840,774,980,1293,1292,1017,1252,1069,984,988,1190,806,1347,1346,946,1093,1139,947,1155,1171,1170,1359,1169,1167,1166,699,884,892,957,977,874,875,873,1212,1211,800,1202,876,949,1180,1302,824,1303,1119,1259,1127,1162,943,944,1163,1164,1165,556,956,718);
         
                    if(in_array($this->request->get['product_id'], $produnavailarr) )
                     {
                    	$this->request->get['route']='common/home/page410';
                   		return $this->forward($this->request->get['route']);
                 	 } 

                    $catunavail=array('61','45','70','101','151_89_171','152_179_189','151_105_25_70');

                    if(in_array($this->request->get['path'], $catunavail) )
                     {
                      	$this->request->get['route']='common/home/page410';
                      	return $this->forward($this->request->get['route']);
                 	 }


                 if(isset($this->request->get['term'])){ if($this->request->get['term']=='R53043006') {$this->request->get['route']='common/home/page410'; } }
           
                if(isset($parts[0])){    
                 if($parts[0]=='adidas-yago-m-black-running-shoes' || $parts[0]=='adidas-hellion-m-black-running-shoe' || $parts[0]=='reebok-os-el-green-back-pack' || $parts[0]=='at-code-14-grey-back-pack' || $parts[0]=='at-citi-pro-13-pur-purple-back-pack' || $parts[0]=='adidas-w-ap-blue-tee' || $parts[0]=='adidas-response-black-tee' || $parts[0] == 'reebok-zig-squared-rush-black-running-shoes' || $parts[0] == 'reebok-zcut-tr-black-running-shoes' || $parts[0] =='adidas-ess-standford-b-black-track-pant' || $parts[0]=='adidas-ess-standford-b-navy-blue-track-pant' || $parts[0] =='fila-smash-lite-black-running-shoes'|| $parts[0]=='adidas-poly-solar-gold-bottle-0.7-' || $parts[0]=='adidas-poly-black-bottle-0.7-' || $parts[0]=='adidas-poly-pink-bottle-0.7-' || $parts[0]=='adidas-ten-black-headband' || $parts[0]=='adidas-lin-per-royal-blue-wallet' || $parts[0]=='adidas-3s-per-navy-blue-wallet' || $parts[0]=='adidas-3s-ess-black-wallet' || $parts[0]=='reebok-rcf-triblend-1-olive-tees' || $parts[0] == 'reebok-rcf-triblend-1-pink-tees' || $parts[0]=='reebok-os-ss-comp-a-blue-jersey' || $parts[0]=='reebok-se-core-knit-navy-blue-track-pants' || $parts[0]=='reebok-se-pp-fit-bt-black-track-pant' || $parts[0]=='adidas-sq-cc-run-black-short-m' || $parts[0]=='adidas-ess-chelsea-white-shorts' || $parts[0]=='adidas-lite-pacer-3-m-green-running-shoe' || $parts[0]=='adidas-sonic-rally-white-tennis-shoes' || $parts[0]=='adidas-argo-w-navy-blue-sandal' || $parts[0]=='adidas-tf-base-ss-white-tee' || $parts[0]=='adidas-resp-trad-black-polo' ||$parts[0]=='reebok-os-knit-black-tee' || $parts[0]=='reebok-wor-95-yellow-tee' || $parts[0]=='reebok-wor-95-green-tee' || $parts[0]=='reebok-os-knit-dark-grey-trkstr' || $parts[0]=='reebok-wor-knit-navy-blue-track-pant' || $parts[0]=='adidas-adwen-multi-color-sandal' || $parts[0]=='adidas-eezay-gr-grey-flip-flop' || $parts[0]=='puma-woody-dp-navy-blue-sandal' || $parts[0]=='adidas-eezay-gr-blue-flip-flop' || $parts[0]=='reebok-zquick-tr-4.0-grey-training-shoes' || $parts[0]=='adidas-ess-yd-black-polo' ||  $parts[0]=='adidas-base-wv-black-short' || $parts[0]=='adidas-base-wv-navy-blue-short' || $parts[0]=='adidas-ess-3s-wv-navy-blue-pant' || $parts[0]=='adidas-ess-3s-wv-grey-pant' || $parts[0]=='puma-atom-fashion-dp-black-running-shoe' || $parts[0]=='adidas-resp-trad-red-polo' || $parts[0]=='reebok-re-ss-solar-yellow-tees' || $parts[0]=='reebok-re-ss-black-tees' || $parts[0]=='reebok-train-conquer-white-tee' || $parts[0]=='reebok-train-conquer-black-tee' || $parts[0]=='reebok-re-ss-black-tees' || $parts[0]=='reebok-se-pp-fit-bt-royal-orchid-track-pant' || $parts[0]=='reebok-se-pd-core-dark-pink-tee' || $parts[0]=='reebok-se-pd-core-black-tee' || $parts[0]=='reebok-se-pd-core-vital-green-tee' || $parts[0]=='reebok-wor-knit-black-track-pant' || $parts[0]=='reebok-os-gr-knit-black-shorts' || $parts[0]=='reebok-os-knit-black-trkstr' || $parts[0]=='reebok-os-adv-wvn-indigo-track-pant-' || $parts[0]=='reebok-wor-camo-b-olive-short' || $parts[0]=='reebok-wor-camo-b-blue-short' || $parts[0]=='adidas-lite-runner-m-black-running-shoe' || $parts[0]=='adidas-lite-runner-m-oliver-running-shoe' || $parts[0]=='adidas-sq-cc-run-black-short-m' || $parts[0]=='adidas-aron-1.0-navy-blue-sandal' || $parts[0]=='reebok-electrify-speed-black-running-shoes' || $parts[0]=='reebok-cf-ls-midwt-com-brown-tee' || $parts[0]=='reebok-el-woven-oh-navy-blue-track-pant' || $parts[0]=='reebok-el-woven-oh-grphite-track-pant' || $parts[0]=='reebok-el-woven-oh-blacktrack-pant' || $parts[0]=='reebok-ms-cor-black-jacket' || $parts[0]=='reebok-ms-cor-yellow-jacket' || $parts[0]=='adidas-aril-dark-blue-flip-flop' || $parts[0]=='adidas-aril-red-flip-flop' || $parts[0]=='reebok-fury-road-black-running-shos' || $parts[0]=='adidas-m-clima-purple-polo' || $parts[0]=='adidas-m-clima-black-polo' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='adidas-ace-15.4-fxg-green-football-shoes' || $parts[0]=='Adidas-Storm-Raiser-1-0' || $parts[0]=='adidas-ais-prime-pink-tee' || $parts[0]=='adidas-x-15.4-fxg-green-football-shoes'){$this->request->get['route']='common/home/page410';}
               } 
	}    
	
	public function rewrite($link) {
	
		$url_info = parse_url(str_replace('&amp;', '&', $link));
		 
		$url = ''; 
		
		$data = array();
		
		parse_str($url_info['query'], $data);
		
		foreach ($data as $key => $value) {
			if (isset($data['route'])) {
				if (($data['route'] == 'product/product' && $key == 'product_id') || (($data['route'] == 'product/manufacturer/info' || $data['route'] == 'product/product') && $key == 'manufacturer_id') || ($data['route'] == 'information/information' && $key == 'information_id')) {
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");
				
					if ($query->num_rows) {
						$url .= '/' . $query->row['keyword'];
						
						unset($data[$key]);
					}					
				} elseif ($key == 'path') {
					$categories = explode('_', $value);
					
					foreach ($categories as $category) {
						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = 'category_id=" . (int)$category . "'");
				
						if ($query->num_rows) {
							$url .= '/' . $query->row['keyword'];
						}							
					}
					
					unset($data[$key]);
				}
				
				/* SEO Custom URL */
                if( $_u = $this->getURL($data['route']) ){
                	$url .= $_u;
                    unset($data[$key]);
                }/* SEO Custom URL */ 
			}
		}
	
		if ($url) {
			$url = strtolower($url);
			unset($data['route']);
		
			$query = '';
		
			if ($data) {
				foreach ($data as $key => $value) {
					$query .= '&' . $key . '=' . $value;
				}
				
				if ($query) {
					$query = '?' . trim($query, '&');
				}
			}

			return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php', '', $url_info['path']) . $url . $query;
		} else {
			$link = strtolower($link);
			return $link;
		}
	}	

	/* SEO Custom URL */
    public function getURL($route) {
    	
            if( count($this->url_list) > 0) {
                 foreach ($this->url_list as $key => $value) {

                    if($route == $key) {

                        return '/'.$value;
                    }
                 }
            }
            return false; 
    }
    public function setURL($_route) {

            if( count($this->url_list) > 0 ){
                 foreach ($this->url_list as $key => $value) {
                    if($_route == $value) {
                        return $key;
                    }
                 }
            }
            return false;
    }/* SEO Custom URL */
}
?> 