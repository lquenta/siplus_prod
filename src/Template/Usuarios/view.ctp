<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Institucions'), ['controller' => 'Institucions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institucion'), ['controller' => 'Institucions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accions'), ['controller' => 'Accions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Accion'), ['controller' => 'Accions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Autorizacions'), ['controller' => 'Autorizacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Autorizacion'), ['controller' => 'Autorizacions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notificacions'), ['controller' => 'Notificacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notificacion'), ['controller' => 'Notificacions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recomendacions'), ['controller' => 'Recomendacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recomendacion'), ['controller' => 'Recomendacions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Revisions'), ['controller' => 'Revisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Revision'), ['controller' => 'Revisions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solicitud Informacions'), ['controller' => 'SolicitudInformacions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitud Informacion'), ['controller' => 'SolicitudInformacions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solicitud Respuestas'), ['controller' => 'SolicitudRespuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitud Respuesta'), ['controller' => 'SolicitudRespuestas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Solicitudes Pendientes Respuestas'), ['controller' => 'SolicitudesPendientesRespuestas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solicitudes Pendientes Respuesta'), ['controller' => 'SolicitudesPendientesRespuestas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Versions'), ['controller' => 'Versions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Version'), ['controller' => 'Versions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Institucion') ?></th>
            <td><?= $usuario->has('institucion') ? $this->Html->link($usuario->institucion->descripcion, ['controller' => 'Institucions', 'action' => 'view', $usuario->institucion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($usuario->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombres') ?></th>
            <td><?= h($usuario->nombres) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($usuario->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($usuario->cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $this->Number->format($usuario->activo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Creacion') ?></th>
            <td><?= h($usuario->fecha_creacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Modificacion') ?></th>
            <td><?= h($usuario->fecha_modificacion) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Accions') ?></h4>
        <?php if (!empty($usuario->accions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Recomendacion Id') ?></th>
                <th scope="col"><?= __('Listado') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->accions as $accions): ?>
            <tr>
                <td><?= h($accions->id) ?></td>
                <td><?= h($accions->codigo) ?></td>
                <td><?= h($accions->descripcion) ?></td>
                <td><?= h($accions->fecha) ?></td>
                <td><?= h($accions->usuario_id) ?></td>
                <td><?= h($accions->recomendacion_id) ?></td>
                <td><?= h($accions->listado) ?></td>
                <td><?= h($accions->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accions', 'action' => 'view', $accions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Accions', 'action' => 'edit', $accions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Accions', 'action' => 'delete', $accions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Autorizacions') ?></h4>
        <?php if (!empty($usuario->autorizacions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Fecha Modificacion') ?></th>
                <th scope="col"><?= __('Visto Bueno Fisico') ?></th>
                <th scope="col"><?= __('Accion Id') ?></th>
                <th scope="col"><?= __('Razon') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->autorizacions as $autorizacions): ?>
            <tr>
                <td><?= h($autorizacions->id) ?></td>
                <td><?= h($autorizacions->usuario_id) ?></td>
                <td><?= h($autorizacions->estado_id) ?></td>
                <td><?= h($autorizacions->fecha_modificacion) ?></td>
                <td><?= h($autorizacions->visto_bueno_fisico) ?></td>
                <td><?= h($autorizacions->accion_id) ?></td>
                <td><?= h($autorizacions->razon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Autorizacions', 'action' => 'view', $autorizacions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Autorizacions', 'action' => 'edit', $autorizacions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Autorizacions', 'action' => 'delete', $autorizacions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $autorizacions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notificacions') ?></h4>
        <?php if (!empty($usuario->notificacions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Accion Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Mensaje') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->notificacions as $notificacions): ?>
            <tr>
                <td><?= h($notificacions->id) ?></td>
                <td><?= h($notificacions->accion_id) ?></td>
                <td><?= h($notificacions->usuario_id) ?></td>
                <td><?= h($notificacions->mensaje) ?></td>
                <td><?= h($notificacions->fecha) ?></td>
                <td><?= h($notificacions->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notificacions', 'action' => 'view', $notificacions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notificacions', 'action' => 'edit', $notificacions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notificacions', 'action' => 'delete', $notificacions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recomendacions') ?></h4>
        <?php if (!empty($usuario->recomendacions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha Creacion') ?></th>
                <th scope="col"><?= __('Fecha Modificacion') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->recomendacions as $recomendacions): ?>
            <tr>
                <td><?= h($recomendacions->id) ?></td>
                <td><?= h($recomendacions->descripcion) ?></td>
                <td><?= h($recomendacions->fecha_creacion) ?></td>
                <td><?= h($recomendacions->fecha_modificacion) ?></td>
                <td><?= h($recomendacions->usuario_id) ?></td>
                <td><?= h($recomendacions->estado_id) ?></td>
                <td><?= h($recomendacions->codigo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recomendacions', 'action' => 'view', $recomendacions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recomendacions', 'action' => 'edit', $recomendacions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recomendacions', 'action' => 'delete', $recomendacions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recomendacions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Revisions') ?></h4>
        <?php if (!empty($usuario->revisions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Recomendacion Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Resultado') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->revisions as $revisions): ?>
            <tr>
                <td><?= h($revisions->id) ?></td>
                <td><?= h($revisions->recomendacion_id) ?></td>
                <td><?= h($revisions->usuario_id) ?></td>
                <td><?= h($revisions->resultado) ?></td>
                <td><?= h($revisions->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Revisions', 'action' => 'view', $revisions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Revisions', 'action' => 'edit', $revisions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Revisions', 'action' => 'delete', $revisions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $revisions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solicitud Informacions') ?></h4>
        <?php if (!empty($usuario->solicitud_informacions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha Modificacion') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->solicitud_informacions as $solicitudInformacions): ?>
            <tr>
                <td><?= h($solicitudInformacions->id) ?></td>
                <td><?= h($solicitudInformacions->codigo) ?></td>
                <td><?= h($solicitudInformacions->descripcion) ?></td>
                <td><?= h($solicitudInformacions->fecha_modificacion) ?></td>
                <td><?= h($solicitudInformacions->usuario_id) ?></td>
                <td><?= h($solicitudInformacions->estado_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SolicitudInformacions', 'action' => 'view', $solicitudInformacions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SolicitudInformacions', 'action' => 'edit', $solicitudInformacions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SolicitudInformacions', 'action' => 'delete', $solicitudInformacions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitudInformacions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solicitud Respuestas') ?></h4>
        <?php if (!empty($usuario->solicitud_respuestas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Solicitud Informacion Id') ?></th>
                <th scope="col"><?= __('Respuesta') ?></th>
                <th scope="col"><?= __('Fecha Respuesta') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->solicitud_respuestas as $solicitudRespuestas): ?>
            <tr>
                <td><?= h($solicitudRespuestas->id) ?></td>
                <td><?= h($solicitudRespuestas->solicitud_informacion_id) ?></td>
                <td><?= h($solicitudRespuestas->respuesta) ?></td>
                <td><?= h($solicitudRespuestas->fecha_respuesta) ?></td>
                <td><?= h($solicitudRespuestas->usuario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SolicitudRespuestas', 'action' => 'view', $solicitudRespuestas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SolicitudRespuestas', 'action' => 'edit', $solicitudRespuestas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SolicitudRespuestas', 'action' => 'delete', $solicitudRespuestas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitudRespuestas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solicitudes Pendientes Respuestas') ?></h4>
        <?php if (!empty($usuario->solicitudes_pendientes_respuestas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Estado Id') ?></th>
                <th scope="col"><?= __('Fecha Modificacion') ?></th>
                <th scope="col"><?= __('Solicitud Informacion Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->solicitudes_pendientes_respuestas as $solicitudesPendientesRespuestas): ?>
            <tr>
                <td><?= h($solicitudesPendientesRespuestas->id) ?></td>
                <td><?= h($solicitudesPendientesRespuestas->usuario_id) ?></td>
                <td><?= h($solicitudesPendientesRespuestas->estado_id) ?></td>
                <td><?= h($solicitudesPendientesRespuestas->fecha_modificacion) ?></td>
                <td><?= h($solicitudesPendientesRespuestas->solicitud_informacion_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SolicitudesPendientesRespuestas', 'action' => 'view', $solicitudesPendientesRespuestas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SolicitudesPendientesRespuestas', 'action' => 'edit', $solicitudesPendientesRespuestas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SolicitudesPendientesRespuestas', 'action' => 'delete', $solicitudesPendientesRespuestas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitudesPendientesRespuestas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Versions') ?></h4>
        <?php if (!empty($usuario->versions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Recomendacion Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->versions as $versions): ?>
            <tr>
                <td><?= h($versions->id) ?></td>
                <td><?= h($versions->recomendacion_id) ?></td>
                <td><?= h($versions->titulo) ?></td>
                <td><?= h($versions->descripcion) ?></td>
                <td><?= h($versions->fecha) ?></td>
                <td><?= h($versions->usuario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Versions', 'action' => 'view', $versions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Versions', 'action' => 'edit', $versions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Versions', 'action' => 'delete', $versions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $versions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($usuario->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->nombre) ?></td>
                <td><?= h($roles->activo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
