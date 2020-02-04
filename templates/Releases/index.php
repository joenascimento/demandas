<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Release[]|\Cake\Collection\CollectionInterface $releases
 */
?>
<div class="releases index content">
    <?= $this->Html->link(__('+ Lançamento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lançamentos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('demand_id', ['label' => 'Demandas']) ?></th>
                    <th><?= $this->Paginator->sort('hour', ['label' => 'Horas Realizadas']) ?></th>
                    <th><?= $this->Paginator->sort('data') ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($releases as $release): ?>
                <tr>
                    <td><?= $this->Number->format($release->id) ?></td>
                    <td><?= $release->has('demand') ? $this->Html->link($release->demand->demand, ['controller' => 'Demands', 'action' => 'view', $release->demand->id]) : '' ?></td>
                    <td><?= $this->Number->format($release->hour) ?></td>
                    <td><?= h($release->data) ?></td>
                    <td><?= h($release->created) ?></td>
                    <td><?= h($release->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $release->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $release->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $release->id], ['confirm' => __('Tem certeza que deseja deletar {0}?', $release->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros(s) com {{count}} no total')) ?></p>
    </div>
</div>
