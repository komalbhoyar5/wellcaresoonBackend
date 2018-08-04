<?php

class SettingsController extends AppController {
	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function isAuthorized($user) {
		return true;
	}

	public function project_setting(){
		$this->layout = "backend_template";
		// company details
		$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
		$this->set('company_details',$company_details);

		// currency
		$currency = $this->Setting->find('first', array('conditions'=>array('name'=>'currency')));
		$this->set('currency_type', $currency['Setting']['value']);
		$this->set('currency_symbol', $currency['Setting']['other']);

		//company address details
		$Component = $this->Components->load('General');
		$return = $Component->GetCountries();
		$this->set('countries', $return);
		
		$addr = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_address_details')));
		$addr_details = array();
		foreach ($addr as $add) {
			$addr_details[$add['Setting']['name']] = $add['Setting']['value'];
		}

		$this->set('addr_details', $addr_details);
		$states = array();
		if (isset($addr_details['country'])) {
			$states = $Component->GetState($addr_details['country']);
			$this->set('states', $states);
		}

		// company taxes details
		$taxes = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_tax_details')));
		$tax_details = array();
		foreach ($taxes as $tax) {
			$tax_details[$tax['Setting']['name']] = $tax['Setting']['value'];
		}

		$this->set('tax_details', $tax_details);
	}

	public function company_details(){
		$return = false;
		if ($this->request->is('post')) {

			$getdata = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
			if ($_FILES['logo']['name'] != "") {
				$upload_path = 'img/upload/company_details';
				$Component = $this->Components->load('General');
				$return = $Component->upload_image($_FILES, $upload_path);
				$img = $upload_path. "/" . $_FILES['logo']['name'];
			}else{
				$img = $getdata['Setting']['other'];
			}
			$company_name = $this->request->data['company_name'];
				
				if (!empty($getdata)) {
					$id = $getdata['Setting']['id'];
					$postdata['Setting'] = array('id'=>$id,'name'=>'company_name', 'value'=> $company_name, 'other'=>$img);
				}else{
					$postdata['Setting'] = array('name'=>'company_name', 'value'=> $company_name, 'other'=>$img);
					$this->Setting->create();
				}
				
				if ($this->Setting->save($postdata)) {
					$this->Session->write('company_name',$postdata['Setting']['value']);
        			$this->Session->write('company_logo',$postdata['Setting']['other']);
					$this->Session->setFlash('company name details updated successfully.', '', array(), 'success');
				}else{
					$this->Session->setFlash('Unable to save details.', '', array(), 'fail');
				}
				return $this->redirect(array('action' => 'project_setting'));
		}
	}

	public function shipping_charges(){
		if ($this->request->is('post')) {
			$tax = $this->Setting->find('first', array('conditions'=>array('name'=>'tax')));
			$cash_on_delivery = $this->Setting->find('first', array('conditions'=>array('name'=>'cash_on_delivery')));
			$shipping_charges = $this->Setting->find('first', array('conditions'=>array('name'=>'shipping_charges')));
			$post_tax = number_format($this->request->data['Setting']['tax'], 2, '.', '');
			$post_cash_on_delivery = number_format($this->request->data['Setting']['cash_on_delivery'], 2, '.', '');
			$post_shipping_charges = number_format($this->request->data['Setting']['shipping_charges'], 2, '.', '');
			if (empty($tax) && empty($cash_on_delivery) && empty($shipping_charges)) {
				$postdata['Setting'] = array(
											'0' => array('name'=>'tax', 'value'=> $post_tax),
											'1' => array('name'=>'cash_on_delivery', 'value'=> $post_cash_on_delivery),
											'2' => array('name'=>'shipping_charges', 'value'=> $post_shipping_charges)
										);
				$this->Setting->create();
			}else{
				$postdata['Setting'] = array(
											'0' => array('id'=>$tax['Setting']['id'],'name'=>'tax', 'value'=> $post_tax),
											'1' => array('id'=>$cash_on_delivery['Setting']['id'],'name'=>'cash_on_delivery', 'value'=> $post_cash_on_delivery),
											'2' => array('id'=>$shipping_charges['Setting']['id'],'name'=>'shipping_charges', 'value'=> $post_shipping_charges)
										);
			}
			if ($this->Setting->saveMany($postdata['Setting'])) {
				$this->Session->setFlash('Details updated successfully.', '', array(), 'success');
			}else{
				$this->Session->setFlash('Unable to update.', '', array(), 'fail');
			}
			return $this->redirect(array('action' => 'project_setting'));
		}
	}

