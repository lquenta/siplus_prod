<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MecanismoRecomendacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MecanismoRecomendacionTable Test Case
 */
class MecanismoRecomendacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MecanismoRecomendacionTable
     */
    public $MecanismoRecomendacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mecanismo_recomendacion',
        'app.mecanismos',
        'app.recomendacions',
        'app.users',
        'app.rols',
        'app.institucions',
        'app.institucion_recomendacion',
        'app.estados',
        'app.autorizacions',
        'app.accions',
        'app.adjuntos_accions',
        'app.adjuntos_recomendacions',
        'app.derecho_recomendacion',
        'app.derechos',
        'app.indicadors',
        'app.indicadores_derechos',
        'app.notificacions',
        'app.poblacion_recomendacion',
        'app.poblacions',
        'app.recomendacion_parametros',
        'app.revisions',
        'app.versions',
        'app.adjuntos_versions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MecanismoRecomendacion') ? [] : ['className' => 'App\Model\Table\MecanismoRecomendacionTable'];
        $this->MecanismoRecomendacion = TableRegistry::get('MecanismoRecomendacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MecanismoRecomendacion);

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
