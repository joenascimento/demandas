<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link('+ Perfil', '#perfil', ['rel' => 'modal:open', 'class' => 'button']) ?>
            <div id="perfil" class="modal animated fadeIn faster">
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Roles',
                        'action' => 'add'
                    ]
                ]) ?>
                <fieldset>
                    <legend><?= __('Adicionar Roles') ?></legend>
                        <div class="input text">
                            <?= $this->Form->label('Perfil') ?>
                            <?= $this->Form->input('role', ['type' => 'text', 'placeholder' => 'Informe o perfil']) ?>
                        </div>
                </fieldset>
                <?= $this->Form->button(__('Enviar')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Adicionar Usuários') ?></legend>
                <?= $this->Form->control('name', ['label' => 'Nome', 'placeholder' => 'Nome Completo']) ?>
                <?= $this->Form->control('email', ['placeholder' => 'Informe seu e-email']) ?>
                <?= $this->Form->control('password', ['label' => 'Senha', 'placeholder' => 'Informe sua senha']) ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
