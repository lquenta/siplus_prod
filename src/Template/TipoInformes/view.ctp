<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Tipo Informe'), ['action' => 'edit', $tipoInforme->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Tipo Informe'), ['action' => 'delete', $tipoInforme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoInforme->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Informe'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Tipo Informe'), ['action' => 'edit', $tipoInforme->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Tipo Informe'), ['action' => 'delete', $tipoInforme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoInforme->id)]) ?> </li>
<li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Informe'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($tipoInforme->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Descripcion') ?></td>
            <td><?= h($tipoInforme->descripcion) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($tipoInforme->id) ?></td>
        </tr>
    </table>
</div>

