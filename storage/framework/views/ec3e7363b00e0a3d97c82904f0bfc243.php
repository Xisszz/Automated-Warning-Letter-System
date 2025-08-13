<div>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="home">
                    <img src="<?php echo e(asset('template/dist')); ?>/assets/images/Skss1.png" alt="img"
                        style="width: 50px; height: auto; display: block; margin-left: auto; margin-right: auto;">
                </a>
                <a href="<?php echo e(route('home')); ?>" class="b-brand text-dark">
                    <span>Kehadiran Pengurusan Sekolah Kebangsaan Sungai Sireh</span>
                </a>

            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">

                    <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Laman Utama','icon' => 'ti ti-dashboard','route' => 'home'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                    <?php if(Auth::user()->role_id == 1): ?>
                        <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Data Users','icon' => 'ti ti-users','route' => 'users.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Data Guru','icon' => 'fa fa-users','route' => 'guru.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Daftar Kelas','icon' => 'ti ti-bell','route' => 'bahagian.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                    <?php endif; ?>


                    <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Data Murid','icon' => 'ti ti-users','route' => 'murid.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Kehadiran','icon' => 'fa	fa-calendar','route' => 'kehadiran.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal172496ec5aeb43ca436a29fd40646879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal172496ec5aeb43ca436a29fd40646879 = $attributes; } ?>
<?php $component = App\View\Components\Sidebar\Links::resolve(['title' => 'Surat Amaran','icon' => 'fa	fa-envelope','route' => 'warning_letters.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar.links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Sidebar\Links::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $attributes = $__attributesOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__attributesOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal172496ec5aeb43ca436a29fd40646879)): ?>
<?php $component = $__componentOriginal172496ec5aeb43ca436a29fd40646879; ?>
<?php unset($__componentOriginal172496ec5aeb43ca436a29fd40646879); ?>
<?php endif; ?>




                </ul>
            </div>
        </div>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/components/sidebar.blade.php ENDPATH**/ ?>