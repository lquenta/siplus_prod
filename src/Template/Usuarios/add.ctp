<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Rols'), ['controller' => 'Rols', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rol'), ['controller' => 'Rols', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Rols'), ['controller' => 'Rols', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rol'), ['controller' => 'Rols', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="col col-md-6">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Agregar {0}', ['Usuario']) ?></legend>
        <?php
            echo $this->Form->input('username', ['label' => 'Usuario']);
            echo $this->Form->input('password');
            echo $this->Form->input('nombres');
            echo $this->Form->input('apellidos');
            echo $this->Form->input('institucion_id', ['options' => $institucions,'label' => 'Institución']);
            echo $this->Form->input('cargo');
            echo $this->Form->input('email');
            echo $this->Form->input('roles._ids', ['options' => $roles, 'multiple' => 'checkbox']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
