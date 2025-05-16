<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Invoice> $invoices
 */
?>
<div class="invoices index content">
    
    <h3><?= __('Facturas') ?></h3>
    <?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Nueva factura'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nro de factura') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('Metodo de pago') ?></th>
                    <th><?= $this->Paginator->sort('Precio') ?></th>
                    <th><?= $this->Paginator->sort('Identidad del cliente') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?= $this->Number->format($invoice->inv_id) ?></td>
                    <td><?= h($invoice->inv_date) ?></td>
                    <td><?= h($invoice->inv_paymentmethod) ?></td>
                    <td><?= $invoice->inv_price === null ? '' : $this->Number->format($invoice->inv_price, ['places' => 3]) ?></td>
                    <td><?= $invoice->cli_numberid === null ? '' : $this->Number->format($invoice->cli_numberid) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $invoice->inv_id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $invoice->inv_id]) ?>
                        
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