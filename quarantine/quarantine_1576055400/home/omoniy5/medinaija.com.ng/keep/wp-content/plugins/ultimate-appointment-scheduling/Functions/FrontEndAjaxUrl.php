<?php
function ewd_uasp_frontend_ajaxurl() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php
}
add_action('wp_head','ewd_uasp_frontend_ajaxurl');
?>