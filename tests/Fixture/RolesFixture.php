<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture
 */
class RolesFixture extends TestFixture
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
                'rol_id' => 1,
                'rol_name' => 'Lorem ipsum dolor sit amet',
                'rol_create' => 1744841506,
                'rol_update' => 1744841506,
            ],
        ];
        parent::init();
    }
}
