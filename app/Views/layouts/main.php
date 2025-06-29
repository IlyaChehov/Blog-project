<!DOCTYPE html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog - <?= $pageTitle ?? 'Современный блог' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/styles/styles.css">
</head>
<body>
<header class="sticky-top">
    <div class="bg-body-secondary border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div class="d-flex align-items-center">
                    <i class="bi bi-journal-text text-primary me-2 fs-4"></i>
                    <span class="fw-bold fs-5">MyBlog</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary btn-sm" id="themeToggle" aria-label="Переключить тему">
                        <i class="bi bi-sun-fill" id="themeIcon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= getLink('/') ?>"><i
                                    class="bi bi-house me-1"></i>Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="bi bi-info-circle me-1"></i>О
                            сайте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="bi bi-envelope me-1"></i>Контакты</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href=""><i
                                    class="bi bi-box-arrow-in-right me-1"></i>Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= getLink('/register') ?>"><i
                                    class="bi bi-person-plus me-1"></i>Регистрация</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?= view()->getContent() ?>

<footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">
                    <i class="bi bi-c-circle me-1"></i>
                    <?= date('Y') ?> MyBlog. Учебный проект на PHP + MVC
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-flex justify-content-md-end justify-content-center gap-3 mt-2 mt-md-0">
                    <a href="#" class="text-light" aria-label="Telegram">
                        <i class="bi bi-telegram fs-5"></i>
                    </a>
                    <a href="#" class="text-light" aria-label="GitHub">
                        <i class="bi bi-github fs-5"></i>
                    </a>
                    <a href="#" class="text-light" aria-label="Email">
                        <i class="bi bi-envelope fs-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
