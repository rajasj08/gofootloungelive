<?php
class Language {
	private $default = 'english';
	private $directory;
	
            private $path = DIR_LANGUAGE; 
	private $data = array();
 
	public function __construct($directory) {
		$this->directory = $directory;
	}
	
   public function setPath($path){
		if(!is_dir($path)){
			trigger_error('Error: check path exists: '.$path);
			exit;
		}
		$this->path = $path;
	} 
	
  	public function get($key) {
   		return (isset($this->data[$key]) ? $this->data[$key] : $key);
  	}
	
	public function load_full($filename, $loadOverwrite = true) {
		// Standard
		$file = $this->path . $this->directory . '/' . $filename . '.php';
		if (file_exists($file)) {
			$_ = array();		
			require(VQMod::modCheck(VQMod::modCheck($file)));		
			$this->data = array_merge($this->data, $_);

			// Standard with overwrite
            if($loadOverwrite){
				$file = $this->path . $this->directory . '/' . $filename . '_.php';		
				if (file_exists($file)) {
					$_ = array();		
					require(VQMod::modCheck(VQMod::modCheck($file)));		
					$this->data = array_merge($this->data, $_);
				}
			}

			return $this->data;
		}

		// Default
		$file = $this->path . $this->default . '/' . $filename . '.php';		
		if (file_exists($file)) {
			$_ = array();		
			require(VQMod::modCheck(VQMod::modCheck($file)));		
			$this->data = array_merge($this->data, $_);

			// Default with overwrite
            if($loadOverwrite){
				$file = $this->path . $this->directory . '/' . $filename . '_.php';		
				if (file_exists($file)) {
					$_ = array();		
					require(VQMod::modCheck(VQMod::modCheck($file)));		
					$this->data = array_merge($this->data, $_);
				}
			}

			return $this->data;
		} else {
			trigger_error('Error: Could not load language file: ' . $file . '!');
		}
	} 
	
	public function load($filename) {
	return $this->load_full($filename);
	
		$file = $this->path . $this->directory . '/' . $filename . '.php';
    	
		if (file_exists($file)) {
			$_ = array();
	  		
			require(VQMod::modCheck($file));
		
			$this->data = array_merge($this->data, $_);
			
			return $this->data;
		}
		
		$file = $this->path . $this->default . '/' . $filename . '.php';
		
		if (file_exists($file)) {
			$_ = array();
	  		
			require(VQMod::modCheck($file));
		
			$this->data = array_merge($this->data, $_);
			
			return $this->data;
		} else {
			trigger_error('Error: Could not load language ' . $filename . '!');
		//	
		}
  	}
}
?>
