<?php $__env->startSection('content'); ?>
    <!-- Stats Section -->
    <div class="card bg-white mb-4">
        <div class="card-body" style="min-height: 120px;">
            <div class="row text-center h-100">
                <div class="col d-flex flex-column justify-content-center align-items-center border-end">
                    <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                    <h2><?php echo e($guruCount); ?></h2>
                    <p class="mb-0">Jumlah Guru</p>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-center border-end">
                    <i class="fas fa-user-graduate fa-2x mb-2"></i>
                    <h2><?php echo e($muridCount); ?></h2>
                    <p class="mb-0">Jumlah Murid</p>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <i class="fas fa-envelope-open-text fa-2x mb-2"></i>
                    <h2><?php echo e($warningCount); ?></h2>
                    <p class="mb-0">Surat Amaran</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Laman Utama</h4>
        </div>
        <div class="card-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <?php echo e(__('Selamat Datang!')); ?>

        </div>
        <div class="text-center mb-4">
            <img src="<?php echo e(asset('template/dist/assets/images/Skss1.png')); ?>" alt="Logo" class="img-fluid mx-auto d-block"
                style="max-width: 150px;">
        </div>

        <div class="text-center">
            <img src="<?php echo e(asset('template/dist/assets/images/bangunan.png')); ?>" alt="Bangunan"
                class="img-fluid mx-auto d-block rounded" style="max-width: 700px; border: 5px solid #000;">
        </div>

        <br>
        <div>
            <h2>Sejarah Sekolah Kebangsaan Sungai Sireh (SKSS)</h2>
            <p style="text-align: justify; font-size: 18px; ">Sekolah Kebangsaan Sungai Sireh, yang asalnya
                dikenali sebagai Sekolah Rakyat Sungai Sireh,
                dibina secara gotong-royong oleh penduduk Kampung Sungai Sireh pada tahun 1949. Sekolah ini
                dimulakan oleh Ketua Kampung Tuan Haji Abdul Hamed bin Abdul Manan dan terletak di Ban Pakat,
                Ban 2. Sebahagian besar struktur sekolah menggunakan kayu nibung untuk tiang dan lantai, dengan
                atap nipah dan dinding serta perabot dari kayu mahang. Pada awalnya, sekolah ini mempunyai
                seorang guru dan 38 murid.
                <br><br>
                Dengan peningkatan bilangan murid, pada tahun 1951, sebuah sekolah baru dibina oleh kerajaan
                yang dikenali sebagai Sekolah Melayu Sungai Sireh. Sekolah ini menggunakan bahan yang lebih
                baik, seperti kayu merbau untuk tiang, atap zink, dan dinding separuh papan. Pada tahun pertama
                pembukaannya, sekolah ini mempunyai 4 orang guru dan 78 orang murid.
                <br><br>
                Pada tahun 1969, sekolah ini digantikan dengan Sekolah Kebangsaan Sungai Sireh yang lebih besar
                dan moden, berupa bangunan batu dua tingkat dengan 10 bilik darjah, pejabat, bilik guru besar,
                tandas, stor, dan kantin. Sekolah ini telah dirasmikan pada 3 November 1973 oleh YB Dato' Haji
                Muhamad bin Yaakob, Menteri Pelajaran ketika itu.
                <br><br>
                Dengan jumlah pelajar yang semakin meningkat, pada 1979, sebuah bangunan tambahan dua tingkat
                dibina yang mengandungi lima bilik darjah, perpustakaan, surau, dan tiga stor, yang digunakan
                pada tahun 1980. Pada tahun 1989, Sekolah Kebangsaan Sungai Sireh berjaya meraih Johan dalam
                Pertandingan Pusat Sumber Daerah Kuala Selangor dan membina Pusat Sumber pada 1990. Pada tahun
                1996, sebuah surau dibina untuk tujuan Penilaian Asas Fardhu Ain (PAFA), menggunakan kayu
                terpakai dari Surau Lorong 6 yang dirobohkan.
                <br><br>
                Sekolah ini terus berkembang dengan pembinaan bangunan tambahan pada 1998 yang menempatkan 6
                bilik darjah, makmal Sains, stor, dan tandas murid. Pada tahun 2001, sebuah bangunan segera
                dibina untuk Kelas Pendidikan Khas dan Pra Sekolah, serta makmal komputer yang mula digunakan
                pada tahun 2002. Kemudahan rumah guru yang lengkap dengan peralatan moden dibina pada 2001 dan
                siap sepenuhnya pada 2003.
                <br><br>
                Sekolah Kebangsaan Sungai Sireh telah melalui banyak fasa pembangunan dan pembesaran untuk
                memenuhi keperluan penduduk yang semakin meningkat. Kini, sekolah ini terus berusaha untuk
                mewujudkan suasana pengajaran dan pembelajaran yang kondusif bagi melahirkan pelajar yang
                cemerlang dalam semua aspek, menggabungkan nilai-nilai moral dan akhlak mulia dengan kemajuan
                teknologi untuk mencapai kecemerlangan dalam agama, bangsa, dan negara.
                <br><br>
                Sekolah ini menekankan kepentingan ketekunan, kegigihan, dan usaha keras dalam memastikan
                kejayaan yang cemerlang, gemilang, dan terbilang untuk pelajar dan seluruh warga sekolah.
            </p>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mantis', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/home.blade.php ENDPATH**/ ?>