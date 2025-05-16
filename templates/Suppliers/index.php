<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Supplier> $suppliers
 */
?>
<div class="suppliers index content">
    
    <h3><?= __('Proveedores') ?></h3>
    <?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Registrar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('T.Documento') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Dirreción') ?></th>
                    <th><?= $this->Paginator->sort('Telefono') ?></th>
                    <th><?= $this->Paginator->sort('Correo') ?></th>
                    <th><?= $this->Paginator->sort('sup_create') ?></th>
                    
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->sup_id) ?></td>
                    <td><?= h($supplier->sup_documenttype) ?></td>
                    <td><?= h($supplier->sup_name) ?></td>
                    <td><?= h($supplier->sup_adress) ?></td>
                    <td><?= $supplier->sup_numberphone === null ? '' : $this->Number->format($supplier->sup_numberphone) ?></td>
                    <td><?= h($supplier->sup_email) ?></td>
                    <td><?= h($supplier->sup_create) ?></td>
                    
                    <td class="acciones">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $supplier->sup_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $supplier->sup_id]) ?>
                        <?= $this->Form->postLink(
                            __('Elimminar'),
                            ['action' => 'delete', $supplier->sup_id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Seguro que desea eliminar este proveedor # {0}?', $supplier->sup_id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>