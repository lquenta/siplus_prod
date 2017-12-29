<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->assign('title', 'Ver Accion');

$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Accion'), ['action' => 'edit', $accion->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Accion'), ['action' => 'delete', $accion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accion->id)]) ?> </li>
<li><?= $this->Html->link(__('List Accions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Accion'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Recomendacions'), ['controller' => 'Recomendacions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recomendacion'), ['controller' => 'Recomendacions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Adjuntos Accions'), ['controller' => 'AdjuntosAccions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Adjuntos Accion'), ['controller' => 'AdjuntosAccions', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Accion'), ['action' => 'edit', $accion->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Accion'), ['action' => 'delete', $accion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accion->id)]) ?> </li>
<li><?= $this->Html->link(__('List Accions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Accion'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Recomendacions'), ['controller' => 'Recomendacions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Recomendacion'), ['controller' => 'Recomendacions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Adjuntos Accions'), ['controller' => 'AdjuntosAccions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Adjuntos Accion'), ['controller' => 'AdjuntosAccions', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($accion->codigo) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Codigo') ?></td>
            <td><?= h($accion->codigo) ?></td>
        </tr>
        <tr>
            <td><?= __('Descripcion') ?></td>
            <td><?= h($accion->descripcion) ?></td>
        </tr>
        
        <tr>
            <td><?= __('Recomendacion') ?></td>
            <td><?= $accion->has('recomendacion') ? $this->Html->link($accion->recomendacion->id, ['controller' => 'Recomendacions', 'action' => 'view', $accion->recomendacion->id]) : '' ?></td>
        </tr>
       
        
        <tr>
            <td><?= __('Fecha') ?></td>
            <td><?= h($accion->fecha) ?></td>
        </tr>
    </table>
</div>

<?= $this->Form->postLink('', ['action' => 'aprobarPublicacionSeguimiento', $accion->id], ['confirm' => __('Esta seguro de aprobar la publicacion del seguimiento # {0}?', $accion->id), 'title' => __('Aprobar'), 'class' => 'btn btn-default glyphicon glyphicon-ok']) ?>
<?= $this->Form->postLink('', ['action' => 'rechazarPublicacionSeguimiento', $accion->id], ['confirm' => __('Esta seguro de rechazar la publicacion del seguimiento # {0}?', $accion->id), 'title' => __('Rechazar'), 'class' => 'btn btn-default glyphicon glyphicon-error']) ?>
<?php 
