<?php

function pages_get_data($redirectOnError)
{
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if (!$title) {
        flash('Informe todos os campos obrigatórios', 'error');
        header('location: ' . $redirectOnError);
        die();
    }

    return compact('title', 'body', 'url');
}

$pages_all = function () use ($conn) {
    $result = $conn->query(
        'SELECT * FROM pages'
    );

    return $result->fetch_all(MYSQLI_ASSOC);
};

$pages_view = function ($id) use ($conn) {
    $sql = 'SELECT * FROM pages WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_assoc();
};

$pages_create = function () use ($conn) {
    $data = pages_get_data('/admin/pages/create');

    $sql = 'INSERT INTO pages (title, body, url, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $data['title'], $data['body'], $data['url']);

    flash('Registro criado com sucesso', 'success');

    return $stmt->execute();
};

$pages_edit = function ($id) use ($conn) {
    $data = pages_get_data('/admin/pages/' . $id . '/edit');

    $sql = 'UPDATE pages SET title=?, body=?, url=?, updated_at=NOW() WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $data['title'], $data['body'], $data['url'], $id);

    flash('Registro atualizado com sucesso', 'success');

    return $stmt->execute();
};

$pages_delete = function ($id) use ($conn) {
    $sql = ' DELETE FROM pages WHERE id=?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Registro removido com sucesso', 'success');

    return $stmt->execute();
};
