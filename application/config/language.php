<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['active_languages'] = array(
	'ES'=>'Español',
	'EN'=>'English'
);

$config['language_codes'] = array(
	'en' => 'English' , 
	'aa' => 'Afar' , 
	'ab' => 'Abkhazian' , 
	'af' => 'Afrikaans' , 
	'am' => 'Amharic' , 
	'ar' => 'Arabic' , 
	'as' => 'Assamese' , 
	'ay' => 'Aymara' , 
	'az' => 'Azerbaijani' , 
	'ba' => 'Bashkir' , 
	'be' => 'Byelorussian' , 
	'bg' => 'Bulgarian' , 
	'bh' => 'Bihari' , 
	'bi' => 'Bislama' , 
	'bn' => 'Bengali/Bangla' , 
	'bo' => 'Tibetan' , 
	'br' => 'Breton' , 
	'ca' => 'Catalan' , 
	'co' => 'Corsican' , 
	'cs' => 'Czech' , 
	'cy' => 'Welsh' , 
	'da' => 'Danish' , 
	'de' => 'German' , 
	'dz' => 'Bhutani' , 
	'el' => 'Greek' , 
	'eo' => 'Esperanto' , 
	'es' => 'Spanish' , 
	'et' => 'Estonian' , 
	'eu' => 'Basque' , 
	'fa' => 'Persian' , 
	'fi' => 'Finnish' , 
	'fj' => 'Fiji' , 
	'fo' => 'Faeroese' , 
	'fr' => 'French' , 
	'fy' => 'Frisian' , 
	'ga' => 'Irish' , 
	'gd' => 'Scots/Gaelic' , 
	'gl' => 'Galician' , 
	'gn' => 'Guarani' , 
	'gu' => 'Gujarati' , 
	'ha' => 'Hausa' , 
	'hi' => 'Hindi' , 
	'hr' => 'Croatian' , 
	'hu' => 'Hungarian' , 
	'hy' => 'Armenian' , 
	'ia' => 'Interlingua' , 
	'ie' => 'Interlingue' , 
	'ik' => 'Inupiak' , 
	'in' => 'Indonesian' , 
	'is' => 'Icelandic' , 
	'it' => 'Italian' , 
	'iw' => 'Hebrew' , 
	'ja' => 'Japanese' , 
	'ji' => 'Yiddish' , 
	'jw' => 'Javanese' , 
	'ka' => 'Georgian' , 
	'kk' => 'Kazakh' , 
	'kl' => 'Greenlandic' , 
	'km' => 'Cambodian' , 
	'kn' => 'Kannada' , 
	'ko' => 'Korean' , 
	'ks' => 'Kashmiri' , 
	'ku' => 'Kurdish' , 
	'ky' => 'Kirghiz' , 
	'la' => 'Latin' , 
	'ln' => 'Lingala' , 
	'lo' => 'Laothian' , 
	'lt' => 'Lithuanian' , 
	'lv' => 'Latvian/Lettish' , 
	'mg' => 'Malagasy' , 
	'mi' => 'Maori' , 
	'mk' => 'Macedonian' , 
	'ml' => 'Malayalam' , 
	'mn' => 'Mongolian' , 
	'mo' => 'Moldavian' , 
	'mr' => 'Marathi' , 
	'ms' => 'Malay' , 
	'mt' => 'Maltese' , 
	'my' => 'Burmese' , 
	'na' => 'Nauru' , 
	'ne' => 'Nepali' , 
	'nl' => 'Dutch' , 
	'no' => 'Norwegian' , 
	'oc' => 'Occitan' , 
	'om' => '(Afan)/Oromoor/Oriya' , 
	'pa' => 'Punjabi' , 
	'pl' => 'Polish' , 
	'ps' => 'Pashto/Pushto' , 
	'pt' => 'Portuguese' , 
	'qu' => 'Quechua' , 
	'rm' => 'Rhaeto-Romance' , 
	'rn' => 'Kirundi' , 
	'ro' => 'Romanian' , 
	'ru' => 'Russian' , 
	'rw' => 'Kinyarwanda' , 
	'sa' => 'Sanskrit' , 
	'sd' => 'Sindhi' , 
	'sg' => 'Sangro' , 
	'sh' => 'Serbo-Croatian' , 
	'si' => 'Singhalese' , 
	'sk' => 'Slovak' , 
	'sl' => 'Slovenian' , 
	'sm' => 'Samoan' , 
	'sn' => 'Shona' , 
	'so' => 'Somali' , 
	'sq' => 'Albanian' , 
	'sr' => 'Serbian' , 
	'ss' => 'Siswati' , 
	'st' => 'Sesotho' , 
	'su' => 'Sundanese' , 
	'sv' => 'Swedish' , 
	'sw' => 'Swahili' , 
	'ta' => 'Tamil' , 
	'te' => 'Tegulu' , 
	'tg' => 'Tajik' , 
	'th' => 'Thai' , 
	'ti' => 'Tigrinya' , 
	'tk' => 'Turkmen' , 
	'tl' => 'Tagalog' , 
	'tn' => 'Setswana' , 
	'to' => 'Tonga' , 
	'tr' => 'Turkish' , 
	'ts' => 'Tsonga' , 
	'tt' => 'Tatar' , 
	'tw' => 'Twi' , 
	'uk' => 'Ukrainian' , 
	'ur' => 'Urdu' , 
	'uz' => 'Uzbek' , 
	'vi' => 'Vietnamese' , 
	'vo' => 'Volapuk' , 
	'wo' => 'Wolof' , 
	'xh' => 'Xhosa' , 
	'yo' => 'Yoruba' , 
	'zh' => 'Chinese' , 
	'zu' => 'Zulu' , 
);

