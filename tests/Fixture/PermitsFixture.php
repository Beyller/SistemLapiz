<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermitsFixture
 */
class PermitsFixture extends TestFixture
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
                'per_id' => 1,
                'per_name' => 'Lorem ipsum dolor sit amet',
                'per_update' => 'Lorem ipsum dolor sit amet',
                'per_create' => 1744841587,
            ],
        ];
        parent::init();
    }
}
