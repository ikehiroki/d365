<?php
App::uses('AppController', 'Controller');
/**
 * SectionsBooks Controller
 *
 * @property SectionsBook $SectionsBook
 * @property PaginatorComponent $Paginator
 */
class SectionsBooksController extends AppController {

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
		$this->SectionsBook->recursive = 0;
		$this->set('sectionsBooks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SectionsBook->exists($id)) {
			throw new NotFoundException(__('Invalid sections book'));
		}
		$options = array('conditions' => array('SectionsBook.' . $this->SectionsBook->primaryKey => $id));
		$this->set('sectionsBook', $this->SectionsBook->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SectionsBook->create();
			if ($this->SectionsBook->save($this->request->data)) {
				$this->Session->setFlash(__('The sections book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sections book could not be saved. Please, try again.'));
			}
		}
		$sections = $this->SectionsBook->Section->find('list');
		$books = $this->SectionsBook->Book->find('list');
		$this->set(compact('sections', 'books'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SectionsBook->exists($id)) {
			throw new NotFoundException(__('Invalid sections book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SectionsBook->save($this->request->data)) {
				$this->Session->setFlash(__('The sections book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sections book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SectionsBook.' . $this->SectionsBook->primaryKey => $id));
			$this->request->data = $this->SectionsBook->find('first', $options);
		}
		$sections = $this->SectionsBook->Section->find('list');
		$books = $this->SectionsBook->Book->find('list');
		$this->set(compact('sections', 'books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SectionsBook->id = $id;
		if (!$this->SectionsBook->exists()) {
			throw new NotFoundException(__('Invalid sections book'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SectionsBook->delete()) {
			$this->Session->setFlash(__('The sections book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sections book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
