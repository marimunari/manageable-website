<h3 class="mb-5">Administração de usuários</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>nome</th>
            <th>e-mail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['users'] as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td class="text-right">
                    <a class="btn btn-primary btn-sm" href="/admin/users/<?php echo $user['id']; ?>">ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-secondary" href="/admin/users/create">Novo</a>