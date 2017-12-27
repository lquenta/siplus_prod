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
class DocumentosController extends AppController
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
                    $informes_recomendacion_array[]=array('fecha'=>$informe_rf->fecha,'url'=>$full_url.'/uploads/'.$informe_rf->link);
                }
                foreach ($informes_estado_elemento as $informe_es) {
                    $informes_estado_array[]=array('fecha'=>$informe_es->fecha,'url'=>$full_url.'/uploads/'.$informe_es->link);
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

