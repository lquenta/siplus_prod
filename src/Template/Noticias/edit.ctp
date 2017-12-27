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
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $noticia->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $noticia->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($noticia); ?>
<fieldset>
    <legend><?= __('Editar {0}', ['Noticia']) ?></legend>
    <?php
    echo $this->Form->input('titular');
    echo $this->Form->input('contenido');
    echo $this->Form->input('fecha');
    echo $this->Form->input('estado_id', ['options' => $estados]);
    echo $this->Form->input('link_imagen');
    ?>
</fieldset>
<?= $this->Form->button(__("Grabar")); ?>
<?= $this->Form->end() ?>
