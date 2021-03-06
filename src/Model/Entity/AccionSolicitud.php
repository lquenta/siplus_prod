<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AccionSolicitud Entity
 *
 * @property int $id
 * @property int $accion_id
 * @property int $institucion_id
 * @property \Cake\I18n\Time $fecha
 * @property string $respuesta
 * @property string $link_adjunto
 * @property int $estado_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Accion $accion
 * @property \App\Model\Entity\Institucion $institucion
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\User $user
 */
class AccionSolicitud extends Entity
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
        '*' => true,
        'id' => false
    ];
}
