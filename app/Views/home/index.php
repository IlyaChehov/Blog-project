<main>
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Добро пожаловать в MyBlog</h1>
                    <p class="lead">Учебный pet-проект на PHP (MVC), сделанный вручную без фреймворков.</p>
                    <a href="#posts" class="btn btn-light btn-lg mt-3">
                        <i class="bi bi-arrow-down me-2"></i>Читать посты
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="posts" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4"><i class="bi bi-journal-text text-primary me-2"></i>Последние посты</h2>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <article class="card h-100 shadow-sm">
                        <img src="https://masterpiecer-images.s3.yandex.net/5fd531dca6427c7:upscaled"
                             class="card-img-top" alt="Изображение поста">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Безопасность веб-приложений</h5>
                            <p class="card-text">Основные принципы безопасности при разработке. XSS, CSRF, SQL-инъекции
                                и методы защиты...</p>

                            <div class="mt-auto">
                                <div class="d-flex flex-wrap gap-1 mb-3">
                                    <span class="badge bg-danger">Security</span>
                                    <span class="badge bg-primary">PHP</span>
                                    <span class="badge bg-dark">Backend</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-person-fill me-1"></i>Иван Петров
                                    </small>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar3 me-1"></i>3 января 2025
                                    </small>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-outline-primary btn-sm">Читать полностью</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

        </div>
    </section>
</main>