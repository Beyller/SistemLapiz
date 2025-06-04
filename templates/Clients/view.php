<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
             <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $client->cli_numberid], ['class' => 'button']) ?>
            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $client->cli_numberid], ['confirm' => __('¿Seguro que desea eliminar este cliente # {0}?', $client->cli_numberid), 'class' => 'button']) ?>        
        </div>
    </aside>
    <div class="column-column-80">
        <div class="clients view content">
            <h3><?= h($client->cli_numberid) ?></h3>
            <table class="factura-tabla detalle-repuestos">
                <tr>
                    <th><?= __('Cli Documenttype') ?></th>
                    <td><?= h($client->cli_documenttype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Name') ?></th>
                    <td><?= h($client->cli_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Lastname') ?></th>
                    <td><?= h($client->cli_lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Adress') ?></th>
                    <td><?= h($client->cli_adress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Email') ?></th>
                    <td><?= h($client->cli_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Numberid') ?></th>
                    <td><?= $this->Number->format($client->cli_numberid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Numberphone') ?></th>
                    <td><?= $client->cli_numberphone === null ? '' : $this->Number->format($client->cli_numberphone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Create') ?></th>
                    <td><?= h($client->cli_create) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cli Update') ?></th>
                    <td><?= h($client->cli_update) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>