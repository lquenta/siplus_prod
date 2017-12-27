<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentosMecanismo $documentosMecanismo
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Documentos Mecanismos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Mecanismos'), ['controller' => 'Mecanismos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mecanismo'), ['controller' => 'Mecanismos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tipo Informes'), ['controller' => 'TipoInformes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Informe'), ['controller' => 'TipoInformes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Documentos Mecanismos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Mecanismos'), ['controller' => 'Mecanismos', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mecanismo'), ['controller' => 'Mecanismos', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Tipo Informes'), ['controller' => 'TipoInformes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Tipo Informe'), ['controller' => 'TipoInformes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($documentosMecanismo,['type' => 'file']); ?>
<fieldset>
    <legend><?= __('Añadir {0}', ['Documentos Mecanismo']) ?></legend>
    <?php
    echo $this->Form->input('mecanismo_id', ['options' => $mecanismos]);
    echo $this->Form->input('link', ['type' => 'file', 'multiple' => 'false', 'label' => 'Añadir Archivo']);
    echo $this->Form->input('tipoInforme_id', ['options' => $tipoInformes]);
    echo $this->Form->input('fecha');
    ?>
</fieldset>
<?= $this->Form->button(__("Añadir")); ?>
<?= $this->Form->end() ?>
