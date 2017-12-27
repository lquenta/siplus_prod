<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoInformes Controller
 *
 * @property \App\Model\Table\TipoInformesTable $TipoInformes
 *
 * @method \App\Model\Entity\TipoInforme[] paginate($object = null, array $settings = [])
 */
class TipoInformesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoInformes = $this->paginate($this->TipoInformes);

        $this->set(compact('tipoInformes'));
        $this->set('_serialize', ['tipoInformes']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Informe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoInforme = $this->TipoInformes->get($id, [
            'contain' => []
        ]);

        $this->set('tipoInforme', $tipoInforme);
        $this->set('_serialize', ['tipoInforme']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoInforme = $this->TipoInformes->newEntity();
        if ($this->request->is('post')) {
            $tipoInforme = $this->TipoInformes->patchEntity($tipoInforme, $this->request->getData());
            if ($this->TipoInformes->save($tipoInforme)) {
                $this->Flash->success(__('The tipo informe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo informe could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoInforme'));
        $this->set('_serialize', ['tipoInforme']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Informe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoInforme = $this->TipoInformes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoInforme = $this->TipoInformes->patchEntity($tipoInforme, $this->request->getData());
            if ($this->TipoInformes->save($tipoInforme)) {
                $this->Flash->success(__('The tipo informe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo informe could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoInforme'));
        $this->set('_serialize', ['tipoInforme']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Informe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoInforme = $this->TipoInformes->get($id);
        if ($this->TipoInformes->delete($tipoInforme)) {
            $this->Flash->success(__('The tipo informe has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo informe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
