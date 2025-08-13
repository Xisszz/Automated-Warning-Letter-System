<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Laporan Kehadiran – Semua Kelas</h4>
            <a href="<?php echo e(route('kehadiran.index')); ?>" class="btn btn-secondary">
                ← Kembali ke Senarai
            </a>
        </div>

        <div class="card-body">
            <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas => $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5 class="mt-4"><?php echo e($kelas); ?></h5>

                <?php if($records->isEmpty()): ?>
                    <p class="text-muted">Tiada rekod kehadiran untuk <?php echo e($kelas); ?>.</p>
                <?php else: ?>
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Murid</th>
                                <th>Tarikh</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i + 1); ?></td>
                                    <td><?php echo e($rec->murid->nama_murid); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($rec->date)->format('d-m-Y')); ?></td>
                                    <td><?php echo e(ucfirst($rec->status)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/kehadiran/report_all.blade.php ENDPATH**/ ?>