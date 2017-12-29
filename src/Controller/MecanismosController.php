<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mecanismos Controller
 *
 * @property \App\Model\Table\MecanismosTable $Mecanismos
 */
class MecanismosController extends AppController
{
    public function isAuthorized($user = null) { // debug($user); die();
        // Admin allowed anywhere
        if (isset($user['rol_id']) && $user['rol_id'] === 2) { //admin
            return true;
        }

        return false;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $mecanismos = $this->paginate($this->Mecanismos); // debug($mecanismos); die();

        $this->set(compact('mecanismos'));
        $this->set('_serialize', ['mecanismos']);
    }

    /**
     * View method
     *
     * @param string|null $id Mecanismo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mecanismo = $this->Mecanismos->get($id, [
            'contain' => ['MecanismoRecomendacion']
        ]);

        $this->set('mecanismo', $mecanismo);
        $this->set('_serialize', ['mecanismo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mecanismo = $this->Mecanismos->newEntity();
        if ($this->request->is('post')) {
            $mecanismo = $this->Mecanismos->patchEntity($mecanismo, $this->request->data); // debug($mecanismo->activo); die();
            if ($this->Mecanismos->save($mecanismo)) {
                $this->Flash->success(__('El nuevo Mecanismo de Proteccion fue grabado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El mecanismo de proteccion nuevo , NO FUE grabado , por favor intente nuevamente.'));
            }
        }
        $this->set(compact('mecanismo'));
        $this->set('_serialize', ['mecanismo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mecanismo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mecanismo = $this->Mecanismos->get($id, [
            'contain' => []
        ]); // debug($mecanismo); die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mecanismo = $this->Mecanismos->patchEntity($mecanismo, $this->request->data); // debug($mecanismo->activo); die();
            $mecanismo->activo = ($mecanismo->activo == 1);
            if ($this->Mecanismos->save($mecanismo)) {
                $this->Flash->success(__('Grabado con exito!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Hubo un Error por favor intente nuevamente.'));
            }
        }
        $this->set(compact('mecanismo'));
        $this->set('_serialize', ['mecanismo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mecanismo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mecanismo = $this->Mecanismos->get($id);
        if ($this->Mecanismos->delete($mecanismo)) {
            $this->Flash->success(__('The mecanismo has been deleted.'));
        } else {
            $this->Flash->error(__('The mecanismo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
