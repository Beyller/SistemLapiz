<div class="login-wrapper">
    <?= $this->Flash->render() ?>
    <div class="login-card">
        <h3>Iniciar Sesión</h3>
        <?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>
        <fieldset>
            <legend><?= __('Ingrese su correo y contraseña') ?></legend>
            <?= $this->Form->control('email', [
                'required' => true,
                'label' => 'Correo electrónico',
                'placeholder' => 'usuario@ejemplo.com',
                'class' => 'login-input'
            ]) ?>
            <?= $this->Form->control('password', [
                'required' => true,
                'label' => 'Contraseña',
                'placeholder' => '••••••••',
                'class' => 'login-input'
            ]) ?>
        </fieldset>
        <?= $this->Form->submit(__('Iniciar sesión'), ['class' => 'login-button']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