	public function set_currency(){
		if ($this->request->is('post')) {
			$data = $this->Setting->find('first', array('conditions'=>array('name'=>'currency')));
			$currency_type = $this->request->data['Setting']['currency_type'];
			$curr_symbol = $this->request->data['Setting']['curr_symbol'];
			if (!empty($data)) {
				$id = $data['Setting']['id'];
				$postdata['Setting'] = array('id'=>$id,'name'=>'currency', 'value'=> $currency_type, 'other'=>htmlspecialchars($curr_symbol));
			}else{
				$postdata['Setting'] = array('name'=>'currency', 'value'=> $currency_type, 'other'=>htmlspecialchars($curr_symbol));
				$this->Setting->create();
			}
			if ($this->Setting->save($postdata)) {
				$this->Session->setFlash('currency details updated successfully.', '', array(), 'success');
			}else{
				$this->Session->setFlash('Unable to save details.', '', array(), 'fail');
			}
			return $this->redirect(array('action' => 'project_setting'));
		}
	}

	public function company_contact_details(){
		if($this->request->is('post')){
			$ship_to_country = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_country')));
			$ship_to_state = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_state')));
			$ship_to_city = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_city')));
			$ship_to_pin_code = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_pin_code')));
			$ship_to_phone = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_phone')));
			$ship_add = $this->Setting->find('first', array('conditions'=>array('name'=>'ship_to_address')));

			$bill_to_country = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_country')));
			$bill_to_state = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_state')));
			$bill_to_city = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_city')));
			$bill_to_pin_code = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_pin_code')));
			$bill_to_phone = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_phone')));
			$bill_add = $this->Setting->find('first', array('conditions'=>array('name'=>'bill_to_address')));

			$office_address = $this->Setting->find('first', array('conditions'=>array('name'=>'office_address')));
			$gst_no = $this->Setting->find('first', array('conditions'=>array('name'=>'GST_no')));
			$CIN = $this->Setting->find('first', array('conditions'=>array('name'=>'CIN')));
			$PAN = $this->Setting->find('first', array('conditions'=>array('name'=>'PAN')));
			$TAN = $this->Setting->find('first', array('conditions'=>array('name'=>'TAN')));
			$customer_care_no = $this->Setting->find('first', array('conditions'=>array('name'=>'customer_care_no')));
			$customercare_email_id = $this->Setting->find('first', array('conditions'=>array('name'=>'customercare_email_id')));
				// print_r($this->request->data);
				// exit();
				$post_ship_to_address = $this->request->data['Setting']['ship_to_address'];
				$post_ship_to_country = $this->request->data['Setting']['ship_to_country'];
				$post_ship_to_state = $this->request->data['Setting']['ship_to_state'];
				$post_ship_to_city = $this->request->data['Setting']['ship_to_city'];
				$post_ship_to_pin_code = $this->request->data['Setting']['ship_to_pin_code'];
				$post_ship_to_phone = $this->request->data['Setting']['ship_to_phone'];

				$post_bill_to_country = $this->request->data['Setting']['bill_to_country'];
				$post_bill_to_state = $this->request->data['Setting']['bill_to_state'];
				$post_bill_to_city = $this->request->data['Setting']['bill_to_city'];
				$post_bill_to_pin_code = $this->request->data['Setting']['bill_to_pin_code'];
				$post_bill_to_phone = $this->request->data['Setting']['bill_to_phone'];
				$post_bill_to_address = $this->request->data['Setting']['bill_to_address'];

				$post_office_address= $this->request->data['Setting']['office_address'];
				$post_GST_no = $this->request->data['Setting']['GST_no'];
				$post_CIN = $this->request->data['Setting']['CIN'];
				$post_PAN = $this->request->data['Setting']['PAN'];
				$post_TAN = $this->request->data['Setting']['TAN'];
				$post_customer_care_no = $this->request->data['Setting']['customer_care_no'];
				$post_customercare_email_id = $this->request->data['Setting']['customercare_email_id'];

			if (empty($ship_add) && empty($bill_add) && empty($gst_no) && empty($customer_care_no) && empty($customercare_email_id) && empty($CIN) && empty($PAN) && empty($TAN) && empty($ship_to_country) && empty($ship_to_state)) {
				$postdata['Setting'] = array(
											'0' => array('name'=>'ship_to_address', 'value'=> $ship_to_address),
											'1' => array('name'=>'bill_to_address', 'value'=> $post_bill_to_address),
											'2' => array('name'=>'GST_no', 'value'=> $post_GST_no),
											'3' => array('name'=>'customer_care_no', 'value'=> $post_customer_care_no),
											'4' => array('name'=>'customercare_email_id', 'value'=> $post_customercare_email_id),
											'5' => array('name'=>'CIN', 'value'=> $post_CIN),
											'6' => array('name'=>'PAN', 'value'=> $post_PAN),
											'7' => array('name'=>'TAN', 'value'=> $post_TAN),
											'8' => array('name'=>'ship_to_country', 'value'=> $post_ship_to_country),
											'9' => array('name'=>'ship_to_state', 'value'=> $post_ship_to_state),
											'10' => array('name'=>'ship_to_city', 'value'=> $post_ship_to_city),
											'11' => array('name'=>'ship_to_pin_code', 'value'=> $post_ship_to_pin_code),
											'12' => array('name'=>'ship_to_phone', 'value'=> $post_ship_to_phone),
											'13' => array('name'=>'bill_to_country', 'value'=> $post_bill_to_country),
											'14' => array('name'=>'bill_to_state', 'value'=> $post_bill_to_state),
											'15' => array('name'=>'bill_to_city', 'value'=> $post_bill_to_city),
											'16' => array('name'=>'bill_to_pin_code', 'value'=> $post_bill_to_pin_code),
											'17' => array('name'=>'bill_to_phone', 'value'=> $post_bill_to_phone),
											'18' => array('name'=>'office_address', 'value'=> $post_office_address)
										);
				$this->Setting->create();
			}else{
				$postdata['Setting'] = array(
											'0' => array('id'=>$ship_add['Setting']['id'],'name'=>'ship_to_address', 'value'=> $post_ship_to_address),
											'1' => array('id'=>$bill_add['Setting']['id'],'name'=>'bill_to_address', 'value'=> $post_bill_to_address),
											'2' => array('id'=>$gst_no['Setting']['id'],'name'=>'GST_no', 'value'=> $post_GST_no),
											'3' => array('id'=>$customer_care_no['Setting']['id'],'name'=>'customer_care_no', 'value'=> $post_customer_care_no),
											'4' => array('id'=>$customercare_email_id['Setting']['id'],'name'=>'customercare_email_id', 'value'=> $post_customercare_email_id),
											'5' => array('id'=>$CIN['Setting']['id'], 'name'=>'CIN', 'value'=> $post_CIN),
											'6' => array('id'=>$PAN['Setting']['id'], 'name'=>'PAN', 'value'=> $post_PAN),
											'7' => array('id'=>$TAN['Setting']['id'], 'name'=>'TAN', 'value'=> $post_TAN),
											'8' => array('id'=>$ship_to_country['Setting']['id'], 'name'=>'ship_to_country', 'value'=> $post_ship_to_country),
											'9' => array('id'=>$ship_to_state['Setting']['id'], 'name'=>'ship_to_state', 'value'=> $post_ship_to_state),
											'10' => array('id'=>$ship_to_city['Setting']['id'], 'name'=>'ship_to_city', 'value'=> $post_ship_to_city),
											'11' => array('id'=>$ship_to_pin_code['Setting']['id'], 'name'=>'ship_to_pin_code', 'value'=> $post_ship_to_pin_code),
											'12' => array('id'=>$ship_to_phone['Setting']['id'], 'name'=>'ship_to_phone', 'value'=> $post_ship_to_phone),
											'13' => array('id'=>$bill_to_country['Setting']['id'], 'name'=>'bill_to_country', 'value'=> $post_bill_to_country),
											'14' => array('id'=>$bill_to_state['Setting']['id'], 'name'=>'bill_to_state', 'value'=> $post_bill_to_state),
											'15' => array('id'=>$bill_to_city['Setting']['id'], 'name'=>'bill_to_city', 'value'=> $post_bill_to_city),
											'16' => array('id'=>$bill_to_pin_code['Setting']['id'], 'name'=>'bill_to_pin_code', 'value'=> $post_bill_to_pin_code),
											'17' => array('id'=>$bill_to_phone['Setting']['id'], 'name'=>'bill_to_phone', 'value'=> $post_bill_to_phone),
											'18' => array('id'=>$office_address['Setting']['id'],'name'=>'office_address', 'value'=> $post_office_address)

										);
			}
			if ($this->Setting->saveMany($postdata['Setting'])) {
				$this->Session->setFlash('Details updated successfully.', '', array(), 'success');
			}else{
				$this->Session->setFlash('Unable to update.', '', array(), 'fail');
			}
			return $this->redirect(array('action' => 'project_setting'));
		}
	}

