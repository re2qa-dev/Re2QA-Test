<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * reCaptcha File Config
 *
 * File     : recaptcha.php
 * Created  : May 14, 2013 | 4:22:40 PM
 * 
 * Author   : Andi Irwandi Langgara <irwandi@ourbluecode.com>
 */

$config['public_key']   = RECAPTCHA_PUBLIC_KEY;
$config['private_key']  = RECAPTCHA_PRIVATE_KEY;
// Set Recaptcha theme, default red (red/white/blackglass/clean)
$config['recaptcha_theme']  = RECAPTCHA_THEME;

?>
