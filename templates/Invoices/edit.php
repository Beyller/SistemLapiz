<h2>Editar Factura #<?= h($invoice->inv_id) ?></h2>
<p><strong>SistemLapiz</strong><br>Calle 5 # 3-12 /// Algeciras-Huila<br>3143320461</p>

<?= $this->Form->create($invoice) ?>
                <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>

<fieldset>
    <legend>Datos del Cliente</legend>
    <?= $this->Form->control('cli_numberid', ['label' => 'Cédula']) ?>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" value="<?= h($client->cli_name ?? '') ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" value="<?= h($client->cli_lastname ?? '') ?>" class="form-control">
    </div>
</fieldset>

<fieldset>
    <legend>Datos de la Factura</legend>
    <?= $this->Form->control('inv_paymentmethod', [
        'label' => 'Método de pago',
        'type' => 'select',
        'options' => ['transferencia' => 'Transferencia', 'efectivo' => 'Efectivo']
    ]) ?>
    <?= $this->Form->control('inv_date', ['label' => 'Fecha']) ?>
    <?= $this->Form->control('inv_price', ['label' => 'Precio total']) ?>
</fieldset>

<fieldset>
    <legend>Detalle de Repuestos</legend>
    <div id="detalles-container">
        <?php foreach ($invoice->details_invoices as $i => $detail): ?>
            <div class="detalle-item" data-index="<?= $i ?>">
                <?= $this->Form->control("details_invoices.$i.spa_id", [
                    'label' => 'Repuesto',
                    'options' => $spas,
                    'default' => $detail->spa_id
                ]) ?>
                <?= $this->Form->control("details_invoices.$i.di_quantity", [
                    'label' => 'Cantidad',
                    'value' => $detail->di_quantity,
                    'type' => 'number',
                    'min' => 1,
                    'required' => true
                ]) ?>
                <?= $this->Form->control("details_invoices.$i.di_price", [
                    'label' => 'Precio unitario',
                    'value' => $detail->di_price,
                    'required' => true
                ]) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="agregar-detalle" class="button btn btn-secondary mt-2">+ Agregar Detalle</button>
</fieldset>

<?= $this->Form->button(__('Guardar Cambios'), ['class' => 'btn btn-danger mt-3']) ?>
<?= $this->Form->end() ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let index = <?= count($invoice->details_invoices) ?>;
    const spas = <?= json_encode($spas) ?>;

    document.getElementById('agregar-detalle').addEventListener('click', function () {
        const container = document.getElementById('detalles-container');
        const div = document.createElement('div');
        div.classList.add('detalle-item');
        div.setAttribute('data-index', index);

        let options = '';
        for (let id in spas) {
            options += `<option value="${id}">${spas[id]}</option>`;
        }

        div.innerHTML = `
            <label>Repuesto</label>
            <select name="details_invoices[${index}][spa_id]" required class="form-control">${options}</select>

            <label>Cantidad</label>
            <input type="number" name="details_invoices[${index}][di_quantity]" min="1" value="1" class="form-control" required>

            <label>Precio unitario</label>
            <input type="text" name="details_invoices[${index}][di_price]" class="form-control" required>
        `;

        container.appendChild(div);
        index++;
    });
});
</script>
