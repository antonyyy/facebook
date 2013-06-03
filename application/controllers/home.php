<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{	

				$facebook = new Facebook(array(
			  'appId'  => '334187050043111',
			  'secret' => 'ef2aee944ebff35ac0b7629825ffc189',
			));


			// Get User ID
			$user = $facebook->getUser();			


			$user_profile=NULL;
			$logoutUrl=NULL;
			$loginUrl=NULL;

			if ($user) {
			  try {

				$user_profile = $facebook->api('/me');
			  } catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			  }
			}

			if ($user) {
			  $logoutUrl = $facebook->getLogoutUrl();

			  } else {
			  $loginUrl = $facebook->getLoginUrl();
			}
	
			 return View::make('facebook.view', array('user' => $user, 'logoutUrl' => $logoutUrl, 'user_profile' => $user_profile, 'loginUrl' => $loginUrl ));
				 
	  }


public function get_new()
{//bio je  face.new
		return View::make('facebook.new');

}



}