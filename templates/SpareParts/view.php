<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SparePart $sparePart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Html->link(__('Editar Repuesto'), ['action' => 'edit', $sparePart->spa_id], ['class' => 'button']) ?>
            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $sparePart->spa_id], ['confirm' => __('¿Seguro que desea eliminar este repuesto  # {0}', $sparePart->spa_id),'class' => 'button']) ?> 
        </div>
    </aside>
    <div class="column-column-80">
        <div class="spareParts view content">
            <h3><?= h($sparePart->spa_name) ?></h3>
            <table class="factura-tabla detalle-repuestos">
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($sparePart->spa_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= h($sparePart->spa_category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Proveedor') ?></th>
                    <td><?= $sparePart->hasValue('sup') ? $this->Html->link($sparePart->sup->sup_name, ['controller' => 'Suppliers', 'action' => 'view', $sparePart->sup->sup_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h((string)$sparePart->spa_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio sin IVA') ?></th>
                    <td><?= $sparePart->spa_priceexcludingiva === null ? '' : $this->Number->format($sparePart->spa_priceexcludingiva, ['places' => 3] ) ?></td>
                </tr>
                <tr>
                    <th><?= __('Iva') ?></th>
                    <td><?= $sparePart->spa_iva === null ? '' : $this->Number->format($sparePart->spa_iva) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio con IVA') ?></th>
                    <td><?= $sparePart->spa_ivaprice === null ? '' : $this->Number->format($sparePart->spa_ivaprice, ['places' => 3]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio final') ?></th>
                    <td><?= $sparePart->spa_ednuserprice === null ? '' : $this->Number->format($sparePart->spa_ednuserprice, ['places' => 3]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio X mayor') ?></th>
                    <td><?= $sparePart->spa_higherprece === null ? '' : $this->Number->format($sparePart->spa_higherprece , ['places' => 3]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $sparePart->spa_stock === null ? '' : $this->Number->format($sparePart->spa_stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Existencia') ?></th>
                    <td><?= $sparePart->spa_existence === null ? '' : $this->Number->format($sparePart->spa_existence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de Creación') ?></th>
                    <td><?= h($sparePart->spa_create) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de actualización') ?></th>
                    <td><?= h($sparePart->spa_update) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sparePart->spa_description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>