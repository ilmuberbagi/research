<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';
$route['404_override'] = '_404';

$route['reset'] = 'login/reset';

$route['news/page'] = 'home/news/page';
$route['news/page/(:any)'] = 'home/news/page/$1';
$route['news/read/(:any)/(:any)'] = 'home/news/read/$1/$2';
$route['news'] = 'home/news';

$route['grant/page'] = 'home/grant/page';
$route['grant/page/(:any)'] = 'home/grant/page/$1';
$route['grant/read/(:any)/(:any)'] = 'home/grant/read/$1/$2';
$route['grant'] = 'home/grant';

$route['conferences/page'] = 'home/conferences/page';
$route['conferences/page/(:any)'] = 'home/conferences/page/$1';
$route['conferences/read/(:any)/(:any)'] = 'home/conferences/read/$1/$2';
$route['conferences'] = 'home/conferences';


$route['videos/page'] = 'home/videos/page';
$route['videos/page/(:any)'] = 'home/videos/page/$1';
$route['videos/read/(:any)/(:any)'] = 'home/videos/read/$1/$2';
$route['videos'] = 'home/videos';
$route['resources'] = 'home/resources';
$route['statistics'] = 'home/statistics';
$route['download/resource/(:any)'] = 'home/download/$1';


$route['about'] = 'home/about';
$route['about/(:any)'] = 'home/about/$1';

$route['service'] = 'home/service';
$route['contact'] = 'home/contact';

$route['search'] = 'home/search';
$route['search/page'] = 'home/search/page';
$route['search/page/(:any)'] = 'home/search/page/$1';

$route['register'] = 'login/register';

$route['research/grant'] = 'home/research/grant';
$route['research/grant/page'] = 'home/research/grant/page';
$route['researchers'] = 'home/researchers';
$route['researchers/page'] = 'home/researchers/page';
$route['researchers/page/(:any)'] = 'home/researchers/page/$1';

$route['research/publication'] = 'home/research/publication';
$route['research/publication/page'] = 'home/research/publication/page';
$route['research/publication/page/(:any)'] = 'home/research/publication/page/$1';
