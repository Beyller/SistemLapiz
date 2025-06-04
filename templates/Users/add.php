<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
           <br>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
        </div>
    </aside>
    
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Nuevo usuario') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('role', [
                        'type' => 'select',
                        'label' => 'Tipo de rol',
                        'options' => [
                            'admin' => 'Administrador',
                            'empleado' => 'Empleado',
                        ],
                        'empty' => 'Seleccione un tipo',
                    ]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
