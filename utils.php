<?php
/**
 * @file: utility functions
 */
global $path_model;
include_once($path_model. "/db.php");

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
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]",
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
 * render, receives the file name of the html page or block template which will show the content of the array
 * @param: $type - String
 * @param: $filename - String
 * @param: $content - Asoc. Array
 * @return: 
 */
function render($type, $filename, $content = array()) {
  //enable i) storage in an internal output buffer
  ob_start();
  if ($type == 'page') {
      include 'templates/pages/'. $filename. '.tpl.php';
  }
  else if ($type == 'block') {
      include 'templates/blocks/'. $filename. '.tpl.php';
  }
  //get the content of the internal buffer
  $output = ob_get_contents();
  //disable i)
  ob_end_clean();
  //print $output;
  return $output;
}

/**
 * render_form, receives an array with the form setting and returns the html form
 * @param: $form, Asoc.Array
 * @return: $form_html, String
 */
function render_form($form) {
  $form_html = '<form ';
  $options = '';
  // *) render the attributes of the form tag
  foreach ($form['#attributes'] as $attribute => $value) {
    if ($attribute == '#name') {
      $form_html.= 'name="'. $value. '" ';
    }
    else if ($attribute == '#action') {
      $form_html.= 'action="'. $value. '" ';
    }
    else if ($attribute == '#method') {
      $form_html.= 'method="'. $value. '" ';
    }
  }
  $form_html.= '>';
  // *) render each element inside the form
  foreach ($form['#elements'] as $element_id => $attributes) {
    // *) for each element render its attributes
    unset($label);
    $attr = ' ';
    foreach ($attributes as $attribute => $value) {
      if ($attribute == '#element') {
        $element = $value;
      }
      else if ($attribute == '#type') {
        $attr.= 'type="'. $value. '" ';
      }
      else if ($attribute == '#name') {
        $attr.= 'name="'. $value. '" ';
      }
      else if ($attribute == '#value') {
        $attr.= 'value="'. $value. '" ';
      }
      else if ($attribute == '#label') {
        $label = '<label for="'. $element_id. '">'. $value. '</label>';
      }
      else if ($attribute == '#maxlength') {
        $attr.= 'maxlength="'. $value. '" ';
      }
      else if ($attribute == '#required') {
        $attr.= 'required ';
      }
      else if ($attribute == '#options') {
        foreach ($value as $opt_key => $opt_value) {
          $options.= '<option value="'. strtolower($opt_value).'">'. $opt_value.'</option>';
        }
      }
      else if ($attribute == '#text') {
        $text = $value;
      }
      else if ($attribute == '#button_text') {
        $button_text = $value;
      }
    }

    if (empty($label)) {
      $form_html.= '<div><'. $element. ' id="'. $element_id. '"'. $attr;
    }
    else {
      $form_html.= '<div>'. $label. '<'. $element. ' id="'. $element_id. '"'. $attr;
    }

    if ($element == 'input') {
      $form_html.= '/></div>';
    }
    else if ($element == 'textarea') {
      $form_html.= '>'. $text.'</textarea></div>';
    }
    else if ($element == 'button') {
      $form_html.= '>'. $button_text.'</button></div>';
    }
    else if ($element == 'select') {
      $form_html.= '>'. $options.'</select></div>';
    }
  }

  $form_html.= '</form>';
  return $form_html;
}

?>

