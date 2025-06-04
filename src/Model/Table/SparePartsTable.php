<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpareParts Model
 *
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Sups
 *
 * @method \App\Model\Entity\SparePart newEmptyEntity()
 * @method \App\Model\Entity\SparePart newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SparePart> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SparePart get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SparePart findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SparePart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SparePart> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SparePart|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SparePart saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SparePart>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SparePart>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SparePart>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SparePart> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SparePart>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SparePart>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SparePart>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SparePart> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SparePartsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */

     public function initialize(array $config): void
     {
         parent::initialize($config);
 
         $this->setTable('spare_parts');
         $this->setDisplayField('spa_name');
         $this->setPrimaryKey('spa_id');
 
         $this->belongsTo('Sups', [
             'foreignKey' => 'sup_id',
             'className' => 'Suppliers',
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
            ->scalar('spa_name')
            ->maxLength('spa_name', 50)
            ->allowEmptyString('spa_name');

        $validator
            ->scalar('spa_description')
            ->allowEmptyString('spa_description');

        $validator
            ->decimal('spa_priceexcludingiva')
            ->allowEmptyString('spa_priceexcludingiva');

        $validator
            ->decimal('spa_iva')
            ->allowEmptyString('spa_iva');

        $validator
            ->decimal('spa_ivaprice')
            ->allowEmptyString('spa_ivaprice');

        $validator
            ->decimal('spa_ednuserprice')
            ->allowEmptyString('spa_ednuserprice');

        $validator
            ->decimal('spa_higherprece')
            ->allowEmptyString('spa_higherprece');

        $validator
            ->integer('spa_stock')
            ->allowEmptyString('spa_stock');

        $validator
            ->integer('spa_existence')
            ->allowEmptyString('spa_existence');

        $validator
            ->scalar('spa_category')
            ->maxLength('spa_category', 50)
            ->allowEmptyString('spa_category');

        $validator
            ->integer('sup_id')
            ->allowEmptyString('sup_id');

        $validator
            ->dateTime('spa_create')
            ->allowEmptyDateTime('spa_create');

        $validator
            ->dateTime('spa_update')
            ->allowEmptyDateTime('spa_update');

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
        $rules->add($rules->existsIn(['sup_id'], 'Sups'), ['errorField' => 'sup_id']);

        return $rules;
    }
}
