<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersRolesFixture
 */
class UsersRolesFixture extends TestFixture
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
                'use_id' => 1,
                'rol_id' => 1,
                'ur_create' => 1744841514,
                'ur_update' => 1744841514,
            ],
        ];
        parent::init();
    }
}
