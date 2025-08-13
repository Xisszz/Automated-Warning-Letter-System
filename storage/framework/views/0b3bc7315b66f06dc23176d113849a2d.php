<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Senarai Kehadiran Murid</h4>


            <!-- Class Filter Form -->
            <form method="GET" action="<?php echo e(route('kehadiran.index')); ?>" class="mb-3">
                <label for="class_filter">Pilih Kelas:</label>
                <div class="input-group">
                    <select id="class_filter" name="class_filter" class="form-control">
                        <option value="">-- Semua Kelas --</option>
                        <?php $__currentLoopData = $availableClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kelas); ?>" <?php echo e($selectedClass == $kelas ? 'selected' : ''); ?>>
                                <?php echo e($kelas); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit" class="btn btn-secondary">Tapis</button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <?php if($murid->count() > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>Kelas</th>
                            <th>ID Murid</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $murid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($student->nama_murid); ?></td>
                                <td><?php echo e(optional($student->bahagian)->nama_bahagian ?? '-'); ?></td>
                                <td><?php echo e($student->id_murid); ?></td>
                                <td>
                                    <a href="<?php echo e(route('kehadiran.show', $student->id)); ?>" class="btn btn-sm btn-info">
                                        Lihat Kehadiran
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-muted text-center">Tiada murid ditemui untuk kelas ini.</p>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-center my-3">
            <!-- ✅ Rekod Baru Button -->
            <a href="<?php echo e(route('kehadiran.create')); ?>" class="btn btn-primary">
                + Rekod Kehadiran Baru
            </a>
        </div>
        <div class="text-center mt-4">
            <?php if($murid->isNotEmpty()): ?>
                <a href="<?php echo e(route('kehadiran.reportAll')); ?>" class="btn btn-info">
                    📊 Lihat Laporan Semua Kelas
                </a>
                <a href="<?php echo e(route('warning_letters.index')); ?>" class="btn btn-outline-dark">
                    Lihat Surat Amaran Bulan Ini
                </a>
            <?php else: ?>
                <p class="text-muted">Tiada murid dalam kelas ini.</p>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/kehadiran/index.blade.php ENDPATH**/ ?>