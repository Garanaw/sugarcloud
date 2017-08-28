<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Head section
 */
// Titles for different sections:
$lang['meta_basic_title'] = 'Sugar Control';
$lang['meta_charts_title'] = 'Sugar Graphs';
$lang['meta_calendar_title'] = 'Sugar Calendar';
$lang['meta_login_title'] = 'Login';
$lang['meta_signup_title'] = 'Signup';

$lang['meta_description'] = 'Store your bloodsugar records on the cloud';
$lang['meta_keywords'] = array('sugar', 'diabetes', 'bloodsugar', 'control', 'sugar diabetes', 'diabetes control', 'diabetes statistics', 'diabetes treatment', 'Blood sugar', 'Diabetes', 'diabetes management', 'blood sugar management', 'diabetes discussion', 'bloodsugar', 'type 2 diabetes', 'type 1 diabetes', 'sugar tracking', 'diabetes online', 'hypoglycemia', 'hypoglycemic', 'glucose management', 'blood sugar statistics', 'glucose statistics', 'insulin management', 'insulin', 'insulin injection', 'glucose testing', 'diabetes support', 'blood glucose monitor');

/**
 * Home
 */
$lang['home_description_1'] = 'SugarStats is a free blood sugar tracking and online diabetes management tool';
$lang['home_tagline'] = 'Keep it under control';

$lang['home_call_to_action'] = 'Sing up for free!';

$lang['home_intro_1'] = 'At SugarCloud we believe in making things easy, and facilitating the recording of sugar levels for a 
						diabetic is a great help when it comes to being able to regulate them.';
$lang['home_intro_2'] = 'With SugarCloud you can store your records in an online database, and consult it from anywhere, whether 
						at home, at your endocrine clinic or at work, without having to carry a notebook.';

$lang['home_graphs_title'] = 'Graphs';
$lang['home_graphs_text'] = 'Use the graphs to calculate visually the points where you have to regulate your insulin dose, exercise timming or ammount of food.';

$lang['home_calendar_title'] = 'Calendar';
$lang['home_calendar_text'] = 'With the calendar you can see your weekly controls together in one place to see how your levels evolve over time.';

$lang['home_personal_area_title'] = 'Personal Area';
$lang['home_personal_area_text'] = 'In your personal area you can configure your personal and medical data to make things easier.';

$lang['home_button_see_more'] = 'See more';

/**
 * Menu
 */
$lang['menu_home'] = 'Home';
$lang['menu_sugar'] = 'Sugar';
$lang['menu_sugar_overall'] = 'Sugar Overall';
$lang['menu_sugar_charts'] = 'Sugar Charts';
$lang['menu_sugar_calendar'] = 'Sugar Calendar';

$lang['sugar_day_controls'] = 'Day controls';
$lang['sugar_modal_add_new_value'] = 'Add new sugar value';
$lang['sugar_day_average'] = 'Day Average';

$lang['sugar_select_day'] = 'Select Day';
$lang['sugar_update'] = 'Update';

$lang['sugar_month_average'] = 'This Month';
$lang['sugar_week_average'] = 'This Week';

$lang['sugar_max'] = 'Max';
$lang['sugar_min'] = 'Min';
$lang['sugar_avg'] = 'Avg';

$lang['sugar_form_collapsible_button_record_new_value'] = 'Record New Sugar Value!';

$lang['user_account_title'] = 'User Account';

$lang['user_account_menu_general'] = 'General settings';
$lang['user_account_menu_bio'] = 'Bio';
$lang['user_account_menu_medicine'] = 'Diabetes';

$lang['user_account_personal_information_settings'] = 'Personal Info';
$lang['user_account_name'] = 'Name';
$lang['user_account_last_name'] = 'Last Name';
$lang['user_account_email'] = 'Email';

$lang['user_account_localization_settings'] = 'Location';
$lang['user_account_country'] = 'Country';

$lang['user_account_glucose_settings'] = 'Glucose';
$lang['user_account_messure'] = 'Messure';
$lang['user_account_low'] = 'Low';
$lang['user_account_high'] = 'High';

$lang['user_account_gender_title'] = 'Gender';
$lang['user_account_gender_male'] = 'Male';
$lang['user_account_gender_female'] = 'Female';
$lang['user_account_bio'] = 'About';
$lang['user_account_phone'] = 'Phone';
$lang['user_account_birthdate'] = 'Birthdate';
$lang['user_account_language'] = 'Language';

$lang['user_account_diabetes_basic_info'] = 'Basic info';
$lang['user_account_diabetes_type'] = 'Type';

$lang['user_account_debut'] = 'Diagnosis date';

$lang['user_account_social_title'] = 'Social Networks';
$lang['user_account_diabetes_med_list'] = 'Medications list';
$lang['user_account_current_meds'] = 'Current';
$lang['user_account_add_new_med'] = 'Add other';
$lang['user_account_insulin_removed'] = 'Removed Insulin';

$lang['user_account_submit'] = 'Update';

$lang['footer_privacy_policies'] = 'Privacy Policies';
$lang['footer_about_us'] = 'About Us';
$lang['footer_donate'] = 'Donate';

