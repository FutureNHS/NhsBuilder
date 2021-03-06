<?php
error_reporting(0);
require_once __DIR__ . '/../lib/generator.class.php';
$htmlGenerator = new htmlGenerator();
$htmlGenerator->addCss('dist/style.css');

$dataJson = file_get_contents('php://input');
$dataObj = json_decode($dataJson);
if(empty($dataJson)) {
  $dataObj = $_REQUEST;
}

if($dataObj['post_path']) {
  $dataJson = file_get_contents(preg_replace('/\r\n|\n/i', '', $dataObj['post_path']));
  $dataObj = json_decode($dataJson);
}

$componentsHtml = '';
echo $htmlGenerator->renderHtml($dataObj);