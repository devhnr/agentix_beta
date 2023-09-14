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
$route['default_controller'] = 'DashboardController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/********Corporate Login Section*********/
$route['hr-logout']="DashboardController/signout";

/*****Employee Section********/
$route['employees']="HomeController/index";
$route['show-employees'] ="HomeController/showEmployees";
$route['download-employees'] ="HomeController/download_employee_excel_file";
$route['show-family'] ="HomeController/showFamily";
$route['get_no_of_employees'] ="HomeController/get_no_ofemployees";
$route['download-employee-ecard'] ="HomeController/download_ecard";
$route['ecard-mail'] ="HomeController/send_ecard_mail";
$route['intimate-claim-session'] ="HomeController/intimate_claim_session";

/*****Claims Section********/
$route['claims']="ClaimController/claims";
$route['show-claims'] ="ClaimController/showClaims";
$route['get_no_of_claims'] ="ClaimController/get_no_ofclaims";
$route['show-claim-details'] ="ClaimController/showCalimDetails";
$route['download-claims'] ="ClaimController/download_claim_excel_file";
$route['intimate-claims'] ="ClaimController/intimateClaim";
$route['get-employee-details'] ="ClaimController/getEmployeeDetails";
$route['get-policy-details'] ="ClaimController/getRelationByPolicy";
$route['get-patient-details'] ="ClaimController/getPatientDetails";
$route['insert-claim'] ="ClaimController/insertClaim";

/******Cashless Hospitals***********/
$route['hospitals']="HospitalController/index";
$route['show-hospitals'] ="HospitalController/showHospitals";
$route['get-cities'] ="HospitalController/getCities";

/******Utilities***********/
$route['utilities']="UtilitiController/index";
$route['show-utilities'] ="UtilitiController/showUtilities";

/******Policy Features***********/
$route['policy-features']="PolicyFeaturesController/index";
$route['show-policy-features'] ="PolicyFeaturesController/showPolicyFeatures";
$route['get-sum-insured'] ="PolicyFeaturesController/getSumInsured";

/******CD-Endorsement***********/
$route['cd-reports']="EndorsementController/index";
$route['show-cd-entry'] ="EndorsementController/showCDEntries";
$route['endorsement'] ="EndorsementController/endorsement_list";
$route['download-endorsement'] ="EndorsementController/download_endorsement_excel_file";
$route['download-calculation'] ="EndorsementController/download_calculation_excel_file";
$route['rack-rate'] ="EndorsementController/rackRateCalculation";

/******Escalation -Matrix***********/
$route['escalation-matrix'] ="EscalationController/index";
$route['show-escalation-matrix'] ="EscalationController/showEscallationMatrix";

/******Summary***********/
$route['summary'] ="SummaryController/index";
$route['show-summary'] ="SummaryController/showSummary";
$route['show-enrollment-summary'] ="SummaryController/showEnrollmentSummary";
$route['show-claim-status-summary'] ="SummaryController/showClaimStatusSummary";
$route['show-settled-acs'] ="SummaryController/showSettledACS";
$route['show-age-claim-summary'] ="SummaryController/showAgeWiseSummary";
$route['show-tat-claim-summary'] ="SummaryController/showClaimTATSummary";
$route['show-outstanding-tat-claim-summary'] ="SummaryController/showOutstandingClaimTATSummary";
$route['show-relation-claim-summary'] ="SummaryController/showRelationWiseSummary";
$route['show-network-claim-summary'] ="SummaryController/showNetworkWiseSummary";
$route['show-amount-band-claim-summary'] ="SummaryController/showAmountBandClaimSummary";
$route['show-level-claim-summary'] ="SummaryController/showLevelCareClaimSummary";
$route['show-disease-claim-summary'] ="SummaryController/showDiseaseCategoryClaimSummary";
$route['show-hospital-claim-summary'] ="SummaryController/showHospitalClaimSummary";


/******Reports***********/
$route['report'] ="ReportsController/index";
$route['show-report'] ="ReportsController/showReports";
$route['show-claim-status-report'] ="ReportsController/showClaimStatusReports";
$route['show-month-wise-report'] ="ReportsController/showMonthWiseClaimReports";
$route['show-gender-wise-report'] ="ReportsController/showGenderWiseClaimReports";
$route['show-relation-wise-report'] ="ReportsController/showRelationWiseClaimReports";
$route['show-age-wise-report'] ="ReportsController/showAgeWiseClaimReports";
$route['show-top-claim-amount-hospital'] ="ReportsController/showTopClaimAmountReports";
$route['show-top-paid-claim-amount-hospital'] ="ReportsController/showTopPaidClaimAmountReports";
$route['show-sum-insered-report'] ="ReportsController/showSumInsuredReports";
$route['show-endorsement-report'] ="ReportsController/showEndorsementReports";

/******Dashboard********/
$route['show-member-counts'] ="DashboardController/showMembersCounts";
$route['show-claim-counts'] ="DashboardController/showClaimCounts";
$route['show-claim-amounts'] ="DashboardController/showClaimAmounts";
$route['show-gender-wise-claim-ratio'] ="DashboardController/showGenderClaimRatio";
$route['show-claim-ratio'] ="DashboardController/showClaimRatio";
$route['show-employee-login-ratio'] ="DashboardController/showEmployeesLoginRatio";

$route['show-cd-balance'] ="HomeController/cd_balance";

/******Buffer********/
$route['corporate-buffer'] ="BufferController/index";
$route['show-corporate-buffer'] ="BufferController/showCorporateBuffer";
$route['get_buffer_sum_insured'] ="BufferController/buffer_sum_insured";
