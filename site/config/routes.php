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

$route['products']  = "home/products";

$route['services']  = "home/services";

$route['about-us']  = "home/about_us";

$route['login']  = "home/login";

$route['signup']  = "home/signup";

$route['blogs']  = "home/blogs";

$route['pricing']  = "home/pricing";

$route['reset-password/(:any)']  = "home/reset_password/$1";

$route['blogs-detail/(:any)']  = "home/blogs_detail/$1";

$route['forgot-password']  = "home/forgot_password";



/* AGent admin */

$route['agent-admin']  = "agent_admin/index";
$route['agent-admin/product-comparison']  = "agent_admin/product_comparison";
$route['agent-admin/product-respository/(:any)']  = "agent_admin/product_respository/$1";
$route['agent-admin/compare']  = "agent_admin/compare";
$route['agent-admin/compare-list/(:any)']  = "agent_admin/compare_list/$1";
$route['agent-admin/logout']  = "agent_admin/logout";
$route['agent-admin/new-products']  = "agent_admin/new_products";
$route['agent-admin/client-educational-content']  = "agent_admin/client_educational_content";
$route['agent-admin/recommended-poster']  = "agent_admin/recommended_poster";
$route['agent-admin/daily-poster']  = "agent_admin/daily_poster";
$route['agent-admin/article-poster']  = "agent_admin/article_poster";


$route['agent-admin/repository-of-brochure']  = "agent_admin/repository_of_brochure";



$route['compare-policies']  = "compare_policies/index";