<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsInvoicesFixture
 */
class DetailsInvoicesFixture extends TestFixture
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
                'di_id' => 1,
                'di_price' => 1.5,
                'spa_id' => 1,
                'inv_id' => 1,
            ],
        ];
        parent::init();
    }
}
