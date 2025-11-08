
<aside class="sidebar" id="adminSidebar" aria-label="نوار کناری">
    <div class="sidebar-header">
        <div class="sidebar-title">مدیریت</div>
        <button class="sidebar-close" id="sidebarClose" aria-label="بستن"><i class="fas fa-times"></i></button>
    </div>
    <nav class="sidebar-nav">
        <a href="/admin" class="sidebar-link"><i class="fas fa-gauge"></i>داشبورد</a>
        <a href="/admin/orders" class="sidebar-link"><i class="fas fa-clipboard-list"></i>سفارشات</a>
        <a href="/admin/products" class="sidebar-link"><i class="fas fa-box"></i>محصولات</a>
        <a href="/admin/users" class="sidebar-link"><i class="fas fa-users"></i>کاربران</a>
        <a href="/admin/comments" class="sidebar-link"><i class="fas fa-comments"></i>نظرات</a>
        <a href="/admin/settings" class="sidebar-link"><i class="fas fa-gear"></i>تنظیمات</a>
    </nav>
</aside>

<style>

    .sidebar {
        position: fixed;
        inset-block: 0;
        left: 0;
        width: 260px;
        background: linear-gradient(180deg, rgba(255,255,255,.10), rgba(255,255,255,.05));
        border-right: 1px solid var(--stroke);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 16px 0 40px rgba(0,0,0,.35);
        z-index: 1050;
        transform: translateX(-100%);
        transition: transform .3s ease;
    }
    .sidebar.open { transform: translateX(0); }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 18px;
        border-bottom: 1px solid var(--stroke);
    }
    .sidebar-title { font-weight: 700; color: var(--text); }
    .sidebar-close { background: transparent; color: var(--text); border: none; cursor: pointer; }

    .sidebar-nav { padding: 12px; }
    .sidebar-nav a {
        display: block;
        color: var(--text);
        text-decoration: none;
        padding: 12px 14px;
        margin: 6px 0;
        border: 1px solid var(--stroke);
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        transition: background .2s ease, border-color .2s ease, transform .15s ease;
    }
    .sidebar-nav a i { margin-left: 10px; opacity: .9; }
    .sidebar-nav a:hover { background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.25); transform: translateX(4px); }
    .sidebar-nav a::before {
        content: "";
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg, rgba(75,108,183,.35), rgba(24,40,72,.35));
        filter: blur(14px);
        opacity: 0;
        transition: opacity .2s ease;
        z-index: -1;
    }
    .sidebar-nav a:hover::before { opacity: 1; }
    .sidebar-nav a.active { background: linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,.06)); border-color: rgba(255,255,255,.35); }

    @media (min-width: 1024px) {
        body.sidebar-pinned .container { margin-left: 260px; }
        body.sidebar-pinned .sidebar { transform: translateX(0); }
        .sidebar-toggle { left: 280px; }
    }

</style>

<script>
    (function(){
        const sidebar = document.getElementById('adminSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');
        if (!sidebar || !sidebarToggle) return;

        function openSidebar(){ sidebar.classList.add('open'); }
        function closeSidebar(){ sidebar.classList.remove('open'); }

        sidebarToggle.addEventListener('click', function(){
            if (window.matchMedia('(min-width: 1024px)').matches) {
                document.body.classList.toggle('sidebar-pinned');
            } else {
                openSidebar();
            }
        });
        sidebarClose && sidebarClose.addEventListener('click', closeSidebar);
        sidebar.addEventListener('click', function(e){
            if (e.target === sidebar && !window.matchMedia('(min-width: 1024px)').matches) closeSidebar();
        });
    })();
</script>

