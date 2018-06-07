<?php
App::uses('HttpSocket', 'Network/Http');

class ProjectapisController extends AppController {

	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('getProjectDetails','getCategories','getsubCategoryDetails','getBrands','getSliderImages','getCategoryProductList',
							'product_details','getCategoryDetails','breadcrumb','getProductVariant','topOffers','getCurrencyDetail',
							'createUser','customerLogin','addToCart','fetchCartCount','fetchCart','verifyAccount',
							'updateCartProduct', 'removeCartItem','addUseraddressdetails','getUserAddressDetails','EditUserAddressDetails','DeleteUserAddressDetails', 'AddlocalProducttocart',
							'sendEnquiryDetail','getdiscountCoupensAds','getAddressDeliveryDetails','getCountryarray',
							'getStatearray','getSidebarAdsForPages','place_order');
		$this->response->header('Access-Control-Allow-Origin', '*');

	}

	// public function initialize(array $config){
 //        $this->addBehavior('Tree');
 //    }

	public function getProjectDetails(){
		$this->loadModel('Setting');
		$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));
		if ($company_details) {
			$status = 'Success';
			$response = $company_details['Setting'];
		}else{
			$response = "";
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function getCategories(){
		$this->loadModel('Category');
		$cat = $this->Category->fetchCategoryTree();
		if ($cat) {
			$status = 'Success';
			$response = $cat;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function getsubCategoryDetails($id=NULL){
		$this->loadModel('Category');
		$cat = $this->Category->fetchSubCategoryTree($id);
		
		if ($cat) {
			$status = 'Success';
			$response = $cat;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}
	
	public function getBrands(){
		$this->loadModel('Brandmaster');
		$brands = $this->Brandmaster->find('all');
		if ($brands) {
			$status = 'Success';
			$response = $brands;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function getSliderImages(){
		$this->loadModel('Slidermaster');
		$slider = $this->Slidermaster->find('all');
		if ($slider) {
			$status = 'Success';
			$response = $slider;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function getCategoryProductList($id = NULL){
		$data = array();
		$this->loadModel('Category');
		$products = $this->Category->getCategoryProductList($id);
		$brands = array();
		
		$data = $products;
		if ($data) {
			$status = 'Success';
			$response = $data;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function product_details($id = NULL){
		$data = array();
		$this->loadModel('Product');
		$this->Product->recursive = -1;
		$product = $this->Product->find('first', array('conditions'=>array('id'=>$id)));
		$product_variant = $this->getProductVariant($product['Product']['variant_code']);
		$data['product'] = $product;
		$data['variants'] = $product_variant;
		if ($data) {
			$status = 'Success';
			$response = $data;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function breadcrumb($id = NULL){
		$this->loadModel('Category');
		$cat = $this->Category->fetchAllParentCategory($id);
		
		if ($cat) {
			$status = 'Success';
			$response = $cat;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function getCategoryDetails($id){
		$this->loadModel('Category');
		$cat = $this->Category->find('first', array('conditions'=> array('Category.id'=>$id)));

		if ($cat) {
			$status = 'Success';
			$response = $cat;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        ));
	}

	public function getProductVariant($code = NULL){
		$this->loadModel('Product');
		$this->Product->recursive = -1;
		$product_variant = $this->Product->find('all', array('conditions'=>array('Product.variant_code'=> $code)));
		return $product_variant;
	}

	public function getCurrencyDetail(){
		$this->loadModel('Setting');
		$currency = $this->Setting->find('first', array('conditions'=>array('name'=>'currency')));
		if ($currency) {
			$status = 'Success';
			$response = $currency['Setting'];
		}else{
			$response = "";
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}

	public function topOffers(){
		$this->loadModel('Product');
		$this->Product->recursive = -1;
		$products = $this->Product->find('all', array(
													  'order'=>array('discount' => 'DESC'),
													  'limit'=> 15,
												));
		if ($products) {
			$status = 'Success';
			$response = $products;
		}else{
			$status = 'Fail';
			$response = array();
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response', 'status')
        )); 
	}
	public function createUser(){
		$this->loadModel('Setting');
		$company_details = $this->Setting->find('first', array('conditions'=>array('name'=>'company_name')));

		$postData = array();
		$response = array();
		$message = $status = "";
		$postData = $this->request->input('json_decode'); 
		$this->loadModel('User');
		if (!empty($postData)) {
			$Component = $this->Components->load('General');
			$random = $Component->generateRandomString('30');
			$postData->group_id = 3;
			$postData->temp_password = $random;
			if ($this->User->validates()) {
				$this->User->create();
				if ($this->User->save($postData)) {
					$eventid = $this->User->getLastInsertId();
					$this->User->recursive = -1;
					$user = $this->User->find('first',array('conditions'=>array('User.id'=>$eventid)));
					$response = $user['User'];
					$status = 'Success';
					$Component = $this->Components->load('Email');
					$return = $Component->sendMail($response,$random,$company_details['Setting']);
				}else { 
					$status = 'Fail';
					$message = $this->User->validationErrors;
				}
			}else { 
				$status = 'Fail';
				$message = $this->User->validationErrors;
			}
		}

			$this->set(array( 
	            'response' => $response,
	            'message' => $message,
	            'status' => $status,
	            '_serialize' => array('response','message','status')
	        )); 
	}

	public function customerLogin(){
		$postData = $this->request->input('json_decode'); 
		
		$this->loadModel('User'); 
		$result = $this->User->login_Api_Rest($postData); 
		$message = '';
		
		if($result){
			$status = $result['User']['status'];
			if($status == "Inactive"){
				$message = 'Your account has not been activated. Please check your email to verify your account or contact to our help center.';
			} else {
				$status = 'Success';
			}
		} else {
			$status = 'Fail';
			$message = 'Incorrect username and password.';
		}
		
        $this->set(array(
            'response' => $result,
            'message' => $message,
            'status' => $status,
            '_serialize' => array('response', 'message', 'status')
        ));
	}

	public function addToCart(){
		$cart = array();
		$this->loadModel('Cart');
		$postData = $this->request->input('json_decode');
		if ($postData) {
			$exist = $this->Cart->find('first', array('conditions'=>array('Cart.user_id'=> $postData->user_id, 
																		  'Cart.product_id'=>$postData->product_id
																		)));
			$postData->created_date = date('Y-m-d h:i:s a');
			if ($exist) {
				$postData->product_count = $postData->product_count + $exist['Cart']['product_count'];
				$postData->id = $exist['Cart']['id'];
				if ($this->Cart->save($postData)) {
					$cart = $this->Cart->find('all',array('conditions'=>array('Cart.user_id'=>$postData->user_id)));
					$status = 'Success';
				}else{
					$status = 'Fail';
				}
			}else{
				$this->Cart->create();
				if ($this->Cart->save($postData)) {
					$cart = $this->Cart->find('all',array('conditions'=>array('Cart.user_id'=>$postData->user_id)));
					$status = 'Success';
				}else{
					$status = 'Fail';
				}
			}
		}else{
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $cart,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function fetchCart(){
		$postData = $this->request->input('json_decode');
		$user_id = $postData->id;
		$cart = array();
		$this->loadModel('Cart');
		$cart = $this->Cart->find('all',array('conditions'=>array('Cart.user_id'=> $user_id)));
		if ($cart) {
			$status = 'Success';
		}else{
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $cart,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function fetchCartCount(){
		$postData = $this->request->input('json_decode');
		$user_id = $postData->id;
		$count = 0;
		$this->loadModel('Cart');
		$count = $this->Cart->find('count',array('conditions'=>array('Cart.user_id'=> $user_id)));
		if ($count) {
			$status = 'Success';
		}else{
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $count,
            'status' => $status,
            '_serialize' => array('response','status')
        ));
	}

	public function verifyAccount($code){
		$user = array();
		$verifycode = explode('-', $code);
		$temp_password = $verifycode[0];
		$user_id = $verifycode[1];
		$this->loadModel('User');
		$this->User->recursive = -1;
		$user = $this->User->find('first',array('conditions'=>array('User.id'=> $user_id)));
		if (!empty($user)) {
			if ($user['User']['temp_password'] == $temp_password) {
				$data = array('id' => $user_id, 'temp_password' => "", 'status'=>'Active');
				$this->User->save($data);
				$message = "Your account has been verified.";
				$status = "Success";
			}else{
				$message = "Your account is already verified.";
				$status = "Warning";
			}
		}else{
			$message = "Your account has been expired or does not exist. Please contact to our help service center.";
			$status = "Fail";
		}
		$this->set(array( 
            'response' => $user,
            'message' => $message,
            'status' => $status,
            '_serialize' => array('response','status','message')
        ));
	}

	public function updateCartProduct(){
		$this->loadModel('Cart');
		$postData = $this->request->input('json_decode');
		if ($postData) {
			if ($this->Cart->save($postData)) {
				$status = 'Success';
			}else{
				$status = 'Fail';
			}
		}else{
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $postData,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function removeCartItem(){
		$this->loadModel('Cart');
		$postData = $this->request->input('json_decode');
		$this->Cart->id = $postData->id;
		if (!$this->Cart->exists()) {
			$status = 'Fail';
			$message = 'Invalid cart item.';
		}else {
			$this->request->allowMethod('post', 'delete');
			if ($this->Cart->delete()) {
				$status = 'Success';
				$message = 'Cart item deleted successfully.';
			}else{
				$status = 'Fail';
				$message = 'Cart item could not be deleted.';
			}
		}
		$this->set(array( 
            'response' => $postData,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        )); 
	}

	public function addUseraddressdetails(){
		$response = array();
		$this->loadModel('Address');
		$postData = $this->request->input('json_decode');
		if (!empty($postData)) {
			if ($this->Address->validates()) {
				$this->Address->create();
				if ($this->Address->save($postData)) {
					$response = $this->Address->find('all', array('conditions'=> array('user_id'=>$postData->user_id)));
					$status = 'Success';
					$message = 'User address save successfully.';
				}else{
					$status = 'Fail';
					$message = $this->Address->validationErrors;
				}
			}else{
				$status = 'Fail';
				$message = $this->Address->validationErrors;
			}
		}else{
			$status = 'Fail';
			$message = 'Invalid details could not be save.';
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        )); 
	}

	public function getUserAddressDetails(){
		$response = array();
		$this->loadModel('Address');
		$postData = $this->request->input('json_decode');
		if ($postData) {
			$response = $this->Address->find('all', array('conditions'=> array('user_id'=>$postData->user_id)));
			if (!empty($response)) {
				$status = 'Success';
			}else{
				$status = 'Fail';
			}
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function DeleteUserAddressDetails(){
		$response = array();
		$this->loadModel('Address');
		$postData = $this->request->input('json_decode');
		$this->Address->id = $postData->id;
		
		if (!$this->Address->exists()) {
			$status = 'Fail';
		}else {
			$this->request->allowMethod('post', 'delete');
			if ($this->Address->delete()) {
				$status = 'Success';
			}else{
				$status = 'Fail';
			}
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function EditUserAddressDetails(){
		$response = array();
		$this->loadModel('Address');
		$postData = $this->request->input('json_decode');
		if ($postData) {
			if ($this->Address->validates()) {
				if ($this->Address->save($postData)) {
					$response = $this->Address->find('all', array('conditions'=> array('user_id'=>$postData->user_id)));
					$status = 'Success';
					$message = 'User address save successfully.';
				}else{
					$status = 'Fail';
					$message = $this->User->validationErrors;
				}
			}else{
				$status = 'Fail';
				$message = $this->User->validationErrors;
			}
		}else{
			$status = 'Fail';
			$message = 'Invalid details could not be save.';
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        )); 
	}

	public function localcartProductDetails(){
		$new_cart = array();
		$this->loadModel('Product');
		$postData = $this->request->input('json_decode');
		print_r($postData);
	}

	public function AddlocalProducttocart(){
		$response = array();
		$this->loadModel('Cart');
		$cart = array();
		$postData = $this->request->input('json_decode');
		if (!empty($postData)) {
			foreach ($postData->product as $key => $data) {
				$exist = $this->Cart->find('first', array('conditions'=>
												array('Cart.user_id'=> $postData->user_id, 
												  		'Cart.product_id'=>$data->Cart->product_id
										)));

				if ($exist) {
					$exist['Cart']['product_count'] = $data->Cart->product_count + $exist['Cart']['product_count'];
					$cart[] = $exist['Cart'];
				}else{
					$data->Cart->user_id = $postData->user_id;
					$cart[] = (array)$data->Cart;
				}
			}
			if ($this->Cart->saveAll($cart)) {
				$status = 'Success';
				$new_cart = $this->Cart->find('all', array('conditions'=> array('Cart.user_id'=> $postData->user_id)));
			}else{
				$status = 'Fail';
			}
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function sendEnquiryDetail(){
		$postData = $this->request->input('json_decode');
		if (!empty($postData)) {
			// code for send email to admin
			$status = 'Success';
			$message = "Your enquiry has been sent successfully, will get back to you shortly.";
		}else{
			$status = 'Fail';
			$message = "Something went wrong, the message could not be sent.";
		}
		$this->set(array( 
            'message' => $message,
            'status' => $status,
            '_serialize' => array('message','status')
        )); 
	}

	public function getdiscountCoupensAds(){
		$discounts = array();
		$postData = $this->request->input('json_decode');
		if (!empty($postData)) {
			$type = $postData->type;
			$showdisconpage = $postData->showdisconpage;
			$this->loadModel('Discount');
			$this->Discount->recursive = -1;
			if ($showdisconpage == "") {
				$discounts = $this->Discount->find('all', array('conditions'=>array('Discount.type'=> $type)));
			}else{
				$discounts = $this->Discount->find('all', array('conditions'=>array('Discount.type'=> $type, 'FIND_IN_SET(\''. $showdisconpage .'\',Discount.showdisconpage)')));
			}
			if ($discounts) {
				$status = 'Success';
			}else{
				$status = 'Fail';
			}
		}else{
			$status = 'Fail';
		}
		$this->set(array( 
            'response' => $discounts,
            'status' => $status,
            '_serialize' => array('response','status')
        )); 
	}

	public function getAddressDeliveryDetails(){
		$discounts = array();
		$postData = $this->request->input('json_decode');
		$this->loadModel('Pincodemasters');
		if (!empty($postData)) {
			$pincode = $postData->Address->pincode;
			$delivery_details = $this->Pincodemasters->find('first', array('conditions'=>array('pin_code_no'=>$pincode)));
			if (!empty($delivery_details)) {
				$response = $delivery_details;
				$status = 'Success';
				$message = "";
			}else{
				$status = 'Fail';
				$message = "Delivery to this address is not availble.";
			}
		}

		$this->set(array( 
            'response' => $response,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        ));
	}

	public function getCountryarray(){
		$Component = $this->Components->load('General');
		$return = $Component->GetCountries();
		if (!empty($return)) {
			$response = $return;
			$status = 'Success';
			$message = "";
		}else{
			$status = 'Fail';
			$message = "Some technical issue occurs. Please try to refresh the page.";
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        ));
	}

	public function getStatearray(){
		$postData = $this->request->input('json_decode');

		$country_id = $postData->country_id;
		$Component = $this->Components->load('General');
		$return = $Component->getstate($country_id);
		if (!empty($return)) {
			$response = $return;
			$status = 'Success';
			$message = "";
		}else{
			$status = 'Fail';
			$message = "Some technical issue occurs. Please try to refresh the page.";
		}
		$this->set(array( 
            'response' => $response,
            'status' => $status,
            'message' => $message,
            '_serialize' => array('response','status','message')
        ));
	}

	public function place_order(){
		$postData = $this->request->input('json_decode');
		
		$orderdata = array();
		if (!empty($postData)) {
			$orderdata['user_id'] = $postData->user_id;
			$orderdata['cart_details'] = serialize($postData->cart);
			$orderdata['subtotal'] = $postData->subtotal;
			$orderdata['delivery_charges'] = $postData->selectedAddress->delivery_details->delivery_charges;
			$orderdata['total'] = $postData->subtotal + $postData->selectedAddress->delivery_details->delivery_charges;
			$orderdata['payment_type'] = $postData->payment_type;
			$orderdata['subtotal'] = $postData->subtotal;
			$orderdata['address_details'] = $postData->selectedAddress->address->address. ' '. $postData->selectedAddress->address->street.' '.$postData->selectedAddress->address->landmark;
			$orderdata['country'] = $postData->selectedAddress->address->country;
			$orderdata['city'] = $postData->selectedAddress->address->city;
			$orderdata['state'] = $postData->selectedAddress->address->state;
			$orderdata['pincode'] = $postData->selectedAddress->address->pincode;
			$orderdata['created_date'] = date('Y-m-d h:i:s a');
		print_r($orderdata);
		exit();
		}
	}

}