/**
 * Theme Switcher & Clock Widget
 * Professional Dark/Light Mode Toggle with Live Clock
 */

// Initialize theme on page load
document.addEventListener('DOMContentLoaded', function() {
    initTheme();
    initClock();
    initThemeToggle();
});

/**
 * Initialize Theme
 */
function initTheme() {
    // Check for saved theme preference or default to 'light'
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);

    // Update body class for additional styling
    document.body.classList.toggle('dark-mode', savedTheme === 'dark');
}

/**
 * Toggle Theme
 */
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    // Add transition class for smooth theme change
    document.documentElement.classList.add('theme-transition');

    // Set new theme
    document.documentElement.setAttribute('data-theme', newTheme);
    document.body.classList.toggle('dark-mode', newTheme === 'dark');

    // Save preference
    localStorage.setItem('theme', newTheme);

    // Remove transition class after animation
    setTimeout(() => {
        document.documentElement.classList.remove('theme-transition');
    }, 300);

    // Show toast notification
    showThemeNotification(newTheme);
}

/**
 * Initialize Theme Toggle Button
 */
function initThemeToggle() {
    const toggleBtn = document.getElementById('themeToggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleTheme);
    }
}

/**
 * Show Theme Change Notification
 */
function showThemeNotification(theme) {
    if (typeof Toastify !== 'undefined') {
        Toastify({
            text: `${theme === 'dark' ? '🌙 Dark' : '☀️ Light'} mode activated`,
            duration: 2000,
            close: false,
            gravity: "top",
            position: "right",
            className: theme === 'dark' ? 'info' : 'warning',
        }).showToast();
    }
}

/**
 * Initialize Clock
 */
function initClock() {
    // Update clock immediately
    updateClock();

    // Update every second
    setInterval(updateClock, 1000);
}

/**
 * Update Clock Display
 */
function updateClock() {
    const now = new Date();

    // Format time (HH:MM:SS)
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;

    // Format date
    const options = {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    };
    const dateString = now.toLocaleDateString('en-US', options);

    // Update DOM elements
    const timeElement = document.getElementById('currentTime');
    const dateElement = document.getElementById('currentDate');

    if (timeElement) {
        timeElement.textContent = timeString;
    }

    if (dateElement) {
        dateElement.innerHTML = `<small>${dateString}</small>`;
    }
}

/**
 * Get Current Theme
 */
function getCurrentTheme() {
    return document.documentElement.getAttribute('data-theme') || 'light';
}

/**
 * Set Theme (can be called programmatically)
 */
function setTheme(theme) {
    if (theme !== 'light' && theme !== 'dark') {
        console.warn('Invalid theme. Use "light" or "dark"');
        return;
    }

    document.documentElement.setAttribute('data-theme', theme);
    document.body.classList.toggle('dark-mode', theme === 'dark');
    localStorage.setItem('theme', theme);
}

// Export functions for global use
window.toggleTheme = toggleTheme;
window.getCurrentTheme = getCurrentTheme;
window.setTheme = setTheme;

// Keyboard shortcut: Ctrl/Cmd + Shift + D to toggle theme
document.addEventListener('keydown', function(e) {
    if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'D') {
        e.preventDefault();
        toggleTheme();
    }
});

// Detect system theme preference
if (window.matchMedia) {
    const systemThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');

    // Only apply system theme if no saved preference
    if (!localStorage.getItem('theme')) {
        const systemTheme = systemThemeQuery.matches ? 'dark' : 'light';
        setTheme(systemTheme);
    }

    // Listen for system theme changes
    systemThemeQuery.addEventListener('change', (e) => {
        // Only auto-switch if user hasn't set a preference
        if (!localStorage.getItem('theme')) {
            const newTheme = e.matches ? 'dark' : 'light';
            setTheme(newTheme);
        }
    });
}

console.log('🎨 Theme Switcher & Clock Widget loaded successfully!');

