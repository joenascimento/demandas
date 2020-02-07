<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Demands Model
 *
 * @property \App\Model\Table\DemandsHistoryTable&\Cake\ORM\Association\HasMany $DemandsHistory
 * @property \App\Model\Table\ReleasesTable&\Cake\ORM\Association\HasMany $Releases
 *
 * @method \App\Model\Entity\Demand get($primaryKey, $options = [])
 * @method \App\Model\Entity\Demand newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Demand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Demand|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demand saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Demand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Demand[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Demand findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DemandsTable extends Table
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

        $this->setTable('demands');
        $this->setDisplayField('demand');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DemandsHistory', [
            'foreignKey' => 'demand_id',
        ]);
        $this->hasMany('Releases', [
            'foreignKey' => 'demand_id',
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
            ->scalar('demand')
            ->maxLength('demand', 100)
            ->requirePresence('demand', 'create')
            ->notEmptyString('demand');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('effort')
            ->requirePresence('effort', 'create')
            ->notEmptyString('effort');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['demand'], 'Esta demanda já existe'));

        return $rules;
    }

    public function insertDemandHistory($historyModel, $demandData, $historyData)
    {
        $historyData->demand_id = $demandData->id;
        $historyData->effort = $demandData->effort;
        $historyData->created = $historyModel->query()->func()->now();
        $historyData->modified = $historyModel->query()->func()->now();

        $historyModel->save($historyData);
    }

    public function updateDemandHistory($historyModel, $demandData, $historyData)
    {
        $historyData->demand_id = $demandData->id;
        $historyData->effort = $this->getEffort($demandData->id);
        $historyData->updated_effort = $demandData->effort;
        $historyData->created = $this->getCreated($demandData->id);
        $historyData->modified = $historyModel->query()->func()->now();

        $historyModel->save($historyData);
    }

    private function getCreated($demandId)
    {
        $query = $this
            ->find()
            ->select(['id', 'created'])
            ->where(['id' => $demandId])
            ->execute();

        foreach($query as $key) {
            return $key['Demands__created'];
        }
    }

    public function getEffort($demandId)
    {
        $query = $this
            ->find()
            ->select(['id', 'effort'])
            ->where(['id' => $demandId])
            ->execute();

        foreach($query as $key) {
            return $key['Demands__effort'];
        }
    }

    public function getCount($demands)
    {
        $query = $demands
            ->find()
            ->count();

        return $query;
    }

    public function getDemands($demands)
    {
        $query = $demands
            ->find()
            ->select(['demand', 'effort']);

        return $query;
    }
}
