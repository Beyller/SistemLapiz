<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SparePartsFixture
 */
class SparePartsFixture extends TestFixture
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
                'spa_id' => 1,
                'spa_name' => 'Lorem ipsum dolor sit amet',
                'spa_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'spa_priceexcludingiva' => 1.5,
                'spa_iva' => 1.5,
                'spa_ivaprice' => 1.5,
                'spa_ednuserprice' => 1.5,
                'spa_higherprece' => 1.5,
                'spa_stock' => 1,
                'spa_existence' => 1,
                'spa_category' => 'Lorem ipsum dolor sit amet',
                'sup_id' => 1,
                'spa_create' => 1744841539,
                'spa_update' => 1744841539,
            ],
        ];
        parent::init();
    }
}
