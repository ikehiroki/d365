<?php

App::uses('AppController', 'Controller');

/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Search.Prg');

    /**
     *
     * @var array 
     */
    public $helpers = array('UploadPack.Upload');

    /**
     *
     * @var boolean 
     */
    public $presetVars = array(
        'Section' => array('type' => 'value'),
        'name' => array('type' => 'like', 'empty' => true, 'encode' => true),
        'Location' => array('type' => 'value'),
    );
    public $uses = array('Book', 'SectionsBook');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Book->recursive = 1;
        $this->Prg->commonProcess();
        $this->paginate = array('conditions' => $this->Book->parseCriteria($this->passedArgs), 'fields' => array('Book.*', 'Location.*', 'Picture.*'), 'group' => array('Book.id', 'Location.id', 'Picture.id', 'SectionsBook.book_id'), 'order' => 'Book.kana_name', 'limit' => 5);
        $this->set('books', $this->Paginator->paginate());
        $locations = $this->Book->Location->find('list');
        $sections = $this->Book->Section->find('list');
        $this->set(compact('locations', 'sections'));
        $this->set('authUser', $this->Auth->user());
    }

    private function __createSectionsCondition($conditions = array()) {
        $sectionConditions = array();
        foreach ($conditions as $id) {
            $sectionConditions[] = "SectionsBook.book_id = " . $id;
        }
        return $sectionConditions;
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $this->set('book', $this->Book->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'));
            }
        }
        $locations = $this->Book->Location->find('list');
        $positions = $this->Book->Position->find('list');
        $sections = $this->Book->Section->find('list');
        $this->set(compact('locations', 'positions', 'sections'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Invalid book'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('The book has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The book could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
            $this->request->data = $this->Book->find('first', $options);
        }
        $locations = $this->Book->Location->find('list');
        $positions = $this->Book->Position->find('list');
        $sections = $this->Book->Section->find('list');
        $this->set(compact('locations', 'positions', 'sections'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Book->id = $id;
        if (!$this->Book->exists()) {
            throw new NotFoundException(__('Invalid book'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Book->delete()) {
            $this->Session->setFlash(__('The book has been deleted.'));
        } else {
            $this->Session->setFlash(__('The book could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
