<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

$config['DB_TABLE_PREFIX'] =  'mcethority_';
$config['ADMIN_RESULTS_PP'] 	=  5;
$config[''] 	=  '';

//////////////////Months Array//////////////////////
$options_month = array(
			  '1'  => 'Jan',
			 '2'  => 'Feb',
			 '3'  => 'Mar',
			 '4'  => 'Apr',
			 '5'  => 'May',
			 '6'  => 'Jun',
			 '7'  => 'Jul',
			 '8'  => 'Aug',
			 '9'  => 'Sep',
			 '10' => 'Oct',
			 '11' => 'Nov',
			 '12' => 'Dec'
			);
define("options_month", serialize($options_month));
/////////////////////Years Array/////////////////
$options_year = array(
			  '2010'  => '2010',
			  '2011'  => '2011',
			  '2012'  => '2012',
			  '2013'  => '2013',
			  '2014'  => '2014',
			  '2015'  => '2015',
			  '2016'  => '2016',
			  '2017'  => '2017',
			  '2018'  => '2018',
			  '2019'  => '2019',
			  '2020'  => '2020',
			  '2021'  => '2021',
			  '2022'  => '2022',
			  '2023'  => '2023',
			  '2024'  => '2024',
			  '2025'  => '2025',
			  '2026'  => '2026',
			  '2027'  => '2027',
			  '2028'  => '2028'
			);
define("options_year", serialize($options_year));
////////////Cards Array//////////////////////
$options_card = array(
		  'Visa'  => 'Visa',
		  'MasterCard'  => 'MasterCard',
		  'Discover'  => 'Discover',
		  'Amex'  => 'American Express'
		);
define("options_card", serialize($options_card));
////////////Title Array//////////////////////
$options_title = array(
				'Mr' => 'Mr',
				'Mrs' => 'Mrs',
				'Miss' => 'Miss',
				'Dr' => 'Dr'
			);
define("options_title", serialize($options_title));