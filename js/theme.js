const toggleButton = document.getElementById('theme-toggle');
const body = document.body;
const themeStorageKey = 'ipnet-theme';

function renderThemeButton() {
    if (!toggleButton) return;

    const darkModeEnabled = body.dataset.theme === 'dark';
    toggleButton.textContent = darkModeEnabled ? '☀️' : '🌙';
    toggleButton.setAttribute(
        'aria-label',
        darkModeEnabled ? 'Activer le mode clair' : 'Activer le mode sombre'
    );
}

try {
    const savedTheme = localStorage.getItem(themeStorageKey);
    if (savedTheme === 'dark' || savedTheme === 'light') {
        body.dataset.theme = savedTheme;
    }
} catch (error) {
    // Le thème fonctionne même si le navigateur bloque le stockage local.
}

renderThemeButton();

toggleButton?.addEventListener('click', () => {
    const nextTheme = body.dataset.theme === 'dark' ? 'light' : 'dark';
    body.dataset.theme = nextTheme;

    try {
        localStorage.setItem(themeStorageKey, nextTheme);
    } catch (error) {
        // Le choix reste actif jusqu'au rechargement si localStorage est indisponible.
    }

    renderThemeButton();
});
