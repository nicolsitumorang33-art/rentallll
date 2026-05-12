<?php $__env->startSection('title', 'Kelola Pengguna - RennMobil'); ?>
<?php $__env->startSection('page-title', 'Kelola Pengguna'); ?>
<?php $__env->startSection('page-desc', 'Daftar semua pengguna RennMobil'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(session('success')): ?>
    <div style="background:#eafaee;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#166534">
        <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div style="background:#fff0f0;border:1px solid #fecaca;border-radius:12px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#dc2626">
        <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <div class="section-card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;padding-bottom:12px;border-bottom:1px solid #f0f0f0">
            <h3 style="margin:0;padding:0;border:none"><i class="fas fa-users" style="color:#e53935;margin-right:8px"></i> Semua Pengguna</h3>
            <span style="font-size:0.75rem;color:#999;background:#f5f5f5;padding:4px 14px;border-radius:50px"><?php echo e($users->count()); ?> total</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:34px;height:34px;border-radius:50%;background:#e53935;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.8rem;flex-shrink:0">
                                    <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                </div>
                                <div>
                                    <div style="font-weight:600;color:#333"><?php echo e($user->name); ?></div>
                                    <div style="font-size:0.7rem;color:#999"><?php echo e($user->email); ?></div>
                                </div>
                            </div>
                        </td>
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
                        <td>
                            <div style="display:flex;gap:6px;align-items:center">
                                <?php if(auth()->user()->isSuperAdmin() && $user->role !== 'super_admin'): ?>
                                <form method="POST" action="<?php echo e(route('admin.user.role', $user->id)); ?>" style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <select name="role" onchange="this.form.submit()" style="padding:5px 8px;border-radius:8px;border:1px solid #e0e0e0;font-size:0.75rem;font-family:'Poppins',sans-serif;background:#fff;cursor:pointer">
                                        <option value="customer" <?php echo e($user->role == 'customer' ? 'selected' : ''); ?>>Customer</option>
                                        <option value="admin" <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                        <option value="super_admin" <?php echo e($user->role == 'super_admin' ? 'selected' : ''); ?>>Super Admin</option>
                                    </select>
                                </form>
                                <?php endif; ?>
                                <?php if($user->id !== auth()->id() && !$user->isSuperAdmin()): ?>
                                <form method="POST" action="<?php echo e(route('admin.user.delete', $user->id)); ?>" style="display:inline" onsubmit="return confirm('Hapus pengguna <?php echo e($user->name); ?>?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;font-size:0.9rem;padding:5px" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:#999">Belum ada pengguna</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/admin/users.blade.php ENDPATH**/ ?>