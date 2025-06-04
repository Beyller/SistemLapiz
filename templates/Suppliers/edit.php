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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $supplier->sup_id],
                ['confirm' => __('¿Seguro que desea eliminar este proveedor # {0}?', $supplier->sup_id), 'class' => 'button']
            ) ?>
            
        </div>
    </aside>
    <div class="column column-80">
        <div class="suppliers form content">
            <?= $this->Form->create($supplier) ?>
            <fieldset>
                <legend><?= __('Editar proveesor') ?></legend>
                <?php
                    echo $this->Form->control('Tipo de documento');
                    echo $this->Form->control('Numero de documento');
                    echo $this->Form->control('Nombre');
                    echo $this->Form->control('Dirección');
                    echo $this->Form->control('Telefono');
                    echo $this->Form->control('Correo');
                    echo $this->Form->control('Fecha de creación');
                    echo $this->Form->control('Fecha de actualización');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
