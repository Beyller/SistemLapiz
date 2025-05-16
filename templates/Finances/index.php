<?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>
<h1>Resumen Financiero</h1>
<?= $this->Form->create(null, ['type' => 'get']) ?>
<div class="row">
    <div class="col">
    <?= $this->Form->control('start_date', [
        'label' => 'Desde',
        'type' => 'date',
        'value' => $startDate,
        'class' => 'form-control white-text'
    ]) ?>
</div>
<div class="col">
    <?= $this->Form->control('end_date', [
        'label' => 'Hasta',
        'type' => 'date',
        'value' => $endDate,
        'class' => 'form-control white-text'
    ]) ?>
</div>

    <div class="col">
        <?= $this->Form->button('Filtrar', ['class' => 'btn btn-primary mt-4']) ?>
    </div>
</div>
<?= $this->Form->end() ?>

<h3 class="mt-4">Totales del período</h3>
<ul>
    <li><strong>Ingreso total:</strong> $<?= number_format($totalIngreso, 3) ?></li>
    <li><strong>Por repuestos:</strong> $<?= number_format($ingresosPorCategoria['repuestos'] ?? 0, 3) ?></li>
    <li><strong>Por mano de obra:</strong> $<?= number_format($ingresosPorCategoria['mano de obra'] ?? 0, 3) ?></li>
</ul>
