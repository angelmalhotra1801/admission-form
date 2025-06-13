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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['instruction']='Home/instruction';
$route['login']='Login';
$route['register']='Login/register';
$route['forget']='Login/forget';
$route['get_district']='Login/get_district';






$route['login_user']='Login/login_user';
$route['user_register']='Login/user_register';
$route['chkemail']='Login/chkmail';
$route['logout']='Login/logout';
$route['sendmail']='Login/sendmail';
$route['cotp']='Login/otpchk';
$route['updatepass']='Login/updatepass';


$route['admin/login']='Login/adminuser';
$route['admin/dashboard']='Admin/dashboard';
$route['admin/total_user']='Admin/total_user';
$route['admin/add_form']='Admin/add_form';
$route['admin/total_transaction']='Admin/total_transaction';




$route['admin/login']='Login/adminuser';
$route['admin/dashboard']='Admin/dashboard';
$route['admin/total_user']='Admin/total_user';
$route['admin/retrive_form_data']='Admin/retrive_form_data';
$route['admin/retrive_form_data/(:any)']='Admin/retrive_form_data/$1';
$route['update_form']='Admin/update_form';

$route['adminform_pdf/(:any)']='Admin/adminform_pdf/$1';
$route['adminadmit_pdf/(:any)']='Admin/adminadmit_pdf/$1';
$route['adminpaymentslip_pdf/(:any)']='Admin/adminpaymentslip_pdf/$1';


$route['adminform_pdf_other/(:any)']='Admin/adminform_pdf_other/$1';
$route['adminadmit_pdf_other/(:any)']='Admin/adminadmit_pdf_other/$1';
$route['adminpaymentslip_pdf_other/(:any)']='Admin/adminpaymentslip_pdf_other/$1';


$route['admin/logout']='Login/adminlogout';




$route['user/dashboard']='User/dashboard';
$route['save']='User/save';
$route['pay']='User/pay';
$route['form_pdf/(:any)']='User/form_pdf/$1';

$route['admit_card/(:any)']='User/admit_card/$1';
$route['payment_receipt/(:any)']='User/payment_receipt/$1';


$route['user/user_profile']='User/user_profile';
$route['user/ajax_return']='User/ajax_return';



$route['about']='Home/about';





// ********** //


// ********** //

