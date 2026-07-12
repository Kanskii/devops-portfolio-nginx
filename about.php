<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Обо мне — ' . $site['name'];
require __DIR__ . '/includes/header.php';

$skills = [
    'CI/CD'          => ['GitHub Actions', 'GitLab CI', 'Jenkins'],
    'Контейнеризация' => ['Docker', 'Docker Compose', 'Kubernetes', 'Helm'],
    'IaC'             => ['Terraform', 'Ansible', 'CloudFormation'],
    'Мониторинг'      => ['Prometheus', 'Grafana', 'Loki', 'Alertmanager'],
    'Облака'          => ['AWS', 'GCP', 'DigitalOcean'],
    'Прочее'          => ['Linux/Bash', 'Nginx', 'PostgreSQL', 'Git'],
];

$timeline = [
    ['period' => '2024 — сейчас', 'title' => 'DevOps Engineer',      'desc' => 'Проектирование CI/CD, поддержка Kubernetes-кластеров, автоматизация инфраструктуры.'],
    ['period' => '2022 — 2024',   'title' => 'System Administrator', 'desc' => 'Администрирование Linux-серверов, настройка мониторинга и резервного копирования.'],
    ['period' => '2021 — 2022',   'title' => 'Junior Backend Developer', 'desc' => 'Разработка на PHP, знакомство с Docker и основами DevOps.'],
];
?>

<section class="container page-section">
    <h1>Обо мне</h1>
    <p class="lead">
        Я DevOps-инженер с фокусом на автоматизацию и надёжность инфраструктуры.
        Помогаю командам быстрее и безопаснее выпускать релизы: строю CI/CD,
        контейнеризирую приложения, настраиваю мониторинг и алертинг.
    </p>

    <h2>Навыки</h2>
    <div class="skills-grid">
        <?php foreach ($skills as $group => $items): ?>
            <div class="skill-card">
                <h3><?= htmlspecialchars($group) ?></h3>
                <ul>
                    <?php foreach ($items as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Опыт</h2>
    <ol class="timeline">
        <?php foreach ($timeline as $entry): ?>
            <li>
                <span class="timeline-period"><?= htmlspecialchars($entry['period']) ?></span>
                <h3><?= htmlspecialchars($entry['title']) ?></h3>
                <p><?= htmlspecialchars($entry['desc']) ?></p>
            </li>
        <?php endforeach; ?>
    </ol>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
