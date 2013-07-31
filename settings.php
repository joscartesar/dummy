<?php
setlocale(LC_ALL, "es_ES.UTF-8");

define('PATH_MODEL', PATH_ROOT. "/model");
define('PATH_CONTROLLER', PATH_ROOT. "/controller");
define('PATH_TEMPLATES', PATH_ROOT. "/templates");
define('PATH_CSS', PATH_ROOT. "/css");
define('PATH_JS', PATH_ROOT. "/js");
define('PATH_IMG', PATH_ROOT. "/img");

global $path_root;
$path_root = $_SERVER['DOCUMENT_ROOT'];
//$_SERVER['SERVER_NAME']; => dev.dummy.local
?>
