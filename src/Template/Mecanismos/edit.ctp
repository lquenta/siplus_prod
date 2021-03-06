<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $mecanismo->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $mecanismo->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Mecanismos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Mecanismo Recomendacion'), ['controller' => 'MecanismoRecomendacion', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mecanismo Recomendacion'), ['controller' => 'MecanismoRecomendacion', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $mecanismo->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $mecanismo->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Mecanismos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Mecanismo Recomendacion'), ['controller' => 'MecanismoRecomendacion', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Mecanismo Recomendacion'), ['controller' => 'MecanismoRecomendacion', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($mecanismo); ?>
<fieldset>
    <legend><?= __('Editar {0}', ['Mecanismo']) ?></legend>
    <?php
    echo $this->Form->input('descripcion');
    echo $this->Form->input('Prefijo');
    ?>
    <div class="checkbox">
        <label>
        <?= $this->Form->checkbox('activo'); ?> Activo
        </label>
    </div>
</fieldset>
<?= $this->Form->button(__("Grabar")); ?>
<?= $this->Form->end() ?>
