<?php
class ModelCatalogReview extends Model {		
	public function addReview($product_id, $data) {


			$review_id = $this->db->getLastId();

		$this->load->model('setting/stvsetting');
		$this->model_setting_stvsetting->addSettingMPQ('config',0,'config_stv_new_review',$review_id);
		

			$this->load->model('catalog/product');

   			$product_info = $this->model_catalog_product->getProduct($product_id);
			if(empty($product_info)) return false;

			$template = new EmailTemplate($this->request, $this->registry);
            
			$template->addData($data, 'review');
			$template->addData($product_info, 'product');

			$template->data['product_link'] = $this->url->link('product/product', 'product_id=' . $product_id);
			$template->data['product_link_tracking'] = $template->getTracking($template->data['product_link']);
			$template->data['review_approve'] = (defined('HTTP_ADMIN') ? HTTP_ADMIN : HTTP_SERVER.'admin/') . 'index.php?route=catalog/review/update&review_id=' . $review_id;

			$template->load('product.review');

			$template->send(); 
			
			$query =$this->db->query("INSERT INTO " . DB_PREFIX . "review SET author = '" . $this->db->escape($data['name']) . "', customer_id = '" . (int)$this->customer->getId() . "', " . ($this->config->get('config_stv_auto_approve_review')==1 ? "status='1'," : "") . "product_id = '" . (int)$product_id . "', text = '" . $this->db->escape($data['text']) . "', rating = '" . (int)$data['rating'] . "', date_added = 'NOW()'");
		return 1;
			
	}

	public function addReview1($product_id, $data)
	{	


		$query =$this->db->query("INSERT INTO " . DB_PREFIX . "review SET author = '" . $this->db->escape($data['name']) . "', customer_id = '" . (int)$this->customer->getId() . "', product_id = '" . (int)$product_id . "', text = '" . $this->db->escape($data['text']) . "', rating = '" . (int)$data['rating'] . "', date_added = NOW()");
		return $query;
	}
		
	public function getReviewsByProductId($product_id, $start = 0, $limit = 20) {
		if ($start < 0) {
			$start = 0;
		}
		
		if ($limit < 1) {
			$limit = 20;
		}		
		
		$query = $this->db->query("SELECT r.review_id, r.author, r.rating, r.text, p.product_id, pd.name, p.price, p.image, r.date_added FROM " . DB_PREFIX . "review r LEFT JOIN " . DB_PREFIX . "product p ON (r.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND p.date_available <= NOW() AND p.status = '1' AND r.status = '1' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY r.date_added DESC LIMIT " . (int)$start . "," . (int)$limit);
			
		return $query->rows;
	}

	public function getTotalReviewsByProductId($product_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "review r LEFT JOIN " . DB_PREFIX . "product p ON (r.product_id = p.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND p.date_available <= NOW() AND p.status = '1' AND r.status = '1' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		
		return $query->row['total'];
	}
}
?>