<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property int $institucion_id
 * @property string $usuario
 * @property string $password
 * @property string $nombres
 * @property string $apellidos
 * @property string $cargo
 * @property \Cake\I18n\FrozenTime $fecha_creacion
 * @property \Cake\I18n\FrozenTime $fecha_modificacion
 * @property string $email
 * @property int $activo
 *
 * @property \App\Model\Entity\Institucion $institucion
 * @property \App\Model\Entity\Accion[] $accions
 * @property \App\Model\Entity\Autorizacion[] $autorizacions
 * @property \App\Model\Entity\Notificacion[] $notificacions
 * @property \App\Model\Entity\Recomendacion[] $recomendacions
 * @property \App\Model\Entity\Revision[] $revisions
 * @property \App\Model\Entity\SolicitudInformacion[] $solicitud_informacions
 * @property \App\Model\Entity\SolicitudRespuesta[] $solicitud_respuestas
 * @property \App\Model\Entity\SolicitudesPendientesRespuesta[] $solicitudes_pendientes_respuestas
 * @property \App\Model\Entity\Version[] $versions
 * @property \App\Model\Entity\Role[] $roles
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'institucion_id' => true,
        'usuario' => true,
        'password' => true,
        'nombres' => true,
        'apellidos' => true,
        'cargo' => true,
        'fecha_creacion' => true,
        'fecha_modificacion' => true,
        'email' => true,
        'activo' => true,
        'institucion' => true,
        'accions' => true,
        'autorizacions' => true,
        'notificacions' => true,
        'recomendacions' => true,
        'revisions' => true,
        'solicitud_informacions' => true,
        'solicitud_respuestas' => true,
        'solicitudes_pendientes_respuestas' => true,
        'versions' => true,
        'roles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
