<h3 class="mb-5">Edição usuário</h3>

<form method="POST">
    <div class="form-group mb-3">
        <label class="mb-2" for="usersName">Nome</label>
        <input class="form-control" id="usersName" type="name" name="name" placeholder="Seu nome..." value="<?php echo $data['user']['name']; ?>">
    </div>
    <div class="form-group mb-3">
        <label class="mb-2" for="usersEmail">E-mail</label>
        <input class="form-control" id="usersEmail" type="email" name="email" placeholder="Seu email..." value="<?php echo $data['user']['email']; ?>">
    </div>
    <div class="form-group mb-3">
        <label class="mb-2" for="usersPassword">Senha</label>
        <input class="form-control" id="usersPassword" type="password" name="password" placeholder="Sua senha..." value="">
    </div>
    <button class="btn btn-primary" type="submit">Salvar</button>
    <hr>
</form>

<a class="btn btn-secondary" href="/admin/users/<?php echo $data['user']['id']; ?>">Voltar</a>