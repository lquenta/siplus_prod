<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Noticia'), ['action' => 'edit', $noticia->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Noticia'), ['action' => 'delete', $noticia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]) ?> </li>
<li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Noticia'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Noticia'), ['action' => 'edit', $noticia->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Noticia'), ['action' => 'delete', $noticia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]) ?> </li>
<li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Noticia'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($noticia->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Titular') ?></td>
            <td><?= h($noticia->titular) ?></td>
        </tr>
        <tr>
            <td><?= __('Estado') ?></td>
            <td><?= $noticia->has('estado') ? $this->Html->link($noticia->estado->descripcion, ['controller' => 'Estados', 'action' => 'view', $noticia->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Link Imagen') ?></td>
            <td><?= h($noticia->link_imagen) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($noticia->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Fecha') ?></td>
            <td><?= h($noticia->fecha) ?></td>
        </tr>
        <tr>
            <td><?= __('Contenido') ?></td>
            <td><?= $this->Text->autoParagraph(h($noticia->contenido)); ?></td>
        </tr>
    </table>
</div>

