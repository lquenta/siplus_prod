<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoInforme $tipoInforme
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($tipoInforme); ?>
<fieldset>
    <legend><?= __('Añadir {0}', ['Tipo Informe']) ?></legend>
    <?php
    echo $this->Form->input('descripcion');
    ?>
</fieldset>
<?= $this->Form->button(__("Añadir")); ?>
<?= $this->Form->end() ?>
