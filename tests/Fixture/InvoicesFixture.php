<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 */
class InvoicesFixture extends TestFixture
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
                'inv_id' => 1,
                'inv_date' => 1744841549,
                'inv_paymentmethod' => 'Lorem ipsum dolor sit amet',
                'inv_price' => 1.5,
                'cli_numberid' => 1,
            ],
        ];
        parent::init();
    }
}
