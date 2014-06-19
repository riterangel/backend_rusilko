<?php
/**
 * Created by PhpStorm.
 * User: Luis Miguel Torrico
 * Date: 24-10-13
 * Time: 05:26 PM
 */

class GalleriesController extends AppController
{
    public function admin_index()
    {
        $this->set('title_page', 'Admin - Galleries');
        $this->layout = 'backend';
        $clientes = $this->Gallery->find('all');
        $this->set('galleries', $clientes);
    }

    public function admin_add()
    {
        $this->set('title_page', 'Admin - Adicionar Gallery');
        $this->layout = 'backend';
        if ($this->request->is('post')) {
            $datos = $this->request->data;
            if ($this->Gallery->save($datos)) {
                $this->Session->setFlash('Su Gallery fue registrada', 'success_message');
                $this->redirect(array('controller' => 'galleries', 'action' => 'index'));
            }
        }
    }

    public function admin_edit($id = null)
    {
        $this->set('title_page', 'Admin - Editar Gallery');
        $this->layout = 'backend';
        $this->Gallery->id = $id;
        if ($this->request->is('get')) {
            $Usuario = $this->Gallery->read();
            $this->request->data = $Usuario;
            $this->render('admin_add');
        } else {
            $datos = $this->request->data;
            if ($this->Gallery->save($datos)) {
                $this->Session->setFlash('Su Gallery fue actualizada', 'success_message');
                $this->redirect(array('controller' => 'galleries', 'action' => 'index'));
            }
        }
    }

    public function admin_delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        try {
            if ($this->Gallery->delete($id, true)) {
                $this->Session->setFlash('El Gallery con id: ' . $id . ' fue eliminada', 'success_message');
            }
        } catch (Exception $e) {
            $this->Session->setFlash('Error: No se puede eliminar el Gallery con id: ' . $id . ' porque tiene referencias', 'error_message');
        }
        $this->redirect(array('controller' => 'galleries', 'action' => 'index'));
    }

} 