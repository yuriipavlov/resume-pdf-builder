<?php

use ResumePDFBuilder\Config;
use ResumePDFBuilder\Resume;
use Mpdf\MpdfException;

const APP_DIR      = __DIR__;
const OUTPUT_DIR   = '/srv/output';
const TEMPLATE_DIR = APP_DIR . '/src/templates';

require_once APP_DIR . '/vendor/autoload.php';


foreach ( Config::resumeTypes() as $resumeType ) {
    $Resume = new Resume( $resumeType );
    
    try {
        $Resume->generatePDF();
    } catch ( MpdfException $e ) {
        echo $e->getMessage();
    }
}

