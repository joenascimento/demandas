<h1>Bem vindo!</h1>
<div class="row">
    <div class="c c-6">
        <div class="table-responsive">
            <h3>Demandas</h3>
            <span class="counter"><?= $demandsCount ?></span>
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('demands', ['label' => 'Demandas']) ?></th>
                        <th><?= $this->Paginator->sort('effort', ['label' => 'Esforço']) ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($demands as $key): ?>
                        <tr>
                            <td><?= $key->demand ?></td>
                            <td><?= $key->effort ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="group-links">
                <div class="links">
                   <?= $this->Html->link('Listar', '/demands')?>
                   <?= $this->Html->link('Adicionar', '/demands/add')?>
                </div>
            </div>
        </div>
    </div>
    <div class="c c-6">
        <div class="table-responsive">
            <h3>Lançamentos</h3>
            <span class="counter"><?= $releasesCount ?></span>
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('demands', ['label' => 'Demandas']) ?></th>
                        <th><?= $this->Paginator->sort('hour', ['label' => 'Horas Realizadas']) ?></th>
                        <th><?= $this->Paginator->sort('closed', ['label' => 'Fechado']) ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($releases as $key): ?>
                        <tr>
                            <td><?= $key->demand->demand ?></td>
                            <td><?= $key->hour ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="c c-6">
        <div class="table-responsive">
            <h3>Saldo de Horas</h3>
            <table>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('demands', ['label' => 'Demandas']) ?></th>
                        <th><?= $this->Paginator->sort('effort', ['label' => 'Esforço']) ?></th>
                        <th><?= $this->Paginator->sort('hour', ['label' => 'Horas Realizadas']) ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($balanceHours as $key): ?>
                        <tr>
                            <td><?= $key->demand->demand ?></td>
                            <td><?= $key->demand->effort ?></td>
                            <td><?= $key->hour ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
