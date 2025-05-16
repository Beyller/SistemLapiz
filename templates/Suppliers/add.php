<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
                <br>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="suppliers form content">
            <?= $this->Form->create($supplier) ?>

            <?php
            if ($supplier->getErrors()) {
                echo '<pre>';
                print_r($supplier->getErrors());
                echo '</pre>';
            }
            ?>

            <fieldset>
                <legend><?= __('Add Supplier') ?></legend>

                <?= $this->Form->control('sup_documenttype', [
                    'type' => 'select',
                    'label' => 'Tipo de Documento',
                    'options' => [
                        'CC' => 'Cédula de Ciudadanía',
                        'NIT' => 'NIT',
                        'TI' => 'Tarjeta de Identidad',
                        'Otro' => 'Otro'
                    ],
                    'empty' => 'Seleccione un tipo'
                ]) ?>

                <?= $this->Form->control('sup_id', [
                    'label' => 'Número de Identificación',
                    'type' => 'text',
                    'required' => true
                ]) ?>

                <?= $this->Form->control('sup_name') ?>
                <?= $this->Form->control('sup_adress') ?>
                <?= $this->Form->control('sup_numberphone') ?>
                <?= $this->Form->control('sup_email') ?>

                <?= $this->Form->hidden('sup_create', ['value' => date('Y-m-d H:i:s')]) ?>
                <?= $this->Form->hidden('sup_update', ['value' => date('Y-m-d H:i:s')]) ?>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
