<?php $__env->startSection('title', isset($car) ? 'Edit Mobil - RennMobil' : 'Tambah Mobil - RennMobil'); ?>
<?php $__env->startSection('page-title', isset($car) ? 'Edit Mobil' : 'Tambah Mobil'); ?>
<?php $__env->startSection('page-desc', isset($car) ? 'Perbarui data mobil ' . $car->name : 'Tambahkan unit mobil baru'); ?>

<?php $__env->startSection('content'); ?>

    <div style="max-width:600px">
        <div class="section-card">
            <form method="POST" action="<?php echo e(isset($car) ? route('admin.cars.update', $car->id) : route('admin.cars.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($car)): ?>
                <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div style="margin-bottom:18px">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Nama Mobil</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $car->name ?? '')); ?>" required style="width:100%;padding:12px 16px;border-radius:12px;border:1px solid #e0e0e0;outline:none;font-size:0.9rem;font-family:'Poppins',sans-serif;transition:border 0.3s" onfocus="this.style.borderColor='#e53935'" onblur="this.style.borderColor='#e0e0e0'">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div style="margin-bottom:18px">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Deskripsi</label>
                    <textarea name="description" required rows="3" style="width:100%;padding:12px 16px;border-radius:12px;border:1px solid #e0e0e0;outline:none;font-size:0.9rem;font-family:'Poppins',sans-serif;resize:vertical;transition:border 0.3s" onfocus="this.style.borderColor='#e53935'" onblur="this.style.borderColor='#e0e0e0'"><?php echo e(old('description', $car->description ?? '')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:18px">
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Harga per Hari (Rp)</label>
                        <input type="number" name="price" value="<?php echo e(old('price', $car->price ?? '')); ?>" required min="0" style="width:100%;padding:12px 16px;border-radius:12px;border:1px solid #e0e0e0;outline:none;font-size:0.9rem;font-family:'Poppins',sans-serif;transition:border 0.3s" onfocus="this.style.borderColor='#e53935'" onblur="this.style.borderColor='#e0e0e0'">
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Jumlah Kursi</label>
                        <input type="number" name="seats" value="<?php echo e(old('seats', $car->seats ?? '7')); ?>" required min="1" max="20" style="width:100%;padding:12px 16px;border-radius:12px;border:1px solid #e0e0e0;outline:none;font-size:0.9rem;font-family:'Poppins',sans-serif;transition:border 0.3s" onfocus="this.style.borderColor='#e53935'" onblur="this.style.borderColor='#e0e0e0'">
                        <?php $__errorArgs = ['seats'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="margin-bottom:18px">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Transmisi</label>
                    <select name="transmission" style="width:100%;padding:12px 16px;border-radius:12px;border:1px solid #e0e0e0;outline:none;font-size:0.9rem;font-family:'Poppins',sans-serif;cursor:pointer;transition:border 0.3s;background:#fff" onfocus="this.style.borderColor='#e53935'" onblur="this.style.borderColor='#e0e0e0'">
                        <option value="Manual" <?php echo e(old('transmission', $car->transmission ?? '') == 'Manual' ? 'selected' : ''); ?>>Manual</option>
                        <option value="Automatic" <?php echo e(old('transmission', $car->transmission ?? '') == 'Automatic' ? 'selected' : ''); ?>>Automatic</option>
                    </select>
                    <?php $__errorArgs = ['transmission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div style="margin-bottom:18px">
                    <label style="display:block;font-size:0.8rem;font-weight:600;color:#555;margin-bottom:6px">Gambar Mobil</label>
                    <?php if(isset($car) && $car->image): ?>
                    <div style="margin-bottom:10px">
                        <img src="<?php echo e(asset('images/' . $car->image)); ?>" alt="<?php echo e($car->name); ?>" style="width:120px;height:80px;object-fit:cover;border-radius:10px;border:1px solid #f0f0f0">
                        <p style="font-size:0.7rem;color:#999;margin-top:4px">Gambar saat ini. Upload gambar baru untuk mengganti.</p>
                    </div>
                    <?php endif; ?>
                    <input type="file" name="image" accept="image/*" <?php echo e(isset($car) ? '' : 'required'); ?> style="width:100%;padding:10px;border-radius:12px;border:1px solid #e0e0e0;font-size:0.85rem;font-family:'Poppins',sans-serif;cursor:pointer">
                    <p style="font-size:0.7rem;color:#999;margin-top:4px">Format: JPG, JPEG, PNG. Maks: 2MB</p>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color:#ef4444;font-size:0.75rem;margin-top:4px"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div style="display:flex;gap:12px;padding-top:8px">
                    <button type="submit" style="flex:1;background:#e53935;color:#fff;border:none;padding:12px;border-radius:12px;font-size:0.9rem;font-weight:600;font-family:'Poppins',sans-serif;cursor:pointer;transition:background 0.3s" onmouseover="this.style.background='#b71c1c'" onmouseout="this.style.background='#e53935'">
                        <i class="fas fa-save"></i> <?php echo e(isset($car) ? 'Simpan Perubahan' : 'Tambah Mobil'); ?>

                    </button>
                    <a href="<?php echo e(route('admin.cars')); ?>" style="flex:0.4;background:#f5f5f5;color:#555;border:none;padding:12px;border-radius:12px;font-size:0.9rem;font-weight:600;font-family:'Poppins',sans-serif;text-decoration:none;text-align:center;transition:background 0.3s" onmouseover="this.style.background='#e0e0e0'" onmouseout="this.style.background='#f5f5f5'">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Nicol-laravel\rentallll\resources\views/admin/cars-form.blade.php ENDPATH**/ ?>