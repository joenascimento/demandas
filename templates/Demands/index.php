<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Demand[]|\Cake\Collection\CollectionInterface $demands
 */
?>
<div class="demands index content">
    <?= $this->Html->link(__('+ Demanda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Demandas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('demand', ['label' => 'Demanda']) ?></th>
                    <th><?= $this->Paginator->sort('description', ['label' => 'Descrição']) ?></th>
                    <th><?= $this->Paginator->sort('effort', ['label' => 'Esforço']) ?></th>
                    <th><?= $this->Paginator->sort('closed', ['label' => 'Fechado']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modificado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demands as $demand): ?>
                <tr>
                    <td><?= $this->Number->format($demand->id) ?></td>
                    <td><?= h($demand->demand) ?></td>
                    <td><?= h($demand->description) ?></td>
                    <td><?= $this->Number->format($demand->effort) ?></td>
                    <td><?= $this->Number->format($demand->closed) ?></td>
                    <td><?= h($demand->created) ?></td>
                    <td><?= h($demand->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $demand->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $demand->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $demand->id], ['confirm' => __('Tem certeza que deseja deletar # {0}?', $demand->id)]) ?>
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
