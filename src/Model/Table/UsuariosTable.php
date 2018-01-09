<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\InstitucionsTable|\Cake\ORM\Association\BelongsTo $Institucions
 * @property \App\Model\Table\AccionsTable|\Cake\ORM\Association\HasMany $Accions
 * @property \App\Model\Table\AutorizacionsTable|\Cake\ORM\Association\HasMany $Autorizacions
 * @property \App\Model\Table\NotificacionsTable|\Cake\ORM\Association\HasMany $Notificacions
 * @property \App\Model\Table\RecomendacionsTable|\Cake\ORM\Association\HasMany $Recomendacions
 * @property \App\Model\Table\RevisionsTable|\Cake\ORM\Association\HasMany $Revisions
 * @property \App\Model\Table\SolicitudInformacionsTable|\Cake\ORM\Association\HasMany $SolicitudInformacions
 * @property \App\Model\Table\SolicitudRespuestasTable|\Cake\ORM\Association\HasMany $SolicitudRespuestas
 * @property \App\Model\Table\SolicitudesPendientesRespuestasTable|\Cake\ORM\Association\HasMany $SolicitudesPendientesRespuestas
 * @property \App\Model\Table\VersionsTable|\Cake\ORM\Association\HasMany $Versions
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Institucions', [
            'foreignKey' => 'institucion_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Accions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Autorizacions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Notificacions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Recomendacions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Revisions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('SolicitudInformacions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('SolicitudRespuestas', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('SolicitudesPendientesRespuestas', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Versions', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'usuario_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'roles_usuarios'
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
            ->scalar('usuario')
            ->requirePresence('usuario', 'create')
            ->notEmpty('usuario');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('nombres')
            ->requirePresence('nombres', 'create')
            ->notEmpty('nombres');

        $validator
            ->scalar('apellidos')
            ->requirePresence('apellidos', 'create')
            ->notEmpty('apellidos');

        $validator
            ->scalar('cargo')
            ->requirePresence('cargo', 'create')
            ->notEmpty('cargo');

        $validator
            ->dateTime('fecha_creacion')
            ->requirePresence('fecha_creacion', 'create')
            ->notEmpty('fecha_creacion');

        $validator
            ->dateTime('fecha_modificacion')
            ->requirePresence('fecha_modificacion', 'create')
            ->notEmpty('fecha_modificacion');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('activo')
            ->requirePresence('activo', 'create')
            ->notEmpty('activo');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['institucion_id'], 'Institucions'));

        return $rules;
    }
}
