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

/**
 * Function: sanitize_url
 * Returns a sanitized string, typically for URLs.
 *
 * Parameters:
 *     $string - The string to sanitize.
 *     $force_lowercase - Force the string to lowercase?
 *     $anal - If set to *true*, will remove all non-alphanumeric characters.
 */
function sanitize_url($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "â€”", "â€“", ",", "<", ".", ">", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}

/**
 * render, receives the file name of the html template which will show the content of the array
 * @param: $filename - String
 * @param: $content - Asoc. Array
 * @return: 
 */
function render($filename, $content = array()) {
  //enable i) storage in an internal output buffer
  ob_start();
  include 'templates/'. $filename. '.tpl.php';
  //get the content of the internal buffer
  $output = ob_get_contents();
  //disable i)
  ob_end_clean();
  print $output;
}

?>

