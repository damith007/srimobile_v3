<?php

function miscGzHandler($buf) {
    $zipRatio = 5;
    $zipDebug = 1;

    if(empty($buf) || !function_exists('gzcompress') || !isset($_SERVER['HTTP_ACCEPT_ENCODING'])) return $buf;
    $enc_ar = explode(',', $_SERVER['HTTP_ACCEPT_ENCODING']);
    $mayZip = false; $encoding = '';
    foreach($enc_ar as $enc) {
        $enc = trim($enc);
        if('gzip' == $enc || 'x-gzip' == $enc) {
            $mayZip = true;
            $encoding = $enc;
            break;
        }
    }
    if(!$mayZip) return $buf;

    $bufZiped = gzcompress($buf, $zipRatio);
    $bufZiped = pack('cccccccc',0x1f,0x8b,0x08,0x00,0x00,0x00,0x00,0x00)
        .substr($bufZiped, 0, -4)
        .pack('V',crc32($buf))
        .pack('V',strlen($buf));
    header('Content-encoding: '.$encoding);
    header('Content-length: '.strlen($bufZiped));
    return $bufZiped;
}

ob_start('miscGzHandler');


?>