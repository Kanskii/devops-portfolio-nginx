<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Контакты — ' . $site['name'];

$status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name !== '' && $email !== '' && $message !== '') {
        // Здесь можно подключить mail() / PHPMailer / очередь сообщений.
        // В демо-версии просто показываем сообщение об успехе.
        $status = 'success';
    } else {
        $status = 'error';
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="container page-section">
    <h1>Контакты</h1>
    <p class="lead">Открыт к предложениям по DevOps-задачам, аудиту инфраструктуры и консультациям.</p>

    <div class="contacts-grid">
        <div class="contacts-info">
            <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($site['email']) ?>"><?= htmlspecialchars($site['email']) ?></a></p>
            <p><strong>GitHub:</strong> <a href="<?= htmlspecialchars($site['github']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($site['github']) ?></a></p>
            <!-- <p><strong>LinkedIn:</strong> <a href="<?= htmlspecialchars($site['linkedin']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($site['linkedin']) ?></a></p> -->
            <p><strong>Telegram:</strong> <a href="<?= htmlspecialchars($site['telegram']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($site['telegram']) ?></a></p>
        </div>

        <form class="contact-form" method="post" action="contacts.php">
            <?php if ($status === 'success'): ?>
                <p class="form-message success">Спасибо! Сообщение получено (демо-режим, без реальной отправки).</p>
            <?php elseif ($status === 'error'): ?>
                <p class="form-message error">Пожалуйста, заполните все поля.</p>
            <?php endif; ?>

            <label for="name">Имя</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Сообщение</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
