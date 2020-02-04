<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Demand $demand
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Demand'), ['action' => 'edit', $demand->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Demand'), ['action' => 'delete', $demand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demand->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Demands'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Demand'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="demands view content">
            <h3><?= h($demand->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Demand') ?></th>
                    <td><?= h($demand->demand) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($demand->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($demand->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Effort') ?></th>
                    <td><?= $this->Number->format($demand->effort) ?></td>
                </tr>
                <tr>
                    <th><?= __('Closed') ?></th>
                    <td><?= $this->Number->format($demand->closed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($demand->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($demand->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Demands History') ?></h4>
                <?php if (!empty($demand->demands_history)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Demand Id') ?></th>
                            <th><?= __('Udpated Effort') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($demand->demands_history as $demandsHistory) : ?>
                        <tr>
                            <td><?= h($demandsHistory->id) ?></td>
                            <td><?= h($demandsHistory->demand_id) ?></td>
                            <td><?= h($demandsHistory->udpated_effort) ?></td>
                            <td><?= h($demandsHistory->created) ?></td>
                            <td><?= h($demandsHistory->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DemandsHistory', 'action' => 'view', $demandsHistory->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DemandsHistory', 'action' => 'edit', $demandsHistory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DemandsHistory', 'action' => 'delete', $demandsHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demandsHistory->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Releases') ?></h4>
                <?php if (!empty($demand->releases)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Demand Id') ?></th>
                            <th><?= __('Hour') ?></th>
                            <th><?= __('Data') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($demand->releases as $releases) : ?>
                        <tr>
                            <td><?= h($releases->id) ?></td>
                            <td><?= h($releases->demand_id) ?></td>
                            <td><?= h($releases->hour) ?></td>
                            <td><?= h($releases->data) ?></td>
                            <td><?= h($releases->created) ?></td>
                            <td><?= h($releases->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Releases', 'action' => 'view', $releases->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Releases', 'action' => 'edit', $releases->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Releases', 'action' => 'delete', $releases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $releases->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
