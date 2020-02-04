<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Release Entity
 *
 * @property int $id
 * @property int $demand_id
 * @property string $hour
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Demand $demand
 */
class Release extends Entity
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
        'demand_id' => true,
        'hour' => true,
        'data' => true,
        'created' => true,
        'modified' => true,
        'demand' => true,
    ];
}
