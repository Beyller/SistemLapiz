<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $sup_id
 * @property string|null $sup_documenttype
 * @property int|null $sup_numberdocument
 * @property string|null $sup_name
 * @property string|null $sup_adress
 * @property int|null $sup_numberphone
 * @property string|null $sup_email
 * @property \Cake\I18n\DateTime|null $sup_create
 * @property \Cake\I18n\DateTime|null $sup_update
 */
class Supplier extends Entity
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
        'sup_documenttype' => true,
        'sup_id' => true,
        'sup_name' => true,
        'sup_adress' => true,
        'sup_numberphone' => true,
        'sup_email' => true,
        'sup_create' => true,
        'sup_update' => true,
    ];
}
