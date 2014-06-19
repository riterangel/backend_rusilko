
<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class DictionariesController extends AppController
{
    public function admin_index()
    {


        $this->set('title_page', 'Admin - Dictionaries');
        $this->layout = 'backend';
        $clientes = $this->Dictionary->find('all');

        $this->set('dictionaries', $clientes);
    }

    public function admin_add()
    {
        $this->set('title_page', 'Admin - Adicionar Dictionary');
        $this->layout = 'backend';

        $this->loadModel('Language');
        $languages  = $this->Dictionary->Language->find('list');
        $this->set('languages', $languages);

        $this->loadModel('Key');
        $keys  = $this->Dictionary->Key->find('list');
        $this->set('keys', $keys);

        if ($this->request->is('post')) {
            $datos = $this->request->data;
            debug($datos);
            if ($this->Dictionary->save($datos)) {
                $this->Session->setFlash('Su Dictionary fue registrada', 'success_message');
                $this->redirect(array('controller' => 'dictionaries', 'action' => 'index'));
            }
        }
    }

    public function admin_edit($id = null)
    {
        $this->set('title_page', 'Admin - Editar Dictionary');
        $this->layout = 'backend';
        $this->Dictionary->id = $id;

        $this->loadModel('Language');
        $languages  = $this->Dictionary->Language->find('list');
        $this->set('languages', $languages);

        $this->loadModel('Key');
        $keys  = $this->Dictionary->Key->find('list');
        $this->set('keys', $keys);

        if ($this->request->is('get')) {
            $Usuario = $this->Dictionary->read();
            $this->request->data = $Usuario;
            $this->set('txt', $this->request->data['Dictionary']['txt']);

            $this->render('admin_add');
        } else {
            $datos = $this->request->data;
            if ($this->Dictionary->save($datos)) {
                $this->Session->setFlash('Su Dictionary fue actualizada', 'success_message');
                $this->redirect(array('controller' => 'dictionaries', 'action' => 'index'));
            }
        }
    }

    public function admin_delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        try {
            if ($this->Dictionary->delete($id, true)) {
                $this->Session->setFlash('El Dictionary con id: ' . $id . ' fue eliminada', 'success_message');
            }
        } catch (Exception $e) {
            $this->Session->setFlash('Error: No se puede eliminar el Dictionary con id: ' . $id . ' porque tiene referencias', 'error_message');
        }
        $this->redirect(array('controller' => 'dictionaries', 'action' => 'index'));
    }
} 