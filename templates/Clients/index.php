<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="clients index content">
    
    <h3><?= __('Clientes') ?></h3>
    <?= $this->Html->link(__('Volver'), ['controller' => 'Pages', 'action' => 'display', 'inicio'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Registrar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('T_Documento') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Apellido') ?></th>
                    <th><?= $this->Paginator->sort('Telefono') ?></th>
                    <th><?= $this->Paginator->sort('Dirección') ?></th>
                    <th><?= $this->Paginator->sort('Correo') ?></th>
                    <th><?= $this->Paginator->sort('create') ?></th>
                    
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $this->Number->format($client->cli_numberid) ?></td>
                    <td><?= h($client->cli_documenttype) ?></td>
                    <td><?= h($client->cli_name) ?></td>
                    <td><?= h($client->cli_lastname) ?></td>
                    <td><?= $client->cli_numberphone === null ? '' : $this->Number->format($client->cli_numberphone) ?></td>
                    <td><?= h($client->cli_adress) ?></td>
                    <td><?= h($client->cli_email) ?></td>
                    <td><?= h($client->cli_create) ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $client->cli_numberid]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->cli_numberid]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $client->cli_numberid],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Seguro que desea eliminar este cliente # {0}?', $client->cli_numberid),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>