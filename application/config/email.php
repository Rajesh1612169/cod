<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'ukprm25.fastcpanelserver.com', 
    'smtp_port' => 465,
    'smtp_user' => 'info@parcelmaster.pk',
    'smtp_pass' => 'ParcelMaster2020',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '8', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => FALSE
);