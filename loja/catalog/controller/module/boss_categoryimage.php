<?php  
class ControllerModuleBossCategoryImage extends Controller {
	public function index($setting) {
		if(empty($setting)) return;

		$data['heading_title'] = isset($setting['title'][$this->config->get('config_language_id')])?$setting['title'][$this->config->get('config_language_id')]:'';
		
		$this->document->addScript('catalog/view/javascript/isotope.pkgd.js');
		$this->document->addScript('catalog/view/javascript/packery-mode.pkgd.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/bossthemes/isotope.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/bossthemes/isotope.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/isotope.css');
		}
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/bossthemes/isotope.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/bossthemes/isotope.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/isotope.css');
		}

		$this->load->model('tool/image');
		
		if ($setting['boss_category_image']) { 
			$category_images = $setting['boss_category_image'];
		} else {
			$category_images = array();
		}
		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}
		$data['category_images'] = array();
		
		$this->load->model('catalog/category');
		
		if(!empty($category_images)) {
			foreach ($category_images as $category_image) {
				if ($category_image['image'] && file_exists(DIR_IMAGE . $category_image['image'])){ 
					$image = $this->model_tool_image->resize($category_image['image'],$category_image['image_width'],$category_image['image_height']);
				} else {
					$image = '';
				}
				
				$category_info = $this->model_catalog_category->getCategory($category_image['category_id']);
				
				$category_image_desc = html_entity_decode($category_image[$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');

				$data['category_images'][] = array(
					  'cateId' => $category_info['category_id'],
					  'image' => $image,
					  'name' => $category_info['name'],
					  'image_width' => $category_image['image_width'],
					  'image_height' => $category_image['image_height'],
					  'href' => $this->url->link('product/category', 'path=' . $category_info['category_id']),
					  'show_name' => $category_image['show_name'],
					  'text_css' => $category_image['text_css'] ? $category_image['text_css'] : "" ,
					  'hover_image' => $category_image['hover_image'],
					  'description' => $category_image_desc,
				);
			}
		}
        // echo'<pre>';print_r($data['category_images']);echo'</pre>';die();
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/boss_categoryimage.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/boss_categoryimage.tpl', $data);
		} else {
			return $this->load->view('default/template/module/boss_categoryimage.tpl', $data);
		}
	}
}
?>
