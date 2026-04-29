{
    const btnSidebar = document.getElementById('btn-sidebar-transaksi');
    const btnCloseSidebar = document.getElementById('btn-close-sidebar');
    const sidebar = document.getElementById('sidebar-transaksi');

    btnSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
    });

    btnCloseSidebar.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
    });


}