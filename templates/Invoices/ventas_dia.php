<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice> $ventasHoy
 * @var float $totalVentas
 * @var int $numFacturas
 * @var array $metodosPago
 */
?>
<?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>

<h2><?= __('Ventas del Día') ?></h2>

<p><strong><?= __('Total de ventas:') ?></strong> $<?= $this->Number->format($totalVentas, ['places' => 2]) ?></p>
<p><strong><?= __('Número de facturas:') ?></strong> <?= $numFacturas ?></p>

<h3><?= __('Desglose por forma de pago:') ?></h3>
<ul>
    <li><strong><?= __('Efectivo:') ?></strong> $<?= $this->Number->format($metodosPago['Efectivo'], ['places' => 2]) ?></li>
    <li><strong><?= __('Transferencia:') ?></strong> $<?= $this->Number->format($metodosPago['Transferencia'], ['places' => 2]) ?></li>
</ul>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?= __('ID') ?></th>
            <th><?= __('Fecha') ?></th>
            <th><?= __('Cliente') ?></th>
            <th><?= __('Método de Pago') ?></th>
            <th><?= __('Precio Total') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ventasHoy as $venta): ?>
        <tr>
            <td><?= h($venta->inv_id) ?></td>
            <td><?= h($venta->inv_date->format('Y-m-d H:i')) ?></td>
            <td><?= h($venta->client->cli_name . ' ' . $venta->client->cli_lastname) ?></td>
            <td><?= h($venta->inv_paymentmethod) ?></td>
            <td>$<?= $this->Number->format($totalVentas, ['places' => 2]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
