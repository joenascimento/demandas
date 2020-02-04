<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Release $release
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Lançamentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link('+ Demanda', '#demand', ['rel' => 'modal:open', 'class' => 'button']) ?>
            <div id="demand" class="modal animated fadeIn faster">
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Demands',
                        'action' => 'add'
                    ]
                ]) ?>
                <fieldset>
                    <legend><?= __('Adicionar Demanda') ?></legend>
                        <div class="input text">
                            <?= $this->Form->label('Demanda') ?>
                            <?= $this->Form->input('demand', ['type' => 'text']) ?>
                        </div>
                        <?= $this->Form->control('description', ['label' => 'Descrição']) ?>
                        <?= $this->Form->control('effort', ['label' => 'Esforço']) ?>
                        <?= $this->Form->label('Fechado') ?>
                        <?= $this->Form->checkbox('closed') ?>
                </fieldset>
                <?= $this->Form->button(__('Enviar')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="releases form content">
            <?= $this->Form->create($release) ?>
            <fieldset>
                <legend><?= __('Adicionar Lançamentos') ?></legend>
                    <?= $this->Form->control('demand_id', ['options' => $demands]) ?>
                    <?= $this->Form->control('hour', ['label' => 'Horas Realizadas']) ?>
                    <?= $this->Form->control('data') ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
