<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <br>
                        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $client->cli_numberid],
                ['confirm' => __('¿Seguro que desea eliminar este cliente # {0}?', $client->cli_numberid), 'class' => 'button']
            ) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <legend><?= __('Edit Client') ?></legend>
                <?php
                    echo $this->Form->control('cli_documenttype');
                    echo $this->Form->control('cli_name');
                    echo $this->Form->control('cli_lastname');
                    echo $this->Form->control('cli_numberphone');
                    echo $this->Form->control('cli_adress');
                    echo $this->Form->control('cli_email');
                    echo $this->Form->control('cli_create');
                    echo $this->Form->control('cli_update');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
