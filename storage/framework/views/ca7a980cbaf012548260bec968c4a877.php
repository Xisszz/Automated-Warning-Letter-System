<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daftar Kelas</h4>
            <a href="<?php echo e(route('bahagian.create')); ?>" class="btn btn-primary">
                Tambah Kelas Baru
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="table-bahagian">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $bahagians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $bahagian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($bahagian->nama_bahagian); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenu<?php echo e($bahagian->id); ?>" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Tindakan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu<?php echo e($bahagian->id); ?>">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('bahagian.show', $bahagian->id)); ?>">
                                                Butiran
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal<?php echo e($bahagian->id); ?>">
                                                Padam
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>

    
    <?php $__currentLoopData = $bahagians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahagian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="confirmDeleteModal<?php echo e($bahagian->id); ?>" tabindex="-1"
            aria-labelledby="deleteModalLabel<?php echo e($bahagian->id); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?php echo e($bahagian->id); ?>">
                            Padam Kelas
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda pasti mahu memadam kelas <strong><?php echo e($bahagian->nama_bahagian); ?></strong>? Tindakan ini tidak
                        boleh dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="<?php echo e(route('bahagian.destroy', $bahagian->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">
                                Teruskan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/bahagian/index.blade.php ENDPATH**/ ?>