<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Rols'), ['controller' => 'Rols', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Rol'), ['controller' => ' Rols', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<div class="col-xs-12">
    <?= $this->Html->link('Añadir', ['action' => 'add'], ['title' => __('Añadir'), 'class' => 'btn btn-default glyphicon glyphicon-plus']) ?>
</div>
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('username', 'Usuario'); ?></th>
            <th><?= $this->Paginator->sort('nombres'); ?></th>
            <th><?= $this->Paginator->sort('apellidos'); ?></th>
            <th><?= $this->Paginator->sort('Institucions.descripcion', 'Institución'); ?></th>
            <th><?= $this->Paginator->sort('cargo'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
            <th><?= $this->Paginator->sort('created', 'Fecha creación'); ?></th>
            <th><?= $this->Paginator->sort('modified', 'Fecha modificación'); ?></th>
            <th><?= $this->Paginator->sort('activo', 'Estado'); ?></th>
            <th class="actions"><?= __('Acciones'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->nombres) ?></td>
            <td><?= h($user->apellidos) ?></td>
            <td><?= h($user->Institucions) ?></td>
            <td><?= h($user->cargo) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td><?= $user->activo == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Editar'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
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
