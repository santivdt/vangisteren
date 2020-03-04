<?php
session_start();
date_default_timezone_set('Europe/Amsterdam');
error_reporting(E_ALL);
ini_set('memory_limit','384M');

function p($a) { if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') { print_r($a); } else { echo '<pre style="font-size:10px"> '; print_r($a); echo '</pre>'; }} 
function e($s) { if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') { echo $s ."\n"; } else { echo '<pre>' .$s .'</pre>'; } } 
function log_msg($s) { $p = pathinfo(__FILE__); file_put_contents( $p['dirname'] .'/../../log.txt', date('Y:m:i H:i - ', time()) .$s ."\n", FILE_APPEND); }
function log_and_die($s) { log_msg($s);  die($s); }
function ends_width($haystack, $needle) { return $needle === "" || strpos($haystack, $needle, strlen($haystack) - strlen($needle)) !== FALSE; }

$path = pathinfo(__FILE__);
$base_dir = $path['dirname'] .'/';
$inc_dir = $base_dir .'inc/';

ini_set('include_path', ini_get('include_path'));

require_once $inc_dir .'StaticContentParser.php';
require_once $inc_dir .'Parsedown.php';
require_once $inc_dir .'ParsedownExtra.php';
require_once $inc_dir .'ParsedownExtraPlugin.php';
require_once $inc_dir .'smarty/Smarty.class.php';

$opt = array(
  'posts_dir' => $base_dir .'posts/',
  'template_source_dir' => $base_dir .'templates/source/',
  'template_compile_dir' => $base_dir .'templates/compiled/',
);




