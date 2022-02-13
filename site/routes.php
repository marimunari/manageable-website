<?php

require __DIR__ . '/../admin/pages/db.php';

if (resolve('/contact')) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $from = filter_input(INPUT_POST, 'from');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');
        $headers = 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail('marianamunari4@gmail.com', $subject, $message, $headers)) {
            flash('Email enviado com sucesso', 'success');
        } else {
            flash('Algo deu errado! O e-mail não foi enviado, entre em contato com o Suporte.', 'error');
        }

        return header('location: /contact');
    }

    $pages = $pages_all();
    render('site/contact', 'site', compact('pages'));
} elseif ($params = resolve('/(.*)')) {
    $pages = $pages_all();

    foreach ($pages as $page) {
        if ($page['url'] == $params[1]) {
            break;
        }
    }

    render('site/page', 'site', compact('pages', 'page'));
}
