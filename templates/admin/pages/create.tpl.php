<h3 class="mb-5">Nova página</h3>

<form action="" method="POST">
    <div class="form-group mb-3">
        <label class="mb-2" for="pagesTitle">Título</label>
        <input class="form-control" name="title" id="pagesTitle" type="text" placeholder="Título da página" required>
    </div>
    <div class="form-group mb-3">
        <label class="mb-2" for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input class="form-control" id="pagesUrl" name="url" type="text" placeholder="URL">
        </div>
    </div>
    <div class="form-group mb-3">
        <input id="pagesBody" name="body" type="hidden">
        <trix-editor input="pagesBody"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <hr>
</form>

<a class="btn btn-secondary" href="/admin/pages">Voltar</a>