<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SparePart $sparePart
 * @var string[]|\Cake\Collection\CollectionInterface $sups
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <br>
             <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $sparePart->spa_id],
                ['confirm' => __('¿Seguro que desea eliminar este repuesto # {0}', $sparePart->spa_id), 'class' => 'button']
            ) ?>
           
        </div>
    </aside>
    <div class="column column-80">
        <div class="spareParts form content">
            <?= $this->Form->create($sparePart) ?>
            <fieldset>
                <legend><?= __('Edit Spare Part') ?></legend>
                <?php
                    echo $this->Form->control('spa_name');
                    echo $this->Form->control('spa_description');
                    echo $this->Form->control('spa_priceexcludingiva');
                    echo $this->Form->control('spa_iva');
                    echo $this->Form->control('spa_ivaprice');
                    echo $this->Form->control('spa_ednuserprice');
                    echo $this->Form->control('spa_higherprece');
                    echo $this->Form->control('spa_stock');
                    echo $this->Form->control('spa_existence');
                    echo $this->Form->control('spa_category');
                    echo $this->Form->control('sup_id', ['options' => $sups, 'empty' => true]);
                    echo $this->Form->control('spa_create');
                    echo $this->Form->control('spa_update');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
