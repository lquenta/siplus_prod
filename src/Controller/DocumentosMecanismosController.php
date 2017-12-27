<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\I18n\Time;
use Cake\Utility\Text;
/**
/**
 * DocumentosMecanismos Controller
 *
 * @property \App\Model\Table\DocumentosMecanismosTable $DocumentosMecanismos
 *
 * @method \App\Model\Entity\DocumentosMecanismo[] paginate($object = null, array $settings = [])
 */
class DocumentosMecanismosController extends AppController
{

      public function beforeFilter(Event $event)
    {
        // allow only login, forgotpassword
         $this->Auth->allow(['documentos']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Mecanismos', 'TipoInformes']
        ];
        $documentosMecanismos = $this->paginate($this->DocumentosMecanismos);

        $this->set(compact('documentosMecanismos'));
        $this->set('_serialize', ['documentosMecanismos']);
    }

    /**
     * View method
     *
     * @param string|null $id Documentos Mecanismo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentosMecanismo = $this->DocumentosMecanismos->get($id, [
            'contain' => ['Mecanismos', 'TipoInformes']
        ]);

        $this->set('documentosMecanismo', $documentosMecanismo);
        $this->set('_serialize', ['documentosMecanismo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentosMecanismo = $this->DocumentosMecanismos->newEntity();
        if ($this->request->is('post')) {
             $documento_pdf = $this->request->data['link'];
                
                    $adjunto_req = [
                'name' => $documento_pdf['name'],
                'type' => $documento_pdf['type'],
                'tmp_name' => $documento_pdf['tmp_name'],
                'error' => $documento_pdf['error'],
                'size' => $documento_pdf['size']];
             $adjunto_req['name']=$this->sanitize($adjunto_req['name']);
            $file_name_part = time().'_'.$adjunto_req['name'];
            $file_name =  ROOT .DS. 'webroot'.DS.'uploads'.DS. $file_name_part;
            $res=move_uploaded_file($adjunto_req['tmp_name'],$file_name); 
            $adj_save = array(
                'mecanismo_id'=>$this->request->data['mecanismo_id'],
                'link'=>$file_name_part,
                'tipoInforme_id'=>$this->request->data['tipoInforme_id'],
                'fecha'=>$this->request->data['fecha']
                );

            $documentosMecanismo = $this->DocumentosMecanismos->patchEntity($documentosMecanismo, $adj_save);
            if ($this->DocumentosMecanismos->save($documentosMecanismo)) {
                $this->Flash->success(__('Se ha guardado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error,por favor intente de nuevo.'));
        }
        $mecanismos = $this->DocumentosMecanismos->Mecanismos->find('list', ['limit' => 200]);
        $tipoInformes = $this->DocumentosMecanismos->TipoInformes->find('list', ['limit' => 200]);
        $this->set(compact('documentosMecanismo', 'mecanismos', 'tipoInformes'));
        $this->set('_serialize', ['documentosMecanismo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Documentos Mecanismo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentosMecanismo = $this->DocumentosMecanismos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentosMecanismo = $this->DocumentosMecanismos->patchEntity($documentosMecanismo, $this->request->getData());
            if ($this->DocumentosMecanismos->save($documentosMecanismo)) {
                $this->Flash->success(__('Se ha guardado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error,por favor intente de nuevo.'));
        }
        $mecanismos = $this->DocumentosMecanismos->Mecanismos->find('list', ['limit' => 200]);
        $tipoInformes = $this->DocumentosMecanismos->TipoInformes->find('list', ['limit' => 200]);
        $this->set(compact('documentosMecanismo', 'mecanismos', 'tipoInformes'));
        $this->set('_serialize', ['documentosMecanismo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Documentos Mecanismo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentosMecanismo = $this->DocumentosMecanismos->get($id);
        if ($this->DocumentosMecanismos->delete($documentosMecanismo)) {
            $this->Flash->success(__('The documentos mecanismo has been deleted.'));
        } else {
            $this->Flash->error(__('The documentos mecanismo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function documentos(){
        $this->response->cors($this->request)
            ->allowOrigin(['*'])
            ->allowMethods(['GET', 'POST'])
            ->allowHeaders(['X-CSRF-Token'])
            ->allowCredentials()
            ->exposeHeaders(['Link'])
            ->maxAge(300)
            ->build();
         $full_url=Router::url('/', true);;
         $this->loadModel('DocumentosMecanismos');
         $this->loadModel('Mecanismos');
         $resultados  = array();
         $resultados_detalle=array();
         $mecanismos_lista = $this->Mecanismos->find('all');
        

         foreach ($mecanismos_lista as $mecanismo_elemento) {
            $informes_recomendaciones_finales_elemento = $this->DocumentosMecanismos->find('all')->where(['mecanismo_id'=>$mecanismo_elemento->id])->where(['tipoInforme_id'=>1]);
            $informes_estado_elemento = $this->DocumentosMecanismos->find('all')->where(['mecanismo_id'=>$mecanismo_elemento->id])->where(['tipoInforme_id'=>2]);
            if($informes_recomendaciones_finales_elemento!=null || $informes_estado_elemento!=null){
                $informes_recomendacion_array=array();
                $informes_estado_array=array();
                foreach ($informes_recomendaciones_finales_elemento as $informe_rf) {
                    $informes_recomendacion_array[]=array('fecha'=>$informe_rf->fecha,'url'=>$full_url.'/'.$informe_rf->link);
                }
                foreach ($informes_estado_elemento as $informe_es) {
                    $informes_estado_array[]=array('fecha'=>$informe_es->fecha,'url'=>$full_url.'/'.$informe_es->link);
                }
                 $nuevo_resultados_detalle=array(
                'nombre'=>$mecanismo_elemento->descripcion,
                'informe_recomendacion'=>$informes_recomendacion_array,
                'informe_estado'=>$informes_estado_array
                );
                array_push($resultados_detalle, $nuevo_resultados_detalle);
            }
            

         }
         $resultados=array(
            'resultados'=>$resultados_detalle
            );

         $this->set([
            'resultados' => $resultados,
            '_serialize' => ['resultados']
        ]);

        
    }

}

