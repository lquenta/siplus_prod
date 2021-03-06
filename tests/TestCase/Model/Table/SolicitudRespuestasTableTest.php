<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolicitudRespuestasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolicitudRespuestasTable Test Case
 */
class SolicitudRespuestasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SolicitudRespuestasTable
     */
    public $SolicitudRespuestas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.solicitud_respuestas',
        'app.solicitud_informacions',
        'app.users',
        'app.rols',
        'app.institucions',
        'app.institucion_recomendacion',
        'app.recomendacions',
        'app.estados',
        'app.autorizacions',
        'app.accions',
        'app.adjuntos_accions',
        'app.adjuntos_recomendacions',
        'app.derecho_recomendacion',
        'app.derechos',
        'app.indicadors',
        'app.indicadores_derechos',
        'app.mecanismo_recomendacion',
        'app.mecanismos',
        'app.notificacions',
        'app.poblacion_recomendacion',
        'app.poblacions',
        'app.recomendacion_parametros',
        'app.revisions',
        'app.versions',
        'app.adjuntos_versions',
        'app.institucion_solicitudes',
        'app.adjuntos_solicitud_respuestas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SolicitudRespuestas') ? [] : ['className' => 'App\Model\Table\SolicitudRespuestasTable'];
        $this->SolicitudRespuestas = TableRegistry::get('SolicitudRespuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SolicitudRespuestas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
