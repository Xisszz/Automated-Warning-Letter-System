
<?php $__env->startComponent('mail::message'); ?>
    # Surat Amaran Kehadiran

    **<?php echo new \Illuminate\Support\EncodedHtmlString($muridName); ?>**,
    Tarikh Dikeluarkan: <?php echo new \Illuminate\Support\EncodedHtmlString($letterDate); ?>


    <?php echo new \Illuminate\Support\EncodedHtmlString($letterContent); ?>


    Terima kasih,<br>
    Sekolah Kebangsaan Sungai Sireh
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\FYP1\school-attendance-system\resources\views/emails/warning_letter.blade.php ENDPATH**/ ?>