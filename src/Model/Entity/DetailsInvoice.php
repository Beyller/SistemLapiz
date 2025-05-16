<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetailsInvoice Entity
 *
 * @property int $di_id
 * @property string|null $di_price
 * @property int|null $spa_id
 * @property int|null $inv_id
 *
 * @property \App\Model\Entity\SparePart $spa
 * @property \App\Model\Entity\Invoice $inv
 */
class DetailsInvoice extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'di_price' => true,
        'spa_id' => true,
        'di_quantity'=> true,
        'inv_id' => true,
        'spa' => true,
        'inv' => true,
    ];
}
