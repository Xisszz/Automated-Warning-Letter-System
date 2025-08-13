<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Data Guru</h4>
                <div>
                    <a href="<?php echo e(route('guru.create')); ?>" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No.Telefon</th>
                            <th>Id Guru</th>
                            <th>Gambar Guru</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($item->nama_guru); ?></td>
                                <td><?php echo e($item->bahagian?->nama_bahagian); ?></td>
                                <td><?php echo e($item->user ? $item->user->email : 'No email available'); ?></td>
                                <td><?php echo e($item->alamat); ?></td>
                                <td><?php echo e($item->no_telefon); ?></td>
                                <td><?php echo e($item->id_guru); ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalGambar<?php echo e($item->id); ?>">
                                        Lihat Gambar
                                    </button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Tindakan
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('guru.edit', $item->id)); ?>">Ubah
                                                    suai</a>
                                            </li>
                                            <li>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal"
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
    </div>


    <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal -->
        <div class="modal fade" id="confirmDeleteModal<?php echo e($item->id); ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Anda yakin mahu padam data ini?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Data anda telah dipadamkan secara kekal, Tekan <b>Teruskan</b> untuk memadam data</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form action="<?php echo e(route('guru.destroy', $item->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Teruskan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal -->
        <div class="modal fade" id="modalGambar<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Guru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo e(asset('storage/gambar_guru/' . $item->gambar)); ?>" alt="<?php echo e($item->gambar); ?>"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/guru/index.blade.php ENDPATH**/ ?>