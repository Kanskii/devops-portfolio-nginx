<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Проекты — ' . $site['name'];
require __DIR__ . '/includes/header.php';

$projects = [
    [
        'title' => 'CI/CD для микросервисов',
        'desc'  => 'Пайплайн на GitHub Actions: сборка Docker-образов, тесты, публикация в registry, деплой в Kubernetes через Helm.',
        'tags'  => ['GitHub Actions', 'Docker', 'Kubernetes', 'Helm'],
        'link'  => '#',
    ],
    [
        'title' => 'Инфраструктура на Terraform',
        'desc'  => 'Модульная инфраструктура в AWS: VPC, ECS, RDS, S3. Полностью описана как код, с раздельными окружениями dev/stage/prod.',
        'tags'  => ['Terraform', 'AWS', 'IaC'],
        'link'  => '#',
    ],
    [
        'title' => 'Стек мониторинга',
        'desc'  => 'Prometheus + Grafana + Alertmanager для сбора метрик приложений и инфраструктуры, с готовыми дашбордами и правилами алертов.',
        'tags'  => ['Prometheus', 'Grafana', 'Alertmanager'],
        'link'  => '#',
    ],
    [
        'title' => 'Автоматизация конфигураций',
        'desc'  => 'Набор Ansible-плейбуков для настройки серверов: пользователи, firewall, Docker, Nginx, ротация логов.',
        'tags'  => ['Ansible', 'Linux', 'Nginx'],
        'link'  => '#',
    ],
    [
        'title' => 'Это портфолио',
        'desc'  => 'Сам сайт: PHP + Nginx + PHP-FPM в Docker-контейнерах, docker-compose для локальной разработки и CI через GitHub Actions.',
        'tags'  => ['PHP', 'Docker', 'Nginx', 'GitHub Actions'],
        'link'  => '#',
    ],
];
?>

<section class="container page-section">
    <h1>Проекты</h1>
    <p class="lead">Несколько примеров задач, которыми я занимался и занимаюсь.</p>

    <div class="projects-grid">
        <?php foreach ($projects as $p): ?>
            <article class="project-card">
                <h2><?= htmlspecialchars($p['title']) ?></h2>
                <p><?= htmlspecialchars($p['desc']) ?></p>
                <div class="tag-grid">
                    <?php foreach ($p['tags'] as $tag): ?>
                        <span class="tag tag-sm"><?= htmlspecialchars($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="<?= htmlspecialchars($p['link']) ?>" class="project-link">Подробнее →</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
