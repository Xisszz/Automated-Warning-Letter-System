<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Amaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
        }

        .header,
        .footer {
            text-align: center;
        }

        .footer {
            font-size: 10px;
            color: #777;
            position: fixed;
            bottom: 20px;
            width: 100%;
        }

        .content {
            margin-top: 20px;
            text-align: left;
        }

        .letter-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .letter-header h2 {
            margin: 0;
        }

        .letter-header p {
            margin: 5px;
            font-weight: normal;
            font-size: 14px;
        }

        .letter-body {
            margin-top: 30px;
            line-height: 1.6;
        }

        .letter-body p {
            font-size: 14px;
        }

        .letter-body .subject {
            font-weight: bold;
            text-decoration: underline;
        }

        .letter-body .warning-content {
            margin-top: 10px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
            font-size: 14px;
            margin-right: 40px;
        }

        .signature .position {
            margin-top: 20px;
            font-size: 12px;
        }

        .info {
            font-size: 12px;
            margin-top: 10px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="header">
        <p><strong>Sekolah Kebangsaan Sungai Sireh</strong></p>
        <p>Alamat: Jalan Sungai Sireh, 45400, Negeri Selangor</p>
        <p>Telefon: (03) 1234-5678 | Email: sksungaisireh@email.com</p>
        <hr>
    </div>

    <div class="letter-header">
        <h2><strong>Surat Amaran</strong></h2>
        <p>Tarikh Dikeluarkan: <?php echo e($letter->issued_date); ?></p>
    </div>

    <div class="content">
        <p><strong>Kepada:</strong> <?php echo e($letter->murid ? $letter->murid->nama_murid : 'Tiada Nama Pelajar'); ?></p>
        <p><strong>Kelas:</strong> <?php echo e(optional($letter->murid->bahagian)->nama_bahagian ?? '—'); ?></p>

        <div class="letter-body">
            <p class="subject">Perkara: Surat Amaran untuk Tingkah Laku Tidak Terkawal</p>

            <p class="warning-content">
                Yang Dikasihi <?php echo e($letter->murid ? $letter->murid->nama_murid : 'Pelajar'); ?>,

                <br><br>
                Surat ini dikeluarkan sebagai amaran rasmi berkaitan dengan tingkah laku yang tidak terkawal yang telah
                anda tunjukkan pada <?php echo e($letter->issued_date); ?>. Pihak sekolah sentiasa berusaha untuk mengekalkan
                persekitaran yang berdisiplin dan penuh hormat, dan tingkah laku anda bertentangan dengan jangkaan kami.

                <br><br>
                <strong>Butiran Kejadian:</strong><br>
                <?php echo e($letter->letter_content); ?>


                <br><br>
                Harap maklum bahawa sebarang pelanggaran yang lebih lanjut mungkin akan mengakibatkan tindakan disiplin
                yang lebih tegas, termasuk digantung atau dibuang sekolah. Kami menasihatkan anda untuk mengambil
                perkara ini dengan serius dan membuat penambahbaikan untuk mengelakkan tindakan lanjut.

                <br><br>
                Kami berharap anda dapat mengambil iktibar daripada kejadian ini dan meningkatkan tingkah laku anda pada
                masa hadapan. Sekiranya anda ingin membincangkan perkara ini dengan lebih lanjut, sila aturkan pertemuan
                dengan Pengetua sekolah.

                <br><br>
                Yang Benar,
            </p>

            <div class="signature">
                <p>Tuan Mohd Yusof bin Arshad</p>
                <p class="position">Pengetua</p>
            </div>
        </div>

        <div class="footer">
            <p>&copy; <?php echo e(date('Y')); ?> Sekolah Kebangsaan Sungai Sireh. Hak Cipta Terpelihara.</p>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/warning_letters/pdf.blade.php ENDPATH**/ ?>