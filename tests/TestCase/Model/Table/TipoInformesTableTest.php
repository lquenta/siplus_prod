<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoInformesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoInformesTable Test Case
 */
class TipoInformesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoInformesTable
     */
    public $TipoInformes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('TipoInformes') ? [] : ['className' => TipoInformesTable::class];
        $this->TipoInformes = TableRegistry::get('TipoInformes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoInformes);

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
}
