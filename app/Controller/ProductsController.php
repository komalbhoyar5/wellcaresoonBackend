<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {
var $helpers = array('Session');
/**
 * Components
 *
 * @var array
 */
public function beforeFilter() {
	parent::beforeFilter();
}
public function isAuthorized($user) {
	return true;
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "backend_template";

		$this->Product->recursive = 0;
		if ($this->Auth->user('group_id') == 4) {
			$user_id = $this->Auth->user('id');
			$products = $this->Product->query("
									SELECT  * FROM  products  AS  Product  
									LEFT JOIN categories as Category ON (FIND_IN_SET( Category.id, Product.category_id))
									LEFT JOIN  users  AS  User  
									ON ( Product . seller_id  =  User . id ) 
									LEFT JOIN  brandmasters  AS  Brandmaster  ON ( Product . brand_id  =  Brandmaster . id ) 
									WHERE User.id = $user_id
									GROUP BY  Product.variant_code, Product.category_id");
		}else{
			$products = $this->Product->query('
									SELECT  * FROM  products  AS  Product  
									LEFT JOIN categories as Category ON (FIND_IN_SET( Category.id, Product.category_id))
									LEFT JOIN  users  AS  User  
									ON ( Product . seller_id  =  User . id ) 
									LEFT JOIN  brandmasters  AS  Brandmaster  ON ( Product . brand_id  =  Brandmaster . id ) 
									WHERE 1 = 1 
									GROUP BY  Product.variant_code, Product.category_id');
		}
		$this->set('products', $products);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "backend_template";
		$this->loadModel('Category');
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$product = $this->Product->find('first', $options);
		$this->set('product', $product);
		$this->Category->recursive = -1;
		$category = $this->Category->find('all', array('conditions'=> array('Category.id'=>explode(',', $product['Product']['category_id']))));
		$this->set('category', $category);
		$similar_product = $this->Product->find('all',array('conditions'=>array(
																				'variant_code'=> $product['Product']['variant_code'],
																				array('NOT' =>array('Product.id' => $product['Product']['id']))
																				)));
		$this->set('similar_product', $similar_product);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";

		if ($this->request->is('post')) {
				$Component = $this->Components->load('General');
			if ($this->request->data['Product']['imgs']['0']['name'] !="") {
				$upload_path = 'img/upload/products';
				$return = $Component->multiple_images_upload($this->data['Product']['imgs'], $upload_path);

				$this->request->data['Product']['imgs'] = implode(',', $return);
			}else{
				$this->request->data['Product']['imgs'] = "";
			}

			$this->request->data['Product']['category_id'] = implode(',', $this->request->data['Product']['category_id']);
			$this->request->data['Product']['created_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Product']['modified_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Product']['seller_id'] = $this->Auth->user('id');

			$variant_id = $Component->generateRandomString(10);
			$this->request->data['Product']['variant_code'] = $variant_id;

			
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The product has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The product could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		// $categories = $this->Product->Category->find('list');
		$this->loadModel('Category');
		$cat = $this->Category->createCategorydropdownList();
		$this->set('categories', $cat);
		$sellers = $this->Product->User->find('list');

		$brands = $this->Product->Brandmaster->find('list');
		$this->set(compact('brands', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = "backend_template";
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$conditions = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$prod = $this->Product->find('first', $conditions);
			// upload images process
			if ($this->request->data['Product']['imgs']['0']['name'] !="") {
				$upload_path = 'img/upload/products';
				$Component = $this->Components->load('General');
				$return = $Component->multiple_images_upload($this->data['Product']['imgs'], $upload_path);
				
				if ($prod['Product']['imgs'] !="") {
					$this->request->data['Product']['imgs'] = $prod['Product']['imgs'].','.implode(',', $return);
				}else{
					$this->request->data['Product']['imgs'] = implode(',', $return);
				}
			}else{
				$this->request->data['Product']['imgs'] = $prod['Product']['imgs'];
			}
			$this->request->data['Product']['modified_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Product']['id'] = $id;
			$this->request->data['Product']['category_id'] = implode(',', $this->request->data['Product']['category_id']);

			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The product has been saved.', '', array(), 'success');
				// return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The product could not be saved. Please, try again.', '', array(), 'fail');
			}
		} 
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$product =  $this->Product->find('first', $options);
		$product['Product']['category_id'] = explode(',', $product['Product']['category_id']);
		$this->request->data = $product;
		$sellers = $this->Product->User->find('list');

		$this->loadModel('Category');
		$cat = $this->Category->createCategorydropdownList();
		$this->set('categories', $cat);

		$brands = $this->Product->Brandmaster->find('list');
		$this->set(compact('brands', 'brands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash('The product has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The product could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_images(){
		$post_data = $this->request->data;
		$product_id = $this->request->data['product_id'];
		$img = $this->request->data['img'];
		$this->Product->recursive = -1;
		$product = $this->Product->find('first', array('conditions'=>array('id'=> $product_id)));
		$images = explode(',', $product['Product']['imgs']);
		
		$index = array_search($img,$images);
		if($index !== FALSE){
		    unset($images[$index]);
		}
		$img_string = implode(',', $images);
		$data['Product'] = array('id' => $product_id, 'imgs' => $img_string);
		if ($this->Product->save($data)) {
			echo "success";
		}else{
			echo "fail";
		}
		exit();
	}

	public function add_similar_product($id = NULL){
		$this->layout = "backend_template";
		if ($this->request->is(array('post', 'put'))) {
				$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
				$data = $this->Product->find('first', $options);

				$Component = $this->Components->load('General');
				
			if ($this->request->data['Product']['imgs']['0']['name'] !="") {
				$upload_path = 'img/upload/products';
				$return = $Component->multiple_images_upload($this->data['Product']['imgs'], $upload_path);

				$this->request->data['Product']['imgs'] = implode(',', $return);
			}else{
				$this->request->data['Product']['imgs'] = "";
			}
			$this->request->data['Product']['created_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Product']['modified_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Product']['seller_id'] = $this->Auth->user('id');
			$this->request->data['Product']['variant_code'] = $data['Product']['variant_code'];

			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The product has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The product could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->request->data = $this->Product->find('first', $options);
		// $categories = $this->Product->Category->find('list');
		$sellers = $this->Product->User->find('list');

		$this->loadModel('Category');
		$cat = $this->Category->createCategorydropdownList();
		$this->set('categories', $cat);

		$brands = $this->Product->Brandmaster->find('list');
		$this->set(compact('brands', 'brands'));
	}
}
