<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Rol'), ['action' => 'edit', $rol->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Rol'), ['action' => 'delete', $rol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->id)]) ?> </li>
<li><?= $this->Html->link(__('List Rols'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rol'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Institucions'), ['controller' => 'Institucions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Institucion'), ['controller' => 'Institucions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Rol'), ['action' => 'edit', $rol->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Rol'), ['action' => 'delete', $rol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->id)]) ?> </li>
<li><?= $this->Html->link(__('List Rols'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rol'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Institucions'), ['controller' => 'Institucions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Institucion'), ['controller' => 'Institucions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($rol->nombre) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Nombre') ?></td>
            <td><?= h($rol->nombre) ?></td>
        </tr>
        <tr>
            <td><?= __('Institucion') ?></td>
            <td><?= h($rol->institucion->descripcion) ?></td>
           
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($rol->id) ?></td>
        </tr>
    </table>
</div>

