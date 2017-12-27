<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\I18n\Time;
use Cake\Utility\Text;
/**
 * Noticias Controller
 *
 * @property \App\Model\Table\NoticiasTable $Noticias
 *
 * @method \App\Model\Entity\Noticia[] paginate($object = null, array $settings = [])
 */
class NoticiasController extends AppController
{
     public function beforeFilter(Event $event)
    {
        // allow only login, forgotpassword
         $this->Auth->allow(['todas','add']);
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
            'contain' => ['Estados']
        ];
        $noticias = $this->paginate($this->Noticias);

        $this->set(compact('noticias'));
        $this->set('_serialize', ['noticias']);
    }

    /**
     * View method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticia = $this->Noticias->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('noticia', $noticia);
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $noticia = $this->Noticias->newEntity();
        if ($this->request->is('post')) {
             $foto_imagen = $this->request->data['link_imagen'];
                
                    $adjunto_req = [
                'name' => $foto_imagen['name'],
                'type' => $foto_imagen['type'],
                'tmp_name' => $foto_imagen['tmp_name'],
                'error' => $foto_imagen['error'],
                'size' => $foto_imagen['size']];

            $adjunto_req['name']=$this->sanitize($adjunto_req['name']);
            //$file_name =  ROOT .DS. 'uploads' .DS. time().'_'.$adjunto_req['name'];
            $file_name_part = time().'_'.$adjunto_req['name'];
            $file_name =  ROOT .DS. 'webroot'.DS.'images'.DS. $file_name_part;
            $res=move_uploaded_file($adjunto_req['tmp_name'],$file_name); 
            $adj_save = array(
                'titular'=>$this->request->data['titular'],
                'contenido'=>$this->request->data['contenido'],
                'fecha'=>$this->request->data['fecha'],
                'estado_id'=>$this->request->data['estado_id'],
                'link_imagen'=>$file_name_part);
                    
                
            $noticia = $this->Noticias->patchEntity($noticia, $adj_save);
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('Se ha guardado con exito'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error, por favor intente nuevamente.'));
        }
        $estados=$this->Noticias->Estados->find('list')->where(['id IN' => array(1,9)]);;

        $this->set(compact('noticia', 'estados'));
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $noticia = $this->Noticias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $noticia = $this->Noticias->patchEntity($noticia, $this->request->getData());
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('Grabado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Hubo un error, por favor intente nuevamente.'));
        }
        $estados = $this->Noticias->Estados->find('list', ['limit' => 200]);
        $this->set(compact('noticia', 'estados'));
        $this->set('_serialize', ['noticia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticia = $this->Noticias->get($id);
        if ($this->Noticias->delete($noticia)) {
            $this->Flash->success(__('The noticia has been deleted.'));
        } else {
            $this->Flash->error(__('The noticia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function todas(){
        $this->response->cors($this->request)
            ->allowOrigin(['*'])
            ->allowMethods(['GET', 'POST'])
            ->allowHeaders(['X-CSRF-Token'])
            ->allowCredentials()
            ->exposeHeaders(['Link'])
            ->maxAge(300)
            ->build();
         $full_url=Router::url('/', true);;
         $this->loadModel('Noticias');
         $resultados  = array();
         $resultados_detalle=array();
         $noticias_ultimas_3 = $this->Noticias->find('all',['limit'=>3]);
        

         foreach ($noticias_ultimas_3 as $noticia) {
             $nuevo_resultados_detalle=array(
                'id_noticia'=>$noticia->id,
                'titular'=>$noticia->titular,
                'contenido'=>$noticia->contenido,
                'fecha'=>$noticia->fecha,
                'estado'=>$noticia->estado_id,
                'link_imagen'=>$full_url.'images/'.$noticia->link_imagen
                );
             array_push($resultados_detalle, $nuevo_resultados_detalle);

         }
         $resultados=array(
            'resultados'=>$resultados_detalle
            );

         $this->set([
            'resultados' => $resultados,
            '_serialize' => ['resultados']
        ]);

        /*$resultados=array(
            'resultados'=>
                array(
                    array('id_noticia'=>1,
                        'titular'=>'BOLIVIA en el Examen Periódico Universal 2014',
                        'contenido'=> 'En Octubre de 2014, en el marco de su segundo informe al Examen Periódico Universal (EPU), el Estado boliviano se comprometió voluntariamente a la “Creación de un espacio interministerial en derechos humanos para la elaboración de informes periódicos.”  A partir de entonces, y en cumplimiento a este compromiso, el Ministerio de Relaciones Exteriores, el Ministerio de Justicia y la Procuraduría General del Estado, con el apoyo de la OACNUDH Bolivia, trabajaron en la conformación de un espacio de coordinación interinstitucional para la elaboración, presentación y defensa de Informes del Estado Plurinacional de Bolivia ante los diferentes mecanismos de protección de los derechos humanos de la Organización de Naciones Unidas, y en la creación paralela de un Sistema de Seguimiento, Monitoreo y Estadísticas de las recomendaciones sobre derechos humanos aceptadas por el Estado, denominado SIPLUS Bolivia. Este esfuerzo fue oficializado a través de un Convenio de Cooperación firmado el 01 de diciembre de 2015 entre estas instituciones.<br\>El EPU es el mecanismo de protección más reciente creado por el Consejo de Derechos Humanos de la Organización de Naciones Unidas. Es un proceso único al que los 193 Estados Miembros de la ONU se presentan voluntariamente para dar a conocer ante sus pares la situación de los derechos humanos en sus países y asumen, en muchos casos, compromisos voluntarios en materia de derechos humanos. Tras un diálogo interactivo entre Estados, el Estado examinado recibe recomendaciones con la posibilidad de aceptarlas o rechazarlas. <br\>Bolivia presentó dos informes EPU en 2010 y 2014. <br\>
                            •   <a href="http://www.ohchr.org/EN/HRBodies/UPR/Pages/BOSession20.aspx">Aquí</a>.    Informes de Bolivia ante el Examen Periódico Universal.<br\>
                            •   <a href="http://webtv.un.org/meetings-events/watch/bolivia-upr-report-consideration-38th-meeting-28th-regular-session-human-rights-council/4119476801001">Aquí</a>.    Video de la presentación del segundo informe EPU de Bolivia el año 2014.',
                        'fecha'=>'01-10-2012',
                        'estado'=>'1',
                        'link_imagen'=>$full_url.'/images/noticia1.jpg'
                    ),
                    array('id_noticia'=>2,
                        'titular'=>'Presentación oficial del Sistema Plurinacional de Seguimiento, Monitoreo y Estadística de Recomendaciones sobre Derechos Humanos en Bolivia: SIPLUS Bolivia',
                        'contenido'=> 'El 10 de diciembre 2015, en conmemoración al Día Internacional de los Derechos Humanos, el Ministerio de Justicia, el Ministerio de Relaciones Exteriores y la Procuraduría General de Estado, con el apoyo técnica de la Oficina en Bolivia del Alto Comisionado de las Naciones Unidas para los Derechos Humanos, realizaron la presentación de la primera versión del Sistema Plurinacional de Seguimiento, Monitoreo y Estadística de Recomendaciones sobre Derechos Humanos en Bolivia (SIPLUS Bolivia).<br/>
                            El Viceministro de Justicia y Derechos Fundamentales, Sr. Diego Jiménez, expresó:  “El objeto es facilitar la búsqueda de recomendaciones, hacer el seguimiento de las acciones llevadas a cabo por el Estado respecto a éstas y conocer datos estadísticos vinculados  a los esfuerzos del Estado en el cumplimiento de sus obligaciones en materia de derechos humanos”.',
                        'fecha'=>'11-12-2015',
                        'estado'=>'1',
                        'link_imagen'=>$full_url.'/images/noticia2.jpg'
                    ),
                     array('id_noticia'=>3,
                        'titular'=>'Informe del Estado Plurinacional de Bolivia ante el Comité de los Derechos de las Personas con Discapacidad de la Organización de las Naciones Unidas (ONU)',
                        'contenido'=> 'La delegación del Estado Plurinacional de Bolivia, encabezada por la Ministra de Justicia, Dra. Virginia Velasco Condori, y la Embajadora de la Misión Permanente de Bolivia ante la Organización de las Naciones Unidas, Dra. Nardi Suxo Iturry, junto a su equipo técnico, participaron  en la ciudad de Ginebra- Suiza los días 17 y 18 de agosto de 2016, en la presentación del Informe del Estado ante el Comité de los Derechos de las Personas con Discapacidad. <br/>
El Informe fue revisado en el marco del espacio de coordinación interinstitucional para la elaboración, presentación y defensa de Informes del Estado Plurinacional de Bolivia ante los diferentes mecanismos de protección de los derechos humanos de la Organización de Naciones Unidas. Fue una primera experiencia exitosa de trabajo de este espacio en la que, además de las instituciones que conforman esta instancia, participó el equipo técnico del Viceministerio de Igualdad de Oportunidades del Ministerio de Justicia, quienes se encargaron de la elaboración de este informe. Además de la revisión del informe, el espacio de coordinación interinstitucional sirvió para preparar a la delegación del Estado respecto a aspectos técnicos de la modalidad de trabajo del Comité de los Derechos de las Personas con Discapacidad.<br/>
Las recomendaciones emitidas por el Comité de los Derechos de las Personas con Discapacidad serán incorporadas en la base de datos del SIPLUS Bolivia.

Video de la presentación del Informe de Bolivia ante el Comité de los Derechos de las Personas con Discapacidad 2016: <a href="http://webtv.un.org/meetings-events/watch/bolivia-16th-session-of-committee-on-rights-of-persons-with-disabilities/5104154403001">http://webtv.un.org/meetings-events/watch/bolivia-16th-session-of-committee-on-rights-of-persons-with-disabilities/5104154403001"</a>
',
                        'fecha'=>'17-08-2016',
                        'estado'=>'1',
                        'link_imagen'=>$full_url.'/images/noticia3.jpg'
                    ),
                      array('id_noticia'=>4,
                        'titular'=>'¡Baja la aplicación del SIPLUS en tu celular! ',
                        'contenido'=> 'http://www.boliviaentusmanos.com/noticias/.',
                        'fecha'=>'09-06-2014',
                        'estado'=>'1',
                        'link_imagen'=>$full_url.'/images/noticia1.jpg'
                    ),
                ));
        $this->set([
            'resultados' => $resultados,
            '_serialize' => ['resultados']
        ]);
    */
    }

}
