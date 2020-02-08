<h1>Login</h1>

<div class="row">
    <div class="c c-8">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
                <?= $this->Form->label('Usuário') ?>
                <?= $this->Form->input('email', ['type' => 'text', 'placeholder' => 'Informe o e-mail cadastrado']) ?>
                <?= $this->Form->label('Senha') ?>
                <?= $this->Form->input('password', ['type' => 'password']) ?>
            </fieldset>
        <?= $this->Form->button(__('Login')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
