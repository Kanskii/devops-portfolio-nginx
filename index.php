<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/includes/config.php';
$pageTitle = $site['name'] . ' — ' . $site['title'];
require __DIR__ . '/includes/header.php';
?>

<section class="hero container">
    <p class="hero-kicker">Привет, я</p>
    <h1><?= htmlspecialchars($site['name']) ?></h1>
    <p class="hero-tagline"><?= htmlspecialchars($site['tagline']) ?></p>
    <p class="hero-desc">
        Занимаюсь автоматизацией сборки, доставки и эксплуатации приложений:
        от Docker-контейнеров и CI/CD пайплайнов до Kubernetes-кластеров
        и мониторинга инфраструктуры.
    </p>
    <div class="hero-actions">
        <a href="projects.php" class="btn btn-primary">Смотреть проекты</a>
        <a href="contacts.php" class="btn btn-outline">Связаться</a>
    </div>
</section>

<section class="container stack-section">
    <h2>Основной стек</h2>
    <div class="tag-grid">
        <?php
        $stack = [
            'Docker', 'Kubernetes', 'GitHub Actions', 'GitLab CI',
            'Terraform', 'Ansible', 'Nginx', 'Prometheus', 'Grafana',
            'Linux', 'Bash', 'AWS'
        ];
        foreach ($stack as $tech): ?>
            <span class="tag"><?= htmlspecialchars($tech) ?></span>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
