<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Documentos Mecanismo'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Mecanismos'), ['controller' => 'Mecanismos', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Mecanismo'), ['controller' => 'Mecanismos', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List TipoInformes'), ['controller' => 'TipoInformes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Tipo Informe'), ['controller' => 'TipoInformes', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('mecanismo_id'); ?></th>
            <th><?= $this->Paginator->sort('link'); ?></th>
            <th><?= $this->Paginator->sort('tipoInforme_id'); ?></th>
            <th class="actions"><?= __('Editar'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($documentosMecanismos as $documentosMecanismo): ?>
        <tr>
            <td><?= $this->Number->format($documentosMecanismo->id) ?></td>
            <td>
                <?= $documentosMecanismo->has('mecanismo') ? $this->Html->link($documentosMecanismo->mecanismo->descripcion, ['controller' => 'Mecanismos', 'action' => 'view', $documentosMecanismo->mecanismo->id]) : '' ?>
            </td>
            <td><?= h($documentosMecanismo->link) ?></td>
            <td>
                <?= $documentosMecanismo->has('tipo_informe') ? $this->Html->link($documentosMecanismo->tipo_informe->descripcion, ['controller' => 'TipoInformes', 'action' => 'view', $documentosMecanismo->tipo_informe->id]) : '' ?>
            </td>
            <td class="actions">
                
                <?= $this->Html->link('', ['action' => 'edit', $documentosMecanismo->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                
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
