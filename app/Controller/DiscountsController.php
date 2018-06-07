<?php
App::uses('AppController', 'Controller');
/**
 * Discounts Controller
 *
 * @property Discount $Discount
 * @property PaginatorComponent $Paginator
 * @property nComponent $n
 * @property SessionComponent $Session
 */
class DiscountsController extends AppController {
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "backend_template";
		$this->Discount->recursive = 0;
		$this->set('discounts', $this->Paginator->paginate());
		$this->loadModel('Setting');
		$currency = $this->Setting->getcurrency();
		$this->set('currency_symbol', $currency['Setting']['other']);
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
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
		$this->set('discount', $this->Discount->find('first', $options));
		$this->loadModel('Setting');
		$currency = $this->Setting->getcurrency();
		$this->set('currency_symbol', $currency['Setting']['other']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$upload_path = 'img/upload/discounts';
			$Component = $this->Components->load('General');
			$return = $Component->multiple_images_upload($this->data['Discount']['discount_imgs'], $upload_path);

			$this->request->data['Discount']['discount_img'] = implode(',', $return);
			$this->request->data['Discount']['date_created'] = date('Y-m-d h:i:s a');
			$this->request->data['Discount']['created_by'] = $this->Auth->user('id');
			$this->request->data['Discount']['discount_start_date'] = date('Y-m-d',strtotime($this->request->data['Discount']['discount_start_date']));
			$this->request->data['Discount']['discount_end_date'] = date('Y-m-d',strtotime($this->request->data['Discount']['discount_end_date']));

			$this->Discount->create();
			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash('The discount has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The discount could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
		$this->loadModel('Setting');
		$currency = $this->Setting->getcurrency();
		$this->set('currency_symbol', $currency['Setting']['other']);
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
		if (!$this->Discount->exists($id)) {
			throw new NotFoundException(__('Invalid discount'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$conditions = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
			$disc = $this->Discount->find('first', $conditions);
			$this->request->data['Discount']['id'] = $id;
			$this->request->data['Discount']['discount_start_date'] = date('Y-m-d',strtotime($this->request->data['Discount']['discount_start_date']));
			$this->request->data['Discount']['discount_end_date'] = date('Y-m-d',strtotime($this->request->data['Discount']['discount_end_date']));
			// $this->request->data['Discount']['date_created'] = $this->Auth->user('id');
			
			if (!empty($this->request->data['Discount']['discount_img'])) {
				$upload_path = 'img/upload/Discounts';
				$Component = $this->Components->load('General');
				$return = $Component->upload_single_image($this->data['Discount']['discount_img'], $upload_path);

				if ($disc['Discount']['discount_img'] !="") {
					$this->request->data['Discount']['discount_img'] = $disc['Discount']['discount_img'].','.implode(',', $return);
				}else{
					$this->request->data['Discount']['discount_img'] = implode(',', $return);
				}
			}else{
				$this->request->data['Discount']['discount_img'] = $disc['Discount']['discount_img'];
			}

			if ($this->Discount->save($this->request->data)) {
				$this->Session->setFlash('The discount has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The discount could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Discount.' . $this->Discount->primaryKey => $id));
			$this->request->data = $this->Discount->find('first', $options);
		}
		$this->loadModel('Setting');
		$currency = $this->Setting->getcurrency();
		$this->set('currency_symbol', $currency['Setting']['other']);

		$this->request->data['Discount']['discount_start_date'] = date('m/d/Y',strtotime($this->request->data['Discount']['discount_start_date']));
		$this->request->data['Discount']['discount_end_date'] = date('m/d/Y',strtotime($this->request->data['Discount']['discount_end_date']));
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
		$this->Discount->id = $id;
		if (!$this->Discount->exists()) {
			throw new NotFoundException(__('Invalid discount'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Discount->delete()) {
			$this->Session->setFlash('The discount has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The discount could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function savediscountDisplayPage(){
		$this->layout = false;
		$this->render(false);
		if ($this->request->is('post')) {
			$showdisconpage = implode(',', $this->request->data['sections']);
			$id = $this->request->data['discount_id'];
			$post = array('id' => $id, 'showdisconpage'=>$showdisconpage);
			if ($this->Discount->save($post)) {
				echo 'success';
			}else{
				echo 'fail';
			}
		}
	}
}
