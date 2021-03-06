<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Rol'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Institucions'), ['controller' => 'Institucions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Institucion'), ['controller' => ' Institucions', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => ' Users', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<div class="col-xs-12">
    <?= $this->Html->link('Añadir', ['action' => 'add'], ['title' => __('Añadir'), 'class' => 'btn btn-default glyphicon glyphicon-plus']) ?>
</div>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('nombre'); ?></th>
            <th><?= $this->Paginator->sort('institucion_id'); ?></th>
            <th class="actions"><?= __('Acciones'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rols as $rol): ?>
        <tr>
            <td><?= $this->Number->format($rol->id) ?></td>
            <td><?= h($rol->nombre) ?></td>
            <td>
                <?= h($rol->institucion->descripcion) ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $rol->id], ['title' => __('Ver'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $rol->id], ['title' => __('Editar'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previo')) ?>
        <?= $this->Paginator->numbers(['antes' => '', 'despues' => '']) ?>
        <?= $this->Paginator->next(__('siguiente') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>