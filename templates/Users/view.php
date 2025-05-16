<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float']) ?>
            
            <?= $this->Html->link(__('Editar '), ['action' => 'edit', $user->id],  ['class' => 'button float']) ?>
            
            <?= $this->Form->postLink(__('Eliminar '), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),  'class' => 'button float']) ?>
            
        </div>
    </aside>
    
    <div class="column-column-80">
        <div >
            <h3><?= h($user->username) ?></h3>
            <table class="factura-tabla detalle-repuestos">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de registro') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                
            </table>
        </div>
    </div>

</div>