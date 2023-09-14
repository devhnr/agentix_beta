<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/********Prashnt code start********/
defined("INSURER") or define("INSURER",
    array(
        "Acko General Insurance Ltd.",
        "Aditya Birla Health insurance Co Ltd.",
        "Aditya Birla SunLife Insurance Co. Ltd.",
        "Aegon Life Insurance Company Limited",
        "Agriculture Insurance Company of India Ltd.",
        "Aviva Life Insurance Company India Ltd.",
        "Bajaj Allianz General Insurance Co. Ltd",
        "Bajaj Allianz Life Insurance Co. Ltd.",
        "Bharti AXA Life Insurance Company Ltd",
        "Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited",
        "Care Health Insurance Ltd",
        "Cholamandalam MS General Insurance Co. Ltd",
        "ECGC Ltd.",
        "Edelweiss General Insurance Company Limited",
        "Edelweiss Tokio Life Insurance Company Limited",
        "Exide Life Insurance Co. Ltd",
        "Future Generali India Insurance Co. Ltd.",
        "Future Generali India Life Insurance Company Limited",
        "Go Digit General Insurance Limited",
        "HDFC Life Insurance Co. Ltd",
        "HDFC ERGO General Insurance Co. Ltd",
        "ICICI Lombard General Insurance Co. Ltd.",
        "ICICI Prudential Life Insurance Co. Ltd.",
        "IDBI Federal Life Insurance Company Limited",
        "IFFCO-TOKIO General Insurance Co. Ltd.",
        "IndiaFirst Life Insurance Company Ltd.",
        "Kotak Mahindra General insurance co. Ltd.",
        "Kotak Mahindra Life Insurance Co. Ltd.",
        "Liberty  General Insurance Co. Ltd.",
        "Life Insurance Corporation of India",
        "Magma HDI General Insurance Co. Ltd.",
        "Manipal Cigna Health Insurance Company Limited",
        "Max Life Insurance Co. Ltd.",
        "National Insurance Co. Ltd.",
        "Navi General Insurance Ltd",
        "Niva bupa health insurance company limited",
        "PNB MetLife India Insurance Co. Ltd",
        "Pramerica Life Insurance Co. Ltd.",
        "Raheja QBE General Insurance Co. Ltd.",
        "Reliance General Insurance Co. Ltd.",
        "Reliance Nippon Life Insurance Company",
        "Royal Sundaram General Insurance Co. Ltd",
        "Sahara India Life Insurance Co. Ltd.",
        "SBI General Insurance Co. Ltd.",
        "SBI Life Insurance Co. Ltd.",
        "Shriram General Insurance Co. Ltd.",
        "Shriram Life Insurance Co. Ltd.",
        "Star Health & Allied Insurance Co. Ltd",
        "Star Union Dai-Ichi Life Insurance Co. Ltd.",
        "TATA AIA Life Insurance Co. Ltd.",
        "Tata-AIG General Insurance Co. Ltd.",
        "The New India Assurance Co. Ltd.",
        "The Oriental Insurance Co. Ltd.",
        "United India Insurance Co. Ltd.",
        "Universal Sompo General Insurance Co. Ltd.",
    )
);


defined("TPA") or define("TPA",
    array(
      "Alankit Insurance TPA Limited",
      "Anmol Medicare Insurance TPA Limited",
      "Anyuta Insuance TPA In Health Care Private Limited",
      "Dedicated Healthcare Services TPA (India) Pvt Ltd.",
      "East West Assist Insurance TPA Private Limited",
      "Ericson Insurance TPA Private Limited",
      "Emeditek Insurance TPA Limited",
      "Family Health Plan Insurance (TPA) Private Limited",
      "Focus Health Insurance TPA Private Limited",
      "Genins India Insurance TPA Limited",
      "Good Health Insurance TPA Limited",
      "Grand Insurance TPA Private Limited",
      "Happy Insurance TPA Services Pvt. Ltd",
      "Health India Insurance TPA Services Private Limited",
      "Health Insurance TPA of India  Limited",
      "Heritage Health Insurance TPA Private Limited",
      "Internal TPA",
      "MD India Health Insurance TPA Private Limited",
      "Medi Assist Insurance TPA Private Limited",
      "Medicare Insurance TPA Services (India) Pvt Ltd",
      "Medsave Health Insurance TPA Limited",
      "Paramount Health Services & Insurance TPA Private Limited",
      "Park Mediclaim Insurance TPA Private Limited",
      "Raksha Health Insurance TPA Private Limited",
      "Rothshield Insurance TPA Limited",
      "Safeway Insurance TPA Private Limited",
      "United Health Care Parekh Insurance TPA Private Limited",
      "Vidal Health Insurance TPA Private Limited",
      "Vidal Health TPA Pvt Ltd",
      "Vipul Medcorp Insurance TPA Private Limited",
      "Vision Digital Insurance TPA Private Limited",
    )
);
/********Prashant code end */
