<?php
App::uses('AppController', 'Controller');
/**
 * Pincodemasters Controller
 *
 * @property Pincodemaster $Pincodemaster
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PincodemastersController extends AppController {

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

		$this->Pincodemaster->recursive = 0;
		$this->set('pincodemasters', $this->Pincodemaster->find('all'));
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
		
		if (!$this->Pincodemaster->exists($id)) {
			throw new NotFoundException(__('Invalid pincodemaster'));
		}
		$options = array('conditions' => array('Pincodemaster.' . $this->Pincodemaster->primaryKey => $id));
		$this->set('pincodemaster', $this->Pincodemaster->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$this->Pincodemaster->create();
			if ($this->Pincodemaster->save($this->request->data)) {
				$this->Session->setFlash('The pincodemaster has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The pincodemaster could not be saved. Please, try again.', '', array(), 'fail');
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
		if (!$this->Pincodemaster->exists($id)) {
			throw new NotFoundException(__('Invalid pincodemaster'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Pincodemaster']['id'] = $id;
			if ($this->Pincodemaster->save($this->request->data)) {
				$this->Session->setFlash('The pincodemaster has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The pincodemaster could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Pincodemaster.' . $this->Pincodemaster->primaryKey => $id));
			$this->request->data = $this->Pincodemaster->find('first', $options);
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
		$this->layout = "backend_template";
		$this->Pincodemaster->id = $id;
		if (!$this->Pincodemaster->exists()) {
			throw new NotFoundException(__('Invalid pincodemaster'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pincodemaster->delete()) {
			$this->Session->setFlash('The pincodemaster has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The pincodemaster could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
