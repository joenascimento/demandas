<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Demand Entity
 *
 * @property int $id
 * @property string $demand
 * @property string $description
 * @property int $effort
 * @property int $closed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DemandsHistory[] $demands_history
 * @property \App\Model\Entity\Release[] $releases
 */
class Demand extends Entity
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
        'demand' => true,
        'description' => true,
        'effort' => true,
        'closed' => true,
        'created' => true,
        'modified' => true,
        'demands_history' => true,
        'releases' => true,
    ];
}
