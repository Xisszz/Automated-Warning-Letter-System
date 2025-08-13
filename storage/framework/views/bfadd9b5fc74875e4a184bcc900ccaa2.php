<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title mb-0">
                    Kehadiran: <?php echo e($murid->nama_murid); ?>

                </h4>
                <small class="text-muted">
                    Kelas: <?php echo e(optional($murid->bahagian)->nama_bahagian ?? 'Tiada Kelas'); ?>

                </small>
            </div>
            <a href="<?php echo e(route('kehadiran.index')); ?>" class="btn btn-secondary">
                ← Senarai Kehadiran
            </a>
        </div>

        <div class="card-body">
            <?php if($murid->kehadiran->isNotEmpty()): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tarikh</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $murid->kehadiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i + 1); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($record->date)->format('d-m-Y')); ?></td>
                                <td><?php echo e(ucfirst($record->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-muted">
                    Tiada rekod kehadiran untuk murid ini.
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/kehadiran/show.blade.php ENDPATH**/ ?>