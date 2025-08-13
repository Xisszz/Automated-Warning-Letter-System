<?php

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

$transport = Transport::fromDsn($_ENV['MAILER_DSN']);
$mailer    = new Mailer($transport);

$email = (new Email())
    ->from($_ENV['FROM_ADDRESS'])
    ->to('parent@example.com')        // ← this is mandatory
    ->subject('Surat Amaran Kehadiran')
    ->text('Isi surat amaran…')
    // ->attach… etc.
;

$mailer->send($email);
