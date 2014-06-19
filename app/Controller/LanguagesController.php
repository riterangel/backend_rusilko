<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class LanguagesController extends AppController
{
    public function admin_index()
    {
        $this->set('title_page', 'Admin - Languages');
        $this->layout = 'backend';
        $clientes = $this->Language->find('all');
        $this->set('languages', $clientes);
    }

    public function admin_add()
    {
        $this->set('title_page', 'Admin - Adicionar Language');
        $this->layout = 'backend';
        if ($this->request->is('post')) {
            $datos = $this->request->data;
            if ($this->Language->save($datos)) {
                $this->Session->setFlash('Su Language fue registrada', 'success_message');
                $this->redirect(array('controller' => 'languages', 'action' => 'index'));
            }
        }
    }

    public function admin_edit($id = null)
    {
        $this->set('title_page', 'Admin - Editar Language');
        $this->layout = 'backend';
        $this->Language->id = $id;
        if ($this->request->is('get')) {
            $Usuario = $this->Language->read();
            $this->request->data = $Usuario;
            $this->render('admin_add');
        } else {
            $datos = $this->request->data;
            if ($this->Language->save($datos)) {
                $this->Session->setFlash('Su Language fue actualizada', 'success_message');
                $this->redirect(array('controller' => 'languages', 'action' => 'index'));
            }
        }
    }

    public function admin_delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        try {
            if ($this->Language->delete($id, true)) {
                $this->Session->setFlash('El Language con id: ' . $id . ' fue eliminada', 'success_message');
            }
        } catch (Exception $e) {
            $this->Session->setFlash('Error: No se puede eliminar el Language con id: ' . $id . ' porque tiene referencias', 'error_message');
        }
        $this->redirect(array('controller' => 'languages', 'action' => 'index'));
    }
} 