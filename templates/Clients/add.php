<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
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
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <legend><?= __('Agregar Cliente') ?></legend>
                <?= $this->Form->control('cli_documenttype', [
                    'type' => 'select',
                    'label' => 'Tipo de Documento',
                    'options' => [
                        'CC' => 'Cédula de Ciudadanía',
                        'NIT' => 'NIT',
                        'TI' => 'Tarjeta de Identidad',
                        'Otro' => 'Otro'
                    ],
                    'empty' => 'Seleccione'
                ]) ?>
                <?= $this->Form->control('cli_numberid', [
                    'label' => 'Numero del Documento',
                    'type'  => 'text',
                    'required' => true
                ]) ?>
                
                <?= $this->Form->control('cli_name', ['label' => 'Nombre']) ?>
                <?= $this->Form->control('cli_lastname', ['label' => 'Apellido']) ?>
                <?= $this->Form->control('cli_numberphone', ['label' => 'Teléfono']) ?>
                <?= $this->Form->control('cli_adress', ['label' => 'Dirección']) ?>
                <?= $this->Form->control('cli_email', ['label' => 'Correo Electrónico']) ?>
                <!-- Fechas ocultas con valor por defecto -->
                <?= $this->Form->hidden('cli_create', ['value' => date('Y-m-d H:i:s')]) ?>
                <?= $this->Form->hidden('cli_update', ['value' => date('Y-m-d H:i:s')]) ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
