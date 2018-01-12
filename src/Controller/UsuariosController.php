<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[] paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    public function isAuthorized($user = null) { // debug($user); die();
        // Administrador puede realizar todas las acciones de este controlador.
        if ($this->isInRole("Administrador")) {
            return true;
        }

        return false;
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                if ($user['activo'] == 0) {
                    $this->Flash->error(__('El usuario no se encuentra activo.'));
                    return;
                }

                // Se obtienen los roles del usuario para agregarlos al objeto usuario de la sesión.
                $usersTable = TableRegistry::get('Usuarios');
                $actualUser = $usersTable->get($user['id'], [
                    'contain' => ['Roles']
                ]);

                $rolesArray = array();
                foreach ($actualUser->roles as $rol) {
                    array_push($rolesArray, $rol->nombre);
                }
                $user['roles'] = $rolesArray; // debug($user); die();

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuario o password incorrecto, por favor intente de nuevo.'));
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Institucions', 'Roles']
        ];
        $usuarios = $this->paginate($this->Usuarios);  // debug($usuarios); die();

        $this->set(compact('usuarios'));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Institucions', 'Roles', 'Accions', 'Autorizacions', 'Notificacions', 'Recomendacions', 'Revisions', 'SolicitudInformacions', 'SolicitudRespuestas', 'SolicitudesPendientesRespuestas', 'Versions']
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['activo'] = 1;
            $usuario = $this->Usuarios->patchEntity($usuario, $data); // debug($usuario); die();
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario se registró correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $institucions = $this->Usuarios->Institucions->find('list');
        $roles = $this->Usuarios->Roles->find('list');
        $this->set(compact('usuario', 'institucions', 'roles'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario se guardó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $institucions = $this->Usuarios->Institucions->find('list', ['limit' => 200]);
        $roles = $this->Usuarios->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'institucions', 'roles'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
