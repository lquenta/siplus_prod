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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $tipoInforme->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $tipoInforme->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $tipoInforme->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $tipoInforme->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Tipo Informes'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($tipoInforme); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Tipo Informe']) ?></legend>
    <?php
    echo $this->Form->input('descripcion');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
