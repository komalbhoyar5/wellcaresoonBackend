<?php
App::uses('HttpSocket', 'Network/Http');

class ProjectapisController extends AppController {

	public $components = array('RequestHandler');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('getProjectDetails','getCategories','getsubCategoryDetails','getBrands','getSliderImages','getCategoryProductList','product_details');
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
		$this->loadModel('Category');
		$products = $this->Category->getCategoryProductList($id);
		$brands = array();
		print_r($products);
		foreach ($products as $prod) {
			if(!in_array($prod['brand_id'], $brands, true)){
		        array_push($brands, $prod['brand_id']);
		    }
		}
		print_r($brands);
		exit;
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

	public function product_details($id = NULL){
		$this->loadModel('Product');
		$this->Product->recursive = -1;
		$product = $this->Product->find('first', array('conditions'=>array('id'=>$id)));
		if ($product) {
			$status = 'Success';
			$response = $product;
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
}