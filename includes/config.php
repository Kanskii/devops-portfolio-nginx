<?php
// Общие настройки сайта. В реальном проекте значения можно вынести в .env
// и подключать через getenv() / vlucas/phpdotenv.

$site = [
    'name'       => 'Kanat DevOps',
    'title'      => 'DevOps Engineer Portfolio',
    'tagline'    => 'CI/CD · Docker · Kubernetes · Infrastructure as Code',
    'email'      => 'kz.bk89@gmail.com',
    'github'     => 'https://github.com/Kanskii',
    // 'linkedin'   => 'https://linkedin.com/in/your-profile',
    'telegram'   => 'https://t.me/BekovKanat',
    'year'       => date('Y'),
];

$nav = [
    'index.php'    => 'Главная',
    'about.php'    => 'Обо мне',
    'projects.php' => 'Проекты',
    'contacts.php' => 'Контакты',
];
