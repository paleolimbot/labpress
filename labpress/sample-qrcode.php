<?php

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'cwrs_qrcode_meta_boxes_setup' );
add_action( 'load-post-new.php', 'cwrs_qrcode_meta_boxes_setup' );
function cwrs_qrcode_meta_boxes_setup() {
    // add hook to display qrcode meta box
    add_action("add_meta_boxes", "cwrs_qrcode_meta_box");
}

function cwrs_qrcode_meta_box() {
    add_meta_box("cwrs-qrcode-meta-box", // div ID
                 "QR Code", // text title
                 "cwrs_qrcode_meta_box_markup", // callback function
                 "sample", // custom post type
                 "side", // context
                 "low"); // priority
}

function cwrs_qrcode_meta_box_markup($post) {
    require_once plugin_dir_path(__FILE__) . '/phpqrcode/qrlib.php';
    if(!empty($post->post_name)) {
        $text = "sample_id:" . $post->post_name;
        $uri = cwrs_qrcode_data_uri($text);
        echo '<img src="' . $uri . '"/>' ;
        echo '<p>' . $text . '</p>';
    } else {
        echo "<p>Publish sample to generate QRCode</p>" ;
    }
}

function cwrs_qrcode_data_uri($text) {
    $path = tempnam(sys_get_temp_dir(), 'qrcode_');
    QRCode::png($text, $path);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    unlink($path);
    return($base64);
}

