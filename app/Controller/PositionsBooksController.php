<?php
App::uses('AppController', 'Controller');
/**
 * PositionsBooks Controller
 *
 * @property PositionsBook $PositionsBook
 * @property PaginatorComponent $Paginator
 */
class PositionsBooksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PositionsBook->recursive = 0;
		$this->set('positionsBooks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PositionsBook->exists($id)) {
			throw new NotFoundException(__('Invalid positions book'));
		}
		$options = array('conditions' => array('PositionsBook.' . $this->PositionsBook->primaryKey => $id));
		$this->set('positionsBook', $this->PositionsBook->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PositionsBook->create();
			if ($this->PositionsBook->save($this->request->data)) {
				$this->Session->setFlash(__('The positions book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions book could not be saved. Please, try again.'));
			}
		}
		$positions = $this->PositionsBook->Position->find('list');
		$books = $this->PositionsBook->Book->find('list');
		$this->set(compact('positions', 'books'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PositionsBook->exists($id)) {
			throw new NotFoundException(__('Invalid positions book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PositionsBook->save($this->request->data)) {
				$this->Session->setFlash(__('The positions book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PositionsBook.' . $this->PositionsBook->primaryKey => $id));
			$this->request->data = $this->PositionsBook->find('first', $options);
		}
		$positions = $this->PositionsBook->Position->find('list');
		$books = $this->PositionsBook->Book->find('list');
		$this->set(compact('positions', 'books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PositionsBook->id = $id;
		if (!$this->PositionsBook->exists()) {
			throw new NotFoundException(__('Invalid positions book'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PositionsBook->delete()) {
			$this->Session->setFlash(__('The positions book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The positions book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
