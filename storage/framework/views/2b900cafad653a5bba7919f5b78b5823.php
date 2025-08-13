<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Tambah Kelas Baru</h4>
            <a href="<?php echo e(route('bahagian.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('bahagian.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="nama_bahagian">Nama Kelas</label>
                    <input type="text" name="nama_bahagian" id="nama_bahagian"
                        class="form-control <?php $__errorArgs = ['nama_bahagian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama_bahagian')); ?>"
                        placeholder="Masukkan nama kelas" required>
                    <?php $__errorArgs = ['nama_bahagian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Kelas</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/bahagian/create.blade.php ENDPATH**/ ?>