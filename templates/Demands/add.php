<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Demand $demand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Demandas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="demands form content">
            <?= $this->Form->create($demand) ?>
            <fieldset>
                <legend><?= __('Adicionar Demanda') ?></legend>
                    <?= $this->Form->control('demand', ['label' => 'Demanda']) ?>
                    <?= $this->Form->control('description', ['label' => 'Descrição']) ?>
                    <?= $this->Form->control('effort', ['label' => 'Esforço']) ?>
                    <label class="checkbox c-3"> Fechado
                        <?= $this->Form->checkbox('closed') ?>
                        <span class="checkmark"></span>
                    </label>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
