<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SparePart Entity
 *
 * @property int $spa_id
 * @property string|null $spa_name
 * @property string|null $spa_description
 * @property string|null $spa_priceexcludingiva
 * @property string|null $spa_iva
 * @property string|null $spa_ivaprice
 * @property string|null $spa_ednuserprice
 * @property string|null $spa_higherprece
 * @property int|null $spa_stock
 * @property int|null $spa_existence
 * @property string|null $spa_category
 * @property int|null $sup_id
 * @property \Cake\I18n\DateTime|null $spa_create
 * @property \Cake\I18n\DateTime|null $spa_update
 *
 * @property \App\Model\Entity\Supplier $sup
 */
class SparePart extends Entity
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
        'spa_id' => true,
        'spa_name' => true,
        'spa_description' => true,
        'spa_priceexcludingiva' => true,
        'spa_iva' => true,
        'spa_ivaprice' => true,
        'spa_ednuserprice' => true,
        'spa_higherprece' => true,
        'spa_stock' => true,
        'spa_existence' => true,
        'spa_category' => true,
        'sup_id' => true,
        'spa_create' => true,
        'spa_update' => true,
        'sup' => true,
    ];
}