/**
 * ISO 3166-1 alpha-2
 */
$config['country_codes'] = array(
	'AF' => 'Afghanistan',
	'AX' => 'Aland Islands',
	'AL' => 'Albania',
	'DZ' => 'Algeria',
	'AS' => 'American Samoa',
	'AD' => 'Andorra',
	'AO' => 'Angola',
	'AI' => 'Anguilla',
	'AQ' => 'Antarctica',
	'AG' => 'Antigua And Barbuda',
	'AR' => 'Argentina',
	'AM' => 'Armenia',
	'AW' => 'Aruba',
	'AU' => 'Australia',
	'AT' => 'Austria',
	'AZ' => 'Azerbaijan',
	'BS' => 'Bahamas',
	'BH' => 'Bahrain',
	'BD' => 'Bangladesh',
	'BB' => 'Barbados',
	'BY' => 'Belarus',
	'BE' => 'Belgium',
	'BZ' => 'Belize',
	'BJ' => 'Benin',
	'BM' => 'Bermuda',
	'BT' => 'Bhutan',
	'BO' => 'Bolivia',
	'BA' => 'Bosnia And Herzegovina',
	'BW' => 'Botswana',
	'BV' => 'Bouvet Island',
	'BR' => 'Brazil',
	'IO' => 'British Indian Ocean Territory',
	'BN' => 'Brunei Darussalam',
	'BG' => 'Bulgaria',
	'BF' => 'Burkina Faso',
	'BI' => 'Burundi',
	'KH' => 'Cambodia',
	'CM' => 'Cameroon',
	'CA' => 'Canada',
	'CV' => 'Cape Verde',
	'KY' => 'Cayman Islands',
	'CF' => 'Central African Republic',
	'TD' => 'Chad',
	'CL' => 'Chile',
	'CN' => 'China',
	'CX' => 'Christmas Island',
	'CC' => 'Cocos (Keeling) Islands',
	'CO' => 'Colombia',
	'KM' => 'Comoros',
	'CG' => 'Congo',
	'CD' => 'Congo, Democratic Republic',
	'CK' => 'Cook Islands',
	'CR' => 'Costa Rica',
	'CI' => 'Cote D\'Ivoire',
	'HR' => 'Croatia',
	'CU' => 'Cuba',
	'CY' => 'Cyprus',
	'CZ' => 'Czech Republic',
	'DK' => 'Denmark',
	'DJ' => 'Djibouti',
	'DM' => 'Dominica',
	'DO' => 'Dominican Republic',
	'EC' => 'Ecuador',
	'EG' => 'Egypt',
	'SV' => 'El Salvador',
	'GQ' => 'Equatorial Guinea',
	'ER' => 'Eritrea',
	'EE' => 'Estonia',
	'ET' => 'Ethiopia',
	'FK' => 'Falkland Islands (Malvinas)',
	'FO' => 'Faroe Islands',
	'FJ' => 'Fiji',
	'FI' => 'Finland',
	'FR' => 'France',
	'GF' => 'French Guiana',
	'PF' => 'French Polynesia',
	'TF' => 'French Southern Territories',
	'GA' => 'Gabon',
	'GM' => 'Gambia',
	'GE' => 'Georgia',
	'DE' => 'Germany',
	'GH' => 'Ghana',
	'GI' => 'Gibraltar',
	'GR' => 'Greece',
	'GL' => 'Greenland',
	'GD' => 'Grenada',
	'GP' => 'Guadeloupe',
	'GU' => 'Guam',
	'GT' => 'Guatemala',
	'GG' => 'Guernsey',
	'GN' => 'Guinea',
	'GW' => 'Guinea-Bissau',
	'GY' => 'Guyana',
	'HT' => 'Haiti',
	'HM' => 'Heard Island & Mcdonald Islands',
	'VA' => 'Holy See (Vatican City State)',
	'HN' => 'Honduras',
	'HK' => 'Hong Kong',
	'HU' => 'Hungary',
	'IS' => 'Iceland',
	'IN' => 'India',
	'ID' => 'Indonesia',
	'IR' => 'Iran, Islamic Republic Of',
	'IQ' => 'Iraq',
	'IE' => 'Ireland',
	'IM' => 'Isle Of Man',
	'IL' => 'Israel',
	'IT' => 'Italy',
	'JM' => 'Jamaica',
	'JP' => 'Japan',
	'JE' => 'Jersey',
	'JO' => 'Jordan',
	'KZ' => 'Kazakhstan',
	'KE' => 'Kenya',
	'KI' => 'Kiribati',
	'KR' => 'Korea',
	'KW' => 'Kuwait',
	'KG' => 'Kyrgyzstan',
	'LA' => 'Lao People\'s Democratic Republic',
	'LV' => 'Latvia',
	'LB' => 'Lebanon',
	'LS' => 'Lesotho',
	'LR' => 'Liberia',
	'LY' => 'Libyan Arab Jamahiriya',
	'LI' => 'Liechtenstein',
	'LT' => 'Lithuania',
	'LU' => 'Luxembourg',
	'MO' => 'Macao',
	'MK' => 'Macedonia',
	'MG' => 'Madagascar',
	'MW' => 'Malawi',
	'MY' => 'Malaysia',
	'MV' => 'Maldives',
	'ML' => 'Mali',
	'MT' => 'Malta',
	'MH' => 'Marshall Islands',
	'MQ' => 'Martinique',
	'MR' => 'Mauritania',
	'MU' => 'Mauritius',
	'YT' => 'Mayotte',
	'MX' => 'Mexico',
	'FM' => 'Micronesia, Federated States Of',
	'MD' => 'Moldova',
	'MC' => 'Monaco',
	'MN' => 'Mongolia',
	'ME' => 'Montenegro',
	'MS' => 'Montserrat',
	'MA' => 'Morocco',
	'MZ' => 'Mozambique',
	'MM' => 'Myanmar',
	'NA' => 'Namibia',
	'NR' => 'Nauru',
	'NP' => 'Nepal',
	'NL' => 'Netherlands',
	'AN' => 'Netherlands Antilles',
	'NC' => 'New Caledonia',
	'NZ' => 'New Zealand',
	'NI' => 'Nicaragua',
	'NE' => 'Niger',
	'NG' => 'Nigeria',
	'NU' => 'Niue',
	'NF' => 'Norfolk Island',
	'MP' => 'Northern Mariana Islands',
	'NO' => 'Norway',
	'OM' => 'Oman',
	'PK' => 'Pakistan',
	'PW' => 'Palau',
	'PS' => 'Palestinian Territory, Occupied',
	'PA' => 'Panama',
	'PG' => 'Papua New Guinea',
	'PY' => 'Paraguay',
	'PE' => 'Peru',
	'PH' => 'Philippines',
	'PN' => 'Pitcairn',
	'PL' => 'Poland',
	'PT' => 'Portugal',
	'PR' => 'Puerto Rico',
	'QA' => 'Qatar',
	'RE' => 'Reunion',
	'RO' => 'Romania',
	'RU' => 'Russian Federation',
	'RW' => 'Rwanda',
	'BL' => 'Saint Barthelemy',
	'SH' => 'Saint Helena',
	'KN' => 'Saint Kitts And Nevis',
	'LC' => 'Saint Lucia',
	'MF' => 'Saint Martin',
	'PM' => 'Saint Pierre And Miquelon',
	'VC' => 'Saint Vincent And Grenadines',
	'WS' => 'Samoa',
	'SM' => 'San Marino',
	'ST' => 'Sao Tome And Principe',
	'SA' => 'Saudi Arabia',
	'SN' => 'Senegal',
	'RS' => 'Serbia',
	'SC' => 'Seychelles',
	'SL' => 'Sierra Leone',
	'SG' => 'Singapore',
	'SK' => 'Slovakia',
	'SI' => 'Slovenia',
	'SB' => 'Solomon Islands',
	'SO' => 'Somalia',
	'ZA' => 'South Africa',
	'GS' => 'South Georgia And Sandwich Isl.',
	'ES' => 'Spain',
	'LK' => 'Sri Lanka',
	'SD' => 'Sudan',
	'SR' => 'Suriname',
	'SJ' => 'Svalbard And Jan Mayen',
	'SZ' => 'Swaziland',
	'SE' => 'Sweden',
	'CH' => 'Switzerland',
	'SY' => 'Syrian Arab Republic',
	'TW' => 'Taiwan',
	'TJ' => 'Tajikistan',
	'TZ' => 'Tanzania',
	'TH' => 'Thailand',
	'TL' => 'Timor-Leste',
	'TG' => 'Togo',
	'TK' => 'Tokelau',
	'TO' => 'Tonga',
	'TT' => 'Trinidad And Tobago',
	'TN' => 'Tunisia',
	'TR' => 'Turkey',
	'TM' => 'Turkmenistan',
	'TC' => 'Turks And Caicos Islands',
	'TV' => 'Tuvalu',
	'UG' => 'Uganda',
	'UA' => 'Ukraine',
	'AE' => 'United Arab Emirates',
	'GB' => 'United Kingdom',
	'US' => 'United States',
	'UM' => 'United States Outlying Islands',
	'UY' => 'Uruguay',
	'UZ' => 'Uzbekistan',
	'VU' => 'Vanuatu',
	'VE' => 'Venezuela',
	'VN' => 'Viet Nam',
	'VG' => 'Virgin Islands, British',
	'VI' => 'Virgin Islands, U.S.',
	'WF' => 'Wallis And Futuna',
	'EH' => 'Western Sahara',
	'YE' => 'Yemen',
	'ZM' => 'Zambia',
	'ZW' => 'Zimbabwe',
);

/**
 * Languages spoken in countries
 */
$config['lang_country'] = array(
	'England'=>'English',
	'Spain'=>'Spanish',
	'Venezuela'=>'Spanish',
	'Ireland'=>'English',
	'Scotland'=>'English',
	'United_States'=>'English'
);

/**
 * 
 */
$config['country_transitions'] = array(
	'England'=>'United Kingdom'
);

?>