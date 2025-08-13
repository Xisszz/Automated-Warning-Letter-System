<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Cipta Warning Letter</h4>
                <div>
                    <a href="<?php echo e(route('warning_letters.index')); ?>">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('warning_letters.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="murid_id">Murid</label>
                        <select name="murid_id" id="murid_id" class="form-control">
                            <?php $__currentLoopData = $murids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $murid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($murid->id); ?>"><?php echo e($murid->nama_murid); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="letter_content">Isi Kandungan Surat</label>
                        <textarea name="letter_content" id="letter_content" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="issued_date">Hari</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Cipta</button>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/warning_letters/create.blade.php ENDPATH**/ ?>