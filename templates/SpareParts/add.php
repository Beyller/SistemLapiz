<div class="row">
    <aside class="column">
        <div class="side-nav">
            <br>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="spareParts form content">
            <?= $this->Form->create($sparePart) ?>
            <fieldset>
                <legend><?= __('Agregar Repuesto') ?></legend>
                
                <?= $this->Form->control('spa_id', [
                    'label' => 'ID del Repuesto',
                    'type'  => 'text',
                ]) ?>
                <?= $this->Form->control('spa_name', ['label' => 'Nombre del Repuesto']) ?>
                <?= $this->Form->control('spa_description', ['label' => 'Descripción']) ?>
                
                <?= $this->Form->control('spa_priceexcludingiva', [
                    'label' => 'Precio sin IVA',
                    'type'  => 'number',
                    'step'  => '0.01',
                    'min'   => '0',
                    'id'    => 'precio_sin_iva'
                ]) ?>
                
                <?= $this->Form->control('spa_iva', [
                    'label'   => 'IVA',
                    'type'    => 'select',
                    'options' => ['19' => 'IVA (19%)', '0' => 'Sin IVA'],
                    'empty'   => false,
                    'id'      => 'iva'
                ]) ?>

                <?= $this->Form->control('spa_ivaprice', [
                    'label'    => 'Precio con IVA',
                    'type'     => 'number',
                    'readonly' => true,
                    'id'       => 'precio_con_iva'
                ]) ?>
                
                <?= $this->Form->control('spa_ednuserprice', ['label' => 'Precio Final']) ?>
                <?= $this->Form->control('spa_higherprece', ['label' => 'Precio Máximo']) ?>
                <?= $this->Form->control('spa_stock', ['label' => 'Stock']) ?>
                <?= $this->Form->control('spa_existence', ['label' => 'Existencia']) ?>

                <?= $this->Form->control('spa_category', [
                    'label'   => 'Categoría',
                    'type'    => 'select',
                    'options' => [
                        'repuesto'     => 'Repuesto',
                        'mano de obra' => 'Mano de obra'
                    ],
                    'empty'   => 'Seleccione una categoría'
                ]) ?>

                <?= $this->Form->control('sup_id', [
                    'label'   => 'Proveedor',
                    'type'    => 'select',
                    'options' => $sups,
                    'empty'   => 'Seleccione un proveedor'
                ]) ?>
                
                <?= $this->Form->hidden('spa_create', ['value' => date('Y-m-d H:i:s')]) ?>
                <?= $this->Form->hidden('spa_update', ['value' => date('Y-m-d H:i:s')]) ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- ✅ SCRIPT: Calcula automáticamente el precio con IVA -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const precioSinIva = document.getElementById('precio_sin_iva');
    const ivaSelect = document.getElementById('iva');
    const precioConIva = document.getElementById('precio_con_iva');

    function calcularConIVA() {
        const base = parseFloat(precioSinIva.value) || 0;
        const iva = parseFloat(ivaSelect.value) || 0;
        const total = base + (base * iva / 100);
        precioConIva.value = total.toFixed(2);
    }

    precioSinIva.addEventListener('input', calcularConIVA);
    ivaSelect.addEventListener('change', calcularConIVA);
});
</script>
