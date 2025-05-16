<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', 'Consultar precio de repuesto');
?>

<div class="column-column-80">
<?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>

  <h2><?= __('Consultar precio de repuesto') ?></h2>

  <div class="form-group mb-3">
    <label for="buscar-repuesto"><?= __('Buscar por ID o Nombre') ?></label>
    <input
      type="text"
      id="buscar-repuesto"
      class="form-control"
      placeholder="<?= __('Ej. 123 o bujía') ?>"
    />
  </div>

  <div class="form-group mb-3">
    <label for="spa_name"><?= __('Nombre del repuesto') ?></label>
    <input
      type="text"
      id="spa_name"
      class="form-control"
      readonly
    />
  </div>

  <div class="form-group mb-3">
    <label for="spa_existence"><?= __('Existencias') ?></label>
    <input
      type="text"
      id="spa_existence"
      class="form-control"
      readonly
    />
  </div>

  <div class="form-group mb-3">
    <label for="spa_price"><?= __('Precio del repuesto') ?></label>
    <input
      type="text"
      id="spa_price"
      class="form-control"
      readonly
    />
  </div>
</div>

<?= $this->Html->scriptStart(['block' => true]) ?>
document.addEventListener('DOMContentLoaded', () => {
  const buscar    = document.getElementById('buscar-repuesto');
  const nameFld   = document.getElementById('spa_name');
  const existFld  = document.getElementById('spa_existence');
  const priceFld  = document.getElementById('spa_price');

  async function lookup(q) {
    if (!q) return;
    try {
      const res = await fetch(
        `/spare-parts/search-price?q=${encodeURIComponent(q)}`, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        }
      );
      const data = await res.json();

      if (data.result) {
        nameFld.value  = data.result.name;
        existFld.value = data.result.existence;
        priceFld.value = data.result.price;
      } else {
        nameFld.value = existFld.value = priceFld.value = '';
      }
    } catch (e) {
      console.error('Error al buscar repuesto:', e);
      priceFld.value = 'Error';
    }
  }

  buscar.addEventListener('input', () => lookup(buscar.value));
});
<?= $this->Html->scriptEnd() ?>
