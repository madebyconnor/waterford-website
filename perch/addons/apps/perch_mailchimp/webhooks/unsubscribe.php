<?php

include(dirname(__FILE__) . '/../../../../runtime.php');
    
$API      = new PerchAPI(1.0, 'perch_mailchimp');
$Settings = $API->get('Settings');
$db       = $API->get('DB');

$secret = $Settings->get('perch_mailchimp_secret')->settingValue();

if($_POST) {
	//check the secret on the querystring
	if(!isset($_GET['perch'])) {
		die();
	}elseif(isset($_GET['perch']) && $_GET['perch'] != $secret) {
		die();
	}else {

		//process response
		$email = $_POST['data']['email'];

		$log = array(
            'logEvent'=>'Removed subscriber: '. $_POST['data']['email'],
            'logDate'=>date('Y-m-d H:i:s')
		);

		//remove user from database
		if($db->execute('DELETE FROM '.PERCH_DB_PREFIX.'mailchimp_subscribers WHERE subscriberEmail = '.$db->pdb($email))) {
			$log['logType'] = 'success';
		}else{
			$log['logType'] = 'failure';
		}

		//add to log
		$db->insert(PERCH_DB_PREFIX.'mailchimp_log',$log);
	}

}