<!-- File: src/Template/Usuarios/login.ctp -->
<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/signin');
?>
<div class="users form col-md-3">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('username', ['label' => 'Usuario']) ?>
        <?= $this->Form->input('password', ['label' => 'Contraseña']) ?>
    </fieldset>
<?= $this->Form->button(__('Ingresar'),['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
</div>
