<?php
/*
Plugin Name: Phonegap Connect
Description: Connection Phonegap App with your Wordpress CMS, Fast and easy Download library connect from  <a href="https://github.com/DanielRiera/phonegap-wordpress" target="_blank">here</a>
Author: <a href="http://www.danielriera.net" target="_blank">Daniel Riera</a>
Version: 3.1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;
$dir = dirname( __FILE__ );
@include_once "$dir/ajax.php";
@include_once "$dir/api.php";
function phonegapDanielRiera_init() {
  $phonegapDanielRiera_instance = phonegapDanielRiera_Admin::get_instance();
}
function phonegapDanielRiera_assets() {
	//wp_register_style( 'img_estilos', plugins_url('phonegap-connect/css/estilo.css'));
	//wp_enqueue_style( 'img_estilos' );	
}
function phonegapDanielRiera_activation() {
  
}
function phonegapDanielRiera_deactivation() {
  	
}


function phonegapDanielRiera_panel_opciones(){
$opciones = get_option('phonegapDanielRiera_opciones',$valores_default);
register_setting( 'phonegapDanielRiera_opciones_connect', 'phonegapDanielRiera_comentarios', 'phonegapDanielRiera_validar' );



add_menu_page(
'Opciones - Phonegap',
'Phonegap',

'administrator',

'phonegap',

'phonegapDanielRiera_opciones_panel',

plugins_url( 'phonegap-connect/img/icon.png' )
);

}

function phonegapDanielRiera_opciones_panel(){
echo "
<h1>Phonegap Plugin</h1>
<p>Configuración Básica</p>";
echo '<div class="phonegapDanielRieraPaypalDiv" style="background-color: rgba(0,0,255,0.1);padding: 15px;border-radius: 10px;width: 56%;">
<h2>Le falta algo?</h2>
<p>Sigueme en Twitter, <a href="https://www.twitter.com/DanyRiera_">@DanyRiera_</a> donde podrás pedir nuevas funcionalidades de este plugin, si te ha ayudado puedes hacer una aportación por pequeña que sea a través de PayPal y contribuirás al desarrollo :) </p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E453H4H5H4XM2">
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal, la forma rápida y segura de pagar en Internet.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
</form>

</div>';
	if(current_user_can('activate_plugins')==1) {
		/****
		Check if the user have access
		***/
 		if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
				$referer = $_POST['_wp_http_referer'];
				$checkReferer = check_admin_referer('salvaropciones','nonce');
				if($checkReferer and wp_verify_nonce($_POST['nonce'], $_POST['action'])) {
					update_option('phonegapDanielRiera_categoriasShow',implode(",",array_filter($_POST['post_category'])));
					update_option('phonegapDanielRiera_mostrar_comentarios',intval($_POST['comentarios']));
					echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div><div class='notice notice-info' style='padding: 10px'>Recuerda que tienes que ir a Ajustes/Enlaces permanentes y pulsar en Guardar ( No es necesario modificar nada en esa página ) simplemente hacer clic en Guardar</div> ");
				}
        	
    	}
	}else{
	die("No tiene permisos para acceder a este espacio");	
	}
	
 
    ?>
<style>
table tr td {
	padding:10px; 
 }
.nota {
	color:#666;
	font-size:10px;	 
}
li {
	list-style:none;
}
 </style>
 <div>
 <?php
 	
 	function phonegapDanielRiera_generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
 if(!get_option('phonegapDanielRiera_token')) {
	 $token = phonegapDanielRiera_generateRandomString(50);
	 update_option('phonegapDanielRiera_token', $token);
 }else{
	$token = get_option('phonegapDanielRiera_token');
 }
 ?>
    <form method='post'>
    <?php
    	wp_nonce_field('salvaropciones','nonce');
	?>
        <input type='hidden' name='action' value='salvaropciones'>
        <table width="1355">
        <tr>
                <td width="337">
                    Token Generado
                    <div class="nota">Este es el token de acceso para su aplicación Phonegap</div>
                </td>
                <td width="468">
               	<?= esc_html($token)?>                   
                </td>
                <td width="534" rowspan="5" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td>
                  Mostrar comentarios
                  <div class="nota">Mostrar los comentarios de los post, esto afecta tanto al listado de post en categoria como en la presentación del artículo.</div>
                </td>
                <td>
                   <input type='checkbox' name='comentarios' id='comentarios' value='1' <?php checked(1== get_option('phonegapDanielRiera_mostrar_comentarios'));?> />
                </td>
            </tr>
             <tr>
              <td>Categorias en phonegapDanielRiera
              <div class="nota">Selecciona las categorias que quieres mostrar en la aplicación</div>
              <div class="nota" style="font-weight:bolder">Si ninguna es seleccionada se utilizarán todas</div>
              </td>
              <td>
              <?php 
			  	if(get_option('phonegapDanielRiera_categoriasShow')!= NULL || get_option('phonegapDanielRiera_categoriasShow') !="") {
					$catSelect = explode(",",get_option('phonegapDanielRiera_categoriasShow'));
				}else{
					$catSelect = "";
				}
			  wp_category_checklist( 0, 0, $catSelect )?>
              </td>
            </tr>
            <tr>
                <td colspan='3'>
                    <input type='submit' value='Enviar'>
                </td>
            </tr>
        </table>
    </form></div>
	<?php echo "";
}
add_action('admin_menu', 'phonegapDanielRiera_panel_opciones');
add_action( 'plugins_loaded', 'phonegapDanielRiera_init' );
register_activation_hook( "$dir/plugin.php", 'phonegapDanielRiera_activation' );
register_deactivation_hook( "$dir/plugin.php", 'phonegapDanielRiera_deactivation' );
//add_action( 'wp_enqueue_scripts','phonegapDanielRiera_assets');
