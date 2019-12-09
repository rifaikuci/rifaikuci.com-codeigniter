<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'anasayfa';
$route['anasayfa/projeler/(:num)'] = 'anasayfa/projeler';
$route['anasayfa/yazilar/(:num)'] = 'anasayfa/yazilar';
$route['anasayfa/aramalar/(:num)'] = 'anasayfa/aramalar';
$route['404_override'] = 'anasayfa/notfound';
$route['translate_uri_dashes'] = FALSE;
