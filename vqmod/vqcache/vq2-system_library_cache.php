<?php
class Cache { 
	private $expire = 3600; 

  
        
            // Returns the product data or an empty array if nothing found
            
            public function adsmart_search_get($hash, $label='') {
    
    
                $files = glob(DIR_CACHE . 'cache-'.$label.'.' . preg_replace('/[^A-Z0-9\._-]/i', '', $hash) . '.*');
        // (2)  
                if ($files) {
            
                    $cache = file_get_contents($files[0]); // if there are multiple files we pick only the first one
                
                    $data = unserialize($cache);

                    foreach ($files as $file) {
                        $time = substr(strrchr($file, '.'), 1);

                        if ($time < time()) {
                            
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                    }

                    global $registry;
                    $registry->set('product_total', $data['product_total']);
                    
                    // delete the total number of products and search options from the array $data 
                    unset($data['product_total']);
                    unset($data['search_options']);

                    return $data ; /* don't remove the extra space between $data and ; */
                }
                else {
                    return array();
                }
            }

            
            
            
            public function adsmart_search_set($current_search_options, $value, $product_total, $label='', $expire=3600) {
                
                // http_build_query() converts the associative array into string
                $hash = md5(http_build_query($current_search_options));
            
                
                $this->adsmart_search_delete($hash, $label);
                
                $file = DIR_CACHE . 'cache-'.$label.'.' . preg_replace('/[^A-Z0-9\._-]/i', '', $hash) . '.' . (time() + $expire);
                
                $handle = fopen($file, 'w');
                
                // Add the search options to the array so we know which settings have been used to make the query.
                // The array current_search_options contains the user search options and the hash for the 
                // control panel search options.
                // The search options are stored in the last array element. The array $value is an array of arrays,
                // whose structure is:
                
                // [0]                  => pruoduct 1 array 
                // ...
                // [n-2]                => product n array 
                // [product_total]      => total number of products 
                // [search_options]     => search options array
                
                $value['product_total']  = $product_total;
                $value['search_options'] = $current_search_options;

                $result = fwrite($handle, serialize($value));
                
                fclose($handle) ;  /* don't remove the extra space between fclose($handle) and ; */
                
                if ($result != false) return true;
                else return false;
            }
            

            
            
            public function adsmart_search_delete($hash, $label='') {
                $files = glob(DIR_CACHE . 'cache-'.$label.'.' . preg_replace('/[^A-Z0-9\._-]/i', '', $hash) . '.*');
                
                if ($files) {
                    foreach ($files as $file) {
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    }
                }
                return;
            }
            
            public function adsmart_search_clear_cache($label) {
            
                if ( $label == 'search_string' || $label == 'misspellings' ) {
                
                    $files = glob(DIR_CACHE . 'cache-'.$label.'.*');
                    
                    if ($files) {
                        foreach ($files as $file) {
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                    } 
                    return true;
                }
                else {
                    return false;
                }
            }

            
	public function get($key) {
		$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');

		if ($files) {
			$cache = file_get_contents($files[0]);
			
			$data = unserialize($cache);
			
			foreach ($files as $file) {
				$time = substr(strrchr($file, '.'), 1);

      			if ($time < time()) {
					if (file_exists($file)) {
						unlink($file);
					}
      			}
    		}
			
			return $data;			
		}
	}

  	public function set($key, $value) {
    	$this->delete($key);
		
		$file = DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.' . (time() + $this->expire);
    	
		$handle = fopen($file, 'w');

    	fwrite($handle, serialize($value));
		
    	fclose($handle);
  	}
	
  	public function delete($key) {
		$files = glob(DIR_CACHE . 'cache.' . preg_replace('/[^A-Z0-9\._-]/i', '', $key) . '.*');
		
		if ($files) {
    		foreach ($files as $file) {
      			if (file_exists($file)) {
					unlink($file);
				}
    		}
		}
  	}
}
?>