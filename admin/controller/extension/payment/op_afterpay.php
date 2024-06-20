<?php 
class ControllerExtensionPaymentOPAfterpay extends Controller {
	private $error = array(); 

	public function index() {
		$this->load->language('extension/payment/op_afterpay');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');
			
			$this->model_setting_setting->editSetting('op_afterpay', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_pay'] = $this->language->get('text_pay');
		$data['text_test'] = $this->language->get('text_test');	
		$data['text_pay_iframe'] = $this->language->get('text_pay_iframe');
		$data['text_pay_redirect'] = $this->language->get('text_pay_redirect');	
		$data['text_3d_on'] = $this->language->get('text_3d_on');
		$data['text_3d_off'] = $this->language->get('text_3d_off');
		$data['text_select_currency'] = $this->language->get('text_select_currency');
		$data['text_select_all'] = $this->language->get('text_select_all');
		$data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$data['text_logs_true'] = $this->language->get('text_logs_true');
		$data['text_logs_false'] = $this->language->get('text_logs_false');
		
		$data['entry_account'] = $this->language->get('entry_account');
		$data['entry_terminal'] = $this->language->get('entry_terminal');
		$data['entry_securecode'] = $this->language->get('entry_securecode');
		$data['entry_3d'] = $this->language->get('entry_3d');
		$data['entry_3d_terminal'] = $this->language->get('entry_3d_terminal');
		$data['entry_3d_securecode'] = $this->language->get('entry_3d_securecode');
		$data['entry_currencies'] = $this->language->get('entry_currencies');
		$data['entry_currencies_value'] = $this->language->get('entry_currencies_value');
		$data['entry_countries'] = $this->language->get('entry_countries');
		$data['entry_transaction'] = $this->language->get('entry_transaction');
		$data['entry_pay_mode'] = $this->language->get('entry_pay_mode');
	
		$data['entry_default_order_status'] = $this->language->get('entry_default_order_status');	
		$data['entry_success_order_status']=$this->language->get('entry_success_order_status');
		$data['entry_failed_order_status']=$this->language->get('entry_failed_order_status');
		$data['entry_pending_order_status']=$this->language->get('entry_pending_order_status');
		
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		$data['entry_location'] = $this->language->get('entry_location');
        $data['entry_locations'] = $this->language->get('entry_locations');
        $data['entry_entity'] = $this->language->get('entry_entity');
        $data['entry_entitys'] = $this->language->get('entry_entitys');
		$data['entry_logs'] = $this->language->get('entry_logs');

		$data['text_show'] = $this->language->get('text_show');
		$data['text_hide'] = $this->language->get('text_hide');

		$data['text_shows'] = $this->language->get('text_shows');
		$data['text_hides'] = $this->language->get('text_hides');



 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

 		if (isset($this->error['account'])) {
			$data['error_account'] = $this->error['account'];
		} else {
			$data['error_account'] = '';
		}

		if (isset($this->error['terminal'])) {
			$data['error_terminal'] = $this->error['terminal'];
		} else {
			$data['error_terminal'] = '';
		}		
		
 		if (isset($this->error['securecode'])) {
			$data['error_securecode'] = $this->error['securecode'];
		} else {
			$data['error_securecode'] = '';
		}

  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
   			'text' => $this->language->get('text_home'),
       		'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL'),
   		);

   		$data['breadcrumbs'][] = array(
       		'text' => $this->language->get('text_payment'),
   			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL'),
   		);

   		$data['breadcrumbs'][] = array(
       		'text' => $this->language->get('heading_title'),
   			'href' => $this->url->link('extension/payment/op_afterpay', 'token=' . $this->session->data['token'], 'SSL'),
   		);
				
