</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <p>&copy; <?= htmlspecialchars($site['year']) ?> <?= htmlspecialchars($site['name']) ?>. Собрано с помощью Docker &amp; Nginx.</p>
        <div class="socials">
            <a href="<?= htmlspecialchars($site['github']) ?>" target="_blank" rel="noopener">GitHub</a>
            <!-- <a href="<?= htmlspecialchars($site['linkedin']) ?>" target="_blank" rel="noopener">LinkedIn</a> -->
            <a href="<?= htmlspecialchars($site['telegram']) ?>" target="_blank" rel="noopener">Telegram</a>
        </div>
    </div>
</footer>
</body>
</html>
