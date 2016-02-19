<?php
class ControllerModuleBossCategoryImage extends Controller {
	private $error = array(); 

	public function index() {   
		$this->language->load('module/boss_categoryimage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');
		
		$this->load->model('tool/image');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('boss_categoryimage', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_category'] = $this->language->get('entry_category');
		$data['entry_setting'] = $this->language->get('entry_setting');
		$data['entry_image_size'] = $this->language->get('entry_image_size');
		$data['entry_image_width'] = $this->language->get('entry_image_width');
		$data['entry_image_height'] = $this->language->get('entry_image_height');
		$data['entry_show_name'] = $this->language->get('entry_show_name');
		$data['entry_hover_image'] = $this->language->get('entry_hover_image');
		$data['entry_html'] = $this->language->get('entry_html');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_text_css'] = $this->language->get('entry_text_css');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');		
		$data['button_add_module'] = $this->language->get('button_add_module');
		$data['button_remove'] = $this->language->get('button_remove');
		$data['button_setting'] = $this->language->get('button_setting');
		
		$data['module_tab'] = $this->language->get('module_tab');
		$data['module_setting'] = $this->language->get('module_setting');
		$data['setting_tab'] = $this->language->get('setting_tab');
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$data['token'] = $this->session->data['token'];

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/boss_categoryimage', 'token=' . $this->session->data['token'], 'SSL')
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/boss_categoryimage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL')
			);			
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('module/boss_categoryimage', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('module/boss_categoryimage', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}
   		
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}	
			
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
		
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
		
		if (isset($this->request->post['title'])) {
			$data['title'] = $this->request->post['title'];
		}elseif (!empty($module_info)) {
			$data['title'] = $module_info['title'];
		} else {
			$data['title'] = $this->config->get('title');
		}
		
		if (isset($this->request->post['boss_category_image'])) {
			$data['boss_category_images'] = $this->request->post['boss_category_image'];
		}elseif (!empty($module_info['boss_category_image'])) {
			$data['boss_category_images'] = $module_info['boss_category_image'];
		} else {
			$data['boss_category_images'] = array();
		}
		//echo'<pre>';print_r($data['boss_category_images']);echo'</pre>';die();
		
		//$data['module_id'] = $this->request->get['module_id'];
		
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		//load catalog categories 
		$this->load->model('catalog/category');
		$data['categories'] = $this->model_catalog_category->getCategories(0);
		
		if (!empty($data['boss_category_images'])) {
			foreach ($data['boss_category_images'] as $i => $boss_gallery_image) {
			
				if (isset($boss_gallery_image['image']) && file_exists(DIR_IMAGE . $boss_gallery_image['image'])) {
					$data['boss_category_images'][$i]['thumb'] = $this->model_tool_image->resize($boss_gallery_image['image'], 100, 100);
				} else {
					$data['boss_category_images'][$i]['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
				}
			}
		}
		//echo'<pre>';print_r($data['boss_category_images']);echo'</pre>';die();
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('module/boss_categoryimage.tpl', $data));
	}

	public function saveCateImg() {
	
	}
	
	public function settingModule () {
		$this->load->model('bossthemes/boss_categoryimage');
		
		if (isset($this->request->get['cateimg_id']) && !empty($this->request->get['cateimg_id'])) {
			$cateimg_id = $this->request->get['cateimg_id'];
			$cateimg = $this->model_bossthemes_boss_categoryimage->getCategoryImage($cateimg_id);
		} else {
			$cateimg = array();
		}
		
		if(!empty($cateimg)){
			$data['cateimg'] = array(
				'cateimg_id' => $cateimg['cateimg_id'],
				'show_name' => $cateimg['show_name'],
				'hover' => $cateimg['hover'],
				'text_caption' => $cateimg['text_caption'],
			);
		}else{
			$data['cateimg'] = array();
		}
	
		$json = array();
		
		$this->language->load('module/boss_categoryimage');
		
		$data['text_menu_title'] = $this->language->get('text_menu_title');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_url'] = $this->language->get('entry_url');
		$data['entry_icon'] = $this->language->get('entry_icon');
		$data['entry_icon_class'] = $this->language->get('entry_icon_class');
		$data['icon_class_css'] = $this->language->get('icon_class_css');
		$data['entry_label_color'] = $this->language->get('entry_label_color');
		$data['text_menu_label'] = $this->language->get('text_menu_label');
		$data['text_image_manager'] = $this->language->get('text_image_manager');
		$data['text_browse'] = $this->language->get('text_browse');
		$data['text_clear'] = $this->language->get('text_clear');
		$data['text_title_default'] = $this->language->get('text_title_default');
		$data['entry_num_column'] = $this->language->get('entry_num_column');
		
		
		
		//load languages
		$this->load->model('localisation/language');
		
		$data['languages'] = $this->model_localisation_language->getLanguages();
	
		$json['output'] = $this->load->view('module/boss_categoryimage_setting.tpl', $data);
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/boss_categoryimage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		return !$this->error;	
	}
	
}
?>