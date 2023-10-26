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

$route['default_controller'] = "home";

$route['index']  = "home/index";
$route['index-new']  = "home/index_new";


$route['aboutus']  = "home/aboutus";

$route['hdfc_1']  = "home/hdfc_1";
$route['hdfc_2']  = "home/hdfc_2";
$route['hdfc_3']  = "home/hdfc_3";

$route['claim-assistance']  = "home/claim_assistance";
// $route['blog']  = "home/blog";

$route['trade-credit-insurance']  = "home/trade_credit_insurance";
$route['calendly-thankyou']  = "home/calendly_thankyou";
$route['career']  = "home/career";
$route['disclaimer']  = "home/disclaimer";
$route['contact']  = "home/contact";
$route['claim-enquiry/(:any)']  = "home/claim_enquiry/$1";
$route['applycareer/(:any)']  = "home/applycareer/$1";
$route['test_mail']  = "home/test_mail";
$route['applycareer_mail']  = "home/applycareer_mail";

$route['grievance-redressal-policy']  = "home/grievance_redressal_policy";
$route['privacy-policy']  = "home/privacy_policy";
$route['product-listing/(:any)']  = "home/product_listing/$1";

$route['product-detail/(:any)']  = "home/product_detail/$1";

$route['blog-detail/(:any)']  = "home/blog_detail/$1";
$route['category/(:any)'] = "home/blog/$1";
$route['category/(:any)/(:any)'] = "home/blog/$1/$2";

$route['404_override'] = '';

$route['scaffolding_trigger'] = "";



$route['logout']  = "home/logout";

$route['cyber-insurance']  = "cyber_insurance";
$route['cyber-insurance/index']  = "cyber_insurance/index";
$route['cyber-insurance/policies']  = "cyber_insurance/policies";
$route['cyber-insurance/blog-detail/(:any)']  = "cyber_insurance/blog_detail/$1";
$route['cyber-insurance/login']  = "cyber_insurance/login";
$route['cyber-insurance/my_account']  = "cyber_insurance/my-account";
$route['cyber-insurance/edit_profile']  = "cyber_insurance/edit-profile";
$route['cyber-insurance/compare']  = "cyber_insurance/compare";
$route['cyber-insurance/assessment']  = "cyber_insurance/assessment";
$route['cyber-insurance/order-detail']  = "cyber_insurance/order_detail";
$route['cyber-insurance/summary']  = "cyber_insurance/summary";
$route['cyber-insurance/old-steps-1']  = "cyber_insurance/old_steps_1";
$route['cyber-insurance/old-steps-2']  = "cyber_insurance/old_steps_2";

$route['cyber-insurance/step-2']  = "cyber_insurance/step_2";
$route['cyber-insurance/register']  = "cyber_insurance/register";
$route['cyber-insurance/login_form']  = "cyber_insurance/login_form";
$route['cyber-insurance/personal_info']  = "cyber_insurance/personal_info";
$route['cyber-insurance/confirm_term']  = "cyber_insurance/confirm_term";
$route['cyber-insurance/logout']  = "cyber_insurance/logout";

$route['group_cyber_insurance/dev_test']  = "Group_cyber_insurance/dev_test";$route['group-cyber-insurance']  = "Group_cyber_insurance/index";

$route['group-cyber-insurance/policies']  = "group_cyber_insurance/policies";
$route['group-cyber-insurance/blog-detail/(:any)']  = "group_cyber_insurance/blog_detail/$1";
$route['group-cyber-insurance/login']  = "group_cyber_insurance/login";
$route['group-cyber-insurance/my_account']  = "group_cyber_insurance/my-account";
$route['group-cyber-insurance/edit_profile']  = "group_cyber_insurance/edit-profile";
$route['group-cyber-insurance/compare']  = "group_cyber_insurance/compare";
$route['group-cyber-insurance/assessment']  = "group_cyber_insurance/assessment";
$route['group-cyber-insurance/order-detail']  = "group_cyber_insurance/order_detail";
$route['group-cyber-insurance/summary']  = "group_cyber_insurance/summary";
$route['group-cyber-insurance/old-steps-1']  = "group_cyber_insurance/old_steps_1";
$route['group-cyber-insurance/old-steps-2']  = "group_cyber_insurance/old_steps_2";
$route['group-cyber-insurance/step-2']  = "group_cyber_insurance/step_2";
$route['group-cyber-insurance/register']  = "group_cyber_insurance/register";
$route['group-cyber-insurance/login_form']  = "group_cyber_insurance/login_form";
$route['group-cyber-insurance/personal_info']  = "group_cyber_insurance/personal_info";
$route['group-cyber-insurance/confirm_term']  = "group_cyber_insurance/confirm_term";
$route['group-cyber-insurance/logout']  = "group_cyber_insurance/logout";