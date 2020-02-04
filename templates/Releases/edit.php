<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Release $release
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $release->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $release->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Releases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="releases form content">
            <?= $this->Form->create($release) ?>
            <fieldset>
                <legend><?= __('Edit Release') ?></legend>
                <?php
                    echo $this->Form->control('demand_id', ['options' => $demands]);
                    echo $this->Form->control('hour');
                    echo $this->Form->control('data');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
