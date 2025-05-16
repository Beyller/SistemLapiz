<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SuppliersFixture
 */
class SuppliersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'sup_id' => 1,
                'sup_documenttype' => 'Lorem ipsum dolor ',
                'sup_numberdocument' => 1,
                'sup_name' => 'Lorem ipsum dolor sit amet',
                'sup_adress' => 'Lorem ipsum dolor sit amet',
                'sup_numberphone' => 1,
                'sup_email' => 'Lorem ipsum dolor sit amet',
                'sup_create' => 1744841576,
                'sup_update' => 1744841576,
            ],
        ];
        parent::init();
    }
}
