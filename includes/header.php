<?php
require_once __DIR__ . '/config.php';
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? $site['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($site['tagline']) ?>">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="data:,">
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">
            <span class="logo-prompt">$</span> <?= htmlspecialchars($site['name']) ?>
        </a>
        <nav class="main-nav">
            <button class="nav-toggle" aria-label="Открыть меню" onclick="document.querySelector('.main-nav ul').classList.toggle('open')">☰</button>
            <ul>
                <?php foreach ($nav as $href => $label): ?>
                    <li>
                        <a href="<?= $href ?>" class="<?= $current === $href ? 'active' : '' ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
<main>
