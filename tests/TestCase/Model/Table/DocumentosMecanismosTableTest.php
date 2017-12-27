<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentosMecanismosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentosMecanismosTable Test Case
 */
class DocumentosMecanismosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentosMecanismosTable
     */
    public $DocumentosMecanismos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.documentos_mecanismos',
        'app.mecanismos',
        'app.mecanismo_recomendacion',
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
        'app.adjuntos_versions',
        'app.comite_recomendacions',
        'app.comites',
        'app.tipo_informes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DocumentosMecanismos') ? [] : ['className' => DocumentosMecanismosTable::class];
        $this->DocumentosMecanismos = TableRegistry::get('DocumentosMecanismos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentosMecanismos);

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
