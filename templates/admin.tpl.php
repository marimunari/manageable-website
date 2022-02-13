<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/resources/trix/trix.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Painel administrativo</title>
</head>

<body class="d-flex flex-column">
    <div id="header">
        <nav class="navbar navbar-dark bg-dark">
            <span>
                <a class="navbar-brand" href="/admin">AdminSON</a>
                <span class="navbar-text">Painel administrativo</span>
            </span>
            <a class="btn btn-danger" href="/admin/auth/logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </nav>
    </div>
    <div class="main">
        <div class="row">
            <div class="col">
                <ul class="main-menu nav nav-pills bg-secondary text-white flex-column p-2">
                    <li class="nav-item">
                        <span class="nav-link text-white-50"><small>MENU</small></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php if (resolve('/admin/pages.*')) : ?> active <?php endif; ?>" href="/admin/pages">
                            <i class="far fa-file-alt"></i>Páginas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php if (resolve('/admin/users.*')) : ?> active <?php endif; ?>" href="/admin/users">
                            <i class="far fa-user"></i>Usuários
                        </a>
                    </li>
                </ul>
            </div>
            <div id="content" class="col-10">
                <?php include $content ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="/resources/trix/trix.js"></script>

    <script>
        document.addEventListener('trix-attachment-add', function() {
            const attachment = event.attachment;
            if (!attachment.file) {
                return;
            }

            const form = new FormData();
            form.append('file', attachment.file);

            $.ajax({
                url: '/admin/upload/image',
                method: 'POST',
                data: form,
                contentType: false,
                processData: false,
                xhr: function() {
                    const xhr = $.ajaxSettings.xhr();
                    xhr.upload.addEventListener('progress', function(e) {
                        let progress = e.loaded / e.total * 100;
                        attachment.setUploadProgress(progress);
                    })

                    return xhr;
                }
            }).done(function(response) {
                console.log(response);
                attachment.setAttributes({
                    url: response,
                    href: response
                });
            }).fail(function() {
                console.log('error');
            });
        });

        <?php flash(); ?>

        const confirmEl = document.querySelector('.confirm');
        if (confirmEl) {
            confirmEl.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Tem certeza que deseja fazer isso?')) {
                    window.location = e.target.getAttribute('href');
                }
            });
        }
    </script>
</body>

</html>