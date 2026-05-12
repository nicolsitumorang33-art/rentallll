<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin - RennMobil'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #1a1a2e;
            color: rgba(255,255,255,0.7);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
            transition: all 0.3s;
        }
        .sidebar-brand {
            padding: 24px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-brand h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #e53935;
        }
        .sidebar-brand p {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.35);
            margin-top: 2px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .sidebar-nav {
            padding: 16px 12px;
            flex: 1;
            overflow-y: auto;
        }
        .sidebar-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.3);
            padding: 16px 12px 8px;
            font-weight: 600;
        }
        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s;
            margin-bottom: 2px;
        }
        .sidebar-item:hover {
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.9);
        }
        .sidebar-item.active {
            background: #e53935;
            color: #fff;
        }
        .sidebar-item i {
            width: 20px;
            text-align: center;
            font-size: 0.95rem;
        }
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-footer .sidebar-item {
            font-size: 0.8rem;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            background: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar-left h1 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a1a2e;
        }
        .topbar-left p {
            font-size: 0.75rem;
            color: #999;
            margin-top: 1px;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .topbar-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e53935;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .topbar-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
        }
        .topbar-role {
            font-size: 0.7rem;
            color: #999;
        }

        /* CONTENT */
        .content {
            padding: 24px 30px;
            flex: 1;
        }

        /* STATS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .stat-icon.red { background: #fff0f0; color: #e53935; }
        .stat-icon.blue { background: #eef3ff; color: #3b82f6; }
        .stat-icon.green { background: #eafaee; color: #22c55e; }
        .stat-icon.orange { background: #fef3e7; color: #f97316; }
        .stat-card h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1;
        }
        .stat-card p {
            font-size: 0.8rem;
            color: #999;
            margin-top: 4px;
        }

        /* SECTION CARD */
        .section-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 24px;
            margin-bottom: 24px;
        }
        .section-card h3 {
            font-size: 1rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f0f0f0;
        }

        /* TABLE */
        .table-wrap {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        table th {
            text-align: left;
            padding: 10px 14px;
            font-weight: 600;
            color: #999;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #f0f0f0;
        }
        table td {
            padding: 12px 14px;
            border-bottom: 1px solid #f5f5f5;
            color: #555;
        }
        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .badge-admin { background: #fef3e7; color: #f97316; }
        .badge-super { background: #fff0f0; color: #e53935; }
        .badge-customer { background: #eafaee; color: #22c55e; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .sidebar { width: 220px; transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .stats-grid { grid-template-columns: 1fr; }
            .content { padding: 16px; }
            .topbar { padding: 12px 16px; }
            .mobile-toggle { display: flex !important; }
        }
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #333;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h2>RennMobil</h2>
            <p>Admin Panel</p>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-label">Menu</div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <?php if(auth()->user()->isSuperAdmin()): ?>
            <a href="<?php echo e(route('admin.super')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.super') ? 'active' : ''); ?>">
                <i class="fas fa-crown"></i> Super Admin
            </a>
            <?php endif; ?>
            <div class="sidebar-label">Management</div>
            <a href="<?php echo e(route('admin.cars')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.cars') ? 'active' : ''); ?>">
                <i class="fas fa-car"></i> Mobil
            </a>
            <a href="<?php echo e(route('admin.bookings')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.bookings') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-check"></i> Booking
            </a>
            <a href="<?php echo e(route('admin.users')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.users') ? 'active' : ''); ?>">
                <i class="fas fa-users"></i> Pengguna
            </a>
            <a href="<?php echo e(route('admin.reports')); ?>" class="sidebar-item <?php echo e(request()->routeIs('admin.reports') ? 'active' : ''); ?>">
                <i class="fas fa-file-alt"></i> Laporan
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="<?php echo e(url('/')); ?>" class="sidebar-item">
                <i class="fas fa-arrow-left"></i> Ke Website
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="sidebar-item" style="width:100%;background:none;border:none;cursor:pointer;font-family:inherit;font-size:inherit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <!-- TOPBAR -->
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')">
                    <i class="fas fa-bars"></i>
                </button>
                <h1><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                <p><?php echo $__env->yieldContent('page-desc', 'Overview sistem'); ?></p>
            </div>
            <div class="topbar-right">
                <div class="topbar-user">
                    <div class="topbar-avatar"><?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?></div>
                    <div>
                        <div class="topbar-name"><?php echo e(auth()->user()->name); ?></div>
                        <div class="topbar-role"><?php echo e(ucfirst(str_replace('_', ' ', auth()->user()->role))); ?></div>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/layouts/admin.blade.php ENDPATH**/ ?>