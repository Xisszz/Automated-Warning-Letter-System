<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Senarai Surat Amaran (Bulan Ini)</h4>
            <a href="<?php echo e(route('warning_letters.create')); ?>" class="btn btn-success">
                + Buat Surat Amaran Baru
            </a>
        </div>
        <div class="card-body">
            <?php if($letters->isEmpty()): ?>
                <p class="text-center">Tiada surat amaran dikeluarkan bulan ini.</p>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Murid</th>
                            <th>Kelas / Tahun</th>
                            <th>Tarikh Dikeluarkan</th>
                            <th>Kandungan Surat</th>
                            <th>Pilihan</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($letter->murid->nama_murid); ?></td>
                                <td><?php echo e(optional($letter->murid->bahagian)->nama_bahagian ?? '—'); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($letter->issued_date)->format('d/m/Y')); ?></td>
                                <td><?php echo e($letter->letter_content); ?></td>
                                <td>
                                    
                                    <a href="<?php echo e(route('warning_letters.downloadPdf', $letter->id)); ?>"
                                        class="btn btn-sm btn-danger" target="_blank">
                                        PDF
                                    </a>
                                    <br><br>
                                    <a href="<?php echo e(route('warning_letters.send', $letter->id)); ?>"
                                        class="btn btn-sm btn-primary">
                                        Hantar Email
                                    </a>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/warning_letters/index.blade.php ENDPATH**/ ?>