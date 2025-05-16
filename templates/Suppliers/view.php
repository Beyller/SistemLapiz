<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $supplier->sup_id], ['class' => 'button']) ?>
            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $supplier->sup_id], ['confirm' => __('Se eliminara este proveedor# {0}?', $supplier->sup_id), 'class' => 'button'] ) ?>
            
            
        </div>
    </aside>
    <div class="column-column-80">
        <div class="suppliers view content">
            <h3><?= h($supplier->sup_id) ?></h3>
            <table class="factura-tabla detalle-repuestos">
                <tr>
                    <th><?= __('Sup Documenttype') ?></th>
                    <td><?= h($supplier->sup_documenttype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Name') ?></th>
                    <td><?= h($supplier->sup_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Adress') ?></th>
                    <td><?= h($supplier->sup_adress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Email') ?></th>
                    <td><?= h($supplier->sup_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Id') ?></th>
                    <td><?= $this->Number->format($supplier->sup_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Numberdocument') ?></th>
                    <td><?= $supplier->sup_numberdocument === null ? '' : $this->Number->format($supplier->sup_numberdocument) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Numberphone') ?></th>
                    <td><?= $supplier->sup_numberphone === null ? '' : $this->Number->format($supplier->sup_numberphone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Create') ?></th>
                    <td><?= h($supplier->sup_create) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sup Update') ?></th>
                    <td><?= h($supplier->sup_update) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>