<?php
$basePath = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<footer class="site-footer">
    <div class="container footer-content">
        <div>
            <h4>Médiathèque IPNET</h4>
            <p>La culture à portée de main.</p>
        </div>
        <div>
            <p>© <?php echo date('Y'); ?> IPNET</p>
        </div>
        <div>
            <a href="catalogue.php">Catalogue</a>
            <a href="apropos.php">À propos</a>
        </div>
    </div>
</footer>

<script>
    const toggle = document.getElementById('theme-toggle');
    const body = document.body;
    const savedTheme = localStorage.getItem('ipnet-theme');

    if (savedTheme === 'dark') {
        body.setAttribute('data-theme', 'dark');
        if (toggle) {
            toggle.textContent = '☀️';
        }
    }

    if (toggle) {
        toggle.addEventListener('click', () => {
            const nextTheme = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', nextTheme);
            localStorage.setItem('ipnet-theme', nextTheme);
            toggle.textContent = nextTheme === 'dark' ? '☀️' : '🌙';
        });
    }
</script>
</body>
</html>
