<?php
/**
 * @Author: Eka Syahwan
 * @Date:   2017-09-14 07:43:42
 * @Last Modified by:   Eka Syahwan
 * @Last Modified time: 2017-10-02 14:28:27
 */
error_reporting(0);
ini_set('memory_limit','-1');
define( 'ROOT', dirname(__FILE__) . '/' );
require_once ROOT.'/modules/sendinbox/sendinbox.php';
require_once ROOT.'/smtp-config.php';

$token = file_get_contents(ROOT."token-sendinbox.txt");
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://bmarket.or.id/api/user.php?token='.$token );
$result = curl_exec($ch);
curl_close($ch); 
$result = json_decode($result,true);
if( $result['error'] || $result['status'] == 1){
   // die("\r\nTOKEN TIDAK VALID / masukan token di token-sendinbox.txt\r\n");
}else{
   //	echo ">>>[BMARKET] Token Valid\r\n";
}