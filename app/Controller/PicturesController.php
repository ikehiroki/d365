<?php

App::uses('AppController', 'Controller');

/**
 * Pictures Controller
 *
 * @property Picture $Picture
 * @property PaginatorComponent $Paginator
 */
class PicturesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $helpers = array('UploadPack.Upload');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Picture->recursive = 0;
        $this->set('pictures', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Picture->exists($id)) {
            throw new NotFoundException(__('Invalid picture'));
        }
        $options = array('conditions' => array('Picture.' . $this->Picture->primaryKey => $id));
        $this->set('picture', $this->Picture->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($bookId = null) {
        if ($this->request->is('post')) {
            $this->Picture->create();
            if ($this->Picture->save($this->request->data)) {
                $lastId = $this->Picture->getLastInsertID();
                $options = array('conditions' => array('Book.' . $this->Picture->Book->primaryKey => $bookId));
                $bookData = $this->Picture->Book->find('first', $options);
                $bookData['Book']['picture_id'] = $lastId;
                if ($this->Picture->Book->save($bookData)) {
                    $this->Session->setFlash(__('The picture has been saved.'));
                    return $this->redirect(array('controller' => 'books','action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The picture could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The picture could not be saved. Please, try again.'));
            }
        }
        $this->set('bookId', $bookId);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Picture->exists($id)) {
            throw new NotFoundException(__('Invalid picture'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Picture->save($this->request->data)) {
                $this->Session->setFlash(__('The picture has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The picture could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Picture.' . $this->Picture->primaryKey => $id));
            $this->request->data = $this->Picture->find('first', $options);
        }
        $books = $this->Picture->Book->find('list');
        $this->set(compact('books'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Picture->id = $id;
        if (!$this->Picture->exists()) {
            throw new NotFoundException(__('Invalid picture'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Picture->delete()) {
            $this->Session->setFlash(__('The picture has been deleted.'));
        } else {
            $this->Session->setFlash(__('The picture could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
