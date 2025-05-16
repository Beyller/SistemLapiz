<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SparePart> $spareParts
 */
?>
<div class="spareParts index content">
    
    
    <h3><?= __('Repuestos') ?></h3>
    <?= $this->Html->link(__('Agregar nueva pieza'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nro de repuesto') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Precio sin iva') ?></th>
                    
                    <th><?= $this->Paginator->sort('Precio con iva') ?></th>
                    <th><?= $this->Paginator->sort('Precio final') ?></th>
                    <th><?= $this->Paginator->sort('Precio minimo') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad minima') ?></th>
                    <th><?= $this->Paginator->sort('Existencias') ?></th>
                    <th><?= $this->Paginator->sort('Categoria') ?></th>
                    <th><?= $this->Paginator->sort('Proveedor') ?></th>
                    <th><?= $this->Paginator->sort('Fecha de registro') ?></th>
                    <th><?= $this->Paginator->sort('Fecha de actualización') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($spareParts as $sparePart): ?>
                <tr>
                    <td><?= h((string)$sparePart->spa_id) ?></td>
                    <td><?= h($sparePart->spa_name) ?></td>
                    <td><?= $sparePart->spa_priceexcludingiva === null ? '' : $this->Number->format($sparePart->spa_priceexcludingiva, ['places' => 3]) ?></td>
                    <td><?= $sparePart->spa_ivaprice === null ? '' : $this->Number->format($sparePart->spa_ivaprice, ['places' => 3]) ?></td>
                    <td><?= $sparePart->spa_ednuserprice === null ? '' : $this->Number->format($sparePart->spa_ednuserprice, ['places' => 3]) ?></td>
                    <td><?= $sparePart->spa_higherprece === null ? '' : $this->Number->format($sparePart->spa_higherprece, ['places' => 3]) ?></td>
                    <td><?= $sparePart->spa_stock === null ? '' : $this->Number->format($sparePart->spa_stock) ?></td>
                    <td><?= $sparePart->spa_existence === null ? '' : $this->Number->format($sparePart->spa_existence) ?></td>
                    <td><?= h($sparePart->spa_category) ?></td>
                    <td><?= $sparePart->hasValue('sup') ? $this->Html->link($sparePart->sup->sup_name, ['controller' => 'Suppliers', 'action' => 'view', $sparePart->sup->sup_id]) : '' ?></td>
                    <td><?= h($sparePart->spa_create) ?></td>
                    <td><?= h($sparePart->spa_update) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $sparePart->spa_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sparePart->spa_id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $sparePart->spa_id],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Seguro que desea eliminar este repuesto # {0}?', $sparePart->spa_id),
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
