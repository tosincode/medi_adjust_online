<?php

function EWD_UASP_add_ob_start() {
    ob_start();
}
add_action('init', 'EWD_UASP_add_ob_start', 1);

function EWD_UASP_flush_ob_end() {
    ob_end_flush();
}
add_action('wp_footer', 'EWD_UASP_flush_ob_end');

?>