	public function company_address_details(){
		if($this->request->is('post')){
			$addr = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_address_details')));
			$postdata = $this->request->data['Setting'];

				$addr_details = array();
			if (is_array($addr) && !empty($addr)) {
				foreach ($addr as $add) {
					$addr_details[$add['Setting']['name']] = $add['Setting']['id'];
				}
				$postdata['Setting'] = array();
				if (isset($addr_details['country'])) {
					$postdata['Setting']['0'] = array('id' => $addr_details['country'], 'name'=>'country', 'form_type' => 'company_address_details', 'value'=> $postdata['country']);
				}else{
					$postdata['Setting']['0'] = array('name'=>'country', 'form_type' => 'company_address_details', 'value'=> $postdata['country']);
				}
				if (isset($addr_details['contact_no'])) {
					$postdata['Setting']['1'] = array('id' => $addr_details['contact_no'], 'name'=>'contact_no', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_no']);
				}else{
					$postdata['Setting']['1'] = array('name'=>'contact_no', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_no']);
				}
				if (isset($addr_details['address1'])) {
					$postdata['Setting']['2'] = array('id' => $addr_details['address1'], 'name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']);
				}else{
					$postdata['Setting']['2'] = array('name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']);
				}
				if (isset($addr_details['address2'])) {
					$postdata['Setting']['3'] = array('id' => $addr_details['address2'], 'name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']);
				}else{
					$postdata['Setting']['3'] = array('name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']);
				}
				if (isset($addr_details['landmark'])) {
					$postdata['Setting']['4'] = array('id' => $addr_details['landmark'], 'name'=>'landmark', 'form_type' => 'company_address_details', 'value'=> $postdata['landmark']);
				}else{
					$postdata['Setting']['4'] = array('name'=>'landmark', 'form_type' => 'company_address_details', 'value'=> $postdata['landmark']);
				}
				if (isset($addr_details['state'])) {
					$postdata['Setting']['5'] = array('id' => $addr_details['state'], 'name'=>'state', 'form_type' => 'company_address_details', 'value'=> $postdata['state']);
				}else{
					$postdata['Setting']['5'] = array('name'=>'state', 'form_type' => 'company_address_details', 'value'=> $postdata['state']);
				}
				if (isset($addr_details['city'])) {
					$postdata['Setting']['6'] = array('id' => $addr_details['city'], 'name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city']);
				}else{
					$postdata['Setting']['6'] = array('name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city']);
				}
				if (isset($addr_details['pincode'])) {
					$postdata['Setting']['7'] = array('id' => $addr_details['pincode'], 'name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']);
				}else{
					$postdata['Setting']['7'] = array('name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']);
				}
				if (isset($addr_details['office_address'])) {
					$postdata['Setting']['8'] = array('id' => $addr_details['office_address'], 'name'=>'office_address', 'form_type' => 'company_address_details', 'value'=> $postdata['office_address']);
				}else{
					$postdata['Setting']['8'] = array('name'=>'office_address', 'form_type' => 'company_address_details', 'value'=> $postdata['office_address']);
				}
				if (isset($addr_details['customer_care_no'])) {
					$postdata['Setting']['9'] = array('id' => $addr_details['customer_care_no'], 'name'=>'customer_care_no', 'form_type' => 'company_address_details', 'value'=> $postdata['customer_care_no']);
				}else{
					$postdata['Setting']['9'] = array('name'=>'customer_care_no', 'form_type' => 'company_address_details', 'value'=> $postdata['customer_care_no']);
				}
				if (isset($addr_details['contact_email_id'])) {
					$postdata['Setting']['10'] = array('id' => $addr_details['contact_email_id'], 'name'=>'contact_email_id', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_email_id']);
				}else{
					$postdata['Setting']['10'] = array('name'=>'contact_email_id', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_email_id']);
				}	
				
			}else{
				$postdata['Setting'] = array(
					'0' => array('name'=>'country', 'form_type' => 'company_address_details', 'value'=> $postdata['country']),
					'1' => array('name'=>'contact_no', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_no']),
					'2' => array('name'=>'address1', 'form_type' => 'company_address_details', 'value'=> $postdata['address1']),
					'3' => array('name'=>'address2', 'form_type' => 'company_address_details', 'value'=> $postdata['address2']),
					'4' => array('name'=>'landmark', 'form_type' => 'company_address_details', 'value'=> $postdata['landmark']),
					'5' => array('name'=>'state', 'form_type' => 'company_address_details', 'value'=> $postdata['state']),
					'6' => array('name'=>'city', 'form_type' => 'company_address_details', 'value'=> $postdata['city']),
					'7' => array('name'=>'pincode', 'form_type' => 'company_address_details', 'value'=> $postdata['pincode']),
					'8' => array('name'=>'office_address', 'form_type' => 'company_address_details', 'value'=> $postdata['office_address']),
					'9' => array('name'=>'customer_care_no', 'form_type' => 'company_address_details', 'value'=> $postdata['customer_care_no']),
					'10' => array('name'=>'customercare_email_id', 'form_type' => 'company_address_details', 'value'=> $postdata['customercare_email_id']),
					'11' => array('name'=>'contact_email_id', 'form_type' => 'company_address_details', 'value'=> $postdata['contact_email_id'])
				);
			}
			if ($this->Setting->saveMany($postdata['Setting'])) {
				$this->Session->setFlash('Details updated successfully.', '', array(), 'success');
			}else{
				$this->Session->setFlash('Unable to update.', '', array(), 'fail');
			}
			return $this->redirect(array('action' => 'project_setting'));
		}
	}

	public function getstate(){
		if ($this->request->is('ajax')) {
			$country_id = $this->request->data['country_id'];
			$Component = $this->Components->load('General');
			$return = $Component->getstate($country_id);
			echo "<option value=''>Select state</option>";
			foreach ($return as $key => $value) {
				 echo "<option value='".$key."'>".$value."</option>";
			}
		}
		exit();
	}

	public function company_tax_details(){
		if ($this->request->is('post')) {
			$taxes_details = $this->Setting->find('all', array('conditions'=>array('form_type'=>'company_tax_details')));
			
			$postdata = $this->request->data['Setting'];

				$taxes_data = array();
			if (is_array($taxes_details) && !empty($taxes_details)) {
				foreach ($taxes_details as $taxes) {
					$taxes_data[$taxes['Setting']['name']] = $taxes['Setting']['id'];
				}
				$postdata['Setting'] = array();
				if (isset($taxes_data['GST_no'])) {
					$postdata['Setting']['0'] = array('id' => $taxes_data['GST_no'], 'name'=>'GST_no', 'form_type' => 'company_tax_details', 'value'=> $postdata['GST_no']);
				}else{
					$postdata['Setting']['0'] = array('name'=>'GST_no', 'form_type' => 'company_tax_details', 'value'=> $postdata['GST_no']);
				}
				if (isset($taxes_data['CIN'])) {
					$postdata['Setting']['1'] = array('id' => $taxes_data['CIN'], 'name'=>'CIN', 'form_type' => 'company_tax_details', 'value'=> $postdata['CIN']);
				}else{
					$postdata['Setting']['1'] = array('name'=>'CIN', 'form_type' => 'company_tax_details', 'value'=> $postdata['CIN']);
				}
				if (isset($taxes_data['PAN'])) {
					$postdata['Setting']['2'] = array('id' => $taxes_data['PAN'], 'name'=>'PAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['PAN']);
				}else{
					$postdata['Setting']['2'] = array('name'=>'PAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['PAN']);
				}
				if (isset($taxes_data['TAN'])) {
					$postdata['Setting']['3'] = array('id' => $taxes_data['TAN'], 'name'=>'TAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['TAN']);
				}else{
					$postdata['Setting']['3'] = array('name'=>'TAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['TAN']);
				}
					
			}else{
				$postdata['Setting'] = array(
					'0' => array('name'=>'GST_no', 'form_type' => 'company_tax_details', 'value'=> $postdata['GST_no']),
					'1' => array('name'=>'CIN', 'form_type' => 'company_tax_details', 'value'=> $postdata['CIN']),
					'2' => array('name'=>'PAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['PAN']),
					'3' => array('name'=>'TAN', 'form_type' => 'company_tax_details', 'value'=> $postdata['TAN'])
				);
			}
			if ($this->Setting->saveMany($postdata['Setting'])) {
				$this->Session->setFlash('Details updated successfully.', '', array(), 'success');
			}else{
				$this->Session->setFlash('Unable to update.', '', array(), 'fail');
			}
			return $this->redirect(array('action' => 'project_setting'));
		}
	}


}