<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentosMecanismos Model
 *
 * @property \App\Model\Table\MecanismosTable|\Cake\ORM\Association\BelongsTo $Mecanismos
 * @property \App\Model\Table\TipoInformesTable|\Cake\ORM\Association\BelongsTo $TipoInformes
 *
 * @method \App\Model\Entity\DocumentosMecanismo get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentosMecanismo findOrCreate($search, callable $callback = null, $options = [])
 */
class DocumentosMecanismosTable extends Table
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

        $this->setTable('documentos_mecanismos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mecanismos', [
            'foreignKey' => 'mecanismo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TipoInformes', [
            'foreignKey' => 'tipoInforme_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('link')
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['mecanismo_id'], 'Mecanismos'));
        $rules->add($rules->existsIn(['tipoInforme_id'], 'TipoInformes'));

        return $rules;
    }
}
