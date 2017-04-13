<?php class ControllerModuleSortshotel extends Controller {
  	protected function index() {
  	 $this->load->language('module/sortshotel');
     $this->data['heading_title'] = $this->language->get('heading_title');
     $this->data['text_sortpriss'] = $this->language->get('text_sortpriss');
     $this->data['text_sorthours'] = $this->language->get('text_sorthours');
     $this->data['text_sortname'] = $this->language->get('text_sortname');
    
         if(isset($this->request->post['qt'])){
         $this->data['loai_ve'] = $this->request->post['qt'];
     }else{
         $this->data['loai_ve'] = 0;
     } 
     
     
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/sortshotel.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/sortshotel.tpl';
		} else {
			$this->template = 'default/template/module/sortshotel.tpl';
		}
		
	$this->render();
    }
} ?>