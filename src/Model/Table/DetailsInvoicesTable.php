<?php
declare(strict_types=1);

namespace App\Model\Table;

use ArrayObject;
use Cake\Event\EventInterface;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class DetailsInvoicesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('details_invoices');
        $this->setPrimaryKey('di_id');

        $this->belongsTo('SpareParts', [
            'foreignKey' => 'spa_id',
            'joinType'   => 'LEFT',
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'inv_id',
            'joinType'   => 'INNER',
        ]);
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('di_quantity')
            ->notEmptyString('di_quantity', 'La cantidad es obligatoria.')
            ->greaterThan('di_quantity', 0, 'La cantidad debe ser mayor que cero.');

        $validator
            ->decimal('di_price')
            ->notEmptyString('di_price', 'El precio es obligatorio.')
            ->greaterThan('di_price', 0, 'El precio debe ser mayor que cero.');

        return $validator;
    }
    
}
