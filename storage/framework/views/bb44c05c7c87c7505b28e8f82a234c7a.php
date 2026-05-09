<?php $__env->startSection('title', 'Super Admin - OREEN'); ?>
<?php $__env->startSection('page-title', 'Super Admin Dashboard'); ?>
<?php $__env->startSection('page-desc', 'Panel kontrol penuh, ' . auth()->user()->name); ?>

<?php $__env->startSection('content'); ?>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon red"><i class="fas fa-users"></i></div>
            <div>
                <h3><?php echo e($totalUsers ?? 0); ?></h3>
                <p>Total Pengguna</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon orange"><i class="fas fa-user-shield"></i></div>
            <div>
                <h3><?php echo e($totalAdmins ?? 0); ?></h3>
                <p>Total Admin</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-car"></i></div>
            <div>
                <h3><?php echo e($totalCars ?? 0); ?></h3>
                <p>Total Mobil</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-calendar-check"></i></div>
            <div>
                <h3><?php echo e($totalBookings ?? 0); ?></h3>
                <p>Total Booking</p>
            </div>
        </div>
    </div>

    <!-- ALL USERS -->
    <div class="section-card">
        <h3><i class="fas fa-users" style="color:#e53935;margin-right:8px"></i> Semua Pengguna</h3>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $allUsers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong><?php echo e($user->name); ?></strong></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php if($user->role === 'super_admin'): ?>
                                <span class="badge badge-super">Super Admin</span>
                            <?php elseif($user->role === 'admin'): ?>
                                <span class="badge badge-admin">Admin</span>
                            <?php else: ?>
                                <span class="badge badge-customer">Customer</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->created_at->format('d M Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" style="text-align:center;padding:30px;color:#999">Belum ada pengguna terdaftar</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADMIN LIST -->
    <div class="section-card">
        <h3><i class="fas fa-user-shield" style="color:#e53935;margin-right:8px"></i> Daftar Admin</h3>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $adminUsers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong><?php echo e($admin->name); ?></strong></td>
                        <td><?php echo e($admin->email); ?></td>
                        <td>
                            <?php if($admin->role === 'super_admin'): ?>
                                <span class="badge badge-super">Super Admin</span>
                            <?php else: ?>
                                <span class="badge badge-admin">Admin</span>
                            <?php endif; ?>
                        </td>
                        <td>Full Access</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" style="text-align:center;padding:30px;color:#999">Belum ada admin</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- QUICK ACTIONS -->
    <div class="section-card">
        <h3><i class="fas fa-bolt" style="color:#e53935;margin-right:8px"></i> Aksi Cepat</h3>
        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#e53935;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-plus"></i> Tambah Mobil
            </a>
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#f97316;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-user-plus"></i> Tambah Admin
            </a>
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#1a1a2e;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-cog"></i> Pengaturan Sistem
            </a>
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#f5f5f5;color:#333;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif;border:1px solid #e0e0e0">
                <i class="fas fa-file-export"></i> Export Laporan
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/admin/super-dashboard.blade.php ENDPATH**/ ?>