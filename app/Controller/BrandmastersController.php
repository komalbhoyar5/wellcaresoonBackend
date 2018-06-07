<?php
App::uses('AppController', 'Controller');
/**
 * Brandmasters Controller
 *
 * @property Brandmaster $Brandmaster
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BrandmastersController extends AppController {

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
		$this->Brandmaster->recursive = 0;
		$this->set('brandmasters', $this->Paginator->paginate());
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
		if (!$this->Brandmaster->exists($id)) {
			throw new NotFoundException('Invalid brandmaster');
		}
		$options = array('conditions' => array('Brandmaster.' . $this->Brandmaster->primaryKey => $id));
		$this->set('brandmaster', $this->Brandmaster->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$this->Brandmaster->create();

			$upload_path = 'img/upload/brands';
			$Component = $this->Components->load('General');
			$return = $Component->upload_single_image($this->data['Brandmaster']['imgs'], $upload_path);

			$this->request->data['Brandmaster']['created_date'] = date('Y-m-d h:i:s a');
			$this->request->data['Brandmaster']['imgs'] = $return;

			if ($this->Brandmaster->save($this->request->data)) {
				$this->Session->setFlash('The brandmaster has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brandmaster could not be saved. Please, try again.', '', array(), 'fail');
			}
		}
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
		if (!$this->Brandmaster->exists($id)) {
			throw new NotFoundException('Invalid brandmaster');
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Brandmaster']['id'] = $id;
			$conditions = array('conditions' => array('Brandmaster.' . $this->Brandmaster->primaryKey => $id));
			$brand = $this->Brandmaster->find('first', $conditions);

			// upload images process
			if ($this->request->data['Brandmaster']['imgs']['name'] !="") {
				$upload_path = 'img/upload/brands';
				$Component = $this->Components->load('General');
				$return = $Component->upload_single_image($this->data['Brandmaster']['imgs'], $upload_path);
				$this->request->data['Brandmaster']['imgs'] = $return;
				
			}else{
				$this->request->data['Brandmaster']['imgs'] = $brand['Brandmaster']['imgs'];
			}

			if ($this->Brandmaster->save($this->request->data)) {
				$this->Session->setFlash('The brandmaster has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The brandmaster could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Brandmaster.' . $this->Brandmaster->primaryKey => $id));
			$this->request->data = $this->Brandmaster->find('first', $options);
			$this->set('brand', $this->request->data);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Brandmaster->id = $id;
		if (!$this->Brandmaster->exists()) {
			throw new NotFoundException('Invalid brandmaster');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Brandmaster->delete()) {
			$this->Session->setFlash('The brandmaster has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The brandmaster could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
