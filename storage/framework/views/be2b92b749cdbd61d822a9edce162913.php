<?php $__env->startSection('title', 'Dashboard Admin - OREEN'); ?>
<?php $__env->startSection('page-title', 'Dashboard Admin'); ?>
<?php $__env->startSection('page-desc', 'Selamat datang kembali, ' . auth()->user()->name); ?>

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
        <div class="stat-card">
            <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
            <div>
                <h3><?php echo e($pendingBookings ?? 0); ?></h3>
                <p>Booking Pending</p>
            </div>
        </div>
    </div>

    <!-- RECENT USERS -->
    <div class="section-card">
        <h3><i class="fas fa-users" style="color:#e53935;margin-right:8px"></i> Pengguna Terbaru</h3>
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
                    <?php $__empty_1 = true; $__currentLoopData = $recentUsers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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

    <!-- QUICK LINKS -->
    <div class="section-card">
        <h3><i class="fas fa-bolt" style="color:#e53935;margin-right:8px"></i> Aksi Cepat</h3>
        <div style="display:flex;flex-wrap:wrap;gap:10px">
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#e53935;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-plus"></i> Tambah Mobil
            </a>
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#1a1a2e;color:#fff;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif">
                <i class="fas fa-search"></i> Lihat Booking
            </a>
            <a href="#" onclick="event.preventDefault()" style="display:inline-flex;align-items:center;gap:8px;background:#f5f5f5;color:#333;padding:10px 22px;border-radius:50px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.3s;font-family:'Poppins',sans-serif;border:1px solid #e0e0e0">
                <i class="fas fa-file-export"></i> Export Laporan
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>