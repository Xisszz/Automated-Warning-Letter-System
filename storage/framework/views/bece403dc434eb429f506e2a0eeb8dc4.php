<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Murid</h4>
            <a href="<?php echo e(route('murid.create')); ?>" class="btn btn-primary">
                Tambah Murid Baru
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="table-murid">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No. Telefon</th>
                        <th>ID Murid</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $murid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($item->nama_murid); ?></td>
                            <td><?php echo e(optional($item->bahagian)->nama_bahagian ?? '-'); ?></td>
                            <td><?php echo e($item->alamat); ?></td>
                            <td><?php echo e($item->no_telefon); ?></td>
                            <td><?php echo e($item->id_murid); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                        id="actionMenu<?php echo e($item->id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tindakan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionMenu<?php echo e($item->id); ?>">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('murid.edit', $item->id)); ?>">
                                                Ubah suai
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal<?php echo e($item->id); ?>">
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

    
    <?php $__currentLoopData = $murid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="confirmDeleteModal<?php echo e($item->id); ?>" tabindex="-1"
            aria-labelledby="deleteModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?php echo e($item->id); ?>">
                            Padam Murid
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda pasti mahu memadam data murid <strong><?php echo e($item->nama_murid); ?></strong>? Tindakan ini tidak
                        boleh dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="<?php echo e(route('murid.destroy', $item->id)); ?>" method="POST" class="d-inline">
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

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/murid/index.blade.php ENDPATH**/ ?>