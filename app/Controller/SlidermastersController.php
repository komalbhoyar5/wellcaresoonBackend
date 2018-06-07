<?php
App::uses('AppController', 'Controller');
/**
 * Slidermasters Controller
 *
 * @property Slidermaster $Slidermaster
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SlidermastersController extends AppController {

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
		$this->Slidermaster->recursive = 0;
		$this->set('slidermasters', $this->Paginator->paginate());
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
		if (!$this->Slidermaster->exists($id)) {
			throw new NotFoundException(__('Invalid slidermaster'));
		}
		$options = array('conditions' => array('Slidermaster.' . $this->Slidermaster->primaryKey => $id));
		$this->set('slidermaster', $this->Slidermaster->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "backend_template";
		if ($this->request->is('post')) {
			$count = $this->Slidermaster->find('count');

			if ($this->request->data['Slidermaster']['image']['name'] !="") {

				$upload_path = 'img/upload/slider';
				$Component = $this->Components->load('General');
				$return = $Component->upload_single_image($this->data['Slidermaster']['image'], $upload_path);

				$this->request->data['Slidermaster']['image'] = $return;
				$this->request->data['Slidermaster']['slider_no'] = $count+1;

				$this->Slidermaster->create();
				if ($this->Slidermaster->save($this->request->data)) {
					$this->Session->setFlash('The slidermaster has been saved.', '', array(), 'success');
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('The slidermaster could not be saved. Please, try again.', '', array(), 'fail');
				}
			}else{
				$this->request->data = $this->request->data;
				$this->Session->setFlash('Please upload slider image.', '', array(), 'fail');
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
		if (!$this->Slidermaster->exists($id)) {
			throw new NotFoundException(__('Invalid slidermaster'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Slidermaster']['id'] = $id;
			$conditions = array('conditions' => array('Slidermaster.' . $this->Slidermaster->primaryKey => $id));
			$slider = $this->Slidermaster->find('first', $conditions);
			if ($this->request->data['Slidermaster']['image']['name'] !="") {
				$upload_path = 'img/upload/slider';
				$Component = $this->Components->load('General');
				$return = $Component->upload_single_image($this->data['Slidermaster']['image'], $upload_path);
				$this->request->data['Slidermaster']['image'] = $return;
				
			}else{
				$this->request->data['Slidermaster']['image'] = $slider['Slidermaster']['image'];
			}
			if ($this->Slidermaster->save($this->request->data)) {
				$this->Session->setFlash('The slidermaster has been saved.', '', array(), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The slidermaster could not be saved. Please, try again.', '', array(), 'fail');
			}
		} else {
			$options = array('conditions' => array('Slidermaster.' . $this->Slidermaster->primaryKey => $id));
			$slider = $this->Slidermaster->find('first', $options);
			$this->request->data = $slider;
			$this->set('slider', $slider);
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
		$this->Slidermaster->id = $id;
		if (!$this->Slidermaster->exists()) {
			throw new NotFoundException(__('Invalid slidermaster'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Slidermaster->delete()) {
			$this->Session->setFlash('The slidermaster has been deleted.', '', array(), 'success');
		} else {
			$this->Session->setFlash('The slidermaster could not be deleted. Please, try again.', '', array(), 'fail');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
