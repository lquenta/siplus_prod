<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($noticia,['type' => 'file']); ?>
<fieldset>
    <legend><?= __('Añadir {0}', ['Noticia']) ?></legend>
    <?php
    echo $this->Form->input('titular');
    echo $this->Form->input('contenido');
    echo $this->Form->input('fecha');
    echo $this->Form->input('estado_id', ['options' => $estados]);
    echo $this->Form->input('link_imagen', ['type' => 'file', 'multiple' => 'false', 'label' => 'Añadir Archivo']);
    ?>
</fieldset>
<?= $this->Form->button(__("Añadir")); ?>
<?= $this->Form->end() ?>
