<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Mecanismo'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List MecanismoRecomendacion'), ['controller' => 'MecanismoRecomendacion', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Mecanismo Recomendacion'), ['controller' => ' MecanismoRecomendacion', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<div class="col-xs-12">
    <?= $this->Html->link('Añadir', ['action' => 'add'], ['title' => __('Añadir'), 'class' => 'btn btn-default glyphicon glyphicon-plus']) ?>
</div>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('descripcion'); ?></th>
            <th><?= $this->Paginator->sort('activo', 'Estado'); ?></th>
            <th class="actions"><?= __('Editar'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mecanismos as $mecanismo): ?>
        <tr>
            <td><?= $this->Number->format($mecanismo->id) ?></td>
            <td><?= h($mecanismo->descripcion) ?></td>
            <td><?= $mecanismo->activo == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'edit', $mecanismo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
