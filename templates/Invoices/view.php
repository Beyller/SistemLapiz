<div class="factura-detalle">
    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button btn-volver']) ?>

    <div class="factura-encabezado">
        <h2 class="factura-titulo">Factura #<?= h($invoice->inv_id) ?></h2>
        <p>SistemLapiz<br>Calle 5 # 3-12 /// Algeciras - Huila<br>Tel: 3143320461</p>
    </div>

    <div class="factura-seccion">
        <h3>Datos del Cliente</h3>
        <?php if ($invoice->client): ?>
            <p><strong>Nombre:</strong> <?= h($invoice->client->cli_name) ?> <?= h($invoice->client->cli_lastname) ?></p>
            <p><strong>Cédula:</strong> <?= h($invoice->client->cli_numberid) ?></p>
            <p><strong>Teléfono:</strong> <?= h($invoice->client->cli_numberphone) ?></p>
            <p><strong>Email:</strong> <?= h($invoice->client->cli_email) ?></p>
        <?php else: ?>
            <p><em>Cliente no registrado</em></p>
        <?php endif; ?>
    </div>

    <div class="factura-seccion">
        <h3>Datos de la Factura</h3>
        <table class="factura-tabla">
            <tr><th>Método de Pago</th><td><?= h($invoice->inv_paymentmethod) ?></td></tr>
            <tr><th>Fecha</th><td><?= h($invoice->inv_date) ?></td></tr>
            <tr><th>Precio Total</th><td><?= $this->Number->format($invoice->inv_price , ['places' => 3]) ?></td></tr>
        </table>
    </div>

    <div class="factura-seccion">
        <h3>Detalle de Repuestos</h3>
        <?php if (!empty($invoice->details_invoices)): ?>
            <table class="factura-tabla detalle-repuestos">
                <thead>
                    <tr>
                        <th>Repuesto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoice->details_invoices as $detail): ?>
                        <tr>
                            <td><?= h($detail->spare_part->spa_name) ?></td>
                            <td><?= $this->Number->format($detail->di_price , ['places' => 3]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><em>Esta factura no tiene detalles de repuestos.</em></p>
        <?php endif; ?>
    </div>
</div>
