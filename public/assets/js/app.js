document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const app = document.getElementById('app');
    const toggle = document.getElementById('toggleSidebar');

    if (!sidebar || !app || !toggle) {
        return;
    }

    toggle.addEventListener('click', function () {

        sidebar.classList.toggle('hidden');
        app.classList.toggle('sidebar-hidden');

    });

});