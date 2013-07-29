<?php
/**
 * @file: utility functions
 */

include_once("model/db.php");

/**
 * pr2: print given object in html
 */
function pr2($param) {
  print "<pre>"; print_r($param); print "</pre>";
}

/**
 * filter_xss, sanitize input String
 */
function filter_xss($str) {
  $str = urldecode($str);
  $str = filter_var($str, FILTER_SANITIZE_STRING);
  $str = filter_var($str, FILTER_SANITIZE_SPECIAL_CHARS);
  return $str;
}

/**
 * filter_mysql, sanitize queries
 */
function filter_mysql($str) {
  global $db;
  // remove whitespaces (not a must though)
  $str = trim($str);
  $str = filter_var($str, FILTER_SANITIZE_STRING);
  $str = filter_var($str, FILTER_SANITIZE_SPECIAL_CHARS);
  $str = mysqli_real_escape_string($db->get_link(), $str);
  return $str;
}

?>

