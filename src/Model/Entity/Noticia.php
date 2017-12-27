<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Noticia Entity
 *
 * @property int $id
 * @property string $titular
 * @property string $contenido
 * @property \Cake\I18n\FrozenTime $fecha
 * @property int $estado_id
 * @property string $link_imagen
 *
 * @property \App\Model\Entity\Estado $estado
 */
class Noticia extends Entity
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
        'titular' => true,
        'contenido' => true,
        'fecha' => true,
        'estado_id' => true,
        'link_imagen' => true,
        'estado' => true
    ];
}
