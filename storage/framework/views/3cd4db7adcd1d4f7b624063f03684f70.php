<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Rekod Kehadiran Murid</h4>

            
            <form method="GET" action="<?php echo e(route('kehadiran.create')); ?>" class="d-flex">
                <select name="class_filter" class="form-control me-2">
                    <option value="">-- Semua Kelas --</option>
                    <?php $__currentLoopData = $availableClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kelas); ?>" <?php echo e($selectedClass === $kelas ? 'selected' : ''); ?>>
                            <?php echo e($kelas); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-secondary">Tapis</button>
            </form>
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('kehadiran.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="mb-4">
                    <label for="date" class="form-label">Tarikh Kehadiran</label>
                    <input type="date" id="date" name="date"
                        class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                        value="<?php echo e(old('date', now()->toDateString())); ?>">
                    <?php $__errorArgs = ['date'];
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

                
                <?php if(empty($selectedClass)): ?>
                    <p class="text-center text-muted">Sila pilih kelas untuk memaparkan murid.</p>
                <?php else: ?>
                    <h5>Kelas: <?php echo e($selectedClass); ?></h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th>Nama Murid</th>
                                <th>Status</th>
                                <th>Alasan (jika Lain-lain)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $filtered = $murid->filter(
                                    fn($m) => optional($m->bahagian)->nama_bahagian === $selectedClass,
                                );
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($i + 1); ?></td>
                                    <td><?php echo e($student->nama_murid); ?></td>
                                    <td>
                                        <select name="status[<?php echo e($student->id); ?>]"
                                            class="form-control <?php $__errorArgs = ['status.' . $student->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            required>
                                            <option value="">-- Pilih Status --</option>
                                            <option value="present"
                                                <?php echo e(old('status.' . $student->id) == 'present' ? 'selected' : ''); ?>>
                                                Hadir
                                            </option>
                                            <option value="absent"
                                                <?php echo e(old('status.' . $student->id) == 'absent' ? 'selected' : ''); ?>>
                                                Tidak Hadir
                                            </option>
                                            <option value="late"
                                                <?php echo e(old('status.' . $student->id) == 'late' ? 'selected' : ''); ?>>
                                                Lewat
                                            </option>
                                            <option value="other"
                                                <?php echo e(old('status.' . $student->id) == 'other' ? 'selected' : ''); ?>>
                                                Lain-lain
                                            </option>
                                        </select>
                                        <?php $__errorArgs = ['status.' . $student->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </td>
                                    <td>
                                        <input type="text" name="status_custom[<?php echo e($student->id); ?>]"
                                            class="form-control <?php $__errorArgs = ['status_custom.' . $student->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Nyatakan alasan jika Lain-lain"
                                            value="<?php echo e(old('status_custom.' . $student->id)); ?>">
                                        <?php $__errorArgs = ['status_custom.' . $student->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Tiada murid ditemui untuk kelas ini.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Rekod Kehadiran</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/kehadiran/create.blade.php ENDPATH**/ ?>