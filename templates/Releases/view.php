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
            <?= $this->Html->link(__('Edit Release'), ['action' => 'edit', $release->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Release'), ['action' => 'delete', $release->id], ['confirm' => __('Are you sure you want to delete # {0}?', $release->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Releases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Release'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="releases view content">
            <h3><?= h($release->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Demand') ?></th>
                    <td><?= $release->has('demand') ? $this->Html->link($release->demand->demand, ['controller' => 'Demands', 'action' => 'view', $release->demand->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Hour') ?></th>
                    <td><?= $this->Number->format($release->hour) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($release->data) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($release->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($release->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
