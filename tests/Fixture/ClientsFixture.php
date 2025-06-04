<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientsFixture
 */
class ClientsFixture extends TestFixture
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
                'cli_numberid' => 1,
                'cli_documenttype' => 'Lorem ipsum dolor ',
                'cli_name' => 'Lorem ipsum dolor sit amet',
                'cli_lastname' => 'Lorem ipsum dolor sit amet',
                'cli_numberphone' => 1,
                'cli_adress' => 'Lorem ipsum dolor sit amet',
                'cli_email' => 'Lorem ipsum dolor sit amet',
                'cli_create' => 1744841453,
                'cli_update' => 1744841453,
            ],
        ];
        parent::init();
    }
}
