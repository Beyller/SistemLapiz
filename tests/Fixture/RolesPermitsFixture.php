<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesPermitsFixture
 */
class RolesPermitsFixture extends TestFixture
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
                'per_id' => 1,
                'rp_create' => 1744841595,
                'rp_update' => 1744841595,
            ],
        ];
        parent::init();
    }
}
