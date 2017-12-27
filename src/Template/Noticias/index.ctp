<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Noticia'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<h2>NOTICIAS</h2>
<div class="col-xs-12">
    <?= $this->Html->link('Añadir', ['action' => 'add'], ['title' => __('Add'), 'class' => 'btn btn-default glyphicon glyphicon-plus']) ?>
</div>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('titular'); ?></th>
            <th><?= $this->Paginator->sort('fecha'); ?></th>
            <th><?= $this->Paginator->sort('estado_id'); ?></th>
            <th><?= $this->Paginator->sort('link_imagen'); ?></th>
            <th class="actions"><?= __('Editar'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($noticias as $noticia): ?>
        <tr>
            <td><?= $this->Number->format($noticia->id) ?></td>
            <td><?= h($noticia->titular) ?></td>
            <td><?= h($noticia->fecha) ?></td>
            <td>
                <?= $noticia->has('estado') ? $this->Html->link($noticia->estado->descripcion, ['controller' => 'Estados', 'action' => 'view', $noticia->estado->id]) : '' ?>
            </td>
            <td><?= h($noticia->link_imagen) ?></td>
            <td class="actions">
                
                <?= $this->Html->link('', ['action' => 'edit', $noticia->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
              
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
