<?php

function lp_qrcode_data_uri($text) {
    $path = tempnam(sys_get_temp_dir(), 'qrcode_');
    QRCode::png($text, $path);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    unlink($path);
    return($base64);
}
