<h3 class="mb-5">Detalhes do usuário</h3>

<dl class="rol">
    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?php echo $data['user']['name']; ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?php echo $data['user']['email']; ?></dd>

    <dt class="col-sm-3">Data de criação</dt>
    <dd class="col-sm-9"><?php echo $data['user']['created_at']; ?></dd>

    <dt class="col-sm-3">Data de atualização</dt>
    <dd class="col-sm-9"><?php echo $data['user']['updated_at']; ?></dd>
</dl>

<p>
    <a href="/admin/users/<?php echo $data['user']['id']; ?>/edit" class="btn btn-primary">editar</a>
    <a href="/admin/users/<?php echo $data['user']['id']; ?>/delete" class="btn btn-danger confirm">remover</a>
</p>

<a href="/admin/users" class="btn btn-secondary">Voltar</a>