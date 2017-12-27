<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Documentos Mecanismo'), ['action' => 'edit', $documentosMecanismo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Documentos Mecanismo'), ['action' => 'delete', $documentosMecanismo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentosMecanismo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Documentos Mecanismos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Documentos Mecanismo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Mecanismos'), ['controller' => 'Mecanismos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mecanismo'), ['controller' => 'Mecanismos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Informes'), ['controller' => 'TipoInformes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Informe'), ['controller' => 'TipoInformes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Documentos Mecanismo'), ['action' => 'edit', $documentosMecanismo->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Documentos Mecanismo'), ['action' => 'delete', $documentosMecanismo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentosMecanismo->id)]) ?> </li>
<li><?= $this->Html->link(__('List Documentos Mecanismos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Documentos Mecanismo'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Mecanismos'), ['controller' => 'Mecanismos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mecanismo'), ['controller' => 'Mecanismos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Tipo Informes'), ['controller' => 'TipoInformes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Tipo Informe'), ['controller' => 'TipoInformes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($documentosMecanismo->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Mecanismo') ?></td>
            <td><?= $documentosMecanismo->has('mecanismo') ? $this->Html->link($documentosMecanismo->mecanismo->descripcion, ['controller' => 'Mecanismos', 'action' => 'view', $documentosMecanismo->mecanismo->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Link') ?></td>
            <td><?= h($documentosMecanismo->link) ?></td>
        </tr>
        <tr>
            <td><?= __('Tipo Informe') ?></td>
            <td><?= $documentosMecanismo->has('tipo_informe') ? $this->Html->link($documentosMecanismo->tipo_informe->descripcion, ['controller' => 'TipoInformes', 'action' => 'view', $documentosMecanismo->tipo_informe->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($documentosMecanismo->id) ?></td>
        </tr>
    </table>
</div>