// Países del mundo:
$lang['countries'] = array(
	"AF"=>'Afghanistan',
	"AX"=>'Åland Islands',
	"AL"=>'Albania',
	"DZ"=>'Algeria',
	"AS"=>'American Samoa',
	"AD"=>'Andorra',
	"AO"=>'Angola',
	"AI"=>'Anguilla',
	"AQ"=>'Antarctica',
	"AG"=>'Antigua and Barbuda',
	"AR"=>'Argentina',
	"AM"=>'Armenia',
	"AW"=>'Aruba',
	"AU"=>'Australia',
	"AT"=>'Austria',
	"AZ"=>'Azerbaijan',
	"BS"=>'Bahamas',
	"BH"=>'Bahrain',
	"BD"=>'Bangladesh',
	"BB"=>'Barbados',
	"BY"=>'Belarus',
	"BE"=>'Belgium',
	"BZ"=>'Belize',
	"BJ"=>'Benin',
	"BM"=>'Bermuda',
	"BT"=>'Bhutan',
	"BO"=>'Bolivia, Plurinational State of',
	"BQ"=>'Bonaire, Sint Eustatius and Saba',
	"BA"=>'Bosnia and Herzegovina',
	"BW"=>'Botswana',
	"BV"=>'Bouvet Island',
	"BR"=>'Brazil',
	"IO"=>'British Indian Ocean Territory',
	"BN"=>'Brunei Darussalam',
	"BG"=>'Bulgaria',
	"BF"=>'Burkina Faso',
	"BI"=>'Burundi',
	"KH"=>'Cambodia',
	"CM"=>'Cameroon',
	"CA"=>'Canada',
	"CV"=>'Cape Verde',
	"KY"=>'Cayman Islands',
	"CF"=>'Central African Republic',
	"TD"=>'Chad',
	"CL"=>'Chile',
	"CN"=>'China',
	"CX"=>'Christmas Island',
	"CC"=>'Cocos (Keeling) Islands',
	"CO"=>'Colombia',
	"KM"=>'Comoros',
	"CG"=>'Congo',
	"CD"=>'Congo, the Democratic Republic of the',
	"CK"=>'Cook Islands',
	"CR"=>'Costa Rica',
	"CI"=>'Côte d\'Ivoire',
	"HR"=>'Croatia',
	"CU"=>'Cuba',
	"CW"=>'Curaçao',
	"CY"=>'Cyprus',
	"CZ"=>'Czech Republic',
	"DK"=>'Denmark',
	"DJ"=>'Djibouti',
	"DM"=>'Dominica',
	"DO"=>'Dominican Republic',
	"EC"=>'Ecuador',
	"EG"=>'Egypt',
	"SV"=>'El Salvador',
	"GQ"=>'Equatorial Guinea',
	"ER"=>'Eritrea',
	"EE"=>'Estonia',
	"ET"=>'Ethiopia',
	"FK"=>'Falkland Islands (Malvinas)',
	"FO"=>'Faroe Islands',
	"FJ"=>'Fiji',
	"FI"=>'Finland',
	"FR"=>'France',
	"GF"=>'French Guiana',
	"PF"=>'French Polynesia',
	"TF"=>'French Southern Territories',
	"GA"=>'Gabon',
	"GM"=>'Gambia',
	"GE"=>'Georgia',
	"DE"=>'Germany',
	"GH"=>'Ghana',
	"GI"=>'Gibraltar',
	"GR"=>'Greece',
	"GL"=>'Greenland',
	"GD"=>'Grenada',
	"GP"=>'Guadeloupe',
	"GU"=>'Guam',
	"GT"=>'Guatemala',
	"GG"=>'Guernsey',
	"GN"=>'Guinea',
	"GW"=>'Guinea-Bissau',
	"GY"=>'Guyana',
	"HT"=>'Haiti',
	"HM"=>'Heard Island and McDonald Islands',
	"VA"=>'Holy See (Vatican City State)',
	"HN"=>'Honduras',
	"HK"=>'Hong Kong',
	"HU"=>'Hungary',
	"IS"=>'Iceland',
	"IN"=>'India',
	"ID"=>'Indonesia',
	"IR"=>'Iran, Islamic Republic of',
	"IQ"=>'Iraq',
	"IE"=>'Ireland',
	"IM"=>'Isle of Man',
	"IL"=>'Israel',
	"IT"=>'Italy',
	"JM"=>'Jamaica',
	"JP"=>'Japan',
	"JE"=>'Jersey',
	"JO"=>'Jordan',
	"KZ"=>'Kazakhstan',
	"KE"=>'Kenya',
	"KI"=>'Kiribati',
	"KP"=>'Korea, Democratic People\'s Republic of',
	"KR"=>'Korea, Republic of',
	"KW"=>'Kuwait',
	"KG"=>'Kyrgyzstan',
	"LA"=>'Lao People\'s Democratic Republic',
	"LV"=>'Latvia',
	"LB"=>'Lebanon',
	"LS"=>'Lesotho',
	"LR"=>'Liberia',
	"LY"=>'Libya',
	"LI"=>'Liechtenstein',
	"LT"=>'Lithuania',
	"LU"=>'Luxembourg',
	"MO"=>'Macao',
	"MK"=>'Macedonia, the former Yugoslav Republic of',
	"MG"=>'Madagascar',
	"MW"=>'Malawi',
	"MY"=>'Malaysia',
	"MV"=>'Maldives',
	"ML"=>'Mali',
	"MT"=>'Malta',
	"MH"=>'Marshall Islands',
	"MQ"=>'Martinique',
	"MR"=>'Mauritania',
	"MU"=>'Mauritius',
	"YT"=>'Mayotte',
	"MX"=>'Mexico',
	"FM"=>'Micronesia, Federated States of',
	"MD"=>'Moldova, Republic of',
	"MC"=>'Monaco',
	"MN"=>'Mongolia',
	"ME"=>'Montenegro',
	"MS"=>'Montserrat',
	"MA"=>'Morocco',
	"MZ"=>'Mozambique',
	"MM"=>'Myanmar',
	"NA"=>'Namibia',
	"NR"=>'Nauru',
	"NP"=>'Nepal',
	"NL"=>'Netherlands',
	"NC"=>'New Caledonia',
	"NZ"=>'New Zealand',
	"NI"=>'Nicaragua',
	"NE"=>'Niger',
	"NG"=>'Nigeria',
	"NU"=>'Niue',
	"NF"=>'Norfolk Island',
	"MP"=>'Northern Mariana Islands',
	"NO"=>'Norway',
	"OM"=>'Oman',
	"PK"=>'Pakistan',
	"PW"=>'Palau',
	"PS"=>'Palestinian Territory, Occupied',
	"PA"=>'Panama',
	"PG"=>'Papua New Guinea',
	"PY"=>'Paraguay',
	"PE"=>'Peru',
	"PH"=>'Philippines',
	"PN"=>'Pitcairn',
	"PL"=>'Poland',
	"PT"=>'Portugal',
	"PR"=>'Puerto Rico',
	"QA"=>'Qatar',
	"RE"=>'Réunion',
	"RO"=>'Romania',
	"RU"=>'Russian Federation',
	"RW"=>'Rwanda',
	"BL"=>'Saint Barthélemy',
	"SH"=>'Saint Helena, Ascension and Tristan da Cunha',
	"KN"=>'Saint Kitts and Nevis',
	"LC"=>'Saint Lucia',
	"MF"=>'Saint Martin (French part)',
	"PM"=>'Saint Pierre and Miquelon',
	"VC"=>'Saint Vincent and the Grenadines',
	"WS"=>'Samoa',
	"SM"=>'San Marino',
	"ST"=>'Sao Tome and Principe',
	"SA"=>'Saudi Arabia',
	"SN"=>'Senegal',
	"RS"=>'Serbia',
	"SC"=>'Seychelles',
	"SL"=>'Sierra Leone',
	"SG"=>'Singapore',
	"SX"=>'Sint Maarten (Dutch part)',
	"SK"=>'Slovakia',
	"SI"=>'Slovenia',
	"SB"=>'Solomon Islands',
	"SO"=>'Somalia',
	"ZA"=>'South Africa',
	"GS"=>'South Georgia and the South Sandwich Islands',
	"SS"=>'South Sudan',
	"ES"=>'Spain',
	"LK"=>'Sri Lanka',
	"SD"=>'Sudan',
	"SR"=>'Suriname',
	"SJ"=>'Svalbard and Jan Mayen',
	"SZ"=>'Swaziland',
	"SE"=>'Sweden',
	"CH"=>'Switzerland',
	"SY"=>'Syrian Arab Republic',
	"TW"=>'Taiwan, Province of China',
	"TJ"=>'Tajikistan',
	"TZ"=>'Tanzania, United Republic of',
	"TH"=>'Thailand',
	"TL"=>'Timor-Leste',
	"TG"=>'Togo',
	"TK"=>'Tokelau',
	"TO"=>'Tonga',
	"TT"=>'Trinidad and Tobago',
	"TN"=>'Tunisia',
	"TR"=>'Turkey',
	"TM"=>'Turkmenistan',
	"TC"=>'Turks and Caicos Islands',
	"TV"=>'Tuvalu',
	"UG"=>'Uganda',
	"UA"=>'Ukraine',
	"AE"=>'United Arab Emirates',
	"GB"=>'United Kingdom',
	"US"=>'United States',
	"UM"=>'United States Minor Outlying Islands',
	"UY"=>'Uruguay',
	"UZ"=>'Uzbekistan',
	"VU"=>'Vanuatu',
	"VE"=>'Venezuela, Bolivarian Republic of',
	"VN"=>'Viet Nam',
	"VG"=>'Virgin Islands, British',
	"VI"=>'Virgin Islands, U.S.',
	"WF"=>'Wallis and Futuna',
	"EH"=>'Western Sahara',
	"YE"=>'Yemen',
	"ZM"=>'Zambia',
	"ZW"=>'Zimbabwe',
);

?>