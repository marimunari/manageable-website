<h3 class="mb-5">Detalhes da páginas</h3>

<div class="row">
    <div class="col-3">
        <dl class="row">
            <dt class="col-sm-4">Título</dt>
            <dd class="col-sm-8"><?php echo $data['page']['title']; ?></dd>

            <dt class="col-sm-4">URL</dt>
            <dd class="col-sm-8">
                /<?php echo $data['page']['url']; ?> - <a href="/<?php echo $data['page']['url']; ?>" target="blank">abrir</a>
            </dd>

            <dt class="col-sm-4">Data de criação</dt>
            <dd class="col-sm-8"><?php echo $data['page']['created_at']; ?></dd>

            <dt class="col-sm-4">Data de atualização</dt>
            <dd class="col-sm-8"><?php echo $data['page']['updated_at']; ?></dd>
        </dl>
    </div>
    <div class="col bg-light">
        <?php echo $data['page']['body']; ?>
    </div>
</div>
<p>
    <a href="/admin/pages/<?php echo $data['page']['id']; ?>/edit" class="btn btn-primary">editar</a>
    <a href="/admin/pages/<?php echo $data['page']['id']; ?>/delete" class="btn btn-danger confirm">remover</a>
</p>

<a class="btn btn-secondary" href="/admin/pages">Voltar</a>