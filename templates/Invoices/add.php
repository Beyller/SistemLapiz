<div class="invoices form large-9 medium-8 columns content">
  
  <?= $this->Form->create($invoice) ?>
  
  <fieldset>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>

    <legend><?= __('Nueva Factura con Detalles') ?></legend>

    <?= $this->Form->control('inv_date', [
         'label' => 'Fecha',
         'type'  => 'text',
         'value' => date('Y-m-d H:i:s')
    ]) ?>

    <?= $this->Form->control('cli_numberid', [
         'label' => 'ID del Cliente',
         'id'    => 'cli-id-input',
         'autocomplete' => 'off'
    ]) ?>

    <?= $this->Form->control('cli_name', [
         'label' => 'Nombre del Cliente',
         'id' => 'cli-name-input'
    ]) ?>

    <?= $this->Form->control('cli_lastname', [
         'label' => 'Apellido del Cliente',
         'id' => 'cli-lastname-input'
    ]) ?>

    <?= $this->Form->control('inv_paymentmethod', [
         'type'    => 'select',
         'label'   => 'Método de Pago',
         'options' => ['Efectivo'=>'Efectivo','Transferencia'=>'Transferencia'],
         'empty'   => 'Seleccione uno'
    ]) ?>

    <hr>

    <div id="details-container">
      <div class="detail-row" data-index="0">
        <h5><?= __('Producto') ?></h5>

        <label>Buscar por ID</label>
        <input type="number" class="spa-id-input" name="details_invoices[0][spa_id]" data-index="0" placeholder="ID del repuesto" />

        <label>Nombre</label>
        <input type="text" class="spa-name-input" data-index="0" placeholder="Nombre del repuesto" />

        <label>Cantidad</label>
        <input type="number" class="qty-input" name="details_invoices[0][di_quantity]" data-index="0" value="1" min="1" />

        <label>Precio</label>
        <input type="text" class="spa_ednuserprice-input" name="details_invoices[0][di_price]" data-index="0"  />

        <button type="button" class="remove-detail" data-index="0">Eliminar</button>
        <hr>
      </div>
    </div>

    <button type="button" id="add-detail"><?= __('Agregar otro detalle') ?></button>
  </fieldset>

  <?= $this->Form->button(__('Crear Factura')) ?>
  <?= $this->Form->end() ?>
</div>
<?= $this->Html->scriptStart() ?>
document.addEventListener('DOMContentLoaded', () => {
  const clients = <?= json_encode($clients) ?>;
  const spareParts = <?= json_encode($spas) ?>;
  let detailIndex = 1;

  // Autocompletar cliente
  document.getElementById('cli-id-input').addEventListener('input', e => {
    const id = e.target.value;
    if (clients[id]) {
      document.getElementById('cli-name-input').value = clients[id].name;
      document.getElementById('cli-lastname-input').value = clients[id].lastname;
    } else {
      document.getElementById('cli-name-input').value = '';
      document.getElementById('cli-lastname-input').value = '';
    }
  });

  function bindDetailEvents(container) {
    const idInput     = container.querySelector('.spa-id-input');
    const nameInput   = container.querySelector('.spa-name-input');
    const qtyInput    = container.querySelector('.qty-input');
    const priceInput  = container.querySelector('.spa_ednuserprice-input');

    function updateLine() {
      const id  = idInput.value;
      const qty = parseInt(qtyInput.value, 10) || 1;
      if (spareParts[id]) {
        nameInput.value = spareParts[id].name;
        priceInput.value = (parseFloat(spareParts[id].price) * qty).toFixed(3);
      } else {
        nameInput.value = '';
        priceInput.value = '';
      }
    }

    idInput.addEventListener('input', updateLine);
    qtyInput.addEventListener('input', updateLine);

    nameInput.addEventListener('input', () => {
      const search = nameInput.value.toLowerCase();
      const found = Object.entries(spareParts).find(([id, part]) => part.name.toLowerCase() === search);
      if (found) {
        const [id, part] = found;
        idInput.value = id;
        updateLine();
      } else {
        idInput.value = '';
        priceInput.value = '';
      }
    });

    container.querySelector('.remove-detail').addEventListener('click', () => container.remove());
  }

  bindDetailEvents(document.querySelector('.detail-row'));

  document.getElementById('add-detail').addEventListener('click', () => {
    const tmpl = document.querySelector('.detail-row');
    const clone = tmpl.cloneNode(true);
    clone.dataset.index = detailIndex;

    clone.querySelectorAll('input').forEach(el => {
      const field = el.name;
      if (field) {
        el.name = field.replace(/\[\d+\]/, `[${detailIndex}]`);
      }
      if (el.classList.contains('qty-input')) {
        el.value = '1';
      } else {
        el.value = '';
      }
      el.dataset.index = detailIndex;
    });

    document.getElementById('details-container').appendChild(clone);
    bindDetailEvents(clone);
    detailIndex++;
  });
});
<?= $this->Html->scriptEnd() ?>
