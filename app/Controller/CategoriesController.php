<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriesController extends AppController {

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
		$this->Category->recursive = 1;
		$this->set('categories', $this->Category->find('all'));
		$tree = $this->Category->fetchCategoryTree();
		$this->set('trees',$tree);
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
		$this->loadModel('Product');
		$this->Product->recursive = -1;
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->Category->recursive = 0;
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$category = $this->Category->find('first', $options);
		$this->set('category', $category);
		$product = $this->Product->query('SELECT * FROM products as Product WHERE FIND_IN_SET('. $category['Category']['id'] . ',Product.category_id)>0');
		$this->set('product', $product);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->request->data['Category']['imgs']['0']['name'] !="") {
				$upload_path = 'img/upload/categories';
				$Component = $this->Components->load('General');
				$return = $Component->multiple_images_upload($this->data['Category']['imgs'], $upload_path);
				$this->request->data['Category']['imgs'] = implode(',', $return);
			}else{
				$this->request->data['Category']['imgs'] = "";
			}
			$this->request->data['Category']['created_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Category']['modified_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Category']['created_by'] = $this->Auth->user('id');
			if($this->request->data['Category']['parent_id'] == ""){
				$this->request->data['Category']['parent_id'] = 0;
			}
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.', '', array(), 'fali');
			}
		}
		// $parentCategories = $this->Category->find('list');
		// $this->set(compact('parentCategories'));
		
		$this->loadModel('Category');
		$cat = $this->Category->createCategorydropdownList();
		$this->set('parentCategories', $cat);
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
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$conditions = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$cats = $this->Category->find('first', $conditions);
			// upload images process
			if ($this->request->data['Category']['imgs'][0]['name'] !="") {
				$upload_path = 'img/upload/categories';
				$Component = $this->Components->load('General');
				$return = $Component->multiple_images_upload($this->data['Category']['imgs'], $upload_path);
				if ($cats['Category']['imgs'] !="") {
					$this->request->data['Category']['imgs'] = $cats['Category']['imgs'].','.implode(',', $return);
				}else{
					$this->request->data['Category']['imgs'] = implode(',', $return);
				}
			}else{
				$this->request->data['Category']['imgs'] = $cats['Category']['imgs'];
			}
			if($this->request->data['Category']['parent_id'] == ""){
				$this->request->data['Category']['parent_id'] = 0;
			}

			$this->request->data['Category']['modified_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Category']['id'] = $id;

			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'edit/'.$id));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$this->loadModel('Category');
		$cat = $this->Category->createCategorydropdownList();
		$this->set('parentCategories', $cat);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = "backend_template";
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$id)));
		if (empty($category['ChildCategory']) && empty($category['Product'])) {
			if ($this->Category->delete()) {
				$this->Session->setFlash('The category has been deleted.', '', array(), 'success');
			} else {
				$this->Session->setFlash('The category could not be deleted. Please, try again.', '', array(), 'fail');
			}
		}else{
				$this->Session->setFlash('This category could not be deleted, delete related subcategories, products and try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_images(){
		$post_data = $this->request->data;
		$data = array();
		$category_id = $this->request->data['category_id'];
		$img = $this->request->data['img'];
		$this->Category->recursive = -1;
		$category = $this->Category->find('first', array('conditions' => array('Category.id'=> $category_id)));
		$images = explode(',', $category['Category']['imgs']);
		$index = array_search($img,$images);

		if($index !== FALSE){
		    unset($images[$index]);
		}
		$img_string = implode(',', $images);
		$data['Category'] = array('id' => $category_id, 'imgs' => $img_string);
		
		if ($this->Category->save($data)) {
			echo "success";
		}else{
			echo "fail";
		}
		exit();
	}
}