		$data['action'] = $this->url->link('extension/payment/op_afterpay', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['op_afterpay_account'])) {
			$data['op_afterpay_account'] = $this->request->post['op_afterpay_account'];
		} else {
			$data['op_afterpay_account'] = $this->config->get('op_afterpay_account');
		}
		
		if (isset($this->request->post['op_afterpay_terminal'])) {
			$data['op_afterpay_terminal'] = $this->request->post['op_afterpay_terminal'];
		} else {
			$data['op_afterpay_terminal'] = $this->config->get('op_afterpay_terminal');
		}
		
		if (isset($this->request->post['op_afterpay_securecode'])) {
			$data['op_afterpay_securecode'] = $this->request->post['op_afterpay_securecode'];
		} else {
			$data['op_afterpay_securecode'] = $this->config->get('op_afterpay_securecode');
		}
		
		$this->load->model('localisation/currency');
		$results = $this->model_localisation_currency->getCurrencies();
		foreach ($results as $result) {
			$data['currencies'][] = $result['code'];
		}
		
		
		if (isset($this->request->post['op_afterpay_currencies_value'])) {
			$data['op_afterpay_currencies_value'] = $this->request->post['op_afterpay_currencies_value'];
		} else {
			$data['op_afterpay_currencies_value'] = $this->config->get('op_afterpay_currencies_value');
		}
		
		
		
		$this->load->model('localisation/country');
		$data['countries'] = $this->model_localisation_country->getCountries();
		
		if (isset($this->request->post['op_afterpay_country_array'])) {
			$data['op_afterpay_country_array'] = $this->request->post['op_afterpay_country_array'];
		} elseif ($this->config->has('op_afterpay_country_array')) {
			$data['op_afterpay_country_array'] = $this->config->get('op_afterpay_country_array');
		} else {
			$data['op_afterpay_country_array'] = array();
		}
		
		
		$data['callback'] = HTTP_CATALOG . 'index.php?route=extension/payment/op_afterpay/callback';

		
		if (isset($this->request->post['op_afterpay_transaction'])) {
			$data['op_afterpay_transaction'] = $this->request->post['op_afterpay_transaction'];
		} else {
			$data['op_afterpay_transaction'] = $this->config->get('op_afterpay_transaction');
		}
		
		if (isset($this->request->post['op_afterpay_pay_mode'])) {
			$data['op_afterpay_pay_mode'] = $this->request->post['op_afterpay_pay_mode'];
		} else {
			$data['op_afterpay_pay_mode'] = $this->config->get('op_afterpay_pay_mode');
		}

		if (isset($this->request->post['op_afterpay_logs'])) {
			$data['op_afterpay_logs'] = $this->request->post['op_afterpay_logs'];
		} else {
			$data['op_afterpay_logs'] = $this->config->get('op_afterpay_logs');
		}
		
		if (isset($this->request->post['op_afterpay_default_order_status_id'])) {
			$data['op_afterpay_default_order_status_id'] = $this->request->post['op_afterpay_default_order_status_id'];
		} else {
			$data['op_afterpay_default_order_status_id'] = $this->config->get('op_afterpay_default_order_status_id'); 
		} 
		/* add status */
		if (isset($this->request->post['op_afterpay_success_order_status_id'])) {
			$data['op_afterpay_success_order_status_id'] = $this->request->post['op_afterpay_success_order_status_id'];
		} else {
			$data['op_afterpay_success_order_status_id'] = $this->config->get('op_afterpay_success_order_status_id'); 
		} 
		if (isset($this->request->post['op_afterpay_failed_order_status_id'])) {
			$data['op_afterpay_failed_order_status_id'] = $this->request->post['op_afterpay_failed_order_status_id'];
		} else {
			$data['op_afterpay_failed_order_status_id'] = $this->config->get('op_afterpay_failed_order_status_id'); 
		} 
		if (isset($this->request->post['op_afterpay_pending_order_status_id'])) {
			$data['op_afterpay_pending_order_status_id'] = $this->request->post['op_afterpay_pending_order_status_id'];
		} else {
			$data['op_afterpay_pending_order_status_id'] = $this->config->get('op_afterpay_pending_order_status_id');
		}
		
		
		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['op_afterpay_geo_zone_id'])) {
			$data['op_afterpay_geo_zone_id'] = $this->request->post['op_afterpay_geo_zone_id'];
		} else {
			$data['op_afterpay_geo_zone_id'] = $this->config->get('op_afterpay_geo_zone_id'); 
		} 

		$this->load->model('localisation/geo_zone');
										
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['op_afterpay_status'])) {
			$data['op_afterpay_status'] = $this->request->post['op_afterpay_status'];
		} else {
			$data['op_afterpay_status'] = $this->config->get('op_afterpay_status');
		}
		
		if (isset($this->request->post['op_afterpay_sort_order'])) {
			$data['op_afterpay_sort_order'] = $this->request->post['op_afterpay_sort_order'];
		} else {
			$data['op_afterpay_sort_order'] = $this->config->get('op_afterpay_sort_order');
		}
		
		if (isset($this->request->post['op_afterpay_location'])) {
          $data['op_afterpay_location'] = $this->request->post['op_afterpay_location'];
		  } else {
			  $data['op_afterpay_location'] = $this->config->get('op_afterpay_location');
		  }

		  if (isset($this->request->post['op_afterpay_locations'])) {
			  $data['op_afterpay_locations'] = $this->request->post['op_afterpay_locations'];
		  } else {
			  $data['op_afterpay_locations'] = $this->config->get('op_afterpay_locations');
		  }

		  if (isset($this->request->post['op_afterpay_entity'])) {
			  $data['op_afterpay_entity'] = $this->request->post['op_afterpay_entity'];
		  } else {
			  $data['op_afterpay_entity'] = $this->config->get('op_afterpay_entity');
		  }

		  if (isset($this->request->post['op_afterpay_entitys'])) {
			  $data['op_afterpay_entitys'] = $this->request->post['op_afterpay_entitys'];
		  } else {
			  $data['op_afterpay_entitys'] = $this->config->get('op_afterpay_entitys');
		  }

		//存入session
		  $this->session->data['op_afterpay_location'] = $data['op_afterpay_location'];
		  $this->session->data['op_afterpay_locations'] = $data['op_afterpay_locations'];
		  $this->session->data['op_afterpay_entity'] = $data['op_afterpay_entity'];
		  $this->session->data['op_afterpay_entitys'] = $data['op_afterpay_entitys'];

			
			
			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			
			$this->response->setOutput($this->load->view('extension/payment/op_afterpay.tpl', $data));
		}
		

	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/op_afterpay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['op_afterpay_account']) {
			$this->error['account'] = $this->language->get('error_account');
		}

		if (!$this->request->post['op_afterpay_terminal']) {
			$this->error['terminal'] = $this->language->get('error_terminal');
		}		
		
		if (!$this->request->post['op_afterpay_securecode']) {
			$this->error['securecode'] = $this->language->get('error_securecode');
		}
		
		return !$this->error;
	}
}
?>
