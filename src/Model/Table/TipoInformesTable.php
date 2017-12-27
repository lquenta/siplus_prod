<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoInformes Model
 *
 * @method \App\Model\Entity\TipoInforme get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoInforme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoInforme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoInforme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoInforme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoInforme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoInforme findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoInformesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tipo_informes');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        return $validator;
    }
}
