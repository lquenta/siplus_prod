<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentosMecanismo Entity
 *
 * @property int $id
 * @property int $mecanismo_id
 * @property string $link
 * @property int $tipoInforme_id
 *
 * @property \App\Model\Entity\Mecanismo $mecanismo
 * @property \App\Model\Entity\TipoInforme $tipo_informe
 */
class DocumentosMecanismo extends Entity
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
        'mecanismo_id' => true,
        'link' => true,
        'tipoInforme_id' => true,
        'mecanismo' => true,
        'tipo_informe' => true,
        'fecha' => true
    ];
}
