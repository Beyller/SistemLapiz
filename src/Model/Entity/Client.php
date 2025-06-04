<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $cli_numberid
 * @property string|null $cli_documenttype
 * @property string|null $cli_name
 * @property string|null $cli_lastname
 * @property int|null $cli_numberphone
 * @property string|null $cli_adress
 * @property string|null $cli_email
 * @property \Cake\I18n\DateTime|null $cli_create
 * @property \Cake\I18n\DateTime|null $cli_update
 */
class Client extends Entity
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
        'cli_numberid' => true,
        'cli_documenttype' => true,
        'cli_name' => true,
        'cli_lastname' => true,
        'cli_numberphone' => true,
        'cli_adress' => true,
        'cli_email' => true,
        'cli_create' => true,
        'cli_update' => true,
    ];
}
