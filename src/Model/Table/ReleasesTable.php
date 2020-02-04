<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Releases Model
 *
 * @property \App\Model\Table\DemandsTable&\Cake\ORM\Association\BelongsTo $Demands
 *
 * @method \App\Model\Entity\Release get($primaryKey, $options = [])
 * @method \App\Model\Entity\Release newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Release[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Release|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Release[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Release findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReleasesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('releases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Demands', [
            'foreignKey' => 'demand_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('hour')
            ->requirePresence('hour', 'create')
            ->notEmptyString('hour');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['demand_id'], 'Demands'));

        return $rules;
    }

    public function getCount($releases)
    {
        $query = $releases
            ->find()
            ->count();
        
        return $query;
    }

    public function getReleases($releases)
    {
        $query = $releases
            ->find()
            ->contain('Demands')
            ->select(['Demands.demand', 'hour']);

        return $query;
    }

    public function getEffort($releases)
    {
        $query = $releases
            ->find()
            ->contain('Demands')
            ->select(['Demands.demand', 'Demands.effort', 'hour']);

        return $query;
    }
}